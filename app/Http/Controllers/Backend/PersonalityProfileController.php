<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;

class PersonalityProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('personality.index', compact('profiles'));
    }

    public function create()
    {
        return view('personality.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:individual,organization',
            'story' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // $imagePath = $request->file('image') ? $request->file('image')->store('assets/images/personalities', 'public') : null;
        if ($request->hasFile('image')) {
            $path = public_path('assets/images/personalities/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
            $imageName = strtolower($request->type).'-'.time().uniqid().'.'.$request->image->extension();
            ResizeImage::make($request->file('image'))->save($path . $imageName);
        }

        Profile::create([
            'name' => $request->name,
            'type' => $request->type,
            'story' => $request->story,
            'status' => $request->status,
            'slug'=> Str::slug($request->name). '-' . Str::random(6),
            'image' => $imageName,
        ]);

        return redirect()->route('personality.index')->with('success', 'Profile created successfully.');
    }

    public function edit($id)
    {
        $profile = Profile::where("id",$id)->first();
        return view('personality.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::where("id",$id)->first();

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:individual,organization',
            'story' => 'required|string',
            'status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // if ($request->file('image')) {
        //     if ($profile->image) {
        //         Storage::disk('public')->delete($profile->image);
        //     }
        //     $profile->image = $request->file('image')->store('assets/images/personalities', 'public');
        // }

        if ($request->hasFile('image')) {
            $path = public_path('assets/images/personalities/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
            $imageName = strtolower($request->type).'-'.time().uniqid().'.'.$request->image->extension();
            ResizeImage::make($request->file('image'))->save($path . $imageName);
        }


        // $profile->update($request->only('name', 'type', 'story', 'image','status'));
                $profile->type = $request->type;
                $profile->name = $request->name;
                $profile->story = $request->story;
                $profile->status = $request->status;
                $profile->image = $imageName;
                $profile->save();

        return redirect()->route('personality.index')->with('success', 'Profile updated successfully.');
    }

    public function destroy($id)
    {
        $profile = Profile::where('id',$id)->first();
        if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }
        $profile->delete();

        return redirect()->route('personality.index')->with('success', 'Profile deleted successfully.');
    }
}
