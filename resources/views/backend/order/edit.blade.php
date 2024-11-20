@extends('layouts.admin')
@section('title', 'Quản lý đơn hàng')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật đơn hàng</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.order.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.order.update', $order->id) }}" method="post">
                    @csrf
                    @method('put')
                    <h1 class="text-center">Chỉnh sửa đơn hàng</h1>
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-md-12 mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" id="id" class="form-control" name="id"
                                    value="{{ old('id', $order->id) }}" readonly />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name', $order->name) }}" />
                                
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="gender" class="form-label">Giới tính</label>
                                <select id="gender" class="form-control" name="gender">
                                    <option value="Nam" {{ old('gender', $order->gender) == "Nam" ? 'selected' : '' }}>
                                        Nam</option>
                                    <option value="Nữ" {{ old('gender', $order->gender) == "Nữ" ? 'selected' : '' }}>
                                        Nữ</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ old('email', $order->email) }}" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="phone" class="form-label">Điện thoại</label>
                                <input type="text" id="phone" class="form-control" name="phone"
                                    value="{{ old('phone', $order->phone) }}" />
                                
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" id="address" class="form-control" name="address"
                                    value="{{ old('address', $order->address) }}" />
                                
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="note" class="form-label">Ghi chú</label>
                                <textarea id="note" class="form-control" name="note" rows="3">{{ old('note', $order->note) }}</textarea>
                                
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Chưa xử lý
                                    </option>
                                    <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Đang xử lý
                                    </option>
                                    <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Hoàn thành
                                    </option>
                                    <option value="4" {{ $order->status == 4 ? 'selected' : '' }}>Đã hủy
                                    </option>
                                </select>
                                
                            </div>

                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success w-100" type="submit">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
