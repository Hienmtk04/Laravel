@extends('layouts.site')
@section('title', 'Liên hệ')
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

                        <li><strong><span style="color: #94e3df;">Liên hệ</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Liên hệ với chúng tôi</h2>
                    <p>Để liên hệ và nhận các thông in khuyến mại sớm nhất,
                        xin vui lòng điền đầy đủ thông tin của bạn vào form dưới đây. Chúng tôi sẽ liên lạc lại với bạn
                        trong thời gian sớm nhất</p>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('site.contact.add') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Họ và tên"
                                required>
                            <div class="invalid-feedback">
                                Vui lòng nhập họ và tên.
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="tel" name="phone" id="phone" class="form-control"
                                placeholder="Số điện thoại" required>
                            <div class="invalid-feedback">
                                Vui lòng nhập số điện thoại hợp lệ.
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                                required>
                            <div class="invalid-feedback">
                                Vui lòng nhập địa chỉ email hợp lệ.
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Chủ đề"
                                required>
                        </div>
                        <div class="mb-3">
                            <textarea name="content" id="comment" class="form-control" rows="5" placeholder="Nội dung" required></textarea>
                            <div class="invalid-feedback">
                                Vui lòng nhập nội dung.
                            </div>
                        </div>
                        <button type="submit" class="btn button-success" style="background: #0c6c04 ; color: white">Gửi
                            liên hệ</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="section_maps section mt-5 ms-3">
                        <div class="iFrameMap">
                            <div id="contact_map" class="map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.904611732553!2d105.81388241542348!3d21.03650239288885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab1946cc7e23%3A0x87ab3917166a0cd5!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gY8O0bmcgbmdo4buHIFNBUE8!5e0!3m2!1svi!2s!4v1555900531747!5m2!1svi!2s"
                                    width="600" height="450" style="border:0" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
