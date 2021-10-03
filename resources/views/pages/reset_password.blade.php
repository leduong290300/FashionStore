@extends('layouts.form')
@section('pages','Reset password')
@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Reset Password</div>
        <div class="card-body">
            <form method="POST" action="{{route('reset_password.post')}}">
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Enter email address">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label>Confirm password</label>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password ">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </form>
        </div>
@endsection
