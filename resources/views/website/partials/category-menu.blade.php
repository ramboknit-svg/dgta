@foreach($categories as $category)

    @php
        $hasChildren = $category->children && $category->children->count() > 0;

        $menuClass = 'first-level';
        if ($level == 2) $menuClass = 'second-level';
        if ($level >= 3) $menuClass = 'third-level';
    @endphp

    @if($level == 1)

        <div class="btn-group has-sub">
            <button class="tab-btn"
                data-id="{{ $category->id }}"
                data-title="{{ strtoupper($category->name) }}"
                data-desc="{{ e($category->description) }}"
                type="button"
            >
                {{ strtoupper($category->name) }}
                @if($hasChildren)
                    <i class="fa fa-chevron-right arrow"></i>
                @endif
            </button>

            @if($hasChildren)
                <div class="sub-menu {{ $menuClass }}">
                    @include('website.partials.category-menu', [
                        'categories' => $category->children,
                        'level' => $level + 1
                    ])
                </div>
            @endif
        </div>

    @else

        @if($hasChildren)
            <div class="sub-btn has-sub"
                data-id="{{ $category->id }}"
                data-title="{{ strtoupper($category->name) }}"
                data-desc="{{ e($category->description) }}"
            >
                {{ strtoupper($category->name) }}
                <i class="fa fa-chevron-right"></i>

                <div class="sub-menu {{ $menuClass }}">
                    @include('website.partials.category-menu', [
                        'categories' => $category->children,
                        'level' => $level + 1
                    ])
                </div>
            </div>
        @else
            <button class="sub-btn"
                data-id="{{ $category->id }}"
                data-title="{{ strtoupper($category->name) }}"
                data-desc="{{ e($category->description) }}"
                type="button"
            >
                {{ strtoupper($category->name) }}
            </button>
        @endif

    @endif

@endforeach