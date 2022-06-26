<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {     //dd("ok");

        if(isset($request->token)){
          $requette = explode("|", $request->token);
          $id = DB::table('personal_access_tokens')->where('id', $requette[0])->value('tokenable_id');
        if(!empty($id)){
          return $next($request);
      }else{
          return response("echecs d'authentification ".$request->token);
      }

        }else{

            return response("echecs d'authentification ");
        }

        
    }
}
