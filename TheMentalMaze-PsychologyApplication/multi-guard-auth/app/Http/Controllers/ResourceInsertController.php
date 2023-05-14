<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Models\ResourceInsert;
use App\Http\Controllers\Controller;

class ResourceInsertController extends Controller
{
    public function index()
    {
        return view('helper');
    }
    public function store(Request $request)
    {
        $ResourceInsert = new ResourceInsert;
        $ResourceInsert->category = $request->category;
        $ResourceInsert->resource = $request->resource;
        $ResourceInsert->save();
        return redirect('updated')->with('status', 'Data Has Been inserted');
    }
}