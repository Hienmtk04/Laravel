@extends('layouts.admin')
@section('title', 'Chỉnh sửa thương hiệu')
@section('maincontent')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center mb-4" style="margin-bottom: 20px;">
                <div>
                    <h1>Chỉnh sửa thương hiệu</h1>
                </div>
                <div class="ml-auto">
                    <a href=""><button type="button" class="btn btn-danger ml-1 mb-4">
                            <CgAdd /> Thùng rác
                        </button></a>
                </div>
            </div>
            <div class="col-md-3">
                <form action="{{ route('admin.brand.update', ['id' => $brand->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="name">Tên thương hiệu</label>
                        <input type="text" value="{{ old('name', $brand->name) }}" name="name" id="name"
                            class="form-control">

                    </div>
                    <div class="mb-3">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" class="form-control">{{ old('name', $brand->name) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sort_order">Sắp xếp</label>
                        <select name="sort_order" id="sort_order" class="form-control">
                            <option value="0">None</option>
                            {!! $htmlsortorder !!}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image">Hình</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status">Trạng thái</label>
                        <select name="status" id="status" class="form-control">
                            <option value="2">Chưa xuất bản</option>
                            <option value="1">Xuất bản</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="create" class="btn btn-success">Chỉnh sửa thương hiệu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
