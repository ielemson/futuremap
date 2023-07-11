<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as ResizeImage;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        // dd($news);
        return view('news.index',compact('news'));
    }

    public function category()
    {
        $categories = NewsCategory::all();
        // dd($categories);
        return view('news.category.index',compact('categories'));
    }

    public function storeCategory(Request $request){
        // return $request;

        // $request->validate([
        //     'name'   => 'required'
        // ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        // if ($request->hasFile('image')) {
        //     $imageName = 'category-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
        //     $request->image->move(public_path('images'), $imageName);
        // }

        NewsCategory::create([
            'name'   => $request->cat_name,
            'slug'   => Str::slug($request->cat_name),
            'status' => $status
        ]);

        return redirect()->route('news.category')->with('success', 'News category created successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::latest()->select('id','name')->where('status',1)->get();

        return view('news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|unique:news|max:255',
            'details'       => 'required',
            'category_id'   => 'required',
            'image'         => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        if(isset($request->featured)){
            $featured = true;
        }else{
            $featured = false;
        }

        if ($request->hasFile('image')) {
            // $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('assets/images/news'), $imageName);
            $path = public_path('assets/images/news/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $imageName = 'news-'.time().uniqid().'.'.$request->image->extension();
            ResizeImage::make($request->file('image'))
                ->resize(1120, 700)
                ->save($path . $imageName);
        }

        News::create([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title),
            'details'       => $request->details,
            'category_id'   => $request->category_id,
            'image'         => $imageName,
            'status'        => $status,
            'featured'      => $featured
        ]);

        return redirect()->route('news.create')->with('success','News created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('id',$id)->first();
        return response()->json(['news'=>$news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editNews($id)
    {
        $news = News::where('id',$id)->first();
        $categories = NewsCategory::latest()->select('id','name')->where('status',1)->get();
        return view('news.edit',compact('news','categories'));
    }

    public function updateNews(Request $request,$id){
      

        $request->validate([
            'title'         => 'required',
            'details'       => 'required',
            'category_id'   => 'required',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        $news = News::where('id',$id)->first();

        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }

        if(isset($request->featured)){
            $featured = true;
        }else{
            $featured = false;
        }

        if ($request->hasFile('image')) {
            // $imageName = 'news-'.time().uniqid().'.'.$request->image->getClientOriginalExtension();
            // $request->image->move(public_path('assets/images/news'), $imageName);
            $path = public_path('assets/images/news/');
            !is_dir($path) &&
                mkdir($path, 0777, true);
    
            // $name = time() . '.' . $request->image->extension();
            $imageName = 'news-'.time().uniqid().'.'.$request->image->extension();
            ResizeImage::make($request->file('image'))
                ->resize(1120, 700)
                ->save($path . $imageName);

                $news->title =  $request->title;
                $news->slug =  Str::slug($request->title);
                $news->details =  $request->details;
                $news->category_id = $request->category_id;
                $news->image = $imageName;
                $news->status = $status;
                $news->featured = $featured;
                $news->save();
        }

        // $news = News::where('id',$id)->first();

        $news->title =  $request->title;
        $news->slug =  Str::slug($request->title);
        $news->details =  $request->details;
        $news->category_id = $request->category_id;
        // $news->image = $imageName;
        $news->status = $status;
        $news->featured = $featured;
        $news->save();

       
        return redirect()->route('news.list')->with('success','News updated successfully!');

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategory(Request $request)
    {
        if(isset($request->status)){
            $status = true;
        }else{
            $status = false;
        }
        
        $category = NewsCategory::where('id',$request->id)->first();
        // return $category;
        $category->name = $request->cat_name;
        $category->status = $status;
        if($category->save()){
            return response()->json(['status'=>200]);
        }
        return response()->json(['status'=>204]);
        
        
    }

    public function deleteNews($id){
    
        $news = News::where('id',$id)->first();
        $newsImg = $news->image;
        $image_path = public_path('assets/images/news/'.$newsImg);
        if(File::exists($image_path)) {
          File::delete($image_path);
        }
        if($news->delete()){
            
            return response()->json(['status'=>200]);
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
        //
    }
}
