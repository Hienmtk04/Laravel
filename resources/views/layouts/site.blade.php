 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/layoutsite.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Custom CSS */
        .owl-carousel .owl-item img {
            display: block;
            width: 100%;
            height: auto;
        }

        .addCart {
            background-color: #fafafa;
            color: #95e0d2;
            ;

        }

        .addCart:hover {
            background-color: #95e0d2;
            color: #fafafa;
            ;

        }

        #userDropdown {
            position: relative;
        }

        .search-container {
            margin: 20px;
            display: none;
            position: absolute;
            top: 10px;
            right: 0;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search:hover .search-container {
            display: block;
            /* Show the search container when hovering over the icon */
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
        }

        .search-input:focus {
            border-color: #007bff;
        }

        .search-button {
            padding: 10px;
            border: none;
            background-color: #95e0d2;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #95e0d2;
            color: #fff
        }

        .search-button i {
            font-size: 16px;
        }

        .sp5 {
            width: 150px;
            background-color: #90bfe3;
            border-radius: 10px;
            margin-left: 20px;
            color: white;

        }

        .item5 {
            padding: 20px;
        }

        .button_add {
            color: #95e0d2;
        }

        .button_add:hover {
            background-color: #95e0d2;
            color: white;
        }

        .add_Cart:hover {
            background-color: #fc3e3e;
            color: white;
        }

        .detail {
            color: #95e0d2;
        }

        .detail:hover {
            background-color: #95e0d2;
            color: white;
        }

        .cart-count {
            background: #0ede9c;
            color: white;
            display: inline-block;
            width: 20px;
            height: 20px;
            line-height: 20px;
            border-radius: 50%;
            text-align: center;
            font-size: 15px;
        }

        #dropdownMenu:hover .dropdown-content {
            display: block;
        }

        #dropdownMenu .dropdown-content li a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 5px 0;
        }

        #dropdownMenu .dropdown-content li a:hover {
            color: #94e3df;
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
                                    <a href="{{ route('site.home') }}" class="logo-wrapper">
                                        <img src="{{ asset('images/logo.webp') }}" alt="lg Delta Cosmetic"
                                            style="height: 80px;">
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- Menu --}}
                        <x-main-menu />
                        <div class="col-lg-3 col-md-3 mt-4">
                            <div class="row">
                                <div class="inline-b hidden-xs col-md-5 dropstart " id="userDropdown">
                                    <span class="imguser" style="width:auto">
                                        @if (Auth::check())
                                            <img src="{{ asset('images/user.webp') }}" alt="user" id="userImage" />
                                            <span>{{ Auth::user()->name }}</span>
                                        @else
                                            <img src="{{ asset('images/user.webp') }}" alt="user" id="userImage" />
                                            <span>No user</span>
                                        @endif

                                        @if (Auth::check())
                                            <ul class="dropdown-content" id="userDropdownContent">
                                                <li class="btn rounded-fill mt-3"
                                                    style="width: 100px; background: #95e0d2">
                                                    <a class="dropdown-item mt-2"
                                                        href="{{ route('website.logout') }}">Đăng xuất</a>
                                                </li>
                                                <li class="btn border-secondary rounded-fill my-3" style="width: 100px">
                                                    <a class="dropdown-item mt-2" href="#">Đăng ký</a>
                                                </li>
                                            </ul>
                                        @else
                                            <ul class="dropdown-content" id="userDropdownContent">
                                                <li class="btn rounded-fill mt-3"
                                                    style="width: 100px; background: #95e0d2">
                                                    <a class="dropdown-item mt-2"
                                                        href="{{ route('website.getlogin') }}">Đăng nhập</a>
                                                </li>
                                                <li class="btn border-secondary rounded-fill my-3" style="width: 100px">
                                                    <a class="dropdown-item mt-2" href="#">Đăng ký</a>
                                                </li>
                                            </ul>
                                        @endif

                                    </span>
                                </div>
                                <div class="inline-block col-md-5 text-center">
                                    <span class="">
                                        <a href="{{ route('site.cart.index') }}"
                                            style="text-decoration: none; color:black;">
                                            @php
                                                $cart = session('cart', []);
                                                $count = is_array($cart) && count($cart) > 0 ? count($cart) : 0;
                                            @endphp

                                            <img src="{{ asset('images/bag.webp') }}" alt="cart" id="showcount" />
                                            <span class="cart-count">{{ $count }}</span>
                                        </a>
                                    </span>
                                </div>
                                <div class="inline-b hidden-xs col-md-2 dropstart " id="userDropdown">
                                    <span class="search">
                                        <i class="fa-solid fa-magnifying-glass text-dark"></i>
                                        <div class="search-container dropdown-content" id="userDropdownContent">
                                            <form action="{{ route('site.product.search') }}" method="GET"
                                                class="search-form">
                                                <input type="text" name="query" class="search-input"
                                                    placeholder="Tìm kiếm..." value="{{ request('search_word') }}">
                                                <button type="submit" class="search-button">
                                                    <i class="fa-solid fa-magnifying-glass text-dark"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </span>
                                </div>
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
    <hr />
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
                        <a style="text-decoration: none; color: black" href="{{ route('site.home') }}">
                            <div class="mt-3">
                                <span>Trang chủ</span>
                            </div>
                        </a>
                        <a style="text-decoration: none; color: black" href="{{ route('site.intro') }}">
                            <div class="mt-3">
                                <span>Giới thiệu</span>
                            </div>
                        </a>
                        <a style="text-decoration: none; color: black" href="{{ route('site.product') }}">
                            <div class="mt-3">
                                <span>Sản phẩm</span>
                            </div>
                        </a>
                        <a style="text-decoration: none; color: black" href="{{ route('site.news') }}">
                            <div class="mt-3">
                                <span>Tin tức</span>
                            </div>
                        </a>
                        <a style="text-decoration: none; color: black" href="{{ route('site.contact') }}">
                            <div class="mt-3">
                                <span>Liên hệ</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <h4 class="title-menu">
                            <span>CHÍNH SÁCH</span>
                        </h4>
                        <hr class="text-success" style="font-size: 50px; width: 150px">
                        {{-- <a style="text-decoration: none; color: black">
                            <div class="mt-3">
                                <span>Chính sách mua hàng</span>
                            </div>
                        </a>
                        <a style="text-decoration: none; color: black" href="{{}}">
                            <div class="mt-3">
                                <span>Chính sách bảo hành</span>
                            </div>
                        </a>
                        <a style="text-decoration: none; color: black">
                            <div class="mt-3">
                                <span>Chính sách vận chuyển</span>
                            </div>
                        </a>
                        <a style="text-decoration: none; color: black">
                            <div class="mt-3">
                                <span>Chính sách đổi trả</span>
                            </div>
                        </a> --}}

                        <x-chinh-sach />

                    </div>

                    <div class="col-md-3">
                        <h4 class="title-menu">
                            <span>CÂU HỎI THƯỜNG GẶP</span>
                        </h4>
                        <hr class="text-success" style=" width: 150px">
                        <div class="mt-3">
                            <span>DelCosmetic có thực sự là một thiên đường làm đẹp?</span>
                        </div>
                        <div class="mt-3">
                            <span>Fake hay Real?</span>
                        </div>
                        <div class="mt-3">
                            <span>Liệu có tốt như lời đồn?</span>
                        </div>
                        <div class="mt-3">
                            <span>Đội ngũ nhân viên tư vấn có lương thiện?</span>
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
                                    <a href="#" class="backtop pc hidden-xs show text-success"
                                        title="Lên đầu trang">Lên đầu
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
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
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
<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('qty').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('qty').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('qty').value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            document.getElementById('qty').value = value;
        }
    }
</script>


</html>
