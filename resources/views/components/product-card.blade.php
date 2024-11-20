@props(['product'])
<div class="product" style="height: 450px">
    <div class="container">
        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}" style="text-decoration: none;">
            <img src="{{ asset('images/products/' . $product->image) }}" alt={{ $product->name }}
                title={{ $product->name }}>
            <div class="infoPro" style="height: 50px">
                <h6 class="text-dark" title={{ $product->name }}><b>{{ $product->name }} </b> </h6>
                <div class="price">
                    @if ($product->pricesale)
                        <span class="text-danger">{{ number_format($product->pricesale) }}đ</span>
                        <span class="text-secondary mx-2"><del>{{ number_format($product->price) }}đ</del></span>
                    @else
                        <span class="text-danger">{{ number_format($product->price) }}đ</span>
                    @endif
                </div>
            </div>
            <div class="group_action btn border rounded-fill addCart mt-5">
                <input type="hidden" name="variantId" value="24344327">
                <a class="button_add add_to_cart" style="text-decoration: none;" title="Thêm vào giỏ"
                    href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
                    <b>Xem chi tiết</b>
                </a>
            </div>
        </a>
    </div>
</div>
