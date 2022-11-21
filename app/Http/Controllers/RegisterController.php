<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\UpdateRegisterRequest;
use App\Http\Resources\Register\RegisterResource;
use App\Models\Register;

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
        echo csrf_token();
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterRequest  $request
     * @return RegisterResource
     */
    public function store(StoreRegisterRequest $request)
    {
        return new RegisterResource(Register::create($request->all()));

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
     * @param  \App\Http\Requests\UpdateRegisterRequest  $request
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegisterRequest $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
}
