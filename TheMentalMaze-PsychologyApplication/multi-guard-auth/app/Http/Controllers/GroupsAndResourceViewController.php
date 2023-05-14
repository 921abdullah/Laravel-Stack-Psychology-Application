<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GroupsAndResourceViewController extends Controller {
        public function index() {
                $resources = DB::table('resource_inserts')
                        ->join('store_answers', 'resource_inserts.category', '=', 'store_answers.category')
                        ->select('resource_inserts.resource', 'resource_inserts.category')
                        ->where('store_answers.user_email', '=', [Auth::user()->email])
                        ->get();
        
                $groups_info = DB::table('group_data_inserts')
                        ->join('store_answers', 'group_data_inserts.category', '=', 'store_answers.category')
                        ->select('group_data_inserts.name', 'group_data_inserts.description', 'group_data_inserts.image')
                        ->where('store_answers.user_email', '=', [Auth::user()->email])
                        ->get();
        
                // a check that the users cannot go further until they have filled the questionaire
                $data = DB::table('store_answers')
                        ->select('store_answers.user_email', 'store_answers.category')
                        ->where('store_answers.user_email', '=', [Auth::user()->email])
                        ->get();
        
                if(count($data) == 0){
                        return redirect('/home');
                }
                else{
                        return view('user_profile',['resources'=>$resources, 'groups_info'=>$groups_info]);
                }
        }
}