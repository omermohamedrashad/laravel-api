<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use App\Http\Resources\Register\RegisterResource;
use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreRegisterRequest $request
     * @return RegisterResource
     */
    public function store(StoreRegisterRequest $request)
    {
        return new RegisterResource(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Register  $register
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Register $register)
//    {
//        //
//    }


//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Register  $register
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Register $register)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRegisterRequest $request
     * @param \App\Models\Register $register
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisterRequest $request, Register $register)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Register $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
