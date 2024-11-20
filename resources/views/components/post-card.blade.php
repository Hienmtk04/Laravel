@props(['post'])
<div class="col-md-3  " style="width: 250px; height: 400px; text-align: center">
    <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}" style="text-decoration: none;">
        <img src="{{ asset('images/posts/' . $post->image) }}" style="width: 220px; height: 220px" />
        <div style="width: 220px; text-align: center; height: 70px;">
            <a href="" style="text-decoration: none">
                <p class="text-dark">{{ $post->title }}</p>
            </a>
        </div>
        <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}" style="text-decoration: none;">
            <button class='btn border detail mt-3'>
                <span>Chi tiết &nbsp; <i class="fa-solid fa-angle-right"></i></span>
            </button>
        </a>
    </a>
</div>
