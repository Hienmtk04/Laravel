@extends('layouts.site')
@section('title', 'Tin tức')
@section('maincontent')
    <style>
        .detail {
            color: #94e3df;
            border: 1px solid #94e3df;
        }

        .detail:hover {
            color: #ffffff;
            background: #94e3df;
        }
    </style>
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

                        <li><strong><span style="color: #94e3df;">@yield('title')</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="main container ">

        <div class="row ">
            <div class="col-md-2 mt-5">
                {{-- topic --}}
                <x-topic-of-post />
            </div>

            <div class="container product col-md-10 mb-5">
                <div class="menu mt-5">
                    <h3> Tất cả bài viết</h3>
                    <p>
                        Nhanh chóng cập nhật những thông tin hữu ích nhất từ chúng tôi để có biến giấc mơ làm đẹp trở nên
                        đơn
                        giản hơn bao giờ hết.
                    </p>
                </div>

                <hr>

                <div class="row mt-5 container ">
                    @foreach ($list as $item)
                        <x-post-card :post="$item"/>
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
