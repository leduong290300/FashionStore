<?php

namespace App\Http\Controllers\ResetPassword;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPassword\ResetPasswordRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Admins;
use App\Models\ResetPasswords;
use Illuminate\Support\Facades\Hash;

class ResertPasswordController extends Controller
{
    public function showFormResetPassword ($token)
    {
        return view('pages.reset_password',['token' => $token]);
    }

    public function submitFormResetPassword (ResetPasswordRequest $request)
    {
        $request->validated();
        /*$update = DB::table('reset_passwords')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();*/
        $updatePassword = ResetPasswords::where([
            'email' => $request->email,
            'token' => $request->token
        ])->first();
        if(!$updatePassword) {
            return back()->with('error','Invalid token');
        }
        Admins::where('email',$request->email)
                ->update(['password' => Hash::make($request->password)]);
        ResetPasswords::where(['email' => $request->email])->delete();
        return redirect()->route('index')->with('message', 'Your password has been changed!');
    }
}
