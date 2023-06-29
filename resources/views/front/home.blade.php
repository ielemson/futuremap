@extends('layouts.front')

@section('content')

@section('title', 'Home')

@include('front.include.slider')


{{-- Who we are --}}
@include('front.include.whoweare')
{{-- Features --}}
@if (count($features)>0)
@include('front.include.features')
@endif

@include('front.include.adevert')
@endsection
