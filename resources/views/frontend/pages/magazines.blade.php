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
                      
                            <div class="counter-card box-shadow">
                               
                               <a href="{{ route('cart.list') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <h3>
                                  <b class="cartCount">0</b></h3>
                                <h4>Click here to checkout</h4>
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
                                            style="font-size:1rem"> @money($magazine->price,'NGN')</small></a>
                                </h3>
                                {{-- <p>{!! substr($magazine->desc, 0, 100) !!}</p> --}}
                                <p>{!! Illuminate\Support\Str::limit($magazine->desc, 90) !!}</p>
                                <ul class="event-list">


                                   <div class="btn-group">
                                    @if ($magazine->competiton_status == 1)
                                    <button class="btn-success border-radius-5 competitionEntry"
                                        data-id="{!! $magazine->id !!}" >
                                        <i class="fas fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                @else
                                    <button class="btn-success border-radius-5"
                                        onclick="addToCart({{ $magazine->id }})">
                                        <i class="fas fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                @endif
                                    &nbsp;
                                <a href="{{ route("magazine.details",$magazine->slug) }}" class="btn btn-primary border-radius-5" style="color:white">
                                    <i class="fas fa-eye"></i>
                                    View
                                </a>
                                   </div>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-lg-12 col-md-12 text-center">
                    <div class="pagination-area">

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
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })

            // BRIEF PRODUCT VIEW ####################
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

            // COMPETITION MODAL
            $(".competitionEntry").on("click", function() {
                var prodId = $(this).attr("data-id");
                var url = "{{ route('cart.list') }}";
                // COMPETETION STARTS HERE
                $.confirm({
                    title: '<b>Our Magazine Competition<b/>',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Kndly fill below before checkout</label>' +
                        '<input type="text" placeholder="Your name" class="name mb-1 form-control" required />' +
                        '<input type="email" placeholder="Your email" class="email mb-1 form-control" required />' +
                        '<input type="text" placeholder="Your location" class="location mb-1 form-control" required />' +
                        '<input type="text" placeholder="How did you know about the competition ?" class="aboutComp mb-1 form-control" required />' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Submit',
                            btnClass: 'btn-blue',
                            action: function() {
                                var name = this.$content.find('.name').val();
                                var location = this.$content.find('.location').val();
                                var aboutComp = this.$content.find('.aboutComp').val();
                                var email = this.$content.find('.email').val();
                                if (!name || !location || !aboutComp || !email) {
                                    $.alert('all fields are required');
                                    return false;
                                }

                                // ajax call
                                $.ajax({
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {
                                        prodId: prodId,
                                        name: name,
                                        location: location,
                                        aboutComp: aboutComp,
                                        email: email
                                    },
                                    url: '/product/competition',
                                    success: function(data) {

                                        if (data.status == false) {

                                            Toast.fire({
                                                icon: 'error',
                                                title: data.msg
                                            })
                                        }


                                        if (data.status == true) {
                                            Toast.fire({
                                            icon: 'success',
                                            title: data.msg
                                        })
                                    }

                                    
                                    addToCart(prodId)
                                    setTimeout(() => {
                                    window.location.href = url
                                    // alert('yes')
                                     }, 3000);
                                    }

                                  
                                })

                            }
                        },

                        cancel: function() {
                            //close
                        },
                    },
                    onContentReady: function() {
                        // // bind to events
                        var jc = this;
                        this.$content.find('form').on('submit', function(e) {
                            // if the user submits the form by pressing enter in the field.
                            e.preventDefault();
                            jc.$$formSubmit.trigger('click');



                            // reference the button and click it
                        });


                    }
                });
                // COMPETETION STARTS HERE 


            });
        });
    </script>
@endpush
@endsection
