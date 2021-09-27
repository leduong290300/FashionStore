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
            Order List</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Order Time</th>
                        <th>Status</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th colspan="2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    @foreach($products as $product)--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                {{ $loop->iteration + ($products->currentPage()-1) * ($products->perPage()) }}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{$product->name}}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="m-r-10">--}}
{{--                                    <img src="{{asset('storage/images/products/'.$product->photos)}}" alt="{{$product->photos}}" class="rounded" width="45">--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{$product->code}}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{$product->price}}$--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{$product->size}}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{$product->category}}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                {{$product->quanlity}}--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <a href="">--}}
{{--                                    <button class="btn btn-success">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                        Edit--}}
{{--                                    </button>--}}
{{--                                </a>--}}
{{--                                <button class="btn btn-danger confirm"--}}
{{--                                        data-toggle="modal"--}}
{{--                                        data-target="#modalDelete"--}}
{{--                                        data-url=""--}}
{{--                                >--}}
{{--                                    <i class="fa fa-remove"></i>--}}
{{--                                    Delete--}}
{{--                                </button>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
{{--        {{$products->links('vendor.pagination.custom')}}--}}
    </div>
@endsection
