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
            Add product
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Price" name="price">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Size" name="size">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Color" name="color">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Quanlity" name="quanlity">
                </div>
                <div class="form-group">
                    <label>Description long</label>
                    <textarea id="descriptionProduct1" rows="10" class="form-control" name="description1"></textarea>
                </div>
                <div class="form-group">
                    <label>Description short</label>
                    <textarea id="descriptionProduct2" rows="10" class="form-control" name="description2"></textarea>
                </div>
                <div class="col-auto mb-4">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
                        <option selected>Choose...</option>
                        @foreach($categories as $category)
                            <option  value="{!!$category->name!!}">{{ucfirst(trans($category->name))}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Code" name="code">
                </div>
                <div class="form-group">
                    <label>Photo Product</label>
                    <input type="file" class="form-control-file" name="product">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Save</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{url('/assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('descriptionProduct1',{
    height:400,
    filebrowserUploadUrl:'{{route('upload_photo',['_token' => csrf_token() ])}}',
    filebrowserUploadMethod : 'form'
  })
    CKEDITOR.replace('descriptionProduct2',{
        height:300
    })
</script>
@endsection
