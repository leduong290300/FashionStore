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
    <h4>Add slider</h4>
    <form method="POST" action="" id="form-slider" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <input type="text"
                   class="form-control"
                   placeholder="Title"
                   id="title"
                   name="title"
            >
        </div>
        <div class="form-group">
            <input type="text"
                   class="form-control"
                   placeholder="Description"
                   id="description"
                   name="description"
            >
        </div>
        <div class="form-group">
            <textarea id="slider" class="form-control" name="slider"></textarea>
        </div>
        <button
            class="btn btn-primary mt-4"
            type="submit"
        >
            <i class="fa fa-save"></i>
            Save
        </button>

    </form>



<!-- {{--    <form method="POST" action="{{route('slider.store')}}" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        <div class="form-group">--}}
{{--            <label>Title</label>--}}
{{--            <input type="text" class="form-control" placeholder="Enter title" name="title">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>Description</label>--}}
{{--            <input type="text" class="form-control" placeholder="Enter description" name="description">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label>Photo Slider</label>--}}
{{--            <input type="file" class="form-control-file" name="slider">--}}
{{--        </div>--}}
{{--        <button type="submit" class="btn btn-primary">--}}
{{--            <i class="fa fa-save"></i>--}}
{{--            Save</button>--}}
{{--    </form>--}} -->
@endsection
