<li class="more {{ $node->childrenRecursive->count() ? 'has-submenu' : '' }}">
    <a href="javascript:void(0)"
       class="tab-btn"
       data-id="{{ $node->id }}"
       data-name="{{ $node->name }}"
       data-description="{{ $node->description }}"
       data-link="{{ route('exam_cell.download', $node->id ?? 0) }}"
       data-is-leaf="{{ $node->childrenRecursive->count() ? 0 : 1 }}">
        {{ $node->name }}
    </a>

    @if($node->childrenRecursive->count())
        <i class="fa fa-chevron-right arrow more-arrow"></i>

        <ul class="sub-menu more-sub-menu">
            @foreach($node->childrenRecursive as $child)
                @include('website.partials.exam-menu', [
                    'node' => $child,
                    'level' => ($level ?? 1) + 1
                ])
            @endforeach
        </ul>
    @endif
</li>