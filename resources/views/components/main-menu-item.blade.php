
@if (count($list_menu_sub) == 0)
    <li class="nav-item active" id="menu-item">
        <a class="nav-link active" aria-current="page" href="{{ route($menu->link) }}">{{ $menu->name }}
        </a>
    </li>
@else
    <li class="nav-item dropdown ms-3" id="dropdownMenu">
        <a class="nav-link active" aria-current="page" href="{{ route($menu->link) }}"
            id="navbarDropdownMenuLink">{{ $menu->name }}</a>
        <ul class="dropdown-content" aria-labelledby="navbarDropdownMenuLink">
            @foreach ($list_menu_sub as $menu_sub)
                <li>
                    <a class="dropdown-item mt-2" href="{{ $menu_sub->link }}">{{ $menu_sub->name }}</a>
                </li>
            @endforeach
        </ul>
    </li>
@endif
