<?php

namespace App\Http\Controllers\Api\PasswordReset;

use App\Http\Controllers\Controller;
use App\Mail\SendResetPasswordCode;
use App\Models\ResetUserPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        ResetUserPassword::where('email', $request->email)->delete();

        $data['code'] = mt_rand(100000, 999999);

        $codeData = ResetUserPassword::create($data);

        Mail::to($request->email)->send(new SendResetPasswordCode($codeData->code));

        return response(['message' => trans('passwords.sent')], 200);
    }
}
