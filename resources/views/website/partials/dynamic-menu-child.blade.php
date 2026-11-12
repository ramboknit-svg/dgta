@if($menu->children->count() > 0)

    <li class="has-submenu">
        <a href="javascript:void(0)">{{ strtoupper($menu->name) }}</a>
        <i class="fa fa-chevron-right arrow more-arrow"></i>

        <ul class="sub-menu">
            @foreach($menu->children as $child)
                @include('website.partials.dynamic-menu-child', ['menu' => $child])
            @endforeach
        </ul>
    </li>

@else

    @php
        $menuUrl = optional($menu->menuNote)->url;
    @endphp

    <li>
        @if(!empty($menuUrl))
            <a href="{{ $menuUrl }}" target="_blank">{{ strtoupper($menu->name) }}</a>
        @else
            <a href="javascript:void(0)">{{ strtoupper($menu->name) }}</a>
        @endif
    </li>

@endif
