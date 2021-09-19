@extends('layouts.form')
@section('pages','Login Account')
@section('content')
<div class="card card-login mx-auto mt-5">
    <div class="card-header">Login</div>
    <div class="card-body">
        <form method="POST" action="{{route('login')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Email address</label>
                <input class="form-control" type="text" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
            </div>
            <div class="form-group">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="token"> Remember Password</label>
                </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
        <div class="text-center">
            <a class="d-block small mt-3" href="{{route('create')}}">Register an Account</a>
            <a class="d-block small" href="">Forgot Password?</a>
        </div>
    </div>
</div>
@endsection
