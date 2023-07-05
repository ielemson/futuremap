<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
            \Cart::add([
                'id' => $id,
                'name' => $request->name,
                'qty' => $request->qty,
                'price' => $product->price,
                'options' => [
                    'image' => $product->image,
                    'file' => $request->file,
                    ]
            ]);

            return response()->json(['success' => 'Successfully added on your cart'],200);
      
        }
    }
