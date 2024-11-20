@extends('layouts.admin')
@section('title', 'Quản lý đơn hàng')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.order.edit', ['id' => $order->id]) }}" class="btn btn-sm btn-primary">
                            <i class="far fa-edit"></i> Sửa
                        </a>
                        <a href="{{ route('admin.order.delete', ['id' => $order->id]) }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.order.index') }}">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
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
                        @foreach ($order_details as $order_detail)
                            @php
                                $product = $products->get($order_detail->product_id);
                            @endphp
                            <tr>
                                <td>{{ $order_detail->id }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                        style="width: 150px; height: 200px;" alt="{{ $product->name }}">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($order_detail->price) }}đ</td>
                                <td>{{ $order_detail->qty }}</td>
                                <td>{{ number_format($order_detail->price * $order_detail->qty) }}đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
