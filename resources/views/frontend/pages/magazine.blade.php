@extends('layouts.front')
@section('content')
@section('title', $magazine->name)
@include('frontend.include.innerBanner', [
    'banner_title_1' => $magazine->name,
    'banner_title_2' => 'Our Magazine',
])

@extends('layouts.front')
@section('content')
@section('title', $magazine->name)
@include('frontend.include.innerBanner', [
    'banner_title_1' => $magazine->name,
    'banner_title_2' => 'Our Magazine',
])

<div class="container py-5">
    <div class="row justify-content-center">

        @if (session('ref_vendor_code') && isset($vendor))
            <div class="alert alert-info d-flex align-items-center gap-3">

                <div>
                    <strong>{{ $vendor->user->name }}</strong><br>
                    <small>{{ $vendor->user->email }}</small><br>
                    <span class="badge bg-success">Referral Code: {{ session('ref_vendor_code') }}</span>
                </div>
            </div>
        @elseif(session('ref_vendor_code'))
            <div class="alert alert-warning">
                Referral code <strong>{{ session('ref_vendor_code') }}</strong> is invalid or expired.
            </div>
        @endif


        <!-- Magazine Image -->
        <div class="col-md-5 mb-4">
            <div class="card shadow-sm" style="width:80%">
                <img src="{{ asset('assets/images/products') }}/{{ $magazine->image }}" class="card-img-top"
                    alt="{{ $magazine->name }}">
            </div>
        </div>

        <!-- Magazine Details -->
        <div class="col-md-7">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h3 class="card-title fw-bold text-primary mb-3">{{ $magazine->name }}</h3>

                    <p class="mb-2 fs-5">Price:
                        <span class="text-danger fw-bold">₦{{ number_format($magazine->price) }}</span>
                    </p>

                    {{-- <div class="mb-3">
                    <a href="{{ route('cart.list') }}" class="btn btn-success btn-lg w-50">

                    <b class="cartCount">0</b>
                    — Click here to complete your order!
                    </a>
                    </div> --}}

                    @if (!session('ref_vendor_code'))
                        <div class="mb-4">
                            <form action="{{ route('referral.set') }}" method="POST" class="d-flex">
                                @csrf
                              
                                   <div class="row">
                                     <div class="col-md-9">
                                       <input type="ref_code"
                                            class="form-control me-2  @error('ref_code') is-invalid @enderror"
                                            name="ref_code"  autocomplete="ref_code" placeholder="referral code" autofocus>
                                        @error('ref_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                         <button type="submit" class="btn btn-outline-primary">Apply</button>
                                    </div>
                                   </div>
                            </form>
                        </div>
                    @else
                        <div class="alert alert-info">
                            Referral code applied: <strong>{{ session('ref_vendor_code') }}</strong>
                        </div>
                    @endif

                    <p class="text-muted small fst-italic mb-4">
                        {{ $magazine->created_at->format('F Y') }} Edition
                    </p>

                    <p class="card-text fs-6" style="line-height: 1.7;">
                        {!! nl2br($magazine->desc) !!}
                    </p>

                    <div class="mt-4 d-flex gap-2">
                        <a href="javascript:;" class="btn btn-outline-primary" onclick="BuyItem({{ $magazine->id }})">
                            <i class="bi bi-cart"></i> Buy Product
                        </a>
                        <a href="{{ route('magazine.list') }}" class="btn btn-outline-secondary">
                            ← Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('extra-scripts')
    <script>
        $(document).ready(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            })

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

{{-- @push('extra-css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            border: none
        }

        .product {
            background-color: #eee
        }

        .brand {
            font-size: 13px
        }

        .act-price {
            color: red;
            font-weight: 700
        }

        .dis-price {
            text-decoration: line-through
        }

        .about {
            font-size: 14px
        }

        .color {
            margin-bottom: 10px
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 2px 9px;
            border: 2px solid #ff0000;
            display: inline-block;
            color: #ff0000;
            border-radius: 3px;
            text-transform: uppercase
        }

        label.radio input:checked+span {
            border-color: #ff0000;
            background-color: #ff0000;
            color: #fff
        }

        .btn-danger {
            background-color: #ff0000 !important;
            border-color: #ff0000 !important
        }

        .btn-danger:hover {
            background-color: #da0606 !important;
            border-color: #da0606 !important
        }

        .btn-danger:focus {
            box-shadow: none
        }

        .cart i {
            margin-right: 10px
        }
    </style>
@endpush --}}
@endsection


@push('extra-scripts')
<script>
    $(document).ready(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

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

{{-- @push('extra-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush --}}
@endsection
