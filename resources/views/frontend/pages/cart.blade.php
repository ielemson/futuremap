@extends('layouts.front')


@section('content')
@section('title', 'Cart')
@include('frontend.include.innerBanner', ['banner_title' => 'Cart'])


<section class="cart-wraps-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form>
                    <div class="cart-wraps">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Magazine</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="cartPage">
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="continue-shopping-box">
                                        <a href="{{ route('magazine.list') }}" class="default-btn">
                                            Continue Shopping
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="cart-totals">
                    <h3>Order Summary</h3>
                    <ul>
                        <li>Subtotal
                            <span class="cartSubtotal"></span>
                        </li>
                        <li>Coupon
                            <span>0.00</span>
                        </li>
                        <li>Total
                            <span>
                                <b class="cartTotal"></b>
                            </span>
                        </li>
                    </ul>
                    @auth
                        @php
                            $total = 0;
                            // $attribute_price = 0;
                            foreach (Cart::content() as $key => $product) {
                                $total += $product->price * $product->qty;
                                $total += $product->options->attribute_price;
                            }
                        @endphp
                        {{-- <a href="{{route('pay')}}" class="default-btn border-radius-5">
                        Make Payment
                    </a> --}}
                        {{-- <form method="POST" action="{{ route('pay') }}" id="paymentForm">
                            {{ csrf_field() }}
                            <input type="number" name="amount" val id="">
                            <button type="submit" class="default-btn col-12 mx-auto">Proceed to make payment</button>
                        </form> --}}

                        <form id="paymentForm">
                            <div class="form-group">
                                {{-- <label for="email">Email Address</label> --}}
                                <input type="hidden" id="email" required value="{{ Auth::user()->email }}" />
                            </div>
                            <div class="form-group">
                                {{-- <label for="amount">Amount</label> --}}
                                <input type="hidden" id="amount" required value="{{ $total }}" />
                            </div>
                            <div class="form-group">
                                {{-- <label for="first-name">First Name</label> --}}
                                <input type="hidden" id="name" value="{{ Auth::user()->name }}" />
                            </div>

                            <div class="form-submit">
                                <button type="submit" class="default-btn col-12 mx-auto" onclick="payWithPaystack()">
                                    Proceed to make payment </button>
                            </div>
                        </form>
                    @else
                        <div class="row mx-auto">
                            <button class="default-btn col-md-4 loginModal">
                                Login
                            </button>
                            &nbsp;
                            <button class="default-btn two  col-md-4 registerModal">
                                Register
                            </button>

                        </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</section>


@push('extra-scripts')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        })

        // START my cart page view
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/my-cart/list',
                dataType: 'json',
                success: function(response) {
                    // console.log(response)
                    $(".cartSubtotal").html("₦" + response.sub_total)
                    $(".cartTotal").html("₦" + new Intl.NumberFormat().format(response.cart_total) + ".00")
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr>
                                <td class="col-md-2 courses-thumbnail"><img src="assets/images/products/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
                                <td class="col-md-2">
                                    <div class="product-name"><a href="#">${value.name}</a></div>
                                    <div class="price">₦${new Intl.NumberFormat().format(value.price)}</div>
                                </td>
                               
                                <td class="col-md-2">
                                
                                <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;">
                             
                                </td>

                                <td class="col-md-2"><strong>₦${new Intl.NumberFormat().format(value.subtotal)}</strong></td>

                                <td class="col-md-1 close-btn">
                                    <button type="button" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="ri-delete-bin-6-line text-danger"></i></button>
                                </td>
                            </tr>
                            `
                    });
                    $('#cartPage').html(rows);
                    $('#total_bill').text(response.cart_total)
                }
            });
        }
        cart();
        // END my cart page view


        // START product remove from my cart
        function cartRemove(id) {
            $.ajax({
                type: 'GET',
                url: '/remove/from-cart/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    // miniCart();
                    // couponCalField();
                    // $('#applyCouponField').show();
                    // $('#coupon_name').val('');
                    // Start Message
                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        // END product remove from my cart

        // START product qty increment from my cart
        function cartIncrement(id) {
            $.ajax({
                type: 'GET',
                url: '/add/in-cart/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    // miniCart();
                    // couponCalField();
                    // Start Message
                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        //End product qty increment from my cart

        // START product qty Decrement from my cart
        function cartDecrement(id) {
            $.ajax({
                type: 'GET',
                url: '/reduce/from-cart/' + id,
                dataType: 'json',
                success: function(data) {
                    cart();
                    // miniCart();
                    // couponCalField();
                    // Start Message
                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 3000
                    // })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            icon: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            icon: 'error',
                            title: data.error
                        })
                    }
                    // End Message
                }
            });
        }
        //End product qty Decrement from my cart

        $(document).ready(function() {

            $(".loginModal").on("click", function() {
                $.confirm({
                    title: 'Login',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Login to complete your transaction</label>' +
                        '<input type="email" placeholder="Email" class="email form-control mb-2" required />' +
                        '<input type="password" placeholder="Password" class="password form-control" required />' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Login',
                            btnClass: 'btn-blue',
                            action: function() {
                                var email = this.$content.find('.email').val();
                                var password = this.$content.find('.password').val();
                                var url = "user/pay/login"
                                if (!email || !password) {
                                    $.alert('provide a valid entry');
                                    return false;
                                }

                                // const Toast = Swal.mixin({
                                //     toast: true,
                                //     position: 'top-end',
                                //     showConfirmButton: false,
                                //     timer: 3000
                                // })
                                $.ajax({
                                    type: 'POST',
                                    url: url,
                                    data: {
                                        password: password,
                                        email: email,
                                    },
                                    success: function(data) {
                                        // console.log(data)
                                        if (data.status == true) {
                                            Toast.fire({
                                                icon: 'success',
                                                title: data.msg,
                                            })

                                            setInterval(() => {
                                                location.reload()
                                            }, 2000);
                                        }

                                        if (data.status == false) {
                                            Toast.fire({
                                                icon: 'error',
                                                title: data.msg,
                                            })
                                        }



                                    },
                                    error: function(data) {
                                        console.log(error)
                                    }
                                });
                            }
                        },
                        cancel: function() {
                            //close
                        },
                    },
                    onContentReady: function() {

                    }
                });
            });


            /** REGISTER MODAL ------------------------>
             *  This is the registration modal for the checkout page
             *  **/

            $(".registerModal").on("click", function() {
                $.confirm({
                    title: 'Register',
                    content: '' +
                        '<form action="" class="formName">' +
                        '<div class="form-group">' +
                        '<label>Register a new account</label>' +
                        '<input type="text" placeholder="Full Name" class="name form-control mb-2" required />' +
                        '<input type="email" placeholder="Email" class="email form-control mb-2" required />' +
                        '<input type="password" placeholder="Password" class="password form-control mb-2" required />' +
                        '<input type="password" placeholder="Confirm Password" class="cpassword form-control" required />' +
                        '</div>' +
                        '</form>',
                    buttons: {
                        formSubmit: {
                            text: 'Register',
                            btnClass: 'btn-blue',
                            action: function() {
                                var name = this.$content.find('.name').val();
                                var email = this.$content.find('.email').val();
                                var password = this.$content.find('.password').val();
                                var cpassword = this.$content.find('.cpassword').val();
                                var url = "user/pay/register"
                                if (!name || !email || !password || !cpassword) {
                                    $.alert('provide a valid entry');
                                    return false;
                                }

                                $.ajax({
                                    type: 'POST',
                                    url: url,
                                    data: {
                                        name: name,
                                        password: password,
                                        email: email,
                                        cpassword: cpassword
                                    },
                                    success: function(data) {
                                        console.log(data)
                                        if (data.status == "success") {
                                            Toast.fire({
                                                icon: 'success',
                                                title: data.msg,
                                            })

                                            setInterval(() => {
                                                location.reload()
                                            }, 2000);
                                        }

                                        if (data.status == "error") {
                                            Toast.fire({
                                                icon: 'error',
                                                title: data.msg,
                                            })
                                        }

                                    },

                                    // error: function(response) {
                                    //     // console.log(response.responseJSON.errors)
                                    //     $.each(response.errors, function(key, value) {
                                    //         Toast.fire({
                                    //         icon: 'error',
                                    //         title: value,
                                    //     })

                                    //     });
                                    //                                         }

                                });
                            }
                        },
                        cancel: function() {
                            //close
                        },
                    },
                    onContentReady: function() {

                    }
                });
            });

        });
    </script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="https://js.paystack.co/v2/inline.js"></script>

    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);


        function payWithPaystack(e) {
            e.preventDefault();

            const paystack = new PaystackPop();
            paystack.newTransaction({
                key: 'pk_live_e1a9e2d2c647dc6ee867e1f2be54444f3c1011c8', // Replace with your public key
                // key: 'pk_test_e1c6d4f4a524851abebc3f2bfdb3003d15fb051e', // Replace with your public key
                email: document.getElementById("email").value,
                amount: document.getElementById("amount").value * 100,


                onSuccess: (transaction) => {
                    // Payment complete! Reference: transaction.reference 
                    // let message = 'Payment complete! Reference: ' + transaction;
                    $.ajax({
                        type: 'POST',
                        url: "paystack/store",
                        data: {
                            ref: transaction.reference,
                        },
                        success: function(data) {
                            
                            if (data.status == 200) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.msg,
                                })
                            }

                            setTimeout(() => {
                            location.href=data.url
                            }, 2000);
                        },

                    });
                },
                onCancel: () => {
                    // user closed popup
                    Toast.fire({
                        icon: 'error',
                        title: 'Payment Canceled',
                    })
                }

            });

        }
    </script>
@endpush
@endsection
