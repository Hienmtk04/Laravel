@extends('layouts.admin')
@section('title', 'Thùng rác thương hiệu')
@section('maincontent')
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between align-items-center mb-4" style="margin-bottom: 20px;">
                <div>
                    <h1>Thùng rác thương hiệu</h1>
                </div>
                <div class="ml-auto">
                    <a href="{{ route('admin.brand.index') }}"><button type="button" class="btn btn-danger ml-1 mb-4">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về danh sách
                        </button></a>
                </div>
            </div>

            <div class="col-md-9">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">#</th>
                            <th class="text-center" style="width:90px;">Hình ảnh</th>
                            <th>Tên thương hiệu</th>
                            <th>Slug</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            @php
                                $args = ['id' => $item->id];

                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" id="checkId" value="1" name="checkId[]">
                                </td>
                                <td><img src='{{ asset('images/brand/' . $item->image) }}' alt={{ $item->name }}
                                        style="width:100px; height:100px" /></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td class="text-center">

                                    <a href="#" class="btn btn-sm btn-info" title="View">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.brand.restore', $args) }}" class="btn btn-sm btn-primary"
                                        title="Restore">
                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.brand.destroy', $args) }}" method="post"
                                        style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-success" name='delete' type="submit"
                                            title="Destroy">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    {{ $item->id }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
