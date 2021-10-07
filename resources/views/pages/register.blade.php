@extends('layouts.form')
@section('pages','Register Account')
@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Register an account</div>
        @if (session('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <form action="{{route('register')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label >First name</label>
                            <input
                                class="form-control"
                                type="text"
                                placeholder="Enter first name"
                                name="first_name"
                                value="{{old('first_name')}}">
                            <small class="text-error ">
                                @foreach ($errors->get('first_name') as $message)
                                    {{$message}}
                                @endforeach
                            </small>
                        </div>
                        <div class="col-md-6">
                            <label>Last name</label>
                            <input class="form-control" type="text" placeholder="Enter last name" name="last_name" value="{{old('last_name')}}">
                            <small class="text-error ">
                                @foreach ($errors->get('last_name') as $message)
                                    {{$message}}
                                @endforeach
                            </small>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email address</label>
                    <input class="form-control" type="text" placeholder="Enter email" name="email" value="{{old('email')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('email') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="Password" name="password" value="{{old('password')}}">
                            <small class="text-error ">
                                @foreach ($errors->get('password') as $message)
                                    {{$message}}
                                @endforeach
                            </small>
                        </div>
                        <div class="col-md-6">
                            <label >Confirm password</label>
                            <input class="form-control" type="password" placeholder="Confirm password" name="password_confirmation" value="{{old('password_confirmation')}}">
                            <small class="text-error ">
                                @foreach ($errors->get('password_confirmation') as $message)
                                    {{$message}}
                                @endforeach
                            </small>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Register</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{route('index')}}">Login</a>
                <a class="d-block small" href="{{route('forgot_password.get')}}">Forgot Password?</a>
            </div>
        </div>
@endsection
