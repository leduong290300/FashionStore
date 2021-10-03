<?php

namespace App\Http\Controllers\ForgotPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPassword\ForgotPasswordRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ForgotPassword;
use App\Models\Admins;
use App\Models\ResetPasswords;

class ForgotPasswordController extends Controller
{
    public function showFormForgotPassword()
    {
        return view('pages.forgot_password');
    }

    public function submitFormForgotPassword(ForgotPasswordRequest $request)
    {
        $request->validated();
        $admins = Admins::first();
        /*Create random token*/
        $token = Str::random(64);
        /*Use table*/
        /*DB::table('reset_passwords')->insert([
            'email' => $request->email,
            'token' => $token
        ]);*/

        /*Use ORM*/
        $resetPasswords = new ResetPasswords();
        $resetPasswords->email = $request->email;
        $resetPasswords->token = $token;
        try {
            $resetPasswords->save();
            $data = [
                'url' => route('reset_password.get',['token' => $token])
            ];
            Notification::send($admins,new ForgotPassword($data));
            return back()->with('message', 'We have e-mailed your password reset link!');
        } catch (\Exception $e) {
            \Log::error($e);
        }
    }
}
