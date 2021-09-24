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
    <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="text" class="form-control" placeholder="Enter price" name="price">
        </div>
        <div class="form-group">
            <label>Size</label>
            <input type="text" class="form-control" placeholder="Enter size" name="size">
        </div>
        <div class="form-group">
            <label>Color</label>
            <input type="text" class="form-control" placeholder="Enter color" name="color">
        </div>
        <div class="form-group">
            <label>Quanlity</label>
            <input type="text" class="form-control" placeholder="Enter quanlity" name="quanlity">
        </div>
        <div class="form-group">
            <label>Description 1</label>
            <textarea id="descriptionProduct1" rows="10" class="form-control" placeholder="Enter description1" name="description1"></textarea>
        </div>
        <div class="form-group">
            <label>Description 2</label>
            <textarea id="descriptionProduct2" rows="10" class="form-control" placeholder="Enter description2" name="description2"></textarea>
        </div>
        <div class="col-auto mb-4">
            <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">

                <option selected>Choose...</option>
                @foreach($categories as $category)
                    <option  value="{!!$category->name!!}">{!!$category->name!!}</option>
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label>Code</label>
            <input type="text" class="form-control" placeholder="Enter code" name="code">
        </div>
        <div class="form-group">
            <label>Photo Product</label>
            <input type="file" class="form-control-file" name="product">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-save"></i>
            Save</button>
    </form>
{{--    <div class="row">--}}
{{--        <div class="col-lg-9">--}}
{{--            <div class="form-group">--}}
{{--                <input type="text" class="form-control" placeholder="Enter name product" name="name">--}}
{{--            </div>--}}
{{--            <div id="content-long"></div>--}}
{{--            <label style="margin-top:10px">Content short</label>--}}
{{--            <div id="content-short"></div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-3">--}}

{{--            <div class="form-group">--}}
{{--                <label>Price</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter price" name="price">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Size</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter size" name="size">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Color</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter color" name="color">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Quanlity</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter quanlity" name="quanlity">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label>Code</label>--}}
{{--                <input type="text" class="form-control" placeholder="Enter code" name="code">--}}
{{--            </div>--}}
{{--            <div class="col-auto mb-4">--}}
{{--                <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>--}}
{{--                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">--}}
{{--                    <option selected>Choose...</option>--}}
{{--                    @foreach($categories as $category)--}}
{{--                        <option  value="{!!$category->name!!}">{!!$category->name!!}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
