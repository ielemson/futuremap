<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureVendorAcceptedTerms
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $vendor = \App\Models\Vendor::where('user_id', Auth::id())->first();

        if ($vendor && !$vendor->accepted_terms && $request->route()->getName() !== 'vendor.terms') {
            return redirect()->route('vendor.terms');
        }

        return $next($request);
    }
}
