<h3 class="charter-duties">
    {{ strtoupper($category->name) }}
</h3>

<div class="sectionunder-content">
    @if($category->description)
        <p>{!! $category->description !!}</p>
    @else
        <p>No content available for this category.</p>
    @endif
</div>

