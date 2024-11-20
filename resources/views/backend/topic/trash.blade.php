@extends('layouts.admin')
@section('title', 'Thùng rác chủ đề')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thùng rác chủ đề</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.topic.index') }}">
                            <i class="fas fa-arrow-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">#</th>
                            <th>Tên chủ đề</th>
                            <th>Slug</th>
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
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td class="text-center">

                                    <a href="{{ route('admin.topic.show', $args) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.topic.restore', $args) }}" class="btn btn-sm btn-primary" title="Restore">
                                        <i class="fa fa-window-restore" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ route('admin.topic.destroy', $args) }}" method="post" style="display: inline">
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
