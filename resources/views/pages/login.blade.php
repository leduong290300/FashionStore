@extends('layouts.form')
@section('pages','Login System')
@section('content')
<div class="card card-login mx-auto mt-5">
    <div class="card-header">Login</div>
    <div class="card-body">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <form method="POST" action="{{route('login')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Email address</label>
                <input class="form-control" type="text" placeholder="Enter email" name="email">
                <small class="text-error ">
                    @foreach ($errors->get('email') as $message)
                        {{$message}}
                    @endforeach
                </small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="password" placeholder="Password" name="password">
                <small class="text-error ">
                    @foreach ($errors->get('password') as $message)
                        {{$message}}
                    @endforeach
                </small>
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
            <a class="d-block small" href="{{route('forgot_password.get')}}">Forgot Password?</a>
        </div>
    </div>
</div>
@endsection
