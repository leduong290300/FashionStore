@extends('layouts.board')
@section('breadcrumbs')
    <x-breadcrumbs-board/>
@endsection
@section('content')
    <h4>Edit Slider</h4>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center justify-content-between">
                {{session('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div class="row g-2">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control"  value="{{$slider->title}}" disabled>
            </div>

            <div class="form-group">
                <label>Description </label>
                <textarea rows="10" type="text" class="form-control" disabled>{{$slider->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Photo Slider</label>
                <img src="{{asset('/storage/images/slider/'.$slider->name)}}" class="img-thumbnail" alt="{{$slider->name}}">
            </div>
        </div>
        <div class="col-lg-6">
            <form method="POST" action="{{route('slider.update',['slider' => $slider])}}" enctype="multipart/form-data">
                @csrf
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Enter title" name="title">
                    <small class="text-error ">
                        @foreach ($errors->get('title') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label>Description </label>
                    <textarea rows="10" type="text" class="form-control" placeholder="Enter description" name="description"></textarea>
                    <small class="text-error ">
                        @foreach ($errors->get('description') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>

                <div class="form-group">
                    <label>Photo Slider</label>
                    <input type="file" class="form-control-file" name="slider">
                    <small class="text-error ">
                        @foreach ($errors->get('slider') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-upload"></i>
                    Update</button>
            </form>
        </div>
    </div>
@endsection
