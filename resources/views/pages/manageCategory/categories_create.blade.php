@extends('layouts.board')
@section('breadcrumbs')
    <x-breadcrumbs-board/>
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Add category
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{old('name')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('name') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{old('title')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('title') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="banner" value="{{ old('banner') }}">
                    <small class="text-error ">
                        @foreach ($errors->get('banner') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Save</button>
            </form>
        </div>
    </div>

@endsection
