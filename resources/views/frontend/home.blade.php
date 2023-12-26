@extends('layouts.front')

@section('content')

@section('title', $seo_title ?? '')

@include('frontend.include.slider')


{{-- Who we are --}}
{{-- @include('frontend.include.whoweare') --}}
{{-- Features --}}
@if (count($features)>0)
@include('frontend.include.features')
@endif
@include('frontend.include.adevert')
@include('frontend.include.partialBlog')

@endsection
