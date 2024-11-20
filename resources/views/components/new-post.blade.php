<section class="NewPost">
    <div class="container section4">
        <div class="title_module_bbf a-center section">
            <h2 class="bf_flower">
                <a href="tin-tuc" title="Tin tức & Mẹo" class="text-dark" style="text-decoration: none;">
                    <h3>Bài viết mới nhất</h3>
                </a>
            </h2>
            <span class="destitle">Nắm bắt những tin tức và mẹo vặt mới nhất</span>
        </div>

        <div class="owl-carousel owl-theme">

            @foreach ($list as $item)
                <x-post-card :post="$item" />
            @endforeach

        </div>
        <div class="group_action justify-content-center">
            <a class="btn" style="text-decoration: none; color: rgb(255, 255, 255); background: rgb(26, 200, 128)"
                title="Xem thêm" href="{{ route('site.news') }}">
                <b>XEM THÊM</b>
            </a>
        </div>

    </div>
</section>
