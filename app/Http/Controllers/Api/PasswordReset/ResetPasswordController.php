<?php

namespace App\Http\Controllers\Api\PasswordReset;

use App\Http\Controllers\Controller;
use App\Models\ResetUserPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $request->validate([
            'code' => 'required|string|exists:reset_user_passwords',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $passwordReset = ResetUserPassword::firstWhere('code', $request->code);

        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        $user = User::firstWhere('email', $passwordReset->email);
        $password = $request->only('password');
        $password['password'] = Hash::make($password['password']);
        $user->update($password);

        $passwordReset->where('code',$request->code)->delete();

        return response(['message' =>'password has been successfully reset'], 200);
    }
}
