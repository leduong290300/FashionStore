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
            Add slider
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('slider.store')}}" id="form-slider" enctype="multipart/form-data">
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
                    <input type="file" class="form-control-file" name="slider">
                </div>
                <button
                    class="btn btn-primary mt-4"
                    type="submit"
                >
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection

