<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\GroupDataInsert;
use App\Http\Controllers\Controller;
use Image;

class GroupDataInsertController extends Controller
{
    public function index()
    {
        return view('support_group');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'category' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'email', 'max:255', 'unique:name'],
            'description' => ['required', 'string', 'min:10'],
        ]);
    }

    public function store(Request $request)
    {
        // $this->validate($request, array(
        // 'admin' => 'required',
        // 'category' => 'required',
        // 'description' => 'required',
        // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ));

        $GroupDataInsert = new GroupDataInsert;
        $GroupDataInsert->admin = Auth::user()->email;
        $GroupDataInsert->category = $request->category;
        $GroupDataInsert->name = $request->name;
        $GroupDataInsert->description = $request->description;
        $GroupDataInsert->image = $request->image;
        $GroupDataInsert->save();
        return redirect("support-group/admin-view/{$request->name}");
    }
}