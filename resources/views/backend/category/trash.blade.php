@extends('layouts.admin')
@section('title', 'Thùng rác danh mục')
@section('maincontent')
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h1>Thùng rác danh mục</h1>
                    </div>
                    <div class="col-12 text-right">
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.category.index') }}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">#</th>
                            <th class="text-center" style="width:90px;">Hình</th>
                            <th>Tên danh mục</th>
                            <th>Slug</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($list as $item)
                            <tr>
                                @php
                                    $args = ['id' => $item->id];

                                @endphp
                                <td class="text-center">
                                    <input type="checkbox" id="checkId" value="1" name="checkId[]">
                                </td>
                                <td><img src='{{ asset('images/categories/' . $item->image) }}' alt={{ $item->name }}
                                        style="width:100px; height:100px" /></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td class="text-center">

                                    <a href="{{ route('admin.category.show', $args) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.category.restore', $args) }}" class="btn btn-sm btn-primary" title="Restore">
                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.category.destroy', $args) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-success" name='delete' type="submit" title="Destroy">
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
    </section>

@endsection
