@extends('layouts.admin')
@section('title', 'Chi tiết liên hệ')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết liên hệ</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.contact.edit', ['id' => $contact->id]) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.contact.delete', ['id' => $contact->id]) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.contact.index') }}">
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
                            <td class="text-center"><strong>ID</strong></td>
                            <td class="text-center">{{ $contact->id }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Mã khách hàng</strong></td>
                            <td class="text-center">{{ $contact->user_id }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Tên khách hàng</strong></td>
                            <td class="text-center">{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Email</strong></td>
                            <td class="text-center">{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Số điện thoại</strong></td>
                            <td class="text-center">{{ $contact->phone }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Chủ đề</strong></td>
                            <td class="text-center">{{ $contact->title }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Nội dung</strong></td>
                            <td class="text-center">{{ $contact->content }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Mã phản hồi</strong></td>
                            <td class="text-center">{{ $contact->reply_id }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Trạng thái</strong></td>
                            <td class="text-center">{{ $contact->status }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Ngày tạo</strong></td>
                            <td class="text-center">{{ $contact->created_at }}</td>
                        </tr>
                        <tr>
                            <td class="text-center"><strong>Người tạo</strong></td>
                            <td class="text-center">{{ $contact->created_by }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</section>

@endsection
