<div class="col-lg-6 col-md-6 padding-0 mt-4">
    <div class="wrap_main hidden-xs hidden-sm">
        <div class="bg-header-nav hidden-xs hidden-sm">
            <nav class="navbar navbar-expand-lg">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach ($list as $row_menu)
                        <x-main-menu-item :rowmenu="$row_menu" />
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>
