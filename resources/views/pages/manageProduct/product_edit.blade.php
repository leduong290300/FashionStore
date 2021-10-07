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
            <i class="fa fa-pencil"></i>
            Edit product : {{$product->name}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('products.update',['product' => $product])}}" enctype="multipart/form-data">
                @csrf
                {{method_field('PATCH')}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                    <small class="text-error ">
                        @foreach ($errors->get('name') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="text" class="form-control" name="price" value="{{$product->price}}">
                    <small class="text-error ">
                        @foreach ($errors->get('price') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label for="">Size</label>
                    <input type="text" class="form-control"  name="size" value="{{$product->size}}">
                    <small class="text-error ">
                        @foreach ($errors->get('size') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label for="">Color</label>
                    <input type="text" class="form-control" name="color" value="{{$product->color}}">
                    <small class="text-error ">
                        @foreach ($errors->get('color') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label for="">Inventory</label>
                    <input type="text" class="form-control" name="inventory" value="{{$product->inventory}}">
                    <small class="text-error ">
                        @foreach ($errors->get('inventory') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label>Description long</label>
                    <textarea id="descriptionProduct1" rows="10" class="form-control" name="description_long">
                        {{$product->description_long}}
                    </textarea>
                    <small class="text-error ">
                        @foreach ($errors->get('description_long') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label>Description short</label>
                    <textarea id="descriptionProduct2" rows="10" class="form-control" name="description_short">
                         {{$product->description_short}}
                    </textarea>
                    <small class="text-error ">
                        @foreach ($errors->get('description_short') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" class="form-control" placeholder="Code" name="code" value="{{$product->code}}">
                    <small class="text-error ">
                        @foreach ($errors->get('code') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="col-auto mb-4">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
                            <option selected>{{ucfirst(trans($product->category))}}</option>
                            @foreach($categories as $category)
                                <option  value="{!!$category->name!!}">{{ucfirst(trans($category->name))}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Photo Old</label>
                            <img src="{{asset('/storage/images/products/'.$product->photos)}}" class="img-thumbnail" alt="{{$product->photos}}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Photo New</label>
                            <input type="file" class="form-control-file" name="product" value="{{old('product')}}">
                            <small class="text-error ">
                                @foreach ($errors->get('product') as $message)
                                    {{$message}}
                                @endforeach
                            </small>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-upload"></i>
                    Update</button>
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
