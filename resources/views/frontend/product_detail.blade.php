@extends('layouts.site')
@section('title', 'Chi tiết sản phẩm')
@section('maincontent')
    <style>
        .bread-crumb {
            background: #ece9e9;
            border-top: solid 1px #ebebeb;
            border-bottom: solid 2px #d1cfcf;
        }

        .title-product {
            color: #292929;
            font-size: 24px;
            line-height: 26px;
            font-family: "Noto Serif", serif;
            font-weight: 700;
        }

        .description p {
            height: 50px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .btn_addCart {
            color: #1e6225;
        }

        .btn_addCart:hover {
            background-color: #1e6225;
            color: white;
        }

        .addCart:hover {
            background-color: #95e0d2;
            color: #fafafa;
        }

        .owl-carousel .owl-item img {
            display: block;
            width: 100%;
            height: auto;
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
                        <li><strong><span style="color: #94e3df;">{{ $product->name }}</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="main mt-5 container">
        <div class="container">
            <div class="row just-content-center">
                <div class="col-md-4">
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                        title="{{ $product->name }}" class="border" style="width: 400px; height: 400px;">
                </div>
                <div class="col-md-6">
                    <div class="details-pro">
                        <div class="info">
                            <h1 class="title-product">{{ $product->name }}</h1>
                            <div class="brand">
                                <span class="star_reviews text-secondary opacity-25">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </span>
                                <span>
                                    <label for="brand" class="text-secondary opacity-75">Thương hiệu: </label>
                                    <span class="brand_name"> {{ $product->brand->name }}</span>
                                </span>
                            </div>
                            <hr>
                            <div class="price">
                                @if ($product->pricesale)
                                    Giá: <span class="text-danger h3">{{ number_format($product->pricesale) }}đ</span>
                                    <span
                                        class="text-secondary mx-2"><del>{{ number_format($product->price) }}đ</del></span>
                                @else
                                    Giá: <span class="text-danger h3">{{ number_format($product->price) }}đ</span>
                                @endif
                            </div>
                            <div class="description">
                                <p title="{{ $product->description }}">
                                    <b>{{ $product->description }}</b>
                                </p>
                            </div>
                            <div class="product_detail">
                                <h5 style="font-weight: bold">Mô tả sản phẩm: </h5>
                                @if ($product->detail)
                                    <p>{{ $product->detail }}</p>
                                @else
                                    <p>Không có mô tả.</p>
                                @endif
                            </div>
                            <div class="quality">
                                <div class="d-flex align-items-center mb-4 pt-2 ">
                                    <div class="input-group qty mr-3" style="width: 200px">
                                        <button class='btn btn-success btn-plus' onclick="decreaseValue()">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <input type="number" class="text-center form-control input-number" id="qty"
                                            value="1" />
                                        <button class='btn btn-success btn-plus' onclick="increaseValue()">
                                            <i class='fa fa-plus'></i>
                                        </button>
                                    </div>
                                    <span class="">&nbsp;&nbsp;&nbsp;&nbsp; </span>
                                    <button class='btn px-4 ms-2 border border-success btn_addCart'
                                        onclick="handleAddCart({{ $product->id }})">
                                        <i class="fa-solid fa-cart-plus"></i>
                                        <span>Add to cart</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            {{-- Other Product --}}
            <x-other-product :product="$product" />
        </div>
    </section>
@endsection

@section('footer')
    <script>
        function handleAddCart(productid) {
            let qty = document.getElementById("qty").value;
            $.ajax({
                type: "GET",
                data: {
                    productid: productid,
                    qty: qty
                },
                url: "{{ route('site.cart.addcart') }}",
                success: function(result, status, xhr) {
                    document.getElementById("showcount").innerHTML = result;
                    alert("Thêm vào giỏ hàng thành công.");
                    console.log(result);
                },
                error: function(xhr, status, error) {
                    alert("Thêm vào giỏ hàng thành công.");
                }
            });
        }
    </script>
@endsection
