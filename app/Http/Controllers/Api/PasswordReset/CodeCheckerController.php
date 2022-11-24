<?php

namespace App\Http\Controllers\Api\PasswordReset;

use App\Http\Controllers\Controller;
use App\Models\ResetUserPassword;
use Illuminate\Http\Request;

class CodeCheckerController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $request->validate([
            'code' => 'required|string|exists:reset_user_passwords',
        ]);

        $passwordReset = ResetUserPassword::firstWhere('code', $request->code);


        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }
        return response([
            'code' => $passwordReset->code,
            'message' => trans('passwords.reset_code')
        ], 200);
    }
}
