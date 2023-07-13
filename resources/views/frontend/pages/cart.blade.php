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
                        
                                 {{-- <tr>
                                    <td class="courses-thumbnail">
                                        <a href="cart.html">
                                            <img src="assets/images/courses/courses-img1.jpg" alt="Image">
                                        </a>
                                    </td>
                                    <td class="courses-name">
                                        <a href="cart.html">UI/UX design</a>
                                    </td>
                                    <td class="courses-price">
                                        <span class="unit-amount">$30.00</span>
                                    </td>
                                    <td class="courses-subtotal">
                                        <span class="subtotal-amount">$30.00</span>
                                        <a href="cart.html" class="remove">
                                            <i class="ri-delete-bin-6-line"></i>
                                        </a>
                                    </td>
                                </tr> --}}
                                
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-7">
                                    <div class="continue-shopping-box">
                                        <a href="{{route('magazine.list')}}" class="default-btn">
                                            Continue Shopping
                                        </a>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-5 col-md-5 text-end">
                                    <a href="#" class=" default-btn">
                                        Update Cart
                                    </a>
                                </div> --}}
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
                    <a href="#" class="default-btn border-radius-5">
                        Proceed to checkout
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@push('extra-scripts')
    <script>
        // START my cart page view
        function cart() {
            $.ajax({
                type: 'GET',
                url: '/my-cart/list',
                dataType: 'json',
                success: function(response) {
                    console.log(response)
                    $(".cartSubtotal").html("₦" + response.sub_total)
                    $(".cartTotal").html("₦" +  new Intl.NumberFormat().format(response.cart_total)+ ".00")
                    var rows = ""
                    $.each(response.carts, function(key, value) {
                        rows += `<tr>
                                <td class="col-md-2 courses-thumbnail"><img src="assets/images/products/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
                                <td class="col-md-2">
                                    <div class="product-name"><a href="#">${value.name}</a></div>
                                    <div class="price">₦${new Intl.NumberFormat().format(value.price)}</div>
                                </td>
                               
                                <td class="col-md-2">
                                ${value.qty > 1
                                ? `<button type="button" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)">-</button>`
                                :
                                `<button type="button" class="btn btn-danger btn-sm" disabled>-</button>`
                                }
                                <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;">
                                <button type="button" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)">+</button>
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
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
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
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
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
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    })
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

    </script>
@endpush
@endsection
