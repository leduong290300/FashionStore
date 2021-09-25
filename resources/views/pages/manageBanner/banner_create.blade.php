@extends('layouts.board')
@section('breadcrumbs')
    <x-breadcrumbs-board/>
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger hidden" role="alert">
            <div class="d-flex align-items-center justify-content-between">
                {{session('error')}}
                <i class="fa fa-close btn-hidden"></i>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            Add Banner
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('banner.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="banner">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Save</button>
            </form>
        </div>
    </div>

@endsection
