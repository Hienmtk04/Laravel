@extends('layouts.admin')
@section('title', 'Chi tiết sản phẩm')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết sản phẩm</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-primary">
                            <i class="far fa-edit"></i> Sửa
                        </a>
                        <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30%;">
                                <strong>Tên trường</strong>
                            </th>
                            <th class="text-center" style="width:70%;">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><strong>Tên sản phẩm</strong></td>
                            <td class="text-center">{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Slug</strong></td>
                            <td class="text-center">{{ $product->slug }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Price</strong></td>
                            <td class="text-center">{{ $product->price }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Price Sale</strong></td>
                            <td class="text-center">{{ $product->pricesale }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Mô tả</strong></td>
                            <td class="text-center">{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Chi tiết</strong></td>
                            <td class="text-center">{{ $product->detail }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Category</strong></td>
                            <td class="text-center">{{ $product->category_id }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Brand</strong></td>
                            <td class="text-center">{{ $product->brand_id }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Image</strong></td>
                            <td class="text-center">{{ $product->image }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Trạng thái</strong></td>
                            <td class="text-center">{{ $product->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Ngày tạo</strong></td>
                            <td class="text-center">{{ $product->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Người tạo</strong></td>
                            <td class="text-center">{{ $product->created_by }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
