
@extends('layouts.main') 
@section('title', 'Event Magazine')
@section('content')
    <!-- push external head elements to head -->

    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __(' Event Magazine List ')}}</h5>
                            <span>{{ __('Event Magazine List')}}</span>
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
                                <a href="{{ route("event.magazine.create") }}">{{ __('Create Event')}}</a>
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
               
               @if (count($events)>0)
               <h5 class="mb-4">{{ __('Event Card')}}</h5>
               <div class="row">
                   <div class="row mt-4">
                       @foreach ($events as $event)
                           <div class="col-md-4">
                               <div class="card mb-3">
                                   @if ($event->image_banner)
                                       <img src="{{ asset('assets/images/banners/' .$event->image_banner) }}" class="card-img-top" alt="{{ $event->name }}">
                                   @endif
                                   <div class="card-body">
                                       <h5 class="card-title">{{ $event->title }}</h5>
                                       <p class="card-text">{!! substr($event->content , 0, 100) !!}</p>
                                       <p class="card-text"><strong>Status:</strong> {{ ucfirst($event->status) }}</p>
                                       <a href="{{ route("event.magazine.edit", $event->id) }}" class="btn btn-warning">Edit</a>
                                       <form action="{{ route("event.magazine.destroy", $event->id) }}" method="POST" class="d-inline">
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
               @else
                   No event so far
               @endif

            </div>
        </div>
    </div>
  
@endsection
