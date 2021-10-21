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
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userPurchases as $userPurchase)
                        <tr>
                            <td>
                                {{$userPurchase->id}}
                            </td>
                            <td>
                                {{$userPurchase->name}}
                            </td>
                            <td>
                                {{$userPurchase->created_at}}
                            </td>
                            <td>
                                Pending
                            </td>
                            <td>
                                {{$userPurchase->address}}
                            </td>
                            <td>
                                <a href="{{route('order.show',['order' => $userPurchase])}}">
                                    <button class="btn btn-success"
                                    >
                                        <i class="fa fa-eye"></i>
                                        Show details
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{--        {{$products->links('vendor.pagination.custom')}}--}}
    </div>
@endsection
