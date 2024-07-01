@extends('layouts.front')
@section('content')
@section('title', 'FutureMap Magazine')
@include('frontend.include.innerBanner', ['banner_title' => 'FutureMap Magazine'])


<div class="container mt-5 mb-5">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-4 col-md-4 float-right">
                      
                      
    </div>
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                
                    <div class="col-md-6 col-sm-12">
                        <div class="images p-3">
                            <div class="text-center"> <img id="main-image" src="{{ asset('assets/images/products') }}/{{ $magazine->image }}" style="width:70%"/> </div>
                            {{-- <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70"> <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70"> </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                          
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"></span>
                                <h5 class="text-uppercase">{{ $magazine->name }}</h5>
                                <div class="price d-flex flex-row align-items-center">
                                    <div class="ml-2"><b>Price:</b>  <span class="act-price">@money($magazine->price,'NGN')</small>
                                        <br>
                                        {{-- <a href="{{ route('cart.list') }}">
                                            <h3>
                                              <b class="cartCount">0</b></h3>
                                            <h4>Click here to checkout</h4>
                                           </a> --}}
                                           <div class="cart mt-4 align-items-center"> <a href="{{ route('cart.list') }}" class="btn btn-success text-uppercase mr-2 px-4 text-white"> <b class="cartCount">0</b> Click Here to Checkout</a></div>
                                    </div>
                                        
                                </div>
                            </div>
                            <p class="about" style="font-size: 1rem">
                                {!! $magazine->desc!!}
                            </p>
                            
                           <div class="btn-group">
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-primary text-uppercase mr-2 px-4 text-white" onclick="addToCart({{ $magazine->id }})"> <i class="fa fa-shopping-cart"></i> Add to cart</button></div>
                            &nbsp;
                            <a href="{{ route("magazine.list") }}" class="cart mt-4 align-items-center"> <button class="btn btn-info text-uppercase mr-2 px-4 text-white"> <i class="fa fa-long-arrow-left"></i> Go Back</button></a>
                           </div>
                        </div>
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

@push('extra-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card{border:none}.product{background-color: #eee}.brand{font-size: 13px}.act-price{color:red;font-weight: 700}.dis-price{text-decoration: line-through}.about{font-size: 14px}.color{margin-bottom:10px}label.radio{cursor: pointer}label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}label.radio span{padding: 2px 9px;border: 2px solid #ff0000;display: inline-block;color: #ff0000;border-radius: 3px;text-transform: uppercase}label.radio input:checked+span{border-color: #ff0000;background-color: #ff0000;color: #fff}.btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}.btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}.btn-danger:focus{box-shadow: none}.cart i{margin-right: 10px}
    </style>
@endpush
@endsection
