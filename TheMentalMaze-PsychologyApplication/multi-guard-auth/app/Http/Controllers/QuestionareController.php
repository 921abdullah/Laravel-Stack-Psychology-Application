<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\StoreAnswers;
use App\Http\Controllers\Controller;
use DB;

class QuestionareController extends Controller
{
    public function index()
    {
       return redirect('/profile');
    }
    public function store(Request $request)
    {
        $check = DB::table('store_answers')
                ->where('user_email', [Auth::user()->email])
                ->where('category', $request->category)
                ->get(); 

        if(count($check) == 0){
            $StoreAnswers = new StoreAnswers;
            $StoreAnswers->user_email = Auth::user()->email;
            $StoreAnswers->category = $request->category;
            $StoreAnswers->level = $request->level;
            $StoreAnswers->save();
            return redirect('stored')->with('status', 'Data Has Been inserted');
        }
        else{
            return redirect('/profile')->with('status', 'Data Has Been updated');
        } 
    }
    public function remove(Request $request)
    {   
        DB::table('store_answers')
        ->where('user_email', [Auth::user()->email])
        ->where('category', $request->category)
        ->delete();

        return redirect('stored')->with('status', 'Data Has Been updated');
    }
}
