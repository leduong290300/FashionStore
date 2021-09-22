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
    <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Photo Banner</label>
            <input type="file" class="form-control-file" name="banner">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            Save</button>
    </form>
@endsection
