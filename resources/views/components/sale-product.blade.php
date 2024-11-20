<section class="trendPro">
    <div class="container section4">
        <div class="title_module_bbf a-center section">
            <h2 class="bf_flower">
                <a href="san-pham-noi-bat" title="Sản phẩm  giảm giá" class="text-dark" style="text-decoration: none;">
                    <h3>Sản phẩm giảm giá</h3>
                </a>
            </h2>
            <span class="destitle">Những sản phẩm được giảm giá siêu hời</span>
        </div>

        <div class="owl-carousel owl-theme">
            @foreach ($sale_product as $product)
            <x-product-card :product="$product" />
            @endforeach

        </div>
        <div class="group_action justify-content-center">
            <a class="btn" style="text-decoration: none; color: rgb(255, 255, 255); background: rgb(26, 200, 128)"
                title="Xem thêm" href="{{ route('site.product') }}">
                <b>XEM THÊM</b>
            </a>
        </div>

    </div>
</section>
