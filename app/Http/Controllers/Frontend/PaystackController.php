<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmed;
use App\Models\Competition;
use App\Models\Orders;
use App\Models\User;
use App\Models\Vendor;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class PaystackController extends Controller
{

    public function store(Request $request)
    {
        
        $user = Auth::user();
        $cart = Cart::content();
          
        $refCode = session('ref_vendor_code'); // Get referral code from session
        $vendor = Vendor::where('referral_code', $refCode)->where('status',1)->first();
        
        foreach ($cart as $key => $item) {
         
             Orders::create([
            'product_id' => $item->id,
            'qty' => $item->qty,
            'price'=>$item->price,
            'user_id'            => $user->id,
            'transaction_id'     => Str::random(10),
            'payment_status'     => 'Paid',
            'payment_ref'              => $request->ref,
            'status'             => 'Successful',
            'vendor_id'   => $vendor ? $vendor->id : null, // Optional
        // $order                   = Orders::create($order_data)
            ]);
        }

            // Session::put('order_id', $order->id);
            Session::forget('ref_vendor_code');
            Session::forget('cart');
            Cart::destroy();
            Session::put('purchase',true);

             //Credit vendor wallet if vendor exists
        if ($vendor) {
            $this->creditVendorWallet($vendor->user, $item->price);
        }

            if (Competition::where('email',$user->email)->exists()) {
                $competitor = Competition::where('email',$user->email)->first();
                $competitor->checkout_complete = 1;
                $competitor->save();
            }
        
            Mail::to($user->email)->send(new OrderConfirmed());
           return response(['status'=>200,'msg'=>'Order Confirmed Successfully','url'=>'dashboard']);
           

    }


//     public function creditVendorCommission(User $vendor, float $amount, ?string $description = null)
// {
//     $wallet = $vendor->wallet()->firstOrCreate([]);

//     $wallet->balance += $amount;
//     $wallet->total_earned += $amount;
//     $wallet->save();

//     $wallet->transactions()->create([
//         'type' => 'credit',
//         'amount' => $amount,
//         'description' => $description,
//     ]);
// }


protected function creditVendorWallet($vendorUser, $productPrice)
{
    $commissionRate = 0.10; // 10% commission
    $commission = $productPrice * $commissionRate;

    // Ensure wallet exists
    $wallet = $vendorUser->wallet()->firstOrCreate([]);

    // Credit the wallet
    $wallet->balance += $commission;
    $wallet->total_earned += $commission;
    $wallet->save();

    // Log the transaction
    $wallet->transactions()->create([
        'type' => 'credit',
        'amount' => $commission,
        'description' => 'Commission earned from referred sale',
    ]);
}

}
// php artisan make:migration create_wallet_transactions_table
// php artisan migrate --path=database/migrations/2025_05_09_183416_create_key_focus_areas_table.php