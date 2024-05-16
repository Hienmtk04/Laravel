<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        /* Custom CSS */
        .owl-carousel .owl-item img {
            display: block;
            width: 100%;
            height: auto;
        }

        .addCart:hover {
            background-color: #95e0d2;
            color: #95e0d2;
            ;

        }
    </style>

    @yield('header')
</head>

<body>
    <header>
        <header class="header header-menu">
            <div class="mb-2">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="logo-center">
                                <div class="logo">
                                    <a href="/" class="logo-wrapper">
                                        <img src="{{ asset('images/logo.webp') }}" alt="lg Delta Cosmetic" style="height: 80px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 padding-0 mt-4">
                            <div class="wrap_main hidden-xs hidden-sm">
                                <div class="bg-header-nav hidden-xs hidden-sm">
                                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                            <li class="nav-item active" id="menu-item">
                                                <a class="nav-link active" aria-current="page" href="/">TRANG CHỦ</a>
                                            </li>
                                            <li class="nav-item ms-3" id="menu-item">
                                                <a class="nav-link active" aria-current="page" href="#">GIỚI THIỆU</a>
    
                                            </li>
                                            <li class="nav-item dropdown ms-3" id="dropdownMenu">
                                                <a class="nav-link active" aria-current="page"
                                                    href="http://127.0.0.1:5500/pages/product.html#"
                                                    id="navbarDropdownMenuLink">SẢN PHẨM</a>
                                                <ul class="dropdown-content" aria-labelledby="navbarDropdownMenuLink">
                                                    <li><a class="dropdown-item mt-2" href="#">Sản phẩm nổi bật</a></li>
                                                    <li><a class="dropdown-item mt-2" href="#">Son môi</a></li>
                                                    <li><a class="dropdown-item mt-2" href="#">Kem dưỡng da</a></li>
                                                    <li><a class="dropdown-item mt-2 " href="#">Chăm sóc tóc</a></li>
                                                    <li><a class="dropdown-item mt-2" href="#">Chăm sóc mặt</a></li>
                                                </ul>
                                            </li>
                                            <li class="nav-item ms-3" id="menu-item">
                                                <a class="nav-link active" aria-current="page" href="#">TIN TỨC</a>
    
                                            </li>
                                            <li class="nav-item ms-3" id="menu-item">
                                                <a class="nav-link active" aria-current="page"
                                                    href="http://127.0.0.1:5500/pages/contact.html">LIÊN HỆ</a>
    
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 mt-4">
                            <div class="row">
                                <div class="inline-b hidden-xs col dropstart " id="userDropdown">
                                    <span class="imguser">
                                        <img src="{{ asset('images/user.webp') }}" alt="user" id="userImage">
                                        <ul class="dropdown-content" id="userDropdownContent">
                                            <li class="btn btn-success rounded-fill mt-3" style="width: 100px"><a
                                                    class="dropdown-item mt-2" href="#">Đăng nhập</a></li>
                                            <li class="btn border-secondary rounded-fill my-3" style="width: 100px"><a
                                                    class="dropdown-item mt-2" href="#">Đăng ký</a></li>
                                        </ul>
                                    </span>
                                </div>
                                <div class="inline-block col">
                                    <span class="">
                                        <a href="#"><img src="{{ asset('images/bag.webp')}}" alt="cart"></a>
                                    </span>
                                </div>
                                <div class="inline-block col">
                                    <span class="search">
                                        <a href="#"><i class="fa-solid fa-magnifying-glass text-dark"></i></a>
                                    </span>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="my-5">
                <div id="carouselExampleControls" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/slider_1.webp') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/slider_2.webp') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/slider_1.webp') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span> 
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
    
                <div class="container">
                    <div class="section row" id="image-banner">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset_banner1">
                            <a href="#" title="alt" class="block a-center">
                                <img src="{{ asset('images/banner_offset_1.webp')}}" alt="alt">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset_banner2">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <a href="#" title="alt" class="block a-center">
                                    <img src="{{ asset('images/banner_offset_2.webp')}}" alt="alt">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </header>
    <main>
        @yield('maincontent')
    </main>
    <footer>
        <footer>
            <div class="container justify-content-center mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 ">
                        <h4 class="title-menu">
                            <span>ĐỊA CHỈ</span>
                        </h4>
                        <hr class="text-success" style="font-size: 50px; width: 150px">
                        <div class="mt-3">
                            <i class="fa-solid fa-phone text-success me-4"></i>
                            <span>19006750</span>
                        </div>
                        <div class="mt-3">
                            <i class="fa-solid fa-location-dot text-success me-4"></i>
                            <span>An Thượng, Hà Nội</span>
                        </div>
                        <div class="mt-3">
                            <i class="fa-solid fa-envelope text-success me-4"></i>
                            <span>deltawebltd@gmail.com</span>
                        </div>
    
                    </div>
                    <div class="col-md-3">
                        <h4 class="title-menu">
                            <span>HƯỚNG DẪN</span>
                        </h4>
                        <hr class="text-success" style="font-size: 50px; width: 150px">
                        <div class="mt-3">
                            <span>Trang chủ</span>
                        </div>
                        <div class="mt-3">
                            <span>Giới thiệu</span>
                        </div>
                        <div class="mt-3">
                            <span>Sản phẩm</span>
                        </div>
                        <div class="mt-3">
                            <span>Tin tức</span>
                        </div>
                        <div class="mt-3">
                            <span>Liên hệ</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="title-menu">
                            <span>CHÍNH SÁCH</span>
                        </h4>
                        <hr class="text-success" style="font-size: 50px; width: 150px">
                        <div class="mt-3">
                            <span>Trang chủ</span>
                        </div>
                        <div class="mt-3">
                            <span>Giới thiệu</span>
                        </div>
                        <div class="mt-3">
                            <span>Sản phẩm</span>
                        </div>
                        <div class="mt-3">
                            <span>Tin tức</span>
                        </div>
                        <div class="mt-3">
                            <span>Liên hệ</span>
                        </div>
                    </div>
    
                    <div class="col-md-3">
                        <h4 class="title-menu">
                            <span>CÂU HỎI THƯỜNG GẶP</span>
                        </h4>
                        <hr class="text-success" style=" width: 150px">
                        <div class="mt-3">
                            <span>Trang chủ</span>
                        </div>
                        <div class="mt-3">
                            <span>Giới thiệu</span>
                        </div>
                        <div class="mt-3">
                            <span>Sản phẩm</span>
                        </div>
                        <div class="mt-3">
                            <span>Tin tức</span>
                        </div>
                        <div class="mt-3">
                            <span>Liên hệ</span>
                        </div>
                    </div>
    
                </div>
    
                <hr>
                <div class="bg-footer-bottom copyright clearfix">
                    <div class="container">
                        <div class="inner clearfix">
                            <div class="row">
                                <div id="copyright" class="col-md-10">
                                    <span class="wsp">
                                        <span class="mobile">© Bản quyền thuộc về <b class="text-success">Delta
                                                Web</b>
                                            <span class="hidden-xs"> | </span>
                                        </span>
                                        <span class="opacity1">Cung cấp bởi</span>
                                        <a href="#" rel="nofollow" title="Sapo" target="_blank"
                                            class="text-success">Sapo</a>
                                    </span>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="backtop pc hidden-xs show text-success" title="Lên đầu trang">Lên đầu
                                        trang <i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                                </div>
    
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
    
        </footer>
    </footer>
    @yield('footer')
</body>
<script src=" {{ asset('js/main.js') }}"></script>
<script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    // Owl Carousel initialization
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })
</script>

</html>