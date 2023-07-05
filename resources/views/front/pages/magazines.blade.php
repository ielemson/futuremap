@extends('layouts.front')
@section('content')
@section('title', 'Future Map Magazine')
@include('front.include.innerBanner', ['banner_title' => 'Future Map Magazine'])

<div class="event-area pt-100 pb-100">
    <div class="container">
        <div class="product-topper mb-45">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="product-title">
                        <h3>We found
                            <span>
                              {{count($magazines)}}
                            </span>courses available for you</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="product-list">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Default Price</option>
                            <option value="1">Price High To Low</option>
                            <option value="2">Price Low To High</option>
                        </select>
                        <i class="ri-arrow-down-s-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
           @if (count($magazines) > 0)
               @foreach ($magazines as $magazine)
               <div class="col-lg-6">
                <div class="event-item box-shadow">
                    <div class="event-img">
                        <a href="#">
                            <img src="{{asset('assets/images/products')}}/{{$magazine->image}}" alt="{{$magazine->name}}"/>
                        </a>
                    </div>
                    <div class="event-content">
                       
                        <h3>
                            <a href="#">{{$magazine->name}} <small style="font-size:1rem">&#8358;{{$magazine->price}}</small></a>
                        </h3>
                        <p>{!! substr($magazine->desc, 0, 100) !!}</p>
                         <ul class="event-list">
                            <button class="btn btn-info btn-sm" onclick="addToCart({{$magazine->id}})">
                                <i class="fas fa-shopping-cart" ></i>
                                Add to cart
                            </button>
                            <button class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                                View 
                            </button>
                        </ul>
                    </div>
                </div>
            </div>
               @endforeach
           @endif
         
            <div class="col-lg-12 col-md-12 text-center">
                <div class="pagination-area">
                    {{-- <a href="blog.html" class="prev page-numbers">
                        <i class="flaticon-left-arrow"></i>
                    </a>
                    <span class="page-numbers current" aria-current="page">1</span>
                    <a href="blog.html" class="page-numbers">2</a>
                    <a href="blog.html" class="page-numbers">3</a>
                    <a href="blog.html" class="next page-numbers">
                        <i class="flaticon-chevron"></i>
                    </a> --}}
                    {{-- Pagination --}}
                    {!! $magazines->links() !!}
                    {{-- Pagination --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
