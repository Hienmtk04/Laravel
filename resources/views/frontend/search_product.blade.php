@extends('layouts.site')
@section('title', 'Tìm kiếm sản phẩm')
@section('maincontent')
    <section class="bread-crumb">
        <span class="crumb-border p-3"></span>
        <div class="container">
            <div class="rows">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="{{ route('site.home') }}" class="text-dark"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right" style="color: #94e3df;"></i>&nbsp;</span>
                        </li>
                        <li><strong><span style="color: #94e3df;">Tìm kiếm: "{{ $query }}"</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main container">
        <div class="row">
            @if (count($listsp) > 0)
                <div class="container product col-md-12 mb-5">
                    <div class="product" style="text-align: center">
                        @foreach ($listsp as $item)
                            <div class="col-md-3" style="float: left; margin: 30px">
                                <div class="item border">
                                    <x-product-card :product="$item" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row mt-3" style="float: right;">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $listsp->links() }}
                    </div>
                </div>
            @else
                <div class="col-md-12 text-center">
                    <h5>Không tìm thấy sản phẩm nào phù hợp với từ khóa "{{ $query }}"</h5>
                </div>
            @endif

        </div>

    </section>
@endsection
