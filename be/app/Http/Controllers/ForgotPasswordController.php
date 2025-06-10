<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;

class ForgotPasswordController extends Controller
{
    // public function index()
    // {
    // return response()->json([
    //     'message' => 'This is the forgot-password index. You should use POST /forgot-password to send reset email.',
    // ]);
    // }

    // Gửi email reset mật khẩu
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => 'Link đặt lại mật khẩu đã được gửi'])
            : response()->json(['message' => 'Không thể gửi link đặt lại mật khẩu'], 500);
    }

    // Đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => 'Đổi mật khẩu thành công'])
            : response()->json(['message' => 'Token không hợp lệ hoặc email sai'], 400);
    }
}
