<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use \App\Models\ReferralLink;

class StoreReferralCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($request->has('ref')){
            $referral = ReferralLink::where('code',$request->get('ref'))->first();                        
            $response->cookie('ref', $referral->id, $referral->lifetime_minutes);
        }
    
        return $response;        
    }
}
