@extends('layouts.front')

@section('content')

@section('title', 'The Future Map Media')

@include('frontend.include.slider')

{{-- Who we are --}}
{{-- @include('frontend.include.whoweare') --}}
{{-- Features --}}
@if (count($features)>0)
@include('frontend.include.features')
@endif
@include('frontend.include.adevert')
@include('frontend.include.partialBlog')
@include("frontend.include.partialPersonality")
@include("frontend.include.eventmagazines")

@include("frontend.include.scholarship_Opportunites")

<div class="footer-contact-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9">
                <div class="section-title">
                    <h2>Advance your career and growth with our support.</h2>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 text-end">
                <a href="{{ route("contact.us") }}" class="default-btn">Contact us now</a>
            </div>
        </div>
    </div>
</div>
@endsection
