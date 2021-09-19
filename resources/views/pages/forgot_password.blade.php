@extends('layouts.form')
@section('pages','Forgot password')
@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <div class="text-center mt-4 mb-5">
                <h4>Forgot your password?</h4>
                <p>Enter your email address and we will send you instructions on how to reset your password.</p>
            </div>
            <form>
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Enter email address">
                </div>
                <button class="btn btn-primary btn-block">Reset Password</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="">Register an Account</a>
                <a class="d-block small" href="">Login Page</a>
            </div>
        </div>
@endsection
