@if (auth()->check())

    <?php $currentUser = auth()->user(); ?>
    @if ($menus)
    <ul id="top-nav" class="pull-right">
        @foreach($menus as $menu)
            @if (!$menu['member_type'] || in_array($currentUser->memberType(), $menu['member_type']))
            <li class="{{ in_array($menu['active'], $actives) ? 'active' : '' }}">
                <a href="{{ $menu['route'] ? route($menu['route']) : '#' }}">
                    <i class="{{ $menu['icon'] }}"></i>
                    <span>{{ $menu['label'] }}</span>
                </a>
            </li>
            @endif
        @endforeach
    </ul>
    @endif

@endif
