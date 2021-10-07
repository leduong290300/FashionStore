@extends('layouts.board')

@section('breadcrumbs')
    <x-breadcrumbs-board/>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i>
            Products List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th colspan="2" style="text-align: center">Name</th>
                        <th>Code</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Category</th>
                        <th>Inventory</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                            {{ $loop->iteration + ($products->currentPage()-1) * ($products->perPage()) }}
                            </td>
                            <td>
                                {{$product->name}}
                            </td>
                            <td>
                                <div class="m-r-10">
                                    <img src="{{asset('storage/images/products/'.$product->photos)}}" alt="{{$product->photos}}" class="rounded" width="45">
                                </div>
                            </td>
                            <td>
                                {{$product->code}}
                            </td>
                            <td>
                                {{$product->price}}$
                            </td>
                            <td>
                                {{$product->size}}
                            </td>
                            <td>
                                {{$product->category}}
                            </td>
                            <td>
                                {{$product->inventory}}
                            </td>
                            <td>
                                <a href="{{route('products.edit',['product' => $product])}}">
                                    <button class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </button>
                                </a>
                                <button class="btn btn-danger confirm"
                                        data-toggle="modal"
                                        data-target="#modalDelete"
                                        data-url="{{route('products.destroy',['product' => $product->id])}}"
                                        >
                                    <i class="fa fa-remove"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$products->links('vendor.pagination.custom')}}
    </div>
@endsection
