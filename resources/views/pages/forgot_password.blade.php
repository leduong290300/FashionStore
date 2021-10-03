@extends('layouts.form')
@section('pages','Forgot password')
@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Forgot Password</div>
        <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="text-center mt-4 mb-5">
                <h4>Forgot your password?</h4>
                <p>Enter your email address and we will send you instructions on how to reset your password.</p>
            </div>
            <form method="POST" action="{{route('forgot_password.post')}}">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" name="email" placeholder="Enter email address" autofocus value="{{old('email')}}">
                    @if ($errors->has('email'))
                        <span class="text-error">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">Send Password Link</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{route('create')}}">Register an Account</a>
                <a class="d-block small" href="{{route('index')}}">Login</a>
            </div>
        </div>
@endsection
