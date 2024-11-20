@extends('layouts.site')
@section('title', 'Giỏ hàng')
@section('maincontent')
    <section class="bread-crumb">
        <span class="crumb-border p-3"></span>
        <div class="container">
            <div class="rows">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="{{ route('site.home') }}" class="text-dark"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right" style="color: #94e3df;"></i>&nbsp;</span>
                        </li>

                        <li><strong><span style="color: #94e3df;"> Giỏ hàng</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-5">
        <b class="text-center ">
            <h2>Giỏ hàng của bạn</h2>
        </b>
        <form action="{{ route('site.cart.update') }}"method="post">
            @csrf
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30px;">#</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Hình ảnh</th>
                        <th class="text-center">Tên sản p hẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                        <th class="text-center">Hành động</th>
                    </tr>
                </thead>

                <tbody>
                    @php
                        $totalMoney = 0;
                    @endphp
                    @if (is_array($cart_list) && count($cart_list) > 0)
                        @foreach ($cart_list as $item)
                            <tr class="text-center">
                                <td class="text-center">
                                    <input type="checkbox" id="checkId" value="1" name="checkId[]">
                                </td>
                                <td>{{ $item['id'] }}</td>
                                <td><img src="{{ asset('images/products/' . $item['image']) }}" style="width: 200px;"
                                        alt="{{ $item['name'] }}" /></td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ number_format($item['price']) }}</td>
                                <td>
                                    <input type="number" min="1" name="qty[{{ $item['id'] }}]"
                                        value="{{ $item['qty'] }}" style="width: 60px;" />
                                </td>
                                <td>{{ number_format($item['price'] * $item['qty']) }}</td>
                                <td><a href="{{ route('site.cart.delete', ['id' => $item['id']]) }}"
                                        class="btn btn-sm btn-danger" title="Xóa sản phẩm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $totalMoney += $item['price'] * $item['qty'];
                            @endphp
                        @endforeach

                    @endif

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <a class="btn btn-success px-3" href="{{ route('site.home') }}">Mua thêm</a>
                            <button type="submit" class="btn btn-warning px-3">Cập nhật</button>
                            <a class="btn px-5" style="background: #94e3df" href="{{ route('site.cart.checkout') }}">Thanh
                                toán</a>
                        </th>
                        <th colspan="4" class="text-end">
                            <strong>Tổng tiền: {{ number_format($totalMoney) }}</strong>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>

@endsection
@section('header')
    <link rel="stylesheet" href="home.css">
@endsection
@if (Session::has('error'))
    <script>
        toastr.options = {
            "processBar": true,
            "closeButton": true
        };
        toastr.error("{{ Session::get('error') }}");
    </script>
@endif
@if (Session::has('message'))
    <script>
        toastr.options = {
            "processBar": true,
            "closeButton": true
        };
        toastr.success("{{ Session::get('message') }}");
    </script>
@endif
