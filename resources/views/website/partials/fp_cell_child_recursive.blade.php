<ul class="sidebar-dropdown sub-menu">
    @foreach($children as $child)
        <li>
            <a href="#"
               class="child-item"
               data-name="{{ $child->name }}"
               data-description="{{ $child->description }}"
               data-link="{{ $child->link }}">
               {{ $child->name }}
            </a>

            @if($child->children->count())
                @include('website.fp_cell_child_recursive', ['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>

