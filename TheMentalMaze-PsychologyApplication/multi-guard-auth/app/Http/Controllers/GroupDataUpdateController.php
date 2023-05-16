<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Image;
use DB;

class GroupDataUpdateController extends Controller
{
    public function update(Request $request)
    {
        // $this->validate($request, array(
        // 'admin' => 'required',
        // 'category' => 'required',
        // 'description' => 'required',
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ));

        // UPDATE CODE HERE

        DB::table('group_data_inserts')
        ->where('admin', [Auth::user()->email])
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return redirect("support-group/admin-view/{$request->name}");
    }
    
    public function delete(Request $request)
    {
        // DELETE CODE HERE

        DB::table('group_data_inserts')
        ->where('admin', [Auth::user()->email])
        ->delete();

        return redirect("/helper/dashboard");
    }
}