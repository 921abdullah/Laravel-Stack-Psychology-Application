<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\group_answers;
use App\Http\Controllers\Controller;
use DB;

class PostAnswerController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'answer' => ['required', 'string', 'min:150'],
        ]);
    }

    public function store(Request $request)
    {
        $group_answers = new group_answers;
        $group_answers->question_id = $request->question_id;
        $group_answers->answer = $request->answer;
        $group_answers->save();

        $check_admin = DB::table('helpers')
                ->select('helpers.email')
                ->where('helpers.email', '=', [Auth::user()->email])
                ->get();

        if(count($check_admin) > 0){
            return redirect("support-group/admin-view/{$request->group_name}");
        }
        else{
            return redirect("support-group/{$request->group_name}");
        }
    }
}
