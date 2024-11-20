@extends('layouts.admin')
@section('title', 'Thùng rác bài viết')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thùng rác bài viết</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a class="btn btn-sm btn-success" href="{{ route('admin.post.index') }}">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">#</th>
                            <th class="text-center">Hình</th>
                            <th>Tiêu đề bài viết</th>
                            <th>Chủ đề</th>
                            <th>Kiểu</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                        @php
                                $args = ['id' => $item->id]
                            @endphp
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" id="checkId" value="1" name="checkId[]">
                                </td>
                                <td><img src='{{ asset('images/posts/'. $item->image) }}'
                                    style="width:100px; height:100px" alt={{ $item->name }}
                                 /></td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->topic->name }}</td>                                
                                <td>{{ $item->type }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.post.show', $args) }}" class="btn btn-sm btn-info">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.post.restore', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.post.destroy', $args) }}" method="post"
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
    </section>

@endsection
