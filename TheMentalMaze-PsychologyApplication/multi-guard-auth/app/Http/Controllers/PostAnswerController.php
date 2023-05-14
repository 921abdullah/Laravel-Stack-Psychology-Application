<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\group_answers;
use App\Http\Controllers\Controller;

class PostAnswerController extends Controller
{
    public function store(Request $request)
    {
        $group_answers = new group_answers;
        $group_answers->question_id = $request->question_id;
        $group_answers->answer = $request->answer;
        $group_answers->save();
        return redirect("support-group/{$request->group_name}");
    }
}
