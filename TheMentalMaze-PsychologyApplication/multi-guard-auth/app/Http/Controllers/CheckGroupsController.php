<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CheckGroupsController extends Controller
{
    public function show($name) {
        // Retrieve the admin, category and name of the selected group
        $data = DB::table('group_data_inserts')
                ->join('helpers', 'group_data_inserts.admin', '=', 'helpers.email')
                ->select('helpers.name', 'group_data_inserts.admin', 'group_data_inserts.category', 'group_data_inserts.name AS group_name', 'group_data_inserts.description', 'group_data_inserts.image')
                ->where('group_data_inserts.name', '=', $name)
                ->get();

        // Retrieve the users in the current groups
        $all_users = DB::table('users')
                    ->join('store_answers', 'store_answers.user_email', '=', 'users.email')
                    ->join('group_data_inserts', 'group_data_inserts.category', '=', 'store_answers.category')
                    ->select('users.name')
                    ->whereNotIn('users.name', [Auth::user()->name])
                    ->where('group_data_inserts.name', '=', $name)
                    ->get();

        
        // Retrieve all the users and their respective questions in the current groups
        $ques = DB::table('users')
                ->join('group_questions', 'users.email', '=', 'group_questions.group_member')
                ->select('group_questions.question','users.name', 'group_questions.id')
                ->where('group_questions.group_name', '=', $name)
                ->get();

        // Retrieve all the answers for the respective questions
        $ans = DB::table('group_questions')
                ->join('group_answers', 'group_questions.id', '=', 'group_answers.question_id')
                ->join('users', 'users.email', '=', 'group_questions.group_member')
                ->select('group_answers.question_id', 'group_answers.answer')
                ->where('group_questions.group_name', '=', $name)
                ->get();

        $check_admin = DB::table('group_data_inserts')
                        ->select('group_data_inserts.admin')
                        ->where('group_data_inserts.admin', '=', [Auth::user()->email])
                        ->where('group_data_inserts.name', '=', $name)
                        ->get();

        if (count($check_admin) > 0){
            return view('support_group', ['data' => $data, 'all_users' => $all_users, 'ques' => $ques, 'ans' => $ans]);
        }
        else{
            // Check if the user exists in the group he/she is trying to open
            $check_user = DB::table('store_answers')
                        ->join('group_data_inserts', 'group_data_inserts.category', '=', 'store_answers.category')
                        ->select('store_answers.user_email')
                        ->where('store_answers.user_email', '=', [Auth::user()->email])
                        ->where('group_data_inserts.name', '=', $name)
                        ->get();
    
            // Check if the data exists
            if (count($data) > 0 && count($check_user) > 0) {
                return view('support_group', ['data' => $data, 'all_users' => $all_users, 'ques' => $ques, 'ans' => $ans]);
            }
            else{
                abort(404);
            }
        }
    }
}
