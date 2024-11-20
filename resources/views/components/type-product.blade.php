<section class="typeProduct ">
    <div class=" section3 container">
        <h5 style="font-weight: bold">CÁC DÒNG SẢN PHẨM CỦA DELTA COSMETIC VIỆT NAM</h5>
        <div class="row mt-3 justify-content-center">
            @foreach ($list_category as $category)
            <a href=" {{ route('site.product.category', ['slug'=>$category->slug]) }}" class="col-md-3 sp1 mt-5" style="text-decoration: none; width:200px; height: 20 0px;" >
                <div class="item1" style="text-align: center;">
                    <h5 class="text-light">{{ $category->name }}</h5>
                    <img src="{{ asset('images/categories/' .$category->image) }}" style="width: 100px; height: 100px;" alt="{{ $category->name }}">
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
