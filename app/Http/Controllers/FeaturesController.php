<?php

namespace App\Http\Controllers;

use App\Models\Features;
use DataTables;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ResizeImage;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $features = Features::all();
        return view('features.list',compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('features.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            // store user information

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images/features'), $imageName);

            $feature = Features::create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $imageName,
                'slug'=> Str::slug($request->title). '-' . Str::random(6),
            ]);

            if ($feature) {
                // assign new role to the user
                // $user->syncRoles($request->role);

                return redirect('feature/create')->with('success', 'New feature created!');
            }

            return redirect('feature/create')->with('error', 'Failed to create new feature! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Features::where("id",$id)->first();
        return view("features.edit",compact("feature"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request->all());
      try {
        // store user information

        // $imageName = time().'.'.$request->image->extension();  
 
        // $request->image->move(public_path('assets/images/features'), $imageName);
            $feature = Features::where("id",$id)->first();
            
        if ($request->hasFile('image')) {
            // $path = public_path('assets/images/features');
            // !is_dir($path) &&
            //     mkdir($path, 0777, true);
            // $imageName = strtolower($request->type).'-'.time().uniqid().'.'.$request->image->extension();
            // ResizeImage::make($request->file('image'))->save($path . $imageName);

            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images/features'), $imageName);
         
            $feature->title = $request->title;
            $feature->content = $request->content;
            $feature->image = $imageName;
            $feature->slug =  Str::slug($request->title). '-' . Str::random(6);
            $feature->save();

        }else{
            $feature->title = $request->title;
            $feature->content = $request->content;
            $feature->slug =  Str::slug($request->title). '-' . Str::random(6);
            $feature->save();
        }
      
        if ($feature) {
            return redirect()->route("features")->with('success', 'Feature updated!');
        }

        return redirect('feature/create')->with('error', 'Failed to create new feature! Try again.');
    } catch (\Exception $e) {
        $bug = $e->getMessage();
        return redirect()->back()->with('error', $bug);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Features::where('id',$id)->first();
        $featureImg = $feature->image;
        $image_path = public_path('assets/images/features'.$featureImg);
        if(File::exists($image_path)) {
          File::delete($image_path);
        }
        if($feature->delete()){
            return redirect()->back()->with("success","Feature Deleted");
        }
    }
}
