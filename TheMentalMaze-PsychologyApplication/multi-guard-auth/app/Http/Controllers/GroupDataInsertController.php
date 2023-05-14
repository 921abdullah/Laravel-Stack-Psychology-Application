<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\GroupDataInsert;
use App\Http\Controllers\Controller;

class GroupDataInsertController extends Controller
{
    public function index()
    {
        return view('support_group');
    }
    public function store(Request $request)
    {
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