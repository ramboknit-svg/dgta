@extends('website.app_cosco')
@section('content')

<style nonce="{{ app('cspNonce') }}">

.hero-slider {
    height: 390px;
}

.hero-text h2 {
    text-align: center;
}

.hero-link {
    font-size: 26px;
    font-weight: 600;
    text-decoration: none;
}

.hod-photo {
    height: 140px;
    border-radius: 12px;
    margin: 1rem auto;
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
}

.hero-title {
    text-align: center;
    margin: 1rem 0;
    font-size: 1.3rem;
}

.sidebar-item img {
    width: 100%;
    height: 100px;
}

.profile-photo {
    width: 100%;
}

/* SLIDER */
.slide img {
    width: 100%;
}

.slider-nav {
    cursor: pointer;
}

.slider-dots .dot {
    cursor: pointer;
}
.description-full{
    display:none;
}

</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container-fluid">
        <div class="hero-content">

            <div class="hero-text">

                @if(isset($hod) && $hod!=null)

                    <h2>
                        <a class="hero-link" href="{{url('cosco')}}">COS</a>
                    </h2>

                    <div class="hod-profile">

                        <div class="hod-photo"
                             data-img="{{ asset($hod->image) }}">
                        </div>

                        <h3 class="hero-title">
                            Mr Rajeev,SM
                            <br><span><small></small></span>
                        </h3>

                    </div>

                @endif

            </div>

            {{-- Banner Section --}}
            @if(!empty($banners) && count($banners) > 0)

                <div class="hero-slider">

                    <div class="slider-container" id="sliderContainer">

                        @foreach($banners as $index => $banner)

                            @if(($banner?->status ?? 1) == 1)

                                @php
                                    $plainText = strip_tags($banner?->description ?? '');
                                    $words = explode(' ', $plainText);
                                    $shortDescription = implode(' ', array_slice($words, 0, 7));
                                @endphp

                                <div class="slide">

                                    <img src="{{ asset($banner?->image ?? 'public/website/images/default-banner.jpg') }}" alt="Banner" />

                                    <div class="slide-overlay">

                                        <div class="slide-description">

                                            <div class="description-preview" id="desc{{ $index }}-preview">
                                                {!! $shortDescription !!}
                                                @if(count($words) > 500)
                                                   <span class="read-more-link js-toggle-description"
                                                  data-index="{{ $index }}"
                                                        data-expanded="false">
                                                 Read more
                                                        </span>
                                                @endif
                                            </div>

                                            <div class="description-full"
                                                 id="desc{{ $index }}-full"
                                                >
                                                {!! $banner?->description ?? '' !!}
                                                <span class="read-more-link"
                                                      onclick="toggleDescription({{ $index }}, false)">
                                                    Read less
                                                </span>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @endif

                        @endforeach

                    </div>

                   <button type="button" class="slider-nav prev" id="prevSlideBtn">‹</button>
<button type="button" class="slider-nav next" id="nextSlideBtn">›</button>

                    <div class="slider-dots">

                        @for ($i = 0; $i < count($banners); $i++)
                           <span class="dot {{ $i === 0 ? 'active' : '' }}"
      data-slide="{{ $i }}"></span>
                        @endfor

                    </div>

                </div>

            @else
                <div class="hero-slider"></div>
            @endif

        </div>
    </div>
</section>

<!-- PROFILE SECTION -->
<div class="layout-container" id="profile">

    <!-- LEFT SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <h3 class="hod-heading">Profile</h3>

        <div class="profile-photo-container">
            <img src="{{asset('/public/website/images/hod.jpg')}}"
                 class="profile-photo">
        </div>

      <div class="content-area"> <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation</p> <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation</p> <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission. Fostering collaboration and innovation to achieve operation</p> </div>

    </div>

    <!-- RIGHT SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
        <div class="sidebar-item"><img src="{{asset('/public/website/images/hod.jpg')}}"></div>
    </div>

</div>

<!-- JS -->
<script nonce="{{ app('cspNonce') }}">

function toggleDescription(index, expand = true) {
    const preview = document.getElementById(`desc${index}-preview`);
    const full = document.getElementById(`desc${index}-full`);

    if (!preview || !full) return;

    if (expand) {
        preview.style.display = 'none';
        full.style.display = 'block';
    } else {
        preview.style.display = 'block';
        full.style.display = 'none';
    }
}

/* Apply dynamic background images safely (NO INLINE STYLE) */
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.hod-photo').forEach(el => {
        if (el.dataset.img) {
            el.style.backgroundImage = `url('${el.dataset.img}')`;
        }
    });
});

</script>

@endsection