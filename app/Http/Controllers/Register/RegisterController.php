<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Models\Admins;

class RegisterController extends Controller
{
    //Create form register
    public function create()
    {
        return view('pages.register');
    }

    //Register form
    public function register(RegisterRequest $request)
    {
        //Validate data form
        $data = $request->validated();
        $accounts = new Admins();
        $values = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ];
        try {
            $accounts->create($values);
            $success = 'Create account successfully';
            return redirect()
                ->route('index')
                ->with('success',$success);
        } catch (\Exception $e) {
            \Log::error($e);
            $error = 'Create account failed';
        }
        return back()->with('error',$error);
    }
}
