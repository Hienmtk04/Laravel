<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="..assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/layout.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <style>
        .item1:hover {
            border: 1px solid #94e3df;
            border-radius: 20px;
            color: #94e3df;
        }

        .addCart:hover {
            background-color: #95e0d2;
            color: #95e0d2;
            ;

        }

        .item img {
            width: 200px;
            height: 220px;
        }

        .item {
            height: 400px;
        }

        .bread-crumb {
            background: #ece9e9;
            border-top: solid 1px #ebebeb;
            border-bottom: solid 2px #d1cfcf;
        }

        .scrollview {
            width: auto;
            height: 200px;
            overflow: auto;
            /* Cho phép cuộn khi nội dung vượt quá kích thước của scrollview */
            padding-right:  20px;
        }
        .scrollview ul li a {
            font-size: 15px;
        }
    </style>

</head>

<body>
    <header>
        <div class="mb-2">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo-center">
                            <div class="logo">
                                <a href="/" class="logo-wrapper">
                                    <img src="../assets/images/logo.webp" alt="lg Delta Cosmetic" style="height: 80px;">
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
                                            <a class="nav-link active" aria-current="page" href="/"
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
                                            <a class="nav-link active" aria-current="page" href="http://127.0.0.1:5500/pages/contact.html">LIÊN HỆ</a>

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
                                    <img src="../assets/images/user.webp" alt="user" id="userImage">
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
                                    <a href="#"><img src="../assets/images/bag.webp" alt="cart"></a>
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
    </header>

    <section class="bread-crumb">
        <span class="crumb-border p-3"></span>
        <div class="container">
            <div class="rows">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="home">
                            <a href="/" class="text-dark"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;<i class="fa fa-angle-right"
                                    style="color: #94e3df;"></i>&nbsp;</span>
                        </li>

                        <li><strong><span style="color: #94e3df;"> Tất cả sản phẩm</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="main container">

        <div class="row ">
            <div class="col-md-2 mt-5">
                <div class="category mt-2">
                    <div class="name container">
                        <h6 style="font-size: 20px;"><b>Danh mục sản phẩm</b></h6>
                    </div>
                    <ul class="list ms-0">
                        <li class="list-item"><a href="#" class="text-dark">Kem dưỡng da</a></li>
                        <li class="list-item"><a href="#" class="text-dark">Chăm sóc da</a></li>
                        <li class="list-item"><a href="#" class="text-dark">Chăm sóc mặt</a></li>
                        <li class="list-item"><a href="#" class="text-dark">Son môi</a></li>
                    </ul>
                </div>
                <div class="brand mt-2">
                    <div class="name container">
                        <h6 style="font-size: 30px;"><b>Thương hiệu</b></h6>
                    </div>
                    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-offset="0"
                        class="scrollspy-example scrollview" tabindex="0">
                        <ul class="list">
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; 3CE</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; AHA</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; Aloha</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; Aroma</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; bareMinerals</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; Benefit</a></li>
                            <li class="list-item"> <a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; Brilliance</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; Christian</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; Chloé</a></li>
                            <li class="list-item"><a href="" style="text-decoration: none; color: black" class="ms-1">
                                    <input class="" type="checkbox">&nbsp;&nbsp; Burberry</a></li>

                        </ul>
                    </div>
                </div>
            </div>


            <div class="container product col-md-10">
                <div class="menu mt-5">
                    <b><h2>Tất cả sản phẩm</h2></b>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <label for="select"><b>Ưu tiên xem: </b></label>
                        <a href="" style="text-decoration: none; color: black" class="item1 mx-3"> <input
                                class="nav-item " type="checkbox" name="new" id="newPro"> Hàng mới về</a>
                        <a href="" style="text-decoration: none; color: black" class="item1 mx-3"><input
                                class="nav-item" type="checkbox" name="new" id="oldPro"> Hàng cũ nhất</a>
                        <a href="" style="text-decoration: none; color: black" class="item1 mx-3"> <input
                                class="nav-item" type="checkbox" name="new" id="increPrice"> Giá tăng dần</a>
                        <a href="" style="text-decoration: none; color: black" class="item1 mx-3"> <input
                                class="nav-item" type="checkbox" name="new" id="decrePrice"> Giá giảm dần</a>
                    </nav>
                </div>

                <hr>


                <div class="product">

                    <!-- product1------------------------------------------------ -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/maybellineor011u2409d20160928t.webp" alt="son_moi"
                                            title="Son Ba Màu Maybelline Bitten 3.9g">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Son Ba Màu Maybelline Bitten 3.9g">Son Ba Màu
                                                Maybelline Bitten 3.9g</h6>
                                            <div class="price">
                                                <span class="text-danger">140.000đ</span>
                                                <span class="text-secondary mx-2"><del>150.000đ</del></span>
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/anhchupmanhinh20170829luc44344.webp" alt="son_moi"
                                            title="Son thỏi lì 3ce Lip color Matte - #907">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Son thỏi lì 3ce Lip color Matte - #907">Son
                                                thỏi lì
                                                3ce
                                                Lip color Matte - #907</h6>
                                            <div class="price">
                                                <span class="text-danger">270.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/2016102708060633fcb32e55e5c72d.webp" alt="son_moi"
                                            title="Son Thỏi Apieu True Fitting Lipstick">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Son Thỏi Apieu True Fitting Lipstick">Son Thỏi
                                                Apieu
                                                True Fitting Lipstick</h6>
                                            <div class="price">
                                                <span class="text-danger">145.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/sonchristianlouboutindiva.webp" alt="son_moi"
                                            title="Son Christian Louboutin Diva">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Son Christian Louboutin Diva">Son Christian
                                                Louboutin
                                                Diva</h6>
                                            <div class="price">
                                                <span class="text-danger">2.850.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product2------------------------------------------------------------------------ -->

                    <div class="row mt-5">
                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/s1325885mainzoom.webp" alt="phan_mat"
                                            title="Phấn mắt Moonshadow Baked">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Phấn mắt Moonshadow Baked">Phấn mắt Moonshadow
                                                Baked
                                            </h6>
                                            <div class="price">
                                                <span class="text-danger">679.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/s1293463mainzoom.webp" alt="son_moi"
                                            title="Son Yves Saint Laurent">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Son Yves Saint Laurent">Son Yves Saint Laurent
                                            </h6>
                                            <div class="price">
                                                <span class="text-danger">729.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/product3.webp" alt="nuoc_hoa"
                                            title="Nước hoa Yves Saint Laurent Black">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Nước hoa Yves Saint Laurent Black">Nước hoa
                                                Yves
                                                Saint
                                                Laurent Black</h6>
                                            <div class="price">
                                                <span class="text-danger">1.350.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/product7.webp" alt="nuoc_hoa"
                                            title="Nước hoa Chloé Eau de Parfum">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Nước hoa Chloé Eau de Parfum">Nước hoa Chloé
                                                Eau de
                                                Parfum</h6>
                                            <div class="price">
                                                <span class="text-danger">1.500.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PRODUCT3------------------------------------------------------------------------------>
                    <div class="row mt-5">
                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/baremineralsoriginalfoundation.webp" alt="phan_nen"
                                            title="Phấn nền bareMinerals Original">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Phấn nền bareMinerals Original">Phấn nền
                                                bareMinerals
                                                Original</h6>
                                            <div class="price">
                                                <span class="text-danger">560.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container  p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/8a6dcb8e287174a7f949119dc28ca2.webp" alt="sua_tam"
                                            title="Sữa tắm dạng kem Victoria’s Secret">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Sữa tắm dạng kem Victoria’s Secret">Sữa tắm
                                                dạng
                                                kem
                                                Victoria’s Secret</h6>
                                            <div class="price">
                                                <span class="text-danger">860.000đ</span>
                                                <span class="text-secondary mx-2"><del>930.000đ</del></span>
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/5c53bf862463a4743897afb22a6196.webp" alt="sua_tam"
                                            title="Sữa tắm Sparkling Citrus làm mượt da">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Sữa tắm Sparkling Citrus làm mượt da">Sữa tắm
                                                Sparkling
                                                Citrus mượt da</h6>
                                            <div class="price">
                                                <span class="text-danger">1.200.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item border">
                                <div class="container p-3" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;">
                                        <img src="../assets/images/10f387959a5a5a43fea8e5e43c4c69.webp" alt="nuoc_hoa"
                                            title="Nước hoa Versace Bright Crystal">
                                        <div class="infoPro">
                                            <h6 class="text-dark" title="Nước hoa Versace Bright Crystal">Nước hoa
                                                Versace
                                                Bright Crystal</h6>
                                            <div class="price">
                                                <span class="text-danger">1.000.000đ</span>
                                                <!-- <span class="text-secondary mx-2"><del>150.000đ</del></span> -->
                                            </div>
                                            <form action="/cart/add" method="post"
                                                class="variants form-nut-grid btn border-danger rounded-fill addCart"
                                                data-id="product-actions-14341653" enctype="multipart/form-data">
                                                <div class="group_action">
                                                    <input type="hidden" name="variantId" value="24344327">
                                                    <a class="button_add add_to_cart"
                                                        style="text-decoration: none; color: rgb(245, 12, 12);"
                                                        title="Thêm vào giỏ">
                                                        <b>THÊM GIỎ HÀNG</b>
                                                    </a>
                                                </div>
                                            </form>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="container justify-content-center mt-5 mb-5">
            <hr>
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
                                <a href="#" class="backtop pc hidden-xs show text-success" title="Lên đầu trang">Lên
                                    đầu
                                    trang <i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

</body>

<script src="../assets/js/main.js"></script>
<script src="../assets/jquery/jquery-3.7.1.min.js"></script>
<script src="../assets/fontawesome/js/all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>

</html>