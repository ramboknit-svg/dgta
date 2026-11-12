@extends('website.app')

@section('content')

<style nonce="{{ app('cspNonce') }}">

/* =========================================================
   CSP SAFE COMMON CLASSES
   ========================================================= */

.csp-hidden {
    display: none !important;
}

.csp-visible {
    display: block !important;
}


/* Previously inline HOD image style */
.home-hod-photo {
    height: 140px;
    border-radius: 12px;

    background-image:
        url('{{ isset($hod) && $hod && !empty($hod->image)
            ? asset($hod->image)
            : asset('public/website/images/default-hod.png') }}');

    background-position: center;
    background-repeat: no-repeat;
    background-size: contain;

    margin: 3px auto;
}


/* Previously inline HOD heading style */
.home-hod-name {
    text-align: center;
    margin: 5px 0;
    font-size: 1.3rem;
}


/* Previously style="height:425px" */
.milestone-dashboard-height {
    height: 425px;
}


/* Previously inline width/height on milestone arrows */
.enews-small-nav {
    width: 23px !important;
    height: 28px !important;
}


/* =========================================================
   CALENDAR
   ========================================================= */

.calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 4px;
}

.calendar-day {
    padding: 5px;
    font-size: 10px;
    text-align: center;
}

.calendar-day.today {
    background: #235C39;
    color: #fff;
    border-radius: 4px;
}

.calendar-day.has-event {
    background: #ffeeba;
}

.calendar-day {
    padding: 5px;
    font-size: 10px;
    text-align: center;
    position: relative;
    cursor: pointer;
    border-radius: 4px;
}

.calendar-day.has-pdf {
    cursor: pointer;
    font-weight: 600;
}

.calendar-day .pdf-icon {
    position: absolute;
    bottom: 7px;
    right: 2px;
    width: 14px;
    height: 14px;
    object-fit: contain;
    animation: pdfPulse 1.2s infinite;
    pointer-events: none;
}

.calendar-day:hover.has-pdf {
    background: rgb(255, 215, 0) !important;
    color: black;
}

@keyframes pdfPulse {

    0% {
        transform: scale(1);
        opacity: 1;
    }

    50% {
        transform: scale(1.15);
        opacity: 0.75;
    }

    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.calendar-day {
    padding: 5px;
    font-size: 10px;
    text-align: center;
    position: relative;
    z-index: 999;
}

.calendar-day .pdf-title-box {
    position: absolute;
    bottom: 28px;
    left: 50%;
    transform: translateX(-50%);
    background: #1B4E2F;
    color: #fff;
    padding: 4px 6px;
    border-radius: 4px;
    font-size: 10px;
    line-height: 1.2;
    white-space: nowrap;
    display: none;
    z-index: 999;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.calendar-day.has-pdf:hover .pdf-title-box {
    display: block;
}


/* =========================================================
   WHAT'S NEW
   ========================================================= */

.whats-new {
    width: 100%;
}

.news-content {
    height: 380px;
    overflow: hidden;
    position: relative;
}

.scroller {
    height: 100%;
    overflow-y: hidden;
    overflow-x: hidden;
    position: relative;
}

.scroller.paused {
    overflow-y: auto;
}

.scroller__inner {
    display: flex;
    flex-direction: column;
    gap: 1px !important;
    width: 100%;
    padding-top: 370px;
    padding-bottom: 400px;
}

.news-item {
    align-items: center;
}

.news-link {
    text-decoration: none;
    color: #fff;
    font-size: 14px;
    line-height: 1.4;
}

.news-link:hover {
    color: #fff;
}

.new-badge img {
    width: 50px;
    height: auto;
}

.has-pdf a {
    color: #fff;
    text-decoration: none;
}


/* =========================================================
   OUR MILESTONES THREE IMAGE SLIDER
   ========================================================= */

.enews-slider-wrapper {
    position: relative;
    width: 100%;
    height: 400px;
    overflow: hidden;
    box-sizing: border-box;
}


/* Center image description/name */
.enews-active-name {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 100%;
    height: 52px;
    min-height: 52px;

    margin: 0 0 15px;
    padding: 8px 12px;

    background: #235C39;
    color: #ffffff;

    border: 2px solid #ffd700;
    border-radius: 0 0 10px 10px;

    font-size: 16px;
    font-weight: 700;
    line-height: 1.35;

    text-align: center;
    word-break: break-word;

    overflow: hidden;
    box-sizing: border-box;
}

.enews-active-name p {
    margin: 0;
}


/* Slider image area */
.enews-slider-stage {
    position: relative;
    width: 100%;
    height: 210px;
    overflow: hidden;
}


/* Existing grid */
.enews-slider-stage .enews-grid {
    position: relative;
    display: block !important;
    width: 100%;
    height: 100%;
    overflow: hidden;
}


/* All slides same dimensions */
.enews-slider-stage .news-paper {
    position: absolute !important;

    top: 50%;
    left: 50%;

    z-index: 0;

    display: block !important;

    width: 29%;
    min-width: 29%;
    max-width: 29%;

    height: 180px;

    margin: 0 !important;
    padding: 0 !important;

    opacity: 0;
    visibility: hidden;

    pointer-events: none;

    transform: translate(-50%, -50%);

    transition:
        left 0.55s ease,
        opacity 0.55s ease,
        filter 0.55s ease;
}


/* Left */
.enews-slider-stage .news-paper.prev-slide {
    left: 16%;
    z-index: 2;

    opacity: 0.58;
    visibility: visible;

    pointer-events: auto;

    cursor: pointer;

    transform: translate(-50%, -50%);
}


/* Center */
.enews-slider-stage .news-paper.active-slide {
    left: 50%;
    z-index: 5;

    opacity: 1;
    visibility: visible;

    pointer-events: auto;

    transform: translate(-50%, -50%);
}


/* Right */
.enews-slider-stage .news-paper.next-slide {
    left: 84%;
    z-index: 2;

    opacity: 0.58;
    visibility: visible;

    pointer-events: auto;

    cursor: pointer;

    transform: translate(-50%, -50%);
}


/* Image boxes */
.enews-image-box {
    width: 100%;
    height: 180px;

    margin: 0;
    padding: 5px;

    overflow: hidden;

    background: #eeeeea;

    border: 3px solid #c7c7bd;
    border-radius: 8px;

    box-sizing: border-box;

    transition:
        border-color 0.4s ease,
        box-shadow 0.4s ease,
        background 0.4s ease;
}


/* Slider image */
.enews-slider-image {
    display: block;

    width: 100% !important;
    height: 100% !important;

    margin: 0;
    padding: 0;

    object-fit: contain;
    object-position: center;

    border-radius: 4px;

    transition:
        filter 0.4s ease,
        opacity 0.4s ease;
}


/* Side images */
.enews-slider-stage
.news-paper.prev-slide
.enews-slider-image,

.enews-slider-stage
.news-paper.next-slide
.enews-slider-image {

    filter: brightness(0.78);
}


/* Center highlighted */
.enews-slider-stage
.news-paper.active-slide
.enews-image-box {

    background: #ffffff;

    border-color: #ffd700;

    box-shadow:
        0 8px 18px rgba(0, 0, 0, 0.28),
        0 0 0 3px rgba(35, 92, 57, 0.35);
}

.enews-slider-stage
.news-paper.active-slide
.enews-slider-image {

    filter: brightness(1);
}


/* Hidden description source */
.enews-name-source {
    display: none !important;
}


/* Previous next buttons */
.enews-slider-stage .enews-slider-button {
    position: absolute !important;

    top: 50% !important;

    z-index: 30;

    display: flex !important;
    align-items: center;
    justify-content: center;

    width: 35px !important;
    height: 46px !important;

    margin: 0 !important;
    padding: 0 !important;

    background: #235C39 !important;
    color: #ffffff !important;

    border: 2px solid #ffd700 !important;
    border-radius: 6px !important;

    font-size: 25px !important;
    font-weight: 700;

    line-height: 1 !important;

    opacity: 1 !important;

    cursor: pointer;

    transform: translateY(-50%);

    transition:
        background 0.3s ease,
        transform 0.3s ease;
}

.enews-slider-stage .enews-slider-button:hover,
.enews-slider-stage .enews-slider-button:focus {

    background: #164229 !important;

    color: #ffffff !important;

    outline: none;
}

.enews-slider-stage .enews-slider-button:hover {

    transform:
        translateY(-50%)
        scale(1.06);
}

.enews-slider-stage .enews-slider-button.prev {
    left: 0 !important;
}

.enews-slider-stage .enews-slider-button.next {
    right: 0 !important;
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 991px) {

    .enews-slider-wrapper {
        padding-right: 40px;
        padding-left: 40px;
    }

    .enews-active-name {
        height: 50px;
        min-height: 50px;
        font-size: 14px;
    }

    .enews-slider-stage {
        height: 190px;
    }

    .enews-slider-stage .news-paper {
        width: 29%;
        min-width: 29%;
        max-width: 29%;
        height: 160px;
    }

    .enews-image-box {
        height: 160px;
    }
}


@media (max-width: 767px) {

    .enews-slider-wrapper {
        padding-right: 34px;
        padding-left: 34px;
    }

    .enews-active-name {
        height: 48px;
        min-height: 48px;

        padding: 6px 8px;

        font-size: 13px;
    }

    .enews-slider-stage {
        height: 165px;
    }

    .enews-slider-stage .news-paper {
        width: 30%;
        min-width: 30%;
        max-width: 30%;

        height: 138px;
    }

    .enews-image-box {
        height: 138px;
        padding: 3px;
    }

    .enews-slider-stage .news-paper.prev-slide {
        left: 16%;
    }

    .enews-slider-stage .news-paper.next-slide {
        left: 84%;
    }

    .enews-slider-stage .enews-slider-button {
        width: 30px !important;
        height: 42px !important;
        font-size: 21px !important;
    }
}


@media (max-width: 480px) {

    .enews-slider-wrapper {
        padding-right: 30px;
        padding-left: 30px;
    }

    .enews-active-name {
        height: 46px;
        min-height: 46px;

        font-size: 12px;
        line-height: 1.25;
    }

    .enews-slider-stage {
        height: 145px;
    }

    .enews-slider-stage .news-paper {
        width: 30%;
        min-width: 30%;
        max-width: 30%;

        height: 120px;
    }

    .enews-image-box {
        height: 120px;
    }

    .enews-slider-stage .enews-slider-button {
        width: 28px !important;
        height: 40px !important;

        font-size: 19px !important;
    }
}


/* =========================================================
   MILESTONE DOTS
   ========================================================= */

.enews-slider-dots {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 100%;
    min-height: 24px;

    margin-top: 12px;

    padding: 0;

    gap: 9px;
}


/* Inactive */
.enews-slider-dot {
    display: block;

    width: 12px;
    height: 12px;

    margin: 0;
    padding: 0;

    background:
        rgba(183, 151, 45, 0.65);

    border: 0;
    border-radius: 50%;

    box-shadow:
        0 1px 3px
        rgba(0, 0, 0, 0.28);

    cursor: pointer;

    opacity: 0.75;

    transform: scale(1);

    transition:
        width 0.3s ease,
        height 0.3s ease,
        background 0.3s ease,
        opacity 0.3s ease,
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


/* Active */
.enews-slider-dot.active {

    width: 16px;
    height: 16px;

    background: #ffd700;

    opacity: 1;

    transform: scale(1.05);

    box-shadow:
        0 2px 5px
        rgba(0, 0, 0, 0.35),

        0 0 0 2px
        rgba(255, 215, 0, 0.20);
}

.enews-slider-dot:hover {
    background: #ffd700;
    opacity: 1;
}

.enews-slider-dot:focus {

    outline:
        2px solid #235C39;

    outline-offset: 3px;
}


@media (max-width: 767px) {

    .enews-slider-dots {
        margin-top: 9px;
        gap: 7px;
    }

    .enews-slider-dot {
        width: 10px;
        height: 10px;
    }

    .enews-slider-dot.active {
        width: 14px;
        height: 14px;
    }
}


/* =========================================================
   FLOATING FEEDBACK
   ========================================================= */

.feedback-floating-btn {

    position: fixed;

    right: 12px;
    top: 55%;

    transform:
        translateY(-50%);

    z-index: 99999;

    background:
        linear-gradient(
            180deg,
            #235C39,
            #164229
        );

    color: #fff;

    width: 48px;
    height: 48px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    text-decoration: none;

    box-shadow:
        0 4px 12px
        rgba(0, 0, 0, 0.35);

    border:
        2px solid #ffd700;

    transition:
        all 0.3s ease;
}

.feedback-floating-btn:hover {

    color: #fff;

    transform:
        translateY(-50%)
        scale(1.08);

    background:
        linear-gradient(
            180deg,
            #3A7950,
            #235C39
        );
}

.feedback-floating-btn span {

    font-size: 24px;

    line-height: 1;
}

.feedback-floating-btn .feedback-text {

    position: absolute;

    right: 58px;

    background: #164229;

    color: #fff;

    padding: 6px 10px;

    border-radius: 6px;

    font-size: 13px;

    white-space: nowrap;

    display: none;

    border:
        1px solid #ffd700;
}

.feedback-floating-btn:hover
.feedback-text {

    display: block;
}


/* =========================================================
   ARCHIVE BUTTON
   ========================================================= */

.archive-floating-button {

    position: absolute;

    right: 12px;
    bottom: 8px;

    z-index: 50;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    min-width: 90px;

    padding: 8px 18px;

    background:
        linear-gradient(
            135deg,
            #164229,
            #2F6B43
        );

    color: #ffffff;

    border:
        2px solid #ffffff;

    border-radius: 25px;

    font-size: 14px;

    font-weight: 700;

    text-decoration: none;

    box-shadow:
        0 4px 12px
        rgba(0, 0, 0, 0.35);

    transition:
        all 0.3s ease;
}

.archive-floating-button:hover {

    background:
        linear-gradient(
            135deg,
            #0D2E1C,
            #2F6B43
        );

    color: #ffffff;

    text-decoration: none;

    transform:
        translateY(-2px)
        scale(1.04);

    box-shadow:
        0 6px 15px
        rgba(0, 0, 0, 0.45);
}


/* =========================================================
   IMPORTANT APPLICATIONS
   ========================================================= */

.important-apps
.app-item
.app-link {

    box-shadow:
        0 16px 24px 9px
        rgba(0, 0, 0, 0.55);

    font-weight: bold;

    font-size: 1.4rem;
}


/* =========================================================
   DG TA
   ========================================================= */

.hero-text h2 {

    background:
        var(--ta-forest-dark);

    padding-top: 12px;

    padding-bottom: 10px;
}

.hero-text h2 a {

    color:
        #ffd700 !important;

    font-weight: bold;
}

</style>


<!-- =========================================================
     HERO SECTION
     ========================================================= -->

<section class="hero-section">

    <div class="container-fluid">

        <div class="hero-content">


            {{-- =====================================================
                 HOD
                 ===================================================== --}}

            @if(
                isset($hod) &&
                $hod &&
                ($hod?->status ?? 1) == 1
            )

                <div class="hero-text">

                    <h2>

                        <a href="{{ route('dgta') }}">

                            {{ $hod?->user_id ?? '' }}

                        </a>

                    </h2>


                    <div class="hod-profile">


                        <div class="hod-photo home-hod-photo">
                        </div>


                        <h3 class="home-hod-name">

                            {{ $hod?->name ?? '' }}

                            <span>

                                <small>

                                    {{ $hod?->designation ?? '' }}

                                </small>

                            </span>

                        </h3>


                    </div>


                    <div class="vision-scroll">

                        {!! $hod?->description ?? '' !!}

                    </div>


                </div>


            @else


                <div class="hero-text"></div>


            @endif



            {{-- =====================================================
                 BANNER SECTION
                 ===================================================== --}}

            @if(
                !empty($banners) &&
                count($banners) > 0
            )


                <div class="hero-slider">


                    <div
                        class="slider-container"
                        id="sliderContainer">


                        @foreach(
                            $banners as
                            $index => $banner
                        )


                            @if(
                                ($banner?->status ?? 1) == 1
                            )


                                @php

                                    $plainText =
                                        strip_tags(
                                            $banner?->description ?? ''
                                        );

                                    $words =
                                        explode(
                                            ' ',
                                            $plainText
                                        );

                                    $shortDescription =
                                        implode(
                                            ' ',
                                            array_slice(
                                                $words,
                                                0,
                                                700
                                            )
                                        );

                                @endphp


                                <div
                                    class="slide"
                                    data-banner-index="{{ $index }}">


                                    <img
                                        src="{{ asset(
                                            $banner?->image ??
                                            'public/website/images/default-banner.jpg'
                                        ) }}"
                                        alt="Banner">


                                    <div class="slide-overlay">


                                        <div class="slide-description">


                                            <div
                                                class="description-preview"
                                                id="desc{{ $index }}-preview">


                                                {!! $shortDescription !!}


                                                @if(
                                                    count($words) > 700
                                                )


                                                    <span
                                                        class="read-more-link js-description-expand"
                                                        role="button"
                                                        tabindex="0"
                                                        data-description-index="{{ $index }}">

                                                        Read more

                                                    </span>


                                                @endif


                                            </div>



                                            <div
                                                class="description-full csp-hidden"
                                                id="desc{{ $index }}-full">


                                                {!! $banner?->description ?? '' !!}


                                                <span
                                                    class="read-more-link js-description-collapse"
                                                    role="button"
                                                    tabindex="0"
                                                    data-description-index="{{ $index }}">

                                                    Read less

                                                </span>


                                            </div>


                                        </div>


                                    </div>


                                </div>


                            @endif


                        @endforeach


                    </div>



                    <button
                        type="button"
                        class="slider-nav prev js-banner-prev"
                        aria-label="Previous banner">

                        ‹

                    </button>



                    <button
                        type="button"
                        class="slider-nav next js-banner-next"
                        aria-label="Next banner">

                        ›

                    </button>



                    <div class="slider-dots">


                        @for(
                            $i = 0;
                            $i < count($banners);
                            $i++
                        )


                            <span
                                class="dot js-banner-dot {{ $i === 0 ? 'active' : '' }}"
                                role="button"
                                tabindex="0"
                                data-slide-number="{{ $i + 1 }}"
                                aria-label="Banner {{ $i + 1 }}">
                            </span>


                        @endfor


                    </div>


                </div>


            @else


                <div class="hero-slider"></div>


            @endif


        </div>

    </div>

</section>



<!-- =========================================================
     CONTENT SECTION
     ========================================================= -->

<section class="content-section">

    <div class="container-fluid">

        <div class="modern-content-grid">


            {{-- =================================================
                 OUR MILESTONES
                 ================================================= --}}

            @php

                $activeNews =
                    collect($news ?? [])
                    ->filter(function ($item) {

                        return
                            ($item?->status ?? 1)
                            == 1;

                    })
                    ->values();


                $firstActiveNews =
                    $activeNews->first();

            @endphp



            @if(
                $activeNews->isNotEmpty()
            )


                <div
                    class="dashboard-column milestone-dashboard-height">


                    <h3 class="dashboard-title">

                        Our Milestones

                    </h3>



                    <div
                        class="enews-slider-wrapper"
                        id="eNewsSliderWrapper">


                        {{-- Center image description --}}

                        <div
                            id="eNewsActiveName"
                            aria-live="polite">


                            {!! $firstActiveNews?->name ?? '' !!}


                        </div>



                        <div class="enews-slider-stage">


                            <div
                                class="enews-grid"
                                id="eNewsSlider">


                                @foreach(
                                    $activeNews as
                                    $index => $new
                                )


                                    <div
                                        class="news-paper"
                                        data-slide-index="{{ $index }}">


                                        <div class="enews-name-source">

                                            {!! $new?->name ?? '' !!}

                                        </div>



                                        <div class="enews-image-box">


                                            <img
                                                src="{{ asset(
                                                    $new?->image ?:
                                                    'public/website/images/default-news.jpg'
                                                ) }}"
                                                class="w-100 enews-slider-image js-enews-image"
                                                data-fallback="{{ asset(
                                                    'public/website/images/default-news.jpg'
                                                ) }}"
                                                alt="{{ strip_tags(
                                                    $new?->name ??
                                                    'Our Milestones'
                                                ) }}">


                                        </div>


                                    </div>


                                @endforeach


                            </div>



                            @if(
                                $activeNews->count() > 1
                            )


                                <button
                                    type="button"
                                    class="slider-nav prev enews-small-nav"
                                    id="eNewsPreviousButton"
                                    aria-label="Previous Our Milestones">

                                    &#10094;

                                </button>



                                <button
                                    type="button"
                                    class="slider-nav next enews-small-nav"
                                    id="eNewsNextButton"
                                    aria-label="Next Our Milestones">

                                    &#10095;

                                </button>


                            @endif


                        </div>



                        {{-- Slider dots --}}

                        @if(
                            $activeNews->count() > 1
                        )


                            <div
                                class="enews-slider-dots"
                                id="eNewsSliderDots">


                                @foreach(
                                    $activeNews as
                                    $index => $new
                                )


                                    <button
                                        type="button"
                                        class="enews-slider-dot {{ $index === 0 ? 'active' : '' }}"
                                        data-slide-index="{{ $index }}"
                                        aria-label="Show milestone {{ $index + 1 }}">
                                    </button>


                                @endforeach


                            </div>


                        @endif


                    </div>


                </div>


            @else


                <div class="dashboard-column">


                    <h3 class="dashboard-title">

                        Our Milestones

                    </h3>


                </div>


            @endif



            {{-- =================================================
                 WHAT'S NEW
                 ================================================= --}}

            @if(!empty($WhatsNew))


                @if(
                    isset($WhatsNew) &&
                    $WhatsNew->isNotEmpty()
                )


                    <div class="whats-new">


                        <h3 class="section-title">

                            What's New

                        </h3>



                        <div class="news-content">


                            <div
                                class="scroller"
                                data-speed="fast"
                                data-direction="up">


                                <div class="tag-list scroller__inner">


                                    @foreach(
                                        $WhatsNew as $new
                                    )


                                        @if(
                                            ($new?->status ?? 1)
                                            == 1
                                        )


                                            <div class="news-item">


                                                <a
                                                    href="{{ route(
                                                        'whatsnew.download',
                                                        $new->id ?? 0
                                                    ) }}"
                                                    class="news-link whatsnew-link"
                                                    target="_blank"
                                                    data-id="{{ $new->id ?? 0 }}">

                                                    ▶ {{ $new?->name ?? '' }}

                                                </a>



                                                <span class="new-badge">


                                                    <img
                                                        src="{{ asset(
                                                            'public/website/images/new-png.png'
                                                        ) }}"
                                                        width="50"
                                                        alt="New">


                                                </span>


                                            </div>


                                        @endif


                                    @endforeach


                                </div>


                            </div>


                        </div>


                    </div>


                @endif


            @endif



            {{-- =================================================
                 IMPORTANT APPLICATIONS
                 ================================================= --}}

            @if(!empty($applications))


                <div class="important-apps">


                    <h3 class="section-title">

                        Important Applications

                    </h3>



                    <div class="apps-grid">


                        @foreach(
                            $applications as
                            $application
                        )


                            @if(
                                ($application?->status ?? 1)
                                == 1
                            )


                                <div class="app-item">


                                    <a
                                        href="{{ $application?->link }}"
                                        class="app-link">


                                        <img
                                            src="{{ asset(
                                                $application?->image ??
                                                'public/website/images/default-app.png'
                                            ) }}"
                                            class="w-100"
                                            alt="{{ $application?->name ?? 'Application' }}">


                                        {{ $application?->name ?? '' }}


                                    </a>


                                </div>


                            @endif


                        @endforeach


                    </div>


                </div>


            @else


                <div class="important-apps"></div>


            @endif


        </div>

    </div>

</section>



{{-- =========================================================
     CSP SAFE BANNER DESCRIPTION AND CONTROLS
     ========================================================= --}}

<script nonce="{{ app('cspNonce') }}">

document.addEventListener(
    'DOMContentLoaded',
    function () {


        /*
        |--------------------------------------------------------------------------
        | Banner description
        |--------------------------------------------------------------------------
        */

        function toggleDescription(
            index,
            expand
        ) {


            const preview =
                document.getElementById(
                    `desc${index}-preview`
                );


            const full =
                document.getElementById(
                    `desc${index}-full`
                );


            if (
                !preview ||
                !full
            ) {

                return;
            }


            if (expand) {


                preview.classList.add(
                    'csp-hidden'
                );


                full.classList.remove(
                    'csp-hidden'
                );


            } else {


                full.classList.add(
                    'csp-hidden'
                );


                preview.classList.remove(
                    'csp-hidden'
                );


            }

        }



        /*
        |--------------------------------------------------------------------------
        | Read more
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.js-description-expand'
            )
            .forEach(
                function (button) {


                    function expandDescription(
                        event
                    ) {


                        if (event) {

                            event.preventDefault();

                        }


                        const index =
                            button.getAttribute(
                                'data-description-index'
                            );


                        toggleDescription(
                            index,
                            true
                        );

                    }


                    button.addEventListener(
                        'click',
                        expandDescription
                    );


                    button.addEventListener(
                        'keydown',
                        function (event) {


                            if (
                                event.key === 'Enter' ||
                                event.key === ' '
                            ) {


                                expandDescription(
                                    event
                                );


                            }

                        }
                    );


                }
            );



        /*
        |--------------------------------------------------------------------------
        | Read less
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.js-description-collapse'
            )
            .forEach(
                function (button) {


                    function collapseDescription(
                        event
                    ) {


                        if (event) {

                            event.preventDefault();

                        }


                        const index =
                            button.getAttribute(
                                'data-description-index'
                            );


                        toggleDescription(
                            index,
                            false
                        );

                    }


                    button.addEventListener(
                        'click',
                        collapseDescription
                    );


                    button.addEventListener(
                        'keydown',
                        function (event) {


                            if (
                                event.key === 'Enter' ||
                                event.key === ' '
                            ) {


                                collapseDescription(
                                    event
                                );


                            }

                        }
                    );


                }
            );



        /*
        |--------------------------------------------------------------------------
        | Existing banner slider previous
        |--------------------------------------------------------------------------
        */

        const bannerPrevious =
            document.querySelector(
                '.js-banner-prev'
            );


        if (bannerPrevious) {


            bannerPrevious.addEventListener(
                'click',
                function () {


                    if (
                        typeof window.prevSlide
                        === 'function'
                    ) {


                        window.prevSlide();


                    }


                }
            );


        }



        /*
        |--------------------------------------------------------------------------
        | Existing banner slider next
        |--------------------------------------------------------------------------
        */

        const bannerNext =
            document.querySelector(
                '.js-banner-next'
            );


        if (bannerNext) {


            bannerNext.addEventListener(
                'click',
                function () {


                    if (
                        typeof window.nextSlide
                        === 'function'
                    ) {


                        window.nextSlide();


                    }


                }
            );


        }



        /*
        |--------------------------------------------------------------------------
        | Existing banner dots
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.js-banner-dot'
            )
            .forEach(
                function (dot) {


                    function openBanner(
                        event
                    ) {


                        if (event) {

                            event.preventDefault();

                        }


                        const slide =
                            parseInt(
                                dot.getAttribute(
                                    'data-slide-number'
                                ),
                                10
                            );


                        if (
                            !Number.isNaN(slide) &&
                            typeof window.currentSlide
                                === 'function'
                        ) {


                            window.currentSlide(
                                slide
                            );


                        }


                    }


                    dot.addEventListener(
                        'click',
                        openBanner
                    );


                    dot.addEventListener(
                        'keydown',
                        function (event) {


                            if (
                                event.key === 'Enter' ||
                                event.key === ' '
                            ) {


                                openBanner(
                                    event
                                );


                            }


                        }
                    );


                }
            );



        /*
        |--------------------------------------------------------------------------
        | CSP safe image fallback
        |--------------------------------------------------------------------------
        */

        document
            .querySelectorAll(
                '.js-enews-image'
            )
            .forEach(
                function (image) {


                    image.addEventListener(
                        'error',
                        function () {


                            const fallback =
                                image.getAttribute(
                                    'data-fallback'
                                );


                            if (
                                fallback &&
                                image.src !== fallback
                            ) {


                                image.src =
                                    fallback;


                                image.removeAttribute(
                                    'data-fallback'
                                );


                            }


                        }
                    );


                }
            );


    }
);

</script>



{{-- =========================================================
     OUR MILESTONES SLIDER
     ========================================================= --}}

<script nonce="{{ app('cspNonce') }}">

document.addEventListener(
    'DOMContentLoaded',
    function () {


        const slider =
            document.getElementById(
                'eNewsSlider'
            );


        const sliderWrapper =
            document.getElementById(
                'eNewsSliderWrapper'
            );


        const activeName =
            document.getElementById(
                'eNewsActiveName'
            );


        const previousButton =
            document.getElementById(
                'eNewsPreviousButton'
            );


        const nextButton =
            document.getElementById(
                'eNewsNextButton'
            );


        const dotsContainer =
            document.getElementById(
                'eNewsSliderDots'
            );


        if (!slider) {

            return;

        }


        const slides =
            Array.from(
                slider.querySelectorAll(
                    '.news-paper'
                )
            );


        const dots =
            dotsContainer

                ? Array.from(
                    dotsContainer
                        .querySelectorAll(
                            '.enews-slider-dot'
                        )
                )

                : [];


        if (
            slides.length === 0
        ) {

            return;

        }


        let currentSlideIndex =
            0;


        let autoSlideInterval =
            null;


        let touchStartX =
            0;


        let touchEndX =
            0;



        /*
        |--------------------------------------------------------------------------
        | Active name
        |--------------------------------------------------------------------------
        */

        function updateActiveName() {


            if (!activeName) {

                return;

            }


            const currentSlide =
                slides[
                    currentSlideIndex
                ];


            const nameSource =
                currentSlide
                    .querySelector(
                        '.enews-name-source'
                    );


            activeName.innerHTML =
                nameSource

                    ? nameSource.innerHTML

                    : '';


        }



        /*
        |--------------------------------------------------------------------------
        | Active dot
        |--------------------------------------------------------------------------
        */

        function updateActiveDot() {


            dots.forEach(
                function (
                    dot,
                    dotIndex
                ) {


                    dot.classList.toggle(
                        'active',
                        dotIndex ===
                            currentSlideIndex
                    );


                    dot.setAttribute(
                        'aria-current',
                        dotIndex ===
                            currentSlideIndex

                            ? 'true'

                            : 'false'
                    );


                }
            );


        }



        /*
        |--------------------------------------------------------------------------
        | Show slide
        |--------------------------------------------------------------------------
        */

        function showENewsSlide(
            index
        ) {


            const totalSlides =
                slides.length;


            if (
                index >=
                totalSlides
            ) {


                index =
                    0;


            }


            if (
                index < 0
            ) {


                index =
                    totalSlides - 1;


            }


            currentSlideIndex =
                index;


            slides.forEach(
                function (slide) {


                    slide.classList.remove(
                        'prev-slide',
                        'active-slide',
                        'next-slide'
                    );


                }
            );



            /*
             * One slide
             */

            if (
                totalSlides === 1
            ) {


                slides[
                    currentSlideIndex
                ]
                    .classList.add(
                        'active-slide'
                    );


                updateActiveName();


                updateActiveDot();


                return;


            }



            /*
             * Two slides
             */

            if (
                totalSlides === 2
            ) {


                const nextIndex =

                    (
                        currentSlideIndex +
                        1
                    )

                    %

                    totalSlides;


                slides[
                    currentSlideIndex
                ]
                    .classList.add(
                        'active-slide'
                    );


                slides[
                    nextIndex
                ]
                    .classList.add(
                        'next-slide'
                    );


                updateActiveName();


                updateActiveDot();


                return;


            }



            /*
             * Three or more
             */

            const previousIndex =

                (
                    currentSlideIndex -
                    1 +
                    totalSlides
                )

                %

                totalSlides;


            const nextIndex =

                (
                    currentSlideIndex +
                    1
                )

                %

                totalSlides;



            slides[
                previousIndex
            ]
                .classList.add(
                    'prev-slide'
                );


            slides[
                currentSlideIndex
            ]
                .classList.add(
                    'active-slide'
                );


            slides[
                nextIndex
            ]
                .classList.add(
                    'next-slide'
                );


            updateActiveName();


            updateActiveDot();


        }



        /*
        |--------------------------------------------------------------------------
        | Next
        |--------------------------------------------------------------------------
        */

        function showNextENewsSlide() {


            showENewsSlide(
                currentSlideIndex +
                1
            );


        }



        /*
        |--------------------------------------------------------------------------
        | Previous
        |--------------------------------------------------------------------------
        */

        function showPreviousENewsSlide() {


            showENewsSlide(
                currentSlideIndex -
                1
            );


        }



        /*
        |--------------------------------------------------------------------------
        | Stop auto
        |--------------------------------------------------------------------------
        */

        function stopENewsAutoSlider() {


            if (
                autoSlideInterval !==
                null
            ) {


                clearInterval(
                    autoSlideInterval
                );


                autoSlideInterval =
                    null;


            }


        }



        /*
        |--------------------------------------------------------------------------
        | Start auto
        |--------------------------------------------------------------------------
        */

        function startENewsAutoSlider() {


            if (
                slides.length <= 1
            ) {


                return;


            }


            stopENewsAutoSlider();


            autoSlideInterval =
                setInterval(
                    showNextENewsSlide,
                    4000
                );


        }



        /*
        |--------------------------------------------------------------------------
        | Restart
        |--------------------------------------------------------------------------
        */

        function restartENewsAutoSlider() {


            stopENewsAutoSlider();


            startENewsAutoSlider();


        }



        /*
        |--------------------------------------------------------------------------
        | Previous button
        |--------------------------------------------------------------------------
        */

        if (previousButton) {


            previousButton
                .addEventListener(
                    'click',
                    function () {


                        showPreviousENewsSlide();


                        restartENewsAutoSlider();


                    }
                );


        }



        /*
        |--------------------------------------------------------------------------
        | Next button
        |--------------------------------------------------------------------------
        */

        if (nextButton) {


            nextButton
                .addEventListener(
                    'click',
                    function () {


                        showNextENewsSlide();


                        restartENewsAutoSlider();


                    }
                );


        }



        /*
        |--------------------------------------------------------------------------
        | Dot click
        |--------------------------------------------------------------------------
        */

        dots.forEach(
            function (dot) {


                dot.addEventListener(
                    'click',
                    function () {


                        const slideIndex =
                            parseInt(
                                this.getAttribute(
                                    'data-slide-index'
                                ),
                                10
                            );


                        if (
                            !Number.isNaN(
                                slideIndex
                            )
                        ) {


                            showENewsSlide(
                                slideIndex
                            );


                            restartENewsAutoSlider();


                        }


                    }
                );


            }
        );



        /*
        |--------------------------------------------------------------------------
        | Side image click
        |--------------------------------------------------------------------------
        */

        slides.forEach(
            function (
                slide,
                index
            ) {


                slide.addEventListener(
                    'click',
                    function () {


                        if (
                            slide.classList.contains(
                                'prev-slide'
                            )
                            ||
                            slide.classList.contains(
                                'next-slide'
                            )
                        ) {


                            showENewsSlide(
                                index
                            );


                            restartENewsAutoSlider();


                        }


                    }
                );


            }
        );



        /*
        |--------------------------------------------------------------------------
        | Pause hover
        |--------------------------------------------------------------------------
        */

        if (sliderWrapper) {


            sliderWrapper
                .addEventListener(
                    'mouseenter',
                    stopENewsAutoSlider
                );


            sliderWrapper
                .addEventListener(
                    'mouseleave',
                    startENewsAutoSlider
                );


        }



        /*
        |--------------------------------------------------------------------------
        | Touch start
        |--------------------------------------------------------------------------
        */

        slider.addEventListener(
            'touchstart',
            function (event) {


                touchStartX =
                    event
                        .changedTouches[0]
                        .screenX;


                stopENewsAutoSlider();


            },
            {
                passive: true
            }
        );



        /*
        |--------------------------------------------------------------------------
        | Touch end
        |--------------------------------------------------------------------------
        */

        slider.addEventListener(
            'touchend',
            function (event) {


                touchEndX =
                    event
                        .changedTouches[0]
                        .screenX;


                const swipeDistance =
                    touchStartX -
                    touchEndX;


                if (
                    Math.abs(
                        swipeDistance
                    )
                    > 40
                ) {


                    if (
                        swipeDistance > 0
                    ) {


                        showNextENewsSlide();


                    } else {


                        showPreviousENewsSlide();


                    }


                }


                startENewsAutoSlider();


            },
            {
                passive: true
            }
        );



        /*
        |--------------------------------------------------------------------------
        | Initialize
        |--------------------------------------------------------------------------
        */

        showENewsSlide(0);


        startENewsAutoSlider();


    }
);

</script>



{{-- =========================================================
     WHAT'S NEW DOWNLOAD
     ========================================================= --}}

<script nonce="{{ app('cspNonce') }}">

document.addEventListener(
    'click',
    function (e) {


        const link =
            e.target.closest(
                '.whatsnew-link'
            );


        if (!link) {

            return;

        }


        e.preventDefault();



        const now =
            new Date();



        const localDateTime =

            now.getFullYear()

            + '-'

            + String(
                now.getMonth() + 1
            ).padStart(
                2,
                '0'
            )

            + '-'

            + String(
                now.getDate()
            ).padStart(
                2,
                '0'
            )

            + ' '

            + String(
                now.getHours()
            ).padStart(
                2,
                '0'
            )

            + ':'

            + String(
                now.getMinutes()
            ).padStart(
                2,
                '0'
            )

            + ':'

            + String(
                now.getSeconds()
            ).padStart(
                2,
                '0'
            );



        const form =
            document.createElement(
                'form'
            );


        form.method =
            'POST';


        form.action =
            link.href;


        form.target =
            '_blank';



        const token =
            document.createElement(
                'input'
            );


        token.type =
            'hidden';


        token.name =
            '_token';


        token.value =
            '{{ csrf_token() }}';



        const time =
            document.createElement(
                'input'
            );


        time.type =
            'hidden';


        time.name =
            'local_time';


        time.value =
            localDateTime;



        form.appendChild(
            token
        );


        form.appendChild(
            time
        );


        document.body
            .appendChild(
                form
            );


        form.submit();


        form.remove();


    }
);

</script>

@endsection