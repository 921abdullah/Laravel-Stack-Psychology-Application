<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckGroup
{
    public function handle($request, Closure $next, $name)
    {
        if (DB::table('helpers')->where('email', Auth::user()->email)->exists()) {

            if (GroupDataInsert::where('admin', Auth::user()->email)->exists()) {
                return $next($request);
            }
        } 
        else {
            $data = DB::table('group_data_inserts')->where('name', $name)->first();
            if (!$data) {
                abort(404);
            }
            view()->share('groups_data', $data);
            return $next($request);
        }
    }
}