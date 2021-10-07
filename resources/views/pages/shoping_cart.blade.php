@extends('layouts.app')
@section('page','Shoping Cart')

@section('breadcrumb')
{{--    <x-breadcrumb/>--}}
@endsection
@section('content')
<form class="bg0 p-t-75 p-b-85">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
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
                            @php
                            $total = 0;
                            @endphp
                            @if(session()->get('cart'))
                            @foreach(session()->get('cart') as $id => $cart)
                                @php
                                $total += $cart['price'] * $cart['quanlity'];
                                @endphp
                                <tr class="table_row order_id" data-id="{{$id}}">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="{{url('/assets/images/'.$cart['photo'])}}" alt="{{$cart['name']}}">
                                        </div>
                                    </td>
                                    <td class="column-2 name">{{$cart['name']}}</td>
                                    <td class="column-3">{{number_format($cart['price'])}}$</td>
                                    <td class="column-4">
                                        <ul class="list-group">
                                            @foreach (explode(',',$cart['size']) as $size)
                                                <li class="size">{!! $size !!}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="column-4">
                                        <ul class="list-group">
                                            @foreach (explode(',',$cart['color']) as $color)
                                                <li>{!! $color !!}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-minus btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m"
                                                 data-url="{{route('cart.update',['cart' => $id])}}"
                                                 data-id="{{$id}}"
                                            >
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>
                                            <input
                                                class="mtext-104 cl3 txt-center num-product"
                                                type="number"
                                                name="num-product1"
                                                value="{{$cart['quanlity']}}"
                                                min="1">

                                            <div class="btn-plus btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m"
                                                 data-url="{{route('cart.update',['cart' => $id])}}"
                                                 data-id="{{$id}}"
                                            >
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">{{number_format($cart['price'] * $cart['quanlity'])}}$</td>
                                    <td class="column-8 icon-header-item">
                                        <i
                                           class="fa fa-close btn-delete-cart"
                                           data-url="{{route('cart.destroy',['cart' => $id])}}"
                                        ></i>
                                    </td>
                                </tr>
                            @endforeach
                            @endif


                        </table>
                        @if(!session()->get('cart'))
                            <img class="card-img" src="{{url('/storage/images/cart_empty/4088f796052648dd835057b09d904711.png')}}" alt="">
                        @endif
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Apply coupon
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-xl-12 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>


                    </div>
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
                                {{number_format($total)}}$
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
