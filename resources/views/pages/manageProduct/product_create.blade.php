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
            <i class="fa fa-plus"></i>
            Add product
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('name') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Price" name="price" value="{{old('price')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('price') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Size" name="size" value="{{old('size')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('size') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Color" name="color" value="{{old('color')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('color') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Inventory" name="inventory" value="{{old('inventory')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('inventory') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label>Description long</label>
                    <textarea id="descriptionProduct1" rows="10" class="form-control" name="description_long">
                        {{old('description_long')}}
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
                         {{old('description_short')}}
                    </textarea>
                    <small class="text-error ">
                        @foreach ($errors->get('description_short') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="col-auto mb-4">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="category">
                        <option selected>Choose...</option>
                        @foreach($categories as $category)
                            <option  value="{!!$category->name!!}">{{ucfirst(trans($category->name))}}</option>
                        @endforeach
                        <small class="text-error ">
                            @foreach ($errors->get('category') as $message)
                                {{$message}}
                            @endforeach
                        </small>
                    </select>

                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Code" name="code" value="{{old('code')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('code') as $message)
                            {{$message}}
                        @endforeach
                    </small>
                </div>
                <div class="form-group">
                    <label>Photo Product</label>
                    <input type="file" class="form-control-file" name="product" value="{{old('product')}}">
                    <small class="text-error ">
                        @foreach ($errors->get('product') as $message)
                            {{$message}}
                        @endforeach
                    </small>
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
