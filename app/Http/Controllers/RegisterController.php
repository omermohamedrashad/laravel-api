<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
            ]);

        User::create($attributes);
        return response()->json(['message' => 'All Done']);
    }
}
