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
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>
            Slider List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slider)
                        <tr>
                            <td>{{$loop->iteration + ($sliders->currentPage()-1) * ($sliders->perPage())}}</td>
                            <td>
                                {{$slider->name}}
                            </td>
                            <td>
                                <div class="m-r-10">
                                    <img src="{{asset('storage/images/slider/'.$slider->name)}}" alt="{{$slider->name}}" class="rounded" width="45">
                                </div>
                            </td>
                            <td>
                                {{$slider->title}}
                            </td>
                            <td>
                                {{$slider->description}}
                            </td>
                            <td>
                                {{$slider->size}}KB
                            </td>
                            <td>
                                {{$slider->type}}
                            </td>
                            <td>
                                <a href="{{route('slider.edit',['slider' => $slider->id])}}">
                                    <button class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                        Update
                                    </button>
                                </a>
                                <button
                                    class="btn btn-danger confirm"
                                    data-toggle="modal"
                                    data-target="#modalDelete"
                                    data-url="{{route('slider.destroy',['slider' => $slider->id])}}"
                                >
                                    <i class="fa fa-remove"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{route('slider.create')}}">
                    <button class="btn btn-secondary">
                        <i class="fa fa-plus"></i>
                        Add
                    </button>
                </a>
            </div>
        </div>
        <div class="card-footer small text-muted"></div>
    </div>
@endsection
