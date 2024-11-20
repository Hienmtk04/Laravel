@extends('layouts.site')
@section('title', 'Thông báo thanh toán ')
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

                    <li><strong><span style="color: #94e3df;">@yield('title')</span></strong></li>

                </ul>
            </div>
        </div>
    </div>
</section>
    <div class="container my-5 text-center">
        <div class="message">
            <h3>Thanh toán thành công! </h3>
            <a class="btn btn-success px-3" href="{{ route('site.home') }}">Tiếp tục mua hàng</a>
        </div>
        
    </div>
@endsection
