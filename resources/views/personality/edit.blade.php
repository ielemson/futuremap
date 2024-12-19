@extends('layouts.main') 
@section('title', 'Update Personality')
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
                            <h5>{{ __('Add Personality Profile')}}</h5>
                            <span>{{ __('Create new Personality Profile')}}</span>
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
                                <a href="{{ route("personality.index") }}">{{ __('View Personality Profile')}}</a>
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
                        <h3>{{ __('Create Personality Profile')}}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('personality.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $profile->name }}" required>
                            </div>
                           <div class="row">
                            <div class="col-md-6"> <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="individual" {{ $profile->type == 'individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="organization" {{ $profile->type == 'organization' ? 'selected' : '' }}>Organization</option>
                                </select>
                            </div></div>
                            <div class="col-md-6"> <div class="mb-3">
                                <label for="type" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="Published" {{ $profile->status == 'Published' ? 'selected' : '' }}>Published</option>
                                    <option value="Draft" {{ $profile->status == 'Draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div></div>
                           </div>
                            <div class="mb-3">
                                <label for="story" class="form-label">Story</label>
                                <textarea name="story" id="summernote" class="form-control" rows="5" required>
                                    {!! $profile->story !!} 
                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="mb-3">
                                {{-- <label for="image" class="form-label">Image</label> --}}
                                @if ($profile->image)
                                    <img src="{{ asset('assets/images/personalities/' . $profile->image) }}" alt="{{ $profile->name }}" class="img-fluid mb-3" width="100" height="100">
                                @endif
                                {{-- <input type="file" name="image" id="image" class="form-control"> --}}
                            </div>
                            <button type="submit" class="btn btn-success">Update Profile</button>
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