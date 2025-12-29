<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'API is working']);
    }
    public function login(Request $request){
        $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);
        return response()->json(['message' => 'Login endpoint','payload'=>$request->all()], 200);
    }
}
