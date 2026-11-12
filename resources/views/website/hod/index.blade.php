
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFOSIS MANAGEMENT</title>

<link href="{{ asset('public/website/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/website/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/website/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/website/font/css/all.min.css') }}" rel="stylesheet">

   <link rel="icon" href="{{ asset('public/website/images/indian-aermy-1.png') }}" sizes="32x32" />
    
 
    

</head>

<style nonce="{{ app('cspNonce') }}">



.links li.active {
    color: #fff !important;
    background: linear-gradient(45deg, #fff628c7, #d93752) !important;
    padding: 5px 10px;
    border-radius: 4px;
}
.hero-slider {
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    height: 440px;
}
.layout-container {
    display: flex
;
    /* height: 100vh; */
    gap: 10px;
    padding: 30px 20px;
    position: relative;
}
.sidebar-item img {
    height: 100px;
    width: 100%;
    object-fit: cover;
}
.hod-main-section {
    flex: 1 1 0%;
}
.sidebar-item {
    height: 200%;
}
.main-content {
    margin-bottom: 20px;
}
.main-content:last-child {
    margin-bottom: 0px;
}
h3.hod-heading
 {
    text-decoration: underline;
    text-underline-position: under;
}


  /* CSP-safe extracted styles */
  .csp-hod-photo-cover { height: 300px; border-radius: 12px; background: url('{{ asset('public/website/images/hod.jpg') }}') center/cover; margin: 1rem auto; border: 3px solid rgba(255,255,255,0.3); }
  .csp-hod-name { text-align: center; margin: 1rem 0; font-size: 1.3rem; }
  .csp-hidden { display: none !important; }
  .csp-footer-inline { background: #000; color: white; text-align: center; }
  .csp-slider-static { display: block !important; transform: none !important; }
.csp-slider-static .slide { display: none !important; }
.csp-slider-static .slide.active { display: block !important; }
.nav-links.csp-nav-open { left: 0 !important; }
.calendar-day.other-month { opacity: 0.3; }

  </style>

<body>
    <!-- Header -->
    <header class="header"  id="myHeader">
         <div class="container-fluid">
            <div class="header-container">
                <a href="#">
                    <div class="logo-placeholder"><img src="{{asset('public/website/logo1.png')}}" class="w-100" ></div>
                </a>
                <div class="header-title-area">



                    <div class="header-title-top">ARMY TRAINING COMMAND</div>
                    <div class="header-title-main">EXCELLENCE IN THE ART & SCIENCE OF WAR</div>
                    <div class="header-title-sanskrit">युद्धकला समरविज्ञाने च श्रेष्ठता</div>
                </div>
               <a href="#">
                    <div class="logo-placeholder not-circle"><img src="{{asset('public/website/logo.png')}}" class="w-100"></div>
                </a>
            </div>
        </div>
        <nav>
  <div class="navbar">
         <i class='fa fa-bars'></i>
                <!-- <div class="logo"><a href="#">Logo</a></div> -->
                <div class="nav-links">
                    <div class="sidebar-logo">
                        <!-- <span class="logo-name">Logo</span> -->
                        <i class='fa fa-times'></i>
                    </div>
      <ul class="links">
       
      
        <li><a href="{{url('')}}" class="menu-link">HOME</a></li>
        <li><a href="#profile" class="menu-link">PROFILE</a></li>
        <li><a href="#mission" class="menu-link">MISSION</a></li>
         <li><a href="#a">PROMISSORY NOTES </a></li>
          <li><a href="#b">DIRECTIVES</a></li>
           <li><a href="#c">SPECIAL  ORDER</a></li>
           <li><a href="#d">READING LIST</a></li>
              <li><a href="#e">UNIT CITATION</a></li>
              <li><a href="#f">COMMENDATION</a></li>
                <!-- <div class="search-box">
      <i class='fa fa-search'></i>
      <div class="input-box">
        <input type="text" placeholder="Search...">
      </div> -->
    </div>
      </ul>
    </div>
  
  </div>
</nav>
       
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container-fluid">
        <div class="hero-content">
            <div class="hero-text">
               
                <div class="hod-profile">
                   <div class="hod-photo csp-hod-photo-cover" 
    >
</div>

                  <div class="btn-btn-success"><a href="{{asset('public/website/images/hod.jpg')}}" download>DOWNLOAD</a></div>
                   <h3 class="csp-hod-name">Mr. Ram Upadhyay,
                            <br><span><small>Lt. General</small></span></h3>
                </div>
               
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
                                                    <span class="read-more-link csp-toggle-desc">Read more</span>
                                                @endif
                                            </div>
                                            <div class="description-full csp-hidden" id="desc{{ $index }}-full">
                                                {!! $banner?->description ?? '' !!}
                                                <span class="read-more-link csp-toggle-desc">Read less</span>
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
 
 <div class="layout-container">
        <!-- Left Sidebar -->
        <div class="sidebar">
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
        </div>

         <!-- Main Content Area -->
		   <div class="hod-main-section">
        <div class="main-content" id="profile">
            <h3 class="hod-heading">Profile</h3>
            <div class="profile-photo-container">
              <img src="{{asset('public/website/images/hod.jpg')}}" alt="HOD-IN-C Photo" class="profile-photo" width="100%">
            </div>
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>

  <div class="main-content" id="mission">
		<h3 class="hod-heading">MISSION</h3>
            <!-- <div class="profile-photo-container"> -->
              <!-- <img src="images/hod.jpg" alt="HOD-IN-C Photo" class="profile-photo" width="100%"> -->
            <!-- </div> -->
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>


 <div class="main-content" id="a">
		<h3 class="hod-heading">PROMISSORY NOTES </h3>
            <!-- <div class="profile-photo-container"> -->
              <!-- <img src="images/hod.jpg" alt="HOD-IN-C Photo" class="profile-photo" width="100%"> -->
            <!-- </div> -->
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>

         <div class="main-content" id="b">
		<h3 class="hod-heading">DIRECTIVES</h3>
            <!-- <div class="profile-photo-container"> -->
              <!-- <img src="images/hod.jpg" alt="HOD-IN-C Photo" class="profile-photo" width="100%"> -->
            <!-- </div> -->
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>

         <div class="main-content" id="c">
		<h3 class="hod-heading">SPECIAL  ORDER</h3>
            <!-- <div class="profile-photo-container"> -->
              <!-- <img src="images/hod.jpg" alt="HOD-IN-C Photo" class="profile-photo" width="100%"> -->
            <!-- </div> -->
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>

         <div class="main-content" id="d">
		<h3 class="hod-heading">READING LIST</h3>
            <!-- <div class="profile-photo-container"> -->
              <!-- <img src="images/hod.jpg" alt="HOD-IN-C Photo" class="profile-photo" width="100%"> -->
            <!-- </div> -->
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>

         <div class="main-content" id="e">
		<h3 class="hod-heading">UNIT CITATION</h3>
            <!-- <div class="profile-photo-container"> -->
              <!-- <img src="images/hod.jpg" alt="HOD-IN-C Photo" class="profile-photo" width="100%"> -->
            <!-- </div> -->
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>

         <div class="main-content" id="f">
		<h3 class="hod-heading">COMMENDATION</h3>
            <!-- <div class="profile-photo-container"> -->
              <!-- <img src="images/hod.jpg" alt="HOD-IN-C Photo" class="profile-photo" width="100%"> -->
            <!-- </div> -->
            
            <div class="content-area">
              <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation
 Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
  <p>Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation. Transforming military information systems through strategic planning and technological advancement is at the core of our mission.
Fostering collaboration and innovation to achieve operation</p>
 

            </div>

            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
              
            </div>
        </div>






  </div>

       <!-- Right Sidebar -->
        <div class="sidebar">
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
            <div class="sidebar-item"><img src="{{asset('public/website/images/hod.jpg')}}" width="100%" height="100%"></div>
        </div>
    </div>

    <!-- Updated Footer to be simpler -->
    <footer class="footer csp-footer-inline">
        <div class="container-fluid">
           <div class="footer-content">
                    <div class="footer-info">
                        <p><strong>Copyright ©2025 Developed By HOD & Maintained By HR**</strong></p>
                        <p><strong>Vetted by CDG on 14 Nov 2023 **</strong></p>
                    </div>
                    <div class="hit-counter-section">
                        <div class="hit-counter-title">Hit Counter</div>
                        
                        <div class="date-display">
                        <span>Today <div class="number">2</div></span>
                         <span>January <div class="number">5</div></span>
                         <span>2026 <div class="number">5</div></span> </div>
                    </div>
                </div>
        </div>
    </footer>

   
	
	
	
	<script nonce="{{ app('cspNonce') }}">
const sections = document.querySelectorAll(" #profile, #mission, #a, #b, #c, #d, #e, #f, #g");
const menuItems = document.querySelectorAll(".links li"); // li items

window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(section => {
        let sectionTop = section.offsetTop - 150; 
        let sectionHeight = section.clientHeight;

        if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
            current = section.getAttribute("id");
        }
    });

    menuItems.forEach(li => {
        li.classList.remove("active");

        const link = li.querySelector("a");
        if (link && link.getAttribute("href") === "#" + current) {
            li.classList.add("active");
        }
    });
});
</script>


  
 
  <script nonce="{{ app('cspNonce') }}">
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
  
</script>
 
<!-- SLIDER -->
<script nonce="{{ app('cspNonce') }}">
document.addEventListener('DOMContentLoaded', function () {

    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const sliderContainer = document.getElementById('sliderContainer');

    const prevBtn = document.getElementById('prevSlideBtn');
    const nextBtn = document.getElementById('nextSlideBtn');

    if (!slides.length || !sliderContainer) return;

    let slideIndex = 0;
    let timer = null;

    function updateDots() {
        dots.forEach(function (dot, i) {
            dot.classList.toggle('active', i === slideIndex);
        });
    }

    function showSlide(index) {
        slideIndex = (index + slides.length) % slides.length;
        sliderContainer.style.transform = 'translateX(-' + (slideIndex * 100) + '%)';
        updateDots();
    }

    function nextSlide() {
        showSlide(slideIndex + 1);
    }

    function prevSlide() {
        showSlide(slideIndex - 1);
    }

    function startAuto() {
        stopAuto();
        timer = setInterval(nextSlide, 4000);
    }

    function stopAuto() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            nextSlide();
            startAuto();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            prevSlide();
            startAuto();
        });
    }

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            const index = parseInt(this.getAttribute('data-slide'), 10);
            showSlide(index);
            startAuto();
        });
    });

    document.querySelectorAll('.js-toggle-description').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const index = this.getAttribute('data-index');
            const expanded = this.getAttribute('data-expanded') === 'true';

            const preview = document.getElementById('desc' + index + '-preview');
            const full = document.getElementById('desc' + index + '-full');

            if (!preview || !full) return;

            if (expanded) {
                preview.style.display = 'block';
                full.style.display = 'none';
            } else {
                preview.style.display = 'none';
                full.style.display = 'block';
            }
        });
    });

    showSlide(0);
    startAuto();
});
</script>
</body>
</html>
