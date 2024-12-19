@extends('layouts.main') 
@section('title', 'Users')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush

    
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Users')}}</h5>
                            <span>{{ __('List of users')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Users')}}</a>
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
            <div class="row">
                {{-- <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Features')}}</h3></div>
                    <div class="card-body">
                        <table id="" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Title')}}</th>
                                    <th>{{ __('Content')}}</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $feature)
                                    <tr>
                                    <td>{{$feature->title}}</td>
                                </tr> 
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                </div> --}}
                @foreach ($features as $feature)
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    @if ($feature->image)
                                        <img src="{{ asset('assets/images/features/' . $feature->image) }}" class="card-img-top" alt="{{ $feature->title }}">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $feature->title }}</h5>
                                        <p class="card-text">{!! substr($feature->content , 0, 50) !!}</p>
                                        <a href="{{ route('features.edit', $feature->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('features.destroy', $feature->id) }}" method="POST" class="d-inline">
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
    <!-- push external js -->
    @push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!--server side users table script-->
    <script src="{{ asset('js/custom.js') }}"></script>
    @endpush
@endsection
