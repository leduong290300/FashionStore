<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAccountRequest;
use App\Models\Admins;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //Create form register
    public function create()
    {
        return view('pages.register');
    }

    //Register form
    public function register(RegisterAccountRequest $request)
    {
        //Validate data form
        $data = $request->validated();

        $firstname = $request->input('first_name');
        $lastname = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');

        $validate = Validator::make($data,[$firstname,$lastname,$email,$password]);
        if($validate->fails()) {
            return redirect()::back()->withInput()->withErrors($validate->errors());
        } else {
            $accounts = new Admins();
            $accounts->first_name = $firstname;
            $accounts->last_name = $lastname;
            $accounts->email = $email;
            $accounts->password = bcrypt($password);
            $accounts->save();
            return redirect()->route('index');
        }
    }
}
