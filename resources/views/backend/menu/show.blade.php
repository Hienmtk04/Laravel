@extends('layouts.admin')
@section('title', 'Chi tiết menu')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết menu</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.menu.edit', ['id' => $menu->id]) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.menu.delete', ['id' => $menu->id]) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.menu.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30%;"><strong>Tên trường</strong></th>
                            <th class="text-center" style="width:70%;">Giá trị</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><strong>Tên Menu</strong></td>
                            <td class="text-center">{{ $menu->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Liên kết</strong></td>
                            <td class="text-center">{{ $menu->link }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Parent ID</strong></td>
                            <td class="text-center">{{ $menu->parent_id }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Vị trí</strong></td>
                            <td class="text-center">{{ $menu->position }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Kiểu</strong></td>
                            <td class="text-center">{{ $menu->type }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Sort Order</strong></td>
                            <td class="text-center">{{ $menu->sort_order }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Trạng thái</strong></td>
                            <td class="text-center">{{ $menu->status }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Ngày tạo</strong></td>
                            <td class="text-center">{{ $menu->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Người tạo</strong></td>
                            <td class="text-center">{{ $menu->created_by }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</section>

@endsection
