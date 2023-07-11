@extends('layouts.main')
@section('title', 'Update News')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Update News</h5>
                            <span>Update News</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Update News</a>
                            </li>
                        </ol>
                    </nav>
                      <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('news.update',$news->id)}}" method="POST" enctype="multipart/form-data" role="form">
                            @csrf
            
                        <div class="row">
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="newstitle">Title</label>
                                            <input type="text" name="title" class="form-control" id="newstitle" value="{{$news->title}}">
                                        </div>
                                        <div class="form-group">
                                            <label>News Details</label>
                                            <textarea class="textarea html-editor" name="details" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                            {{$news->details}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Categories</label>
                                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{$news->category_id == $category->id ? 'selected': ''}}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="newsimage">Featured Image</label>
                                            <input type="file" name="image" id="newsimage">
                                            <p class="help-block">(Image must be in .png or .jpg format)</p>
                                        </div>
                                        <hr>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="status" {{$news->status == 1 ? 'checked': ''}}> Published
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="featured" {{$news->featured == 1 ? 'checked': ''}}> Featured
                                            </label>
                                        </div>
                                    </div>
            
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-flat">UPDATE NEWS</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <img src="{{asset('assets/images/news')}}/{{$news->image}}" alt="" style="width:50%" class="img-thumbnail">
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
