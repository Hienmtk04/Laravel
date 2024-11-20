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
                        <li class="tintuc">
                            <a href="{{ route('site.news') }}" class="text-dark"><span>@yield('title')</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right" style="color: #94e3df;"></i>&nbsp;</span>
                        </li>

                        <li><strong><span style="color: #94e3df;">Bạn đang ở trang tin tức mảng {{ $row->name }}</span></strong></li>
                        

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="main container">

        <div class="row ">
            <div class="col-md-2 mt-5">
                {{-- topic --}}
                <x-topic-of-post />
            </div>

            <div class="container product col-md-10 mb-5">
                <div class="menu mt-5">
                    <b>
                        <p>Chủ đề: <span style="color: #7ae6e0" class="h3">{{ $row->name }}</span></p>
                    </b>
                    <p>
                        {{ $row->description }}
                    </p>
                </div>

                <hr>

                <div class="row mt-5 container">
                    @foreach ($list as $item)
                        {{-- <div class="col-md-3  " style="width: 250px; height: 400px; text-align: center">
                            <a href="#" style="text-decoration: none;">
                                <img src="{{ asset('images/posts/' . $item->image) }}" style="width: 220px; height: 220px">
                                <div style="width: 220px; text-align: center; height: 70px;">
                                    <a href="" style="text-decoration: none">
                                        <p class="text-dark">{{ $item->title }}</p>
                                    </a>
                                </div>
                                <button class='btn border detail mt-3'>
                                    <span>Chi tiết &nbsp; <i class="fa-solid fa-angle-right"></i></span>
                                </button>
                            </a>
                        </div> --}}
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
