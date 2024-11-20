<ul class="list ms-0" style="list-style-type: none; padding: 0;">
    @foreach ($other_post as $item)
        @if (isset($item->slug) && isset($item->title))
            <li class="list-item"
                style="padding: 10px 15px; border-bottom: 1px solid #ddd; transition: background-color 0.3s ease; height: 120px;">
                <a href="{{ route('site.post.detail', ['slug' => $item->slug]) }}" class="text-dark"
                    style="text-decoration: none; color: #333; display: block;">
                    <div class="row align-items-center mb-3">
                        <div class="col-auto">
                            <img src="{{ asset('images/posts/' . $item->image) }}" class="img-fluid" style="width: 100px; height: 80px" alt="{{ $item->title }}" />
                        </div>
                        <div class="col">
                            <span class="ml-3">{{ $item->title }}</span>
                        </div>
                    </div>
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
