<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckGroupExistanceController extends Controller {
   public function index() {
        $group_data = DB::table('group_data_inserts')
                ->select('group_data_inserts.name', 'group_data_inserts.category')
                ->where('group_data_inserts.admin', '=', [Auth::user()->email])
                ->get();
                
        return view('helper',['group_data'=>$group_data]);
   }
}