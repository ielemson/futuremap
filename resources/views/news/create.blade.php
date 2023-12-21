@extends('layouts.main')
@section('title', 'Create News')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Create News</h5>
                            <span>Add news</span>
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
                                <a href="#">Add Product</a>
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
                <div class="card ">
                    <div class="card-body">
                        <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data" role="form">
                            @csrf
            
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-body">
                                     <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="newstitle">Title</label>
                                                <input type="text" name="title" class="form-control" id="newstitle">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Categories</label>
                                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                        <div class="form-group">
                                            <label>News Details</label>
                                            <textarea class="textarea html-editor form-control" name="details" placeholder="News content" style=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-body">
                                        
                                        <div class="form-group">
                                            <label for="newsimage">Featured Image</label>
                                            <input type="file" name="image" id="newsimage">
                                            <p class="help-block">(Image must be in .png or .jpg format)</p>
                                        </div>
                                        <hr>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="status" checked> Published
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="featured"> Featured
                                            </label>
                                        </div>
                                    </div>
            
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-flat">CREATE</button>
                                    </div>
                                </div>
                            </div>
            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
