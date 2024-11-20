@extends('layouts.site')
@section('title', 'Sản phẩm')
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

                        <li><strong><span style="color: #94e3df;">{{ $row->name }}</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main container">
        <div class="row ">
            <div class="col-md-2 mt-5">
                {{-- category --}}
                <x-category-of-product />

                {{-- brand --}}
                <x-brand-of-product />
            </div>

            <div class="container product col-md-10 mb-5">
                <div class="menu mt-5">
                    <b>
                        <p>Loại sản phẩm:  <span style="color: #7ae6e0">{{ $row->name }}</span></p>
                    </b>
                    <form action="{{ route('site.product.category', ['slug' => $row->slug]) }}">
                        @csrf
                        <div>
                            <nav class="navbar navbar-expand-lg" style="background: #ebecec">
                                <label class="mx-4">
                                    <input type="radio" name="new" class="nav-item">
                                    <span>Hàng mới về</span>
                                </label>
                                <label class="mx-4">
                                    <input type="radio" name="old" class="nav-item">
                                    <span>Hàng cũ nhất</span>
                                </label>
                                <label class="mx-4">
                                    <input type="radio" name="increase" class="nav-item">
                                    <span> Giá tăng dần</span>
                                </label>
                                <label class="mx-4">
                                    <input type="radio" name="decrease" class="nav-item">
                                    <span>Giá giảm dần</span>
                                </label>
                                <button class="btn" style="background: #94e3df" type="submit">Lọc</button>
                            </nav>
                        </div>
                    </form>
                </div>

                <hr>
                <div class="product" style="text-align: center">
                    @foreach ($list as $item)
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
                    {{ $list->links() }}
                </div>
            </div>
            <hr />
        </div>
    </section>
@endsection
