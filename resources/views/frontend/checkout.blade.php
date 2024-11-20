@extends('layouts.site')
@section('title', 'Thanh toán')
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

                        <li><strong><span style="color: #94e3df;">@yield('title')</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container my-4">
        <h1 class="text-center text-successs">THANH TOÁN</h1>
        <div class="row">
            <div class="col-md-9">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalMoney = 0;
                        @endphp
                        @foreach ($list_cart as $row_cart)
                            <tr>

                                <td>{{ $row_cart['id'] }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/products/' . $row_cart['image']) }}"
                                        style="width: 150px; height: 200px;" alt="{{ $row_cart['image'] }}">
                                </td>
                                <td>{{ $row_cart['name'] }}</td>
                                <td>
                                    {{ $row_cart['qty'] }}
                                </td>
                                <td>{{ number_format($row_cart['price']) }}</td>
                                <td>{{ number_format($row_cart['price'] * $row_cart['qty']) }}</td>
                            </tr>
                            @php
                                $totalMoney += $row_cart['price'] * $row_cart['qty'];
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6" class="text-end">
                                    <strong>Tổng tiền: {{ number_format($totalMoney) }} VNĐ </strong>
                            </th>
                        </tr>
                    </tfoot>

                </table>

            </div>
            
        </div>
        <div class="row">
            @if (!Auth::check())
                <div class="col-12">
                    <h3>Hãy đăng nhập để thanh toán</h3>
                    <a href="{{ route('website.getlogin') }}" class="btn btn-success">Đăng nhập</a>
                </div>
        </div>
    @else
        <form action="{{ route('site.cart.docheckout') }}"method="post">
            @csrf
            <div class="row my-5">
                @php
                    $user = Auth::user();
                @endphp
                <div class="col-md-6">
                    <div class="md-3">
                        <label>Họ Tên</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-3">
                        <label>Email</label>
                        <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-3">
                        <label>Điện thoại</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-3">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" value="{{ $user->address }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="md-3">
                        <label>Chú ý</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>

                </div>
                <div class="col-md-12 text-end mt-4">
                    <button class="btn btn-success" type="submit">Đặt mua</button>
                </div>

            </div>
        </form>
        @endif
    </div>

@endsection
