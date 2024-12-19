
@extends('layouts.main') 
@section('title', 'Personality Profiles')
@section('content')
    <!-- push external head elements to head -->

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __(' Personality Profile List ')}}</h5>
                            <span>{{ __('Personality Profiles')}}</span>
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
                                <a href="{{ route("personality.create") }}">{{ __('Add Profile')}}</a>
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
          
        </div>
        <div class="row">
            <div class="col-md-12">
               
                <h5 class="mb-4">{{ __('Profile Card')}}</h5>
                <div class="row">
                    <div class="row mt-4">
                        @foreach ($profiles as $profile)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    @if ($profile->image)
                                        <img src="{{ asset('assets/images/personalities/' . $profile->image) }}" class="card-img-top" alt="{{ $profile->name }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $profile->name }}</h5>
                                        <p class="card-text">{!! substr($profile->story , 0, 100) !!}</p>
                                        <p class="card-text"><strong>Type:</strong> {{ ucfirst($profile->type) }}</p>
                                        <a href="{{ route('personality.edit', $profile->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('personality.destroy', $profile->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                   
                </div>

            </div>
        </div>
    </div>
  
@endsection
