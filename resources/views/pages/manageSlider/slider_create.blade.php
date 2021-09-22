@extends('layouts.board')
@section('breadcrumbs')
    <x-breadcrumbs-board/>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success hidden" role="alert">
            <div class="d-flex align-items-center justify-content-between">
                {{session('success')}}
                <i class="fa fa-close btn-hidden"></i>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger hidden" role="alert">
            <div class="d-flex align-items-center justify-content-between">
                {{session('error')}}
                <i class="fa fa-close btn-hidden"></i>
            </div>
        </div>
    @endif
    <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" placeholder="Enter description" name="description">
        </div>
        <div class="form-group">
            <label>Photo Slider</label>
            <input type="file" class="form-control-file" name="slider">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            Save</button>
    </form>
@endsection
