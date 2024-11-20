@extends('layouts.admin')
@section('title', 'Cập nhật Menu')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật menu</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-sm btn-info">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.menu.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <h1 class="text-center">Cập nhật Menu</h1>
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" id="name" class="form-control" name="name"
                                    value="{{ old('name', $menu->name) }}" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="link" class="form-label">Link</label>
                                <input type="text" id="link" class="form-control" name="link"
                                    value="{{ old('link', $menu->link) }}" />

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="type" class="form-label">Kiểu</label>
                                <input type="text" id="type" class="form-control" name="type"
                                    value="{{ old('type', $menu->type) }}" />

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="position">Vị trí</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="mainmenu" {{ old('position', $menu->position) == "mainmenu" ? 'selected' : '' }}>Main Menu</option>
                                    <option value="footermenu"  {{ old('position', $menu->position) == "footermenu" ? 'selected' : '' }}>Footer Menu</option>
                                </select>

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="parent_id">Parent ID</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Cấp cha</option>
                                    {!! $htmlparentid !!}
                                </select>

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="sort_order">Chọn vị trí</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="">Chọn vị trí</option>
                                    {!! $htmlsortorder !!}
                                </select>

                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2" {{ $menu->status == 2 ? 'selected' : '' }}>Chưa xuất bản
                                    </option>
                                    <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                </select>

                            </div>

                            <div class="col-md-12 mb-3">
                                <button class="btn btn-success w-100" type="submit">
                                    Cập nhật
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
