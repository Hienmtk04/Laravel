@extends('layouts.site')
@section('title', 'Chi tiết bài viết')
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
                        <li class="home">
                            <a href="{{ route('site.news') }}" class="text-dark"><span>Tin tức</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"
                                    style="color: #94e3df;"></i>&nbsp;</span>
                        </li>
                        <li class="home">
                            <a href="{{ route('site.post.topic', ['slug' => $post->topic->slug]) }}" class="text-dark"><span>{{ $post->topic->name }}</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"
                                    style="color: #94e3df;"></i>&nbsp;</span>
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
                        <span style="color: #94e3df;">0 bình luận | {{ $post->created_at }}
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

                {{-- other_post --}}
                <x-other-post :post="$post" />
            </div>
        </div>
    </section>
@endsection

<script>
    // JavaScript to handle hover effects
    document.querySelectorAll('.list-item').forEach(function(item) {
        item.addEventListener('mouseover', function() {
            item.style.backgroundColor = '#f0f0f0';
        });
        item.addEventListener('mouseout', function() {
            item.style.backgroundColor = '';
        });
    });

    document.querySelectorAll('.list-item a').forEach(function(link) {
        link.addEventListener('mouseover', function() {
            link.style.color = '#007bff';
        });
        link.addEventListener('mouseout', function() {
            link.style.color = '#333';
        });
    });
</script>
