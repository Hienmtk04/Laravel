<div class="product">
    <div class="container section4">
        <div class="title_module_bbf a-center section">
            <h2 class="bf_flower">
                <a href="san-pham-noi-bat" title="Sản phẩm mới" class="text-dark" style="text-decoration: none;">
                    <h3>Có thể bạn sẽ thích</h3>
                </a>
            </h2>
            <span class="destitle">Sản phẩm được khách hàng lựa chọn thêm</span>
        </div>

        <div class="owl-carousel owl-theme">
            @foreach ($other_product as $product)
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
</div>
