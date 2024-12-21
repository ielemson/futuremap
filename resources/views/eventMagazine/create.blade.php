@extends('layouts.main') 
@section('title', 'Add Event Magazine')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Add Event Magazine')}}</h5>
                            <span>{{ __('Add Event Magazine')}}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{url('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Add Event Magazine')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>{{ __('Create Event')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route("event.magazine.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" id="title" required>
                            </div>
                    
                                </div>
                              
                                    <div class="col-md-6"> <div class="mb-3">
                                        <label for="type" class="form-label">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="Published">Published</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                    </div></div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="image_banner" class="form-label">Event Location</label>
                                        <input type="text" name="location" class="form-control" id="location" required>
                                    </div>
                                </div>
                                <div class="col-md-6"> <div class="mb-3">
                                    <label for="image_banner" class="form-label">Image Banner</label>
                                    <input type="file" name="image_banner" class="form-control" id="image_banner" required>
                                </div></div>
                            </div>
                            
                           
                    
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" class="form-control" id="summernote" rows="5" required></textarea>
                            </div>
                    
                            <div class="mb-3">
                                <label for="gallery" class="form-label">Gallery</label>
                                <input type="file" name="gallery[]" class="form-control" id="gallery" multiple>
                            </div>
                    
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
   
    
@endsection

@push('script')

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summernote').summernote({
        placeholder: 'Please ensure to paste from MS word, Notepad. Avoid pasting directly from other websites.',
        tabsize: 2,
        height: 150,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>
@endpush