@extends('layouts.main') 
@section('title', 'Add Service')
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
                            <h5>{{ __('Add Service ')}}</h5>
                            <span>{{ __('Create new service')}}</span>
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
                                <a href="#">{{ __('Add Service')}}</a>
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
                        <h3>{{ __('Create Service')}}</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('create-service') }}">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6 ">

                                    <div class="form-group">
                                        <label for="header">{{ __('Header')}}<span class="text-red">*</span></label>
                                        <input id="header" type="text" class="form-control @error('header') is-invalid @enderror" name="header" value="" placeholder="Enter service" required>
                                        <div class="help-block with-errors"></div>

                                        @error('header')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-lg-12 col-md-12">

                                    <div class="form-group">
                                        <label for="name">{{ __('Content')}}<span class="text-red">*</span></label>
                                        <textarea id="name" type="text" class="form-control html-editor @error('content') is-invalid @enderror" name="content"  placeholder="Enter service content" required></textarea>
                                        <div class="help-block with-errors"></div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                           
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Submit')}}</button>
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script') 
        <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
         <!--get role wise permissiom ajax script-->
        <script src="{{ asset('js/get-role.js') }}"></script>
        <script src="{{ asset('js/form-components.js') }}"></script>
    @endpush
    
@endsection
