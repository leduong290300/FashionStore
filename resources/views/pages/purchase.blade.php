@extends('layouts.app')
@section('page','Shoping Cart')

@section('breadcrumb')
    {{--    <x-breadcrumb/>--}}
@endsection

<form class="bg0 p-t-75 p-b-85">
    @section('content')
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-xl-12 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Cart Totals
                        </h4>
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th class="column-4">Size</th>
                                <th class="column-4">Color</th>
                                <th class="column-5">Quanlity</th>
                                <th class="column-5">Total</th>
                                <th class="column-8"></th>
                            </tr>
                            <tr class="table_row order_id">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{asset('storage/images/products/'.$product->photos)}}">
                                    </div>
                                </td>
                                <td class="column-2 name">{{$product->name}}</td>
                                <td class="column-3">{{$product->price}}$</td>
                                <td class="column-4">
                                    <select class="js-select2 select-size" name="size">
                                        <option>Choose an option</option>
                                        @foreach(explode(',',$product->size) as $size)
                                            <option value="{!!$size!!}"> Size {!!$size!!} <option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="column-4">
                                    <ul class="list-group">
                                        {{--@foreach (explode(',',$cart['color']) as $color)
                                            <li>{!! $color !!}</li>
                                        @endforeach--}}
                                    </ul>
                                </td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-minus btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                            {{-- data-url="{{route('cart.update',['cart' => $id])}}"
                                             data-id="{{$id}}"--}}
                                        >
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>
                                        <input
                                            class="mtext-104 cl3 txt-center num-product"
                                            type="number"
                                            name="num-product1"
                                            value="{{--{{$cart['quanlity']}}--}}"
                                            min="1">

                                        <div class="btn-plus btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                            {{--data-url="{{route('cart.update',['cart' => $id])}}"
                                            data-id="{{$id}}"--}}
                                        >
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">{{--{{number_format($cart['price'] * $cart['quanlity'])}}--}}$</td>
                            </tr>
                        </table>
                        <div class="form-group">
                            <input type="text" placeholder="Name..." class="form-control user_name">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email..." class="form-control user_email">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Phone..." class="form-control user_phone">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control user_address" rows="5" placeholder="Address..."></textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control user_notice" rows="5" placeholder="Notice..."></textarea>
                        </div>
                        <div class="flex-w flex-r-m p-b-30">
                            <div class="size-203 flex-c-m respon6">
                                Delivery time
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2 select-color user_select">
                                        <option value="day_of_weak">Day of week</option>
                                        <option value="business_hours">Business hours</option>
                                        <option value="weekend">Weekend</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-w flex-t bor12 p-b-13">
                            <div class="size-208">
                            <span class="stext-110 cl2">
                                Discount:
                            </span>
                            </div>

                            <div class="size-209">
                            <span class="mtext-110 cl2">
                                0$
                            </span>
                            </div>
                        </div>
                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                            </div>

                            <div class="size-209 p-t-1 ">
                            <span class="mtext-110 cl2 user_total">
                                {{--{{number_format($total)}}$--}}
                            </span>
                            </div>
                        </div>

                        <button
                            class="flex-c-m stext-101 cl0 size-101 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer user_order"
                            data-url="{{route('order.store')}}"
                        >
                            Order
                        </button>

                    </div>

                </div>

            </div>
        </div>
</form>
@endsection
