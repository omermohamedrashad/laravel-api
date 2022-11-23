<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Http\Resources\Register\RegisterResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegisterRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
//    public function loadUser(Request $request)
//    {
//
////        return new RegisterResource(User::create($request->all()));
//        try {
//            $validateUser = Validator::make($request->all(),
//                [
//                    'email' => 'required|email',
//                    'password' => 'required'
//                ]);
//
//            if($validateUser->fails()){
//                return response()->json([
//                    'status' => false,
//                    'message' => 'validation error',
//                    'errors' => $validateUser->errors()
//                ], 401);
//            }
//
//            if(!Auth::attempt($request->only(['email', 'password']))){
//                return response()->json(
////                    $request->all()
//                    [
//                        'status' => false,
//                        'message' => 'Email & Password does not match with our record.',
//                    ], 401
//                );
//            }
//
//            $user = User::where('email', $request->email)->first();
//            $user->createToken("API TOKEN")->plainTextToken;
//        } catch (\Throwable $th) {
//            return response()->json([
//                'status' => false,
//                'message' => $th->getMessage()
//            ], 500);
//        }
//    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return RegisterResource|UserResource|\Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        try {
            $validateUser = Validator::make(request()->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt(request()->only(['email', 'password']))){
                return response()->json(
//                    $request->all()
                    [
                        'status' => false,
                        'message' => 'Email & Password does not match with our record.',
                    ], 401
                );
            }

            $user = User::where('email', request()->email)->first();
            return new UserResource($user);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

}
