<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\group_questions;
use App\Http\Controllers\Controller;

class PostQuestionController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'question' => ['required', 'string', 'min:150'],
        ]);
    }

    public function store(Request $request)
    {
        $group_questions = new group_questions;
        $group_questions->group_member = Auth::user()->email;
        $group_questions->group_name = $request->group_name;
        $group_questions->question = $request->question;
        $group_questions->save();
        return redirect("support-group/{$request->group_name}");
    }
}
