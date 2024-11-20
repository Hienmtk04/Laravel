@extends('layouts.site')
@section('title', 'Chính sách bảo hành')
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
                        <li><strong><span style="color: #94e3df;">{{ $post->title }}</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="main container">
        <div class="row ">
            <div class="container product col-md-9 mb-5">
                <div class="menu mt-5">
                    <div>
                        <h3 style=" font-weight: bold;">{{ $post->title }}</h3>
                    </div>
                    <div>
                        <span style="color: #94e3df;"> {{ $post->created_at }}
                        </span>
                    </div>
                </div>

                <hr>
                <div class="post">
                    <div class="content">
                        <div class="description h4">
                            <b>{{ $post->description }}</b>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img class="m-4 text-center" style="width: 500px; height: 300px;" src="{{ asset('images/posts/' . $post->image) }}"
                                alt=" {{ $post->title }}" />
                        </div>
                        <div class="post_detail">
                            {{ $post->detail }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-5">
                <div class="name container text-center" style="background: #7ae6e0; height: 30px;">
                    <h6 style="font-size: 30px;"><b>BẠN CÓ THỂ XEM</b></h6>
                </div>
                <x-other-post :post="$post" />
            </div>
        </div>
    </section>
@endsection
