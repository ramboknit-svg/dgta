<li class="{{ $child->children->count() ? 'has-submenu' : '' }}">

    <a href="javascript:void(0)"
       class="tab-btn"
       data-name="{{ $child->name }}"
       data-description="{{ $child->description }}"
       data-link="{{ $child->link }}">
        {{ $child->name }}

        @if($child->children->count())
            <i class="fa fa-chevron-right arrow"></i>
        @endif
    </a>

    @if($child->children->count())
        <ul class="sub-menu">
            @foreach($child->children as $sub)
                @include('website.partials.fp_child', ['child' => $sub])
            @endforeach
        </ul>
    @endif

</li>

