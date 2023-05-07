<?php

namespace App\Http\Middleware;

use Closure;
use DateTime;
use DB;
use Illuminate\Http\Request;
use App\Models\visit as v;
use Illuminate\Support\Carbon;

class Visit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $visit = v::where("ip",$request->ip());
        $d = new Carbon;

        if(!$visit->count()){
            v::create(["ip"=>$request->ip()]);
        }
        else{
            if($d->diffInDays($visit->orderBy('id', 'desc')->first()->visit_date) >= 1)
                v::create(["ip"=>$request->ip()]);
        }
        return $next($request);
    }
}
