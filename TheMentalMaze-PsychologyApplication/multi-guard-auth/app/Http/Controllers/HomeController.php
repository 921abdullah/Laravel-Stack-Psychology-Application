<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // a check that the users cannot open questionaire once they have submitted
        $data = DB::table('store_answers')
                ->select('store_answers.user_email', 'store_answers.category')
                ->where('store_answers.user_email', '=', [Auth::user()->email])
                ->get();

        if(count($data) == 0){
            return view('home');
        }
        else{
            return redirect('/profile');
        }
    }
}
