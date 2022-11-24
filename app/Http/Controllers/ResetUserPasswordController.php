<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResetUserPasswordRequest;
use App\Http\Requests\UpdateResetUserPasswordRequest;
use App\Models\ResetUserPassword;

class ResetUserPasswordController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResetUserPasswordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResetUserPasswordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResetUserPassword  $resetUserPassword
     * @return \Illuminate\Http\Response
     */
    public function show(ResetUserPassword $resetUserPassword)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResetUserPassword  $resetUserPassword
     * @return \Illuminate\Http\Response
     */
    public function edit(ResetUserPassword $resetUserPassword)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResetUserPasswordRequest  $request
     * @param  \App\Models\ResetUserPassword  $resetUserPassword
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResetUserPasswordRequest $request, ResetUserPassword $resetUserPassword)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResetUserPassword  $resetUserPassword
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResetUserPassword $resetUserPassword)
    {
        //
    }
}
