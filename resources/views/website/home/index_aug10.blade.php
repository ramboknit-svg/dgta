@extends('website.app')

@section('content')
<style nonce="{{ app('cspNonce') }}">
    .calendar-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 4px;
}

.calendar-day {
    padding: 6px;
    font-size: 0.75rem;
    text-align: center;
}

.calendar-day.today {
    background: #007bff;
    color: #fff;
    border-radius: 4px;
}

.calendar-day.has-event {
    background: #ffeeba;
}
.hod-photo{
    height: 140px; border-radius: 12px; 
                            background: url('{{ asset($hod?->image ?? 'public/website/images/default-hod.png') }}') center;
                            background-repeat: no-repeat; background-size: contain; margin: 1rem auto;
}
.hod-profile h3{
   text-align: center; margin: 1rem 0; font-size: 1.3rem;
}

.description-full{
display: none;
}
.movie-photo img{
    width: 100%; height: 100%; object-fit: fill;
}

.movie-photo-img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

.movie-content-empty {
    min-height: 200px;
}

.calendar-weekday {
    font-weight: bold;
    font-size: 0.7rem;
}

.calendar-day.other-month {
    opacity: 0.3;
}

.is-hidden {
    display: none !important;
}




</style>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container-fluid">
        <div class="hero-content">

            {{-- HOD Section --}}
            @if(isset($hod) && $hod && ($hod?->status ?? 1) == 1)
                <div class="hero-text">
                    <h2><a href="{{url('hod')}}">GOC-in-C</a></h2>
                    <div class="hod-profile">
                        <div class="hod-photo">
                        </div>
                        <h3>
                            {{ $hod?->name ?? '' }}<br>
                            <span><small>{{ $hod?->designation ?? '' }}</small></span>
                        </h3>
                    </div>
                    <div class="vision-scroll">
                        {!! $hod?->description ?? '' !!}
                    </div>
                </div>
            @else
                <div class="hero-text"></div>
            @endif


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
                                                    <span class="read-more-link js-toggle-description" data-index="{{ $index }}" data-expand="1">Read more</span>
                                                @endif
                                            </div>
                                            <div class="description-full" id="desc{{ $index }}-full" >
                                                {!! $banner?->description ?? '' !!}
                                                <span class="read-more-link js-toggle-description" data-index="{{ $index }}" data-expand="0">Read less</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <button class="slider-nav prev js-prev-slide" type="button">‹</button>
                    <button class="slider-nav next js-next-slide" type="button">›</button>

                    <div class="slider-dots">
                        @for ($i = 0; $i < count($banners); $i++)
                            <span class="dot js-slider-dot {{ $i === 0 ? 'active' : '' }}" data-slide="{{ $i + 1 }}"></span>
                        @endfor
                    </div>
                </div>
            @else
                <div class="hero-slider"></div>
            @endif
        </div>
    </div>
</section>


<!-- Content Section -->
<section class="content-section">
    <div class="container-fluid">
        <div class="modern-content-grid">

            {{-- Knowledge Portal --}}
            @if(isset($knowledge) && $knowledge && ($knowledge?->status ?? 1) == 1)
                <div class="knowledge-portal">
                    <h3 class="section-title">Knowledge Portal</h3>
                    <div class="portal-content">
                        <div class="portal-image">
                            <a href="{{url('knowledge')}}">
                                <img src="{{ asset($knowledge?->image ?? 'public/website/images/default-knowledge.png') }}" class="w-100" alt="Knowledge Portal" />
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="knowledge-portal"></div>
            @endif


            {{-- What's New --}}
@if(!empty($WhatsNew))
    <div class="whats-new">
        <h3 class="section-title">What's New</h3>
        <div class="news-content">
            <div class="scroller" data-speed="fast" data-direction="down">
                <div class="tag-list scroller__inner">
                    @foreach($WhatsNew as $new)
                        @if(($new?->status ?? 1) == 1)
                            <div class="news-item">
                                <a href="{{ route('whatsnew.download', $new->id ?? 0) }}"
                                   class="news-link whatsnew-link"
                                   target="_blank"
                                   data-id="{{ $new->id }}">
                                    ▶ {{ $new?->name ?? '' }}
                                </a>

                                <span class="new-badge">
                                    <img src="{{ asset('public/website/images/new-png.png') }}" width="50px">
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif



            {{-- Important Applications --}}
            @if(!empty($applications))
                <div class="important-apps">
                    <h3 class="section-title">Important Applications</h3>
                    <div class="apps-grid">
                        @foreach($applications as $application)
                            @if(($application?->status ?? 1) == 1)
                                <div class="app-item">
                                    <a href="{{$application?->link}}" class="app-link">
                                        <img src="{{ asset($application?->image ?? 'public/website/images/default-app.png') }}" class="w-100">
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


<!-- Calendar Section -->
<section class="calendar-section">
    <div class="container-fluid">
        <div class="dashboard-grid">

            {{-- Places of Interest --}}
            @if(!empty($places))
                <div class="dashboard-column">
                    <h3 class="dashboard-title">Places Of Interest</h3>
                    <div class="places-grid">
                        @foreach($places as $place)
                            @if(($place?->status ?? 1) == 1)
                                <div class="place-item">
                                    <a href="{{asset($place?->link)}}" >
                                        <img src="{{ asset($place?->image ?? 'public/website/images/default-place.jpg') }}" alt="Place" class="place-image">
                                        {{ $place?->name ?? '' }}
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div class="dashboard-column"><h3 class="dashboard-title">Places Of Interest</h3></div>
            @endif



            {{-- Weekly Movie --}}
            @if(isset($movie) && $movie && ($movie?->status ?? 1) == 1)
                <div class="dashboard-column">
                    <h3 class="dashboard-title">Weekly Movie</h3>
                    <div class="movie-content">
                        <div class="movie-photo">
                            <img src="{{ asset($movie?->image ?? 'public/website/images/default-movie.jpg') }}" 
                                 alt="Movie Photo"
                                 class="movie-photo-img">
                        </div>
                        <div class="movie-timetable">
                            <table class="movie-schedule-table border">
                                <thead>
                                    <tr><th>Day</th><th>Time</th><th>Movie</th></tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>{{$show[0]->day}}</strong></td>
                                        <td>19:00 Hrs</td>
                                        <td class="movie-title">{{$show[0]->name}}</td>

                                    </tr>
                                    <tr>
                                        <td><strong>{{$show[1]->day}}</strong></td>
                                        <td>19:00 Hrs</td>
                                        <td class="movie-title">{{$show[1]->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{$show[2]->day}}</strong></td>
                                        <td>19:00 Hrs</td>
                                        <td class="movie-title">{{$show[2]->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{$show[3]->day}}</strong></td>
                                        <td>19:00 Hrs</td>
                                        <td class="movie-title">{{$show[3]->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{$show[4]->day}}</strong></td>
                                        <td>19:00 Hrs</td>
                                        <td class="movie-title">{{$show[4]->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{$show[5]->day}}</strong></td>
                                        <td>15:00 Hrs<br>19:00 Hrs</td>
                                       
                                        <td class="movie-title">{{$show[5]->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>{{$show[6]->day}}</strong></td>
                                        <td>18:00 Hrs</td>
                                        <td class="movie-title">{{$show[6]->name}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <div class="dashboard-column">
                    <h3 class="dashboard-title">Weekly Movie</h3>
                    <div class="movie-content movie-content-empty"></div>
                </div>
            @endif


            {{-- Social Calendar --}}
            <div class="dashboard-column">
                <h3 class="dashboard-title">Social Calendar</h3>
                <div class="social-calendar-content">
                    <div class="calendar-widget">
                        <div class="calendar-nav">
                            <button type="button" class="js-change-month" data-direction="-1">‹</button>
                            <div class="calendar-month" id="currentMonth">October 2025</div>
                            <button type="button" class="js-change-month" data-direction="1">›</button>
                        </div>
                        <div class="calendar-grid" id="calendarGrid">
                            <div class="calendar-weekday">Mo</div>
                            <div class="calendar-weekday">Tu</div>
                            <div class="calendar-weekday">We</div>
                            <div class="calendar-weekday">Th</div>
                            <div class="calendar-weekday">Fr</div>
                            <div class="calendar-weekday">Sa</div>
                            <div class="calendar-weekday">Su</div>
                        </div>
                    </div>

                    {{-- Birthday / Anniversary --}}
                    <div class="social-events">
                        <div class="event-section">
                            <div class="d-grid-new justify-content-between">
                                <div class="event-sec-1">
                                    <div class="event-title">Birthday</div>
                                    <div class="news-content">
                                        <div class="scroller" data-speed="fast" data-direction="down">
                                            <div class="tag-list scroller__inner">
                                                <div class="event-item">Mr Ram, Proj Mgr</div>
                                                <div class="event-item">Ms Sharma, Admin</div>
                                                <div class="event-item">Col Singh, Op</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="event-section">
                                    <div class="event-title">Anniversary</div>
                                    <div class="event-sec-1">
                                        <div class="news-content">
                                            <div class="scroller" data-speed="fast" data-direction="down">
                                                <div class="tag-list scroller__inner">
                                                    <div class="event-item">Mr Prakash, Proj Mgr</div>
                                                    <div class="event-item">Ms Rajeev, Admin</div>
                                                    <div class="event-item">Col Mishra, Op</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            {{-- E-News --}}
            @if(!empty($news))
                <div class="dashboard-column">
                    <h3 class="dashboard-title">E-News</h3>
                    <div class="enews-grid">
                        @foreach($news as $new)
                            @if(($new?->status ?? 1) == 1)
                                <div class="news-paper">
                                     <a href="{{ route('news.download', $new->id ?? 0) }}"
                                   class="news-paper-link d-block whatsnew-link"
                                   target="_blank"
                                   data-id="{{ $new->id }}">
                                 
        
                                <!-- <a href="{{ asset($new->pdf) }}" target="_blank" class="news-paper-link d-block"> -->
                                    <img src="{{ asset($new?->image ?? 'public/website/images/default-news.jpg') }}" class="w-100">
                                  {{ $new?->name ?? '' }}</a>
                                 </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @else
                <div class="dashboard-column"><h3 class="dashboard-title">E-News</h3></div>
            @endif

        </div>
    </div>
</section>


{{-- JS --}}
<script nonce="{{ app('cspNonce') }}">
document.addEventListener('DOMContentLoaded', function () {
    const sliderContainer = document.getElementById('sliderContainer');
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.js-slider-dot');
    const prevBtn = document.querySelector('.js-prev-slide');
    const nextBtn = document.querySelector('.js-next-slide');
    let slideIndex = 0;

    function showSlide(index) {
        if (!sliderContainer || !slides.length) return;
        slideIndex = (index + slides.length) % slides.length;
        sliderContainer.style.transform = `translateX(-${slideIndex * 100}%)`;
        dots.forEach((dot, i) => {
            dot.classList.toggle('active', i === slideIndex);
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            showSlide(slideIndex - 1);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            showSlide(slideIndex + 1);
        });
    }

    dots.forEach(dot => {
        dot.addEventListener('click', function () {
            const slideNo = parseInt(this.dataset.slide || '1', 10);
            showSlide(slideNo - 1);
        });
    });

    if (sliderContainer && slides.length) {
        showSlide(0);
        setInterval(function () {
            showSlide(slideIndex + 1);
        }, 4000);
    }

    document.querySelectorAll('.js-toggle-description').forEach(link => {
        link.addEventListener('click', function () {
            const index = this.dataset.index;
            const expand = this.dataset.expand === '1';
            const preview = document.getElementById(`desc${index}-preview`);
            const full = document.getElementById(`desc${index}-full`);
            if (!preview || !full) return;
            preview.classList.toggle('is-hidden', expand);
            full.classList.toggle('is-hidden', !expand);
        });
    });

    const currentDate = new Date();
    const monthNames = [
        "January","February","March","April","May","June",
        "July","August","September","October","November","December"
    ];

    const events = {
        birthdays: [
            { name: "Mr Ram, Proj Mgr", date: 18, month: 11 },
            { name: "Ms Sharma, Admin", date: 25, month: 11 },
            { name: "Col Singh, Operations", date: 30, month: 11 }
        ],
        anniversaries: [
            { name: "Mr Ram, Proj Mgr", date: 20, month: 11 },
            { name: "Lt Col Kumar, IT", date: 28, month: 11 },
            { name: "Maj Gupta, Training", date: 31, month: 11 }
        ]
    };

    function generateCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const today = new Date();

        const currentMonthEl = document.getElementById('currentMonth');
        const calendarGrid = document.getElementById('calendarGrid');

        if (!currentMonthEl || !calendarGrid) return;

        currentMonthEl.textContent = `${monthNames[month]} ${year}`;
        const headers = calendarGrid.innerHTML;
        calendarGrid.innerHTML = headers;

        const firstDay = new Date(year, month, 1);
        const startDate = new Date(firstDay);
        startDate.setDate(startDate.getDate() - (firstDay.getDay() + 6) % 7);

        for (let i = 0; i < 42; i++) {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + i);

            const dayElement = document.createElement('div');
            dayElement.className = 'calendar-day';
            dayElement.textContent = date.getDate();

            if (date.toDateString() === today.toDateString()) {
                dayElement.classList.add('today');
            }

            const hasEvent =
                events.birthdays.some(b => b.date === date.getDate() && b.month === date.getMonth()) ||
                events.anniversaries.some(a => a.date === date.getDate() && a.month === date.getMonth());

            if (hasEvent) dayElement.classList.add('has-event');
            if (date.getMonth() !== month) dayElement.classList.add('other-month');

            calendarGrid.appendChild(dayElement);
        }
    }

    document.querySelectorAll('.js-change-month').forEach(button => {
        button.addEventListener('click', function () {
            const direction = parseInt(this.dataset.direction || '0', 10);
            currentDate.setMonth(currentDate.getMonth() + direction);
            generateCalendar();
        });
    });

    generateCalendar();

    document.querySelectorAll('.whatsnew-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            const now = new Date();
            const localDateTime =
                now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0') + ' ' +
                String(now.getHours()).padStart(2, '0') + ':' +
                String(now.getMinutes()).padStart(2, '0') + ':' +
                String(now.getSeconds()).padStart(2, '0');

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = this.href;
            form.target = '_blank';

            const token = document.createElement('input');
            token.type = 'hidden';
            token.name = '_token';
            token.value = '{{ csrf_token() }}';

            const time = document.createElement('input');
            time.type = 'hidden';
            time.name = 'local_time';
            time.value = localDateTime;

            form.appendChild(token);
            form.appendChild(time);
            document.body.appendChild(form);
            form.submit();
            form.remove();
        });
    });
});
</script>

@endsection
