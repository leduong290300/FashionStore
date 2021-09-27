<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Models\AdminAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //Create form register
    public function create()
    {
        return view('pages.register');
    }

    //Register form
    public function register(Request $request)
    {
        //Validate data form
        $data = $request->validate([
            'first_name' => ['required','max:50'],
            'last_name' => ['required','max:50'],
            'email' => ['required','email','max:100'],
            'password' => ['required','confirmed','between:8,32'],
            'password_confirmation' => ['required']
        ]);

        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');

        $validate = Validator::make($data,[$firstname,$lastname,$email,$password]);
        if($validate->fails()) {
            return redirect()::back()->withInput()->withErrors($validate->errors());
        } else {
            $accounts = new AdminAccounts();
            $accounts->first_name = $firstname;
            $accounts->last_name = $lastname;
            $accounts->email = $email;
            $accounts->password = bcrypt($password);
            $accounts->save();
            return redirect()->route('index');
        }
    }
}
