
<div class="brand mt-3">
    <div class="name container text-center" style="background: #95e0d2;  height: 50px;">
        <h6 style="font-size: 30px;"><b>Thương hiệu</b></h6>
    </div>
    <ul class="list ms-0" style="list-style-type: none; padding: 0;">
        @foreach ($list as $item)
            @if (isset($item->slug) && isset($item->name))
                <li class="list-item"
                    style="padding: 10px 15px; border-bottom: 1px solid #ddd; transition: background-color 0.3s ease;">
                    <a href="{{ route('site.product.brand', ['slug' => $item->slug]) }}" class="text-dark"
                        style="text-decoration: none; color: #333; display: block;">
                        <input class="" type="checkbox">&nbsp;&nbsp; {{ $item->name }}</a>
                    </a>
                </li>
            @else
                <li class="list-item"
                    style="padding: 10px 15px; border-bottom: 1px solid #ddd; transition: background-color 0.3s ease;">
                    <span class="text-dark" style="color: #333; display: block;">
                        Item information missing
                    </span>
                </li>
            @endif
        @endforeach
    </ul>
</div>

<script>
    // JavaScript to handle hover effects
    document.querySelectorAll('.list-item').forEach(function(item) {
        item.addEventListener('mouseover', function() {
            item.style.backgroundColor = '#f0f0f0';
        });
        item.addEventListener('mouseout', function() {
            item.style.backgroundColor = '';
        });
    });

    document.querySelectorAll('.list-item a').forEach(function(link) {
        link.addEventListener('mouseover', function() {
            link.style.color = '#007bff';
        });
        link.addEventListener('mouseout', function() {
            link.style.color = '#333';
        });
    });
</script>
