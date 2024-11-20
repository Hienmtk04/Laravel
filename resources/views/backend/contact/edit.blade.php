@extends('layouts.admin')
@section('title', 'Quản lý liên hệ')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật liên hệ</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contact.update', $contact->id) }}" method="post">
                    @csrf
                    @method('put')
                    <h1 class="text-center">Chỉnh sửa liên hệ</h1>
                    <div class="container">
                        <div class="row g-3">

                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name', $contact->name) }}" />

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" id="email" class="form-control" name="email"
                                    value="{{ old('email', $contact->email) }}" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="phone" class="form-label">Điện thoại</label>
                                <input type="text" id="phone" class="form-control" name="phone"
                                    value="{{ old('phone', $contact->phone) }}" />

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Chủ đề</label>
                                <input type="text" id="title" class="form-control" name="title"
                                    value="{{ old('title', $contact->title) }}" />

                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="content" class="form-label">Nội dung</label>
                                <input type="text" id="content" class="form-control" name="content"
                                    value="{{ old('content', $contact->content) }}" />

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>Xuất bản
                                    </option>
                                    <option value="2" {{ $contact->status == 2 ? 'selected' : '' }}>Chưa xuất bản
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
