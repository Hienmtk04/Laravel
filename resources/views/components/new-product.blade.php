<section class="newProduct">
    <div class="container section4">
        <div class="title_module_bbf a-center section">
            <h2 class="bf_flower">
                <a href="san-pham-noi-bat" title="Sản phẩm mới" class="text-dark" style="text-decoration: none;">
                    <h3>Sản phẩm mới</h3>
                </a>
            </h2>
            <span class="destitle">Bộ sưu tập sản phẩm mới nhất từ Delta Cosmetic</span>
        </div>

        <div class="owl-carousel owl-theme">

            @foreach ($list as $item)
                <x-product-card :product="$item" />
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
