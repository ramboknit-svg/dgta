@extends('website.app_new')

@section('content')

<style nonce="{{ app('cspNonce') }}">

.hero-slider {
    height: 417px;
}


/* =========================================================
   HOD TOP PROFILE
   Inline CSS moved here without design change
   ========================================================= */

.dgta-title {
    text-align: center;
}

.dgta-title-link {
    font-size: 26px;
    font-weight: 600;
    text-decoration: none;
}

.hod-main-photo {
    height: 140px;
    border-radius: 12px;
    margin: 1rem auto;
    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;
}

@if(isset($hod) && $hod != null)
.hod-main-photo {
    background-image: url('{{ asset($hod->image) }}');
}
@endif

.hod-main-heading {
    text-align: center;
    margin: 1rem 0;
    font-size: 1.3rem;
}


/* =========================================================
   SLIDER DESCRIPTION
   ========================================================= */

.description-full {
    display: none;
}


/* =========================================================
   LEFT / RIGHT SIDEBAR
   Inline CSS moved here without design change
   ========================================================= */

.profile-side-sidebar {
    padding: 0px 0px !important;
}

.profile-side-image-item {
    width: 100% !important;
    height: 440px !important;
    overflow: hidden !important;
}

.profile-side-image {
    width: 100% !important;
    height: 100% !important;
    display: block !important;
    object-fit: cover !important;
    object-position: center top !important;
}


/* =========================================================
   PROFILE DESCRIPTION DESIGN
   ========================================================= */

.content-area {
    width: 100%;
    height: 440px;
    padding: 20px 25px;
    background: #195634;
    color: #ffffff !important;
    border: 1px solid #d4af37;
    border-radius: 16px;
    line-height: 1.7;
    font-size: 16px;
    text-align: center;
    overflow-wrap: break-word;
    font-size: 20px;

    /* Show scrollbar only when content is greater */
    overflow-y: auto;
    overflow-x: hidden;
}


/*
|--------------------------------------------------------------------------
| SINGLE LEFT AND RIGHT IMAGE
|--------------------------------------------------------------------------
| Same classes and same width are maintained.
| One image now uses the combined height of the previous four images.
*/

#profile > .sidebar > .sidebar-item:only-child {
    height: 698px !important;
    overflow: hidden;
}

#profile > .sidebar > .sidebar-item:only-child img {
    width: 100% !important;
    height: 100% !important;
    display: block;
    object-fit: cover;
    object-position: center top;
}


/* =========================================================
   FORCE WHITE COLOR ON DESCRIPTION HTML ELEMENTS
   ========================================================= */

.content-area,
.content-area p,
.content-area span,
.content-area div,
.content-area strong,
.content-area b,
.content-area em,
.content-area i,
.content-area ul,
.content-area ol,
.content-area li,
.content-area h1,
.content-area h2,
.content-area h3,
.content-area h4,
.content-area h5,
.content-area h6 {
    color: #ffffff !important;
}


/* =========================================================
   DESCRIPTION HEADINGS
   ========================================================= */

.content-area h1,
.content-area h2,
.content-area h3,
.content-area h4,
.content-area h5,
.content-area h6 {
    margin-top: 0;
    margin-bottom: 12px;
    font-weight: 700;
    line-height: 1.4;
}


/* =========================================================
   DESCRIPTION PARAGRAPHS
   ========================================================= */

.content-area p {
    margin-bottom: 14px;
}


/* =========================================================
   DESCRIPTION LISTS
   ========================================================= */

.content-area ul,
.content-area ol {
    display: inline-block;
    margin: 10px auto 16px;
    padding-left: 28px;
    text-align: left;
}

.content-area li {
    margin-bottom: 6px;
    padding-left: 5px;
}


/* =========================================================
   REMOVE EXTRA GAP FROM LAST ELEMENT
   ========================================================= */

.content-area > *:last-child {
    margin-bottom: 0;
}


/* =========================================================
   LINKS INSIDE DESCRIPTION
   ========================================================= */

.content-area a {
    color: #f4d35e !important;
    text-decoration: underline;
}

.content-area a:hover {
    color: #ffffff !important;
}


/* =========================================================
   SCROLLBAR DESIGN ACCORDING TO EXISTING THEME
   ========================================================= */

.content-area::-webkit-scrollbar {
    width: 7px;
}

.content-area::-webkit-scrollbar-track {
    background: #174d30;
    border-radius: 10px;
}

.content-area::-webkit-scrollbar-thumb {
    background: #d4af37;
    border-radius: 10px;
}

.content-area::-webkit-scrollbar-thumb:hover {
    background: #f4d35e;
}


/* =========================================================
   RESPONSIVE DESCRIPTION
   ========================================================= */

@media (max-width: 767px) {

    .content-area {
        height: 440px;
        padding: 16px;
        font-size: 14px;
        border-radius: 12px;
    }

    #profile > .sidebar > .sidebar-item:only-child {
        height: 440px !important;
    }

}

</style>


<!-- Hero Section -->
<section class="hero-section">

    <div class="container-fluid">

        <div class="hero-content">

            <div class="hero-text">

                @if(isset($hod) && $hod != null)

                    <h2 class="dgta-title">

                        <a
                            class="dgta-title-link"
                            href="{{ route('dgta') }}"
                        >
                           {{ $hod->user_id ?? '' }}
                        </a>

                    </h2>


                    <div class="hod-profile">

                        <div class="hod-photo hod-main-photo">
                        </div>


                        <h3 class="hod-main-heading">

                            {{ $hod->name }} , {{ $hod->designation }}

                            <br>

                            <span>
                                <small></small>
                            </span>

                        </h3>


                        <div class="btn-btn-success">

                            <a
                                href="{{ asset($hod->image) }}"
                                download
                            >
                                DOWNLOAD
                            </a>

                        </div>

                    </div>

                @endif

            </div>


            <!-- Slider content -->
            <div class="hero-slider">

                <div
                    class="slider-container"
                    id="sliderContainer"
                >

                    @if(isset($banners) && $banners != null)

                        @foreach($banners as $index => $banner)

                            @php
                                $plainText = strip_tags(
                                    $banner->description ?? ''
                                );

                                $words = preg_split(
                                    '/\s+/',
                                    trim($plainText)
                                );

                                $words = array_filter($words);

                                $shortDescription = implode(
                                    ' ',
                                    array_slice($words, 0, 7)
                                );
                            @endphp


                            <div class="slide">

                                <img
                                    src="{{ asset($banner->image) }}"
                                    alt="HOD Leadership"
                                />


                                <div class="slide-overlay">

                                    <div class="slide-description">


                                        <div
                                            class="description-preview"
                                            id="desc{{ $index }}-preview"
                                        >

                                            {{ $shortDescription }}


                                            @if(count($words) > 7)

                                                <span
                                                    class="read-more-link description-toggle"
                                                    data-description-index="{{ $index }}"
                                                    data-expand="true"
                                                >
                                                    Read more
                                                </span>

                                            @endif

                                        </div>


                                        <div
                                            class="description-full"
                                            id="desc{{ $index }}-full"
                                        >

                                            {!! $banner->description !!}


                                            <span
                                                class="read-more-link description-toggle"
                                                data-description-index="{{ $index }}"
                                                data-expand="false"
                                            >
                                                Read less
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    @endif

                </div>


                <button
                    type="button"
                    class="slider-nav prev"
                >
                    ‹
                </button>


                <button
                    type="button"
                    class="slider-nav next"
                >
                    ›
                </button>


                @if(isset($banners) && count($banners) > 0)

                    <div class="slider-dots">

                        @for($i = 0; $i < count($banners); $i++)

                            <span
                                class="dot {{ $i === 0 ? 'active' : '' }}"
                                data-slide="{{ $i + 1 }}"
                            >
                            </span>

                        @endfor

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>


<div
    class="layout-container"
    id="profile"
>


    <!-- Left Sidebar -->
    <div class="sidebar profile-side-sidebar">

        <div class="sidebar-item profile-side-image-item">

            <img
                src="{{ asset($hod->left_image) }}"
                width="100%"
                height="100%"
                alt="Left Image"
                class="profile-side-image"
            >

        </div>

    </div>


    <!-- Main Content Area -->
    <div class="main-content">

        <h3 class="hod-heading">
            Profile
        </h3>


        <div class="profile-photo-container">

            <img
                src="{{ asset($hod->image) }}"
                alt="HOD-IN-C Photo"
                class="profile-photo"
                width="100%"
            >

        </div>


        <div class="content-area">

            {!! $hod->long_description ?? '' !!}

        </div>


        <div class="scroll-indicator">
        </div>

    </div>


    <!-- Right Sidebar -->
    <div class="sidebar profile-side-sidebar">

        <div class="sidebar-item profile-side-image-item">

            <img
                src="{{ asset($hod->right_image) }}"
                width="100%"
                height="100%"
                alt="Right Image"
                class="profile-side-image"
            >

        </div>

    </div>

</div>


<script nonce="{{ app('cspNonce') }}">

/* =========================================================
   BANNER DESCRIPTION
   CSP SAFE - NO INLINE ONCLICK
   ========================================================= */

function toggleDescription(index, expand = true) {

    const preview =
        document.getElementById(`desc${index}-preview`);

    const full =
        document.getElementById(`desc${index}-full`);


    if (!preview || !full) {
        return;
    }


    if (expand) {

        preview.style.display = "none";
        full.style.display = "block";

    } else {

        preview.style.display = "block";
        full.style.display = "none";

    }

}


/* =========================================================
   READ MORE / READ LESS
   ========================================================= */

document
    .querySelectorAll('.description-toggle')
    .forEach(function (element) {

        element.addEventListener('click', function () {

            const index =
                parseInt(
                    this.getAttribute('data-description-index'),
                    10
                );

            const expand =
                this.getAttribute('data-expand') === 'true';


            toggleDescription(index, expand);

        });

    });


/* =========================================================
   PREVIOUS SLIDE
   ========================================================= */

const previousSliderButton =
    document.querySelector('.hero-slider .slider-nav.prev');


if (previousSliderButton) {

    previousSliderButton.addEventListener('click', function () {

        if (typeof window.prevSlide === 'function') {

            window.prevSlide();

        }

    });

}


/* =========================================================
   NEXT SLIDE
   ========================================================= */

const nextSliderButton =
    document.querySelector('.hero-slider .slider-nav.next');


if (nextSliderButton) {

    nextSliderButton.addEventListener('click', function () {

        if (typeof window.nextSlide === 'function') {

            window.nextSlide();

        }

    });

}


/* =========================================================
   SLIDER DOTS
   ========================================================= */

document
    .querySelectorAll('.hero-slider .slider-dots .dot')
    .forEach(function (dot) {

        dot.addEventListener('click', function () {

            const slideNumber =
                parseInt(
                    this.getAttribute('data-slide'),
                    10
                );


            if (
                !isNaN(slideNumber) &&
                typeof window.currentSlide === 'function'
            ) {

                window.currentSlide(slideNumber);

            }

        });

    });

</script>

@endsection