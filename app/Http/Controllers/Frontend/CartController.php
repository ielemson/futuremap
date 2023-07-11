<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
// use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    
    public function addToCart(Request $request, $id)
    {

        // Cart::destroy();

        $product = Product::where('id',$id)->first();
        
            Cart::add([
                'id' => $id,
                'name' => $product->name,
                'qty' => $request->qty,
                'price' => $product->price,
                'weight'=>0,
                'options' => [
                    'image' => $product->image,
                    'file' => $product->file,
                   
                    ]
            ]);

            return response()->json(['success' => 'Successfully added to your cart'],200);
      
        }

        public function getMiniCart()
    {
        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = doubleval(Cart::total());
        $totalCost = 0;
        foreach(Cart::content() as $cost){
            if (is_numeric($cost->subtotal)) {
                 $totalCost += $cost->subtotal;
            }
       }

        return response()->json([
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'cart_total' => $totalCost,
        ], 200);
    }
    }
