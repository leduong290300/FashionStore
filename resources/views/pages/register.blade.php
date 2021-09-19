@extends('layouts.form')
@section('pages','Register Account')
@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an account</div>
        <div class="card-body">
            <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label >First name</label>
                            <input class="form-control" type="text" placeholder="Enter first name" name="first_name">
                        </div>
                        <div class="col-md-6">
                            <label>Last name</label>
                            <input class="form-control" type="text" placeholder="Enter last name" name="last_name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input class="form-control" type="text" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="Password" name="password">
                        </div>
                        <div class="col-md-6">
                            <label >Confirm password</label>
                            <input class="form-control" type="password" placeholder="Confirm password" name="password_confirmation">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Register</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{route('index')}}">Login Page</a>
                <a class="d-block small" href="">Forgot Password?</a>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
@endsection
