<div class="my-5">
    <div id="carouselExampleControls" class="carousel slide position-relative" data-bs-ride="carousel">
        <div class="carousel-inner" style="height: 600px">
            @foreach ($slideshow as $item)
                @if ($loop->first)
                    <div class="carousel-item active">
                        <img src="{{ asset('images/banner/' . $item->image) }}" class="d-block w-100" alt="...">
                    </div>
                @else
                    <div class="carousel-item active">
                        <img src="{{ asset('images/banner/' . $item->image) }}" class="d-block w-100" alt="...">
                    </div>
                @endif
            @endforeach
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
                    <img src="{{ asset('images/banner_offset_1.webp') }}" alt="alt">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset_banner2">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <a href="#" title="alt" class="block a-center">
                        <img src="{{ asset('images/banner_offset_2.webp') }}" alt="alt">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
