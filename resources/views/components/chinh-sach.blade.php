@foreach ($list as $item)
    <a style="text-decoration: none; color: black" href="{{ $item->link }}">
        <div class="mt-3">
            <span>{{ $item->name }}</span>
        </div>
    </a>
@endforeach
