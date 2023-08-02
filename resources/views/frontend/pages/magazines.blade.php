@extends('layouts.front')
@section('content')
@section('title', 'FutureMap Magazine')
@include('frontend.include.innerBanner', ['banner_title' => 'FutureMap Magazine'])


@if (count($magazines) > 0)
<div class="event-area pt-100 pb-100">
    <div class="container">
        <div class="product-topper mb-45">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="product-title">
                        <h3>We found
                            <span>
                                {{ count($magazines) }}
                            </span>product(s) available for you
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    {{-- <div class="">
                       <p>Your cart <i class="ri-shopping-cart-fill"></i> <sup>0</sup></p>
                        
                    </div> --}}
                    <div class="product-title">
                        <a href="{{ route('cart.list') }}">
                            <h3>Go to cart
                                <span class="fas fa-shopping-cart"></span> <b class="cartCount">0</b>
                            </h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
         
                @foreach ($magazines as $magazine)
                    <div class="col-lg-6">
                        <div class="event-item box-shadow">
                            <div class="event-img">
                                <a href="#">
                                    <img src="{{ asset('assets/images/products') }}/{{ $magazine->image }}"
                                        alt="{{ $magazine->name }}" />
                                </a>
                            </div>
                            <div class="event-content">

                                <h3>
                                    <a href="#">{{ $magazine->name }} <small
                                            style="font-size:1rem">&#8358;{{ $magazine->price }}</small></a>
                                </h3>
                                {{-- <p>{!! substr($magazine->desc, 0, 100) !!}</p> --}}
                                <p>{!! Illuminate\Support\Str::limit($magazine->desc, 90) !!}</p>
                                <ul class="event-list">
                                    <button class="btn-cart border-radius-5" onclick="addToCart({{ $magazine->id }})">
                                        <i class="fas fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                    <button class="btn-cart border-radius-5 viewProduct" data-details="{!!$magazine->desc!!}" data-name="{{$magazine->name}}">
                                        <i class="fas fa-eye"></i>
                                        View
                                    </button>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

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
@else
<div class="coming-soon-area ptb-100">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container-fluid">
                <div class="coming-soon-content">
                    <h1>Oops!</h1>
                    <p>
                       No available magazine at the moment. Please check back at a later time
                    </p>
                  </div>
            </div>
        </div>
    </div>
</div>
@endif

@push('extra-scripts')
    <script>
        $(document).ready(function() {
            
            $(".viewProduct").on("click", function() {
                var dataTitle = $(this).attr("data-name");
                var dataDetails = $(this).attr("data-details");
                $.confirm({
                    columnClass: 'medium',
                    title: `${dataTitle}`,
                    content: `${dataDetails}`,
                    theme: 'modern',
                    closeIcon: false,
                    animation: 'scale',
                    type: 'blue',
                    }); 
            });
        });
    </script>
@endpush
@endsection
