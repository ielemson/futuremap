<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ResizeImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventMagazineController extends Controller
{
    public function index(){

        $events = Event::all();
        return view("eventMagazine.index",compact("events"));
    }

    public function create()
    {
        return view("eventMagazine.create");
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required',
            'status' => 'required|string|max:255',
            'image_banner' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'content' => 'required',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $path = public_path('assets/images/banners/');
        $imageBannerPath = "image_banner".'-'.time().uniqid().'.'.$request->image_banner->extension();
            ResizeImage::make($request->file('image_banner'))
                ->resize(1120, 642)
                ->save($path . $imageBannerPath);

        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $name = "image_gallery".'.'.time().rand(1,50).'.'.$image->extension();
                $image->move(public_path('assets/images/gallery'), $name);  
                $galleryPaths[] = $name;
            }
        }

        Event::create([
            'title' => $request->title,
            'location' => $request->location,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
            'status' => $request->status,
            'slug'=> Str::slug($request->title),
            'image_banner' => $imageBannerPath,
            'content' => $request->content,
            'gallery' => json_encode($galleryPaths),
        ]);

        return redirect()->route("event.magazine.index")->with('success', 'Event created successfully!');
    }

    public function edit($id)
{
    $event = Event::where("id",$id)->first();
    // dd($event);
    return view("eventMagazine.edit", compact('event'));
}

    public function update(Request $request, $id)
    {
        $event = Event::where("id",$id)->first();
        // dd($event);
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required',
            'image_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            $imageBannerPath = $event->image_banner;
        if ($request->hasFile('image_banner')) {
            $imageBannerPath = "image_banner".'-'.time().'.'.$request->image_banner->extension();  
            $request->image_banner->move(public_path('assets/images/banners'), $imageBannerPath);
        }

        // $galleryPaths = $event->gallery;
        
        if ($request->hasFile('gallery')) {
            $galleryPaths = [];
            foreach ($request->file('gallery') as $image) {
                $name = "image_gallery".'.'.time().rand(1,50).'.'.$image->extension();
                $image->move(public_path('assets/images/gallery'), $name);  
                $galleryPaths[] = $name;
            }

            $event->update([
                'title' => $request->title,
                'status' => $request->status,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'slug' => Str::slug($request->title),
                'location' => $request->location,
                'image_banner' => $imageBannerPath,
                'content' => $request->content,
                'gallery' => json_encode($galleryPaths),
            ]);
        }else{
            $event->update([
                'title' => $request->title,
                'status' => $request->status,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'slug' => Str::slug($request->title),
                'location' => $request->location,
                'image_banner' => $imageBannerPath,
                'content' => $request->content,
            ]);
        }

     

        return redirect()->route("event.magazine.index")->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = Event::where("id",$id)->first();
        $image_path = public_path('assets/images/banners/'.$event->image_banner);
        if(File::exists($image_path)) {
            File::delete($image_path);
          }
        if ($event->gallery) {
            $galleryImages = json_decode($event->gallery, true);
            foreach ($galleryImages as $image) {
                File::delete(public_path('assets/images/gallery/'.$image));
            }
        }

        $event->delete();

        return redirect()->route("event.magazine.index")->with('success', 'Event deleted successfully!');
    }
}
