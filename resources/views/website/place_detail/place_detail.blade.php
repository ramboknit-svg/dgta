@extends('website.app_new')
 @section('content')
 <style nonce="{{ app('cspNonce') }}">
    

   
    /* Branch bar */
   .branch-bar {
    background: #ffffff;
    color: #5a0a12;
    text-align: center;
    padding: 8px;
    font-weight: bold;
    font-size: 22px;
    box-shadow: rgb(227 227 227) 1.95px 1.95px 2.6px;
      
    }

    /* Main layout */
    main {
      display: flex;
      padding: 20px;
      gap: 20px;
      background-color: #7b0c17;
    }

    /* Sidebar */
    aside {
      flex: 0 0 300px;
      background: #fff;
      padding: 15px;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0,0,0,0.2);
    }
    aside h3 {
      background: #7b0c17;
      color: #fff;
      padding: 8px;
      text-align: center;
      font-size: 23px;
      border-radius: 5px;
      margin-bottom: 15px;
    }
    .profile-photo {
      width: 100%;
      height: 150px;
      background: #ccc;
      border-radius: 8px;
      margin-bottom: 15px;
    }
    .sidebar-item {
      position: relative;
    }
    aside button {
      display: block;
      width: 100%;
      padding: 10px 20px;
     margin-bottom: 14px;
      background: linear-gradient(45deg, #890a1d, #cc1030);
    border-radius: 8px;
      color: #fff;
      border: none;
          box-shadow: rgb(255 255 255 / 80%) 1.95px 1.95px 2.6px;
     font-size: 20px;
      cursor: pointer;
      transition: 0.3s;
      text-align: left;
	      font-weight: 600;
    }
    aside button:hover, aside button.active {
      background: #7b0c17;
    color: #ffd1d6;
    box-shadow: 0 0 12px rgba(255, 204, 0, 0.6);
    transition: unset;
    transform: scale(1.01);
    z-index: 9;
    }

    /* Sidebar dropdown */
    .sidebar-dropdown {
      position: absolute;
      left: 100%;
      top: 0;
      background: #5a0a12;
      border-radius: 5px;
      min-width: 180px;
      opacity: 0;
      pointer-events: none;
      transform: translateY(10px);
      transition: all 0.3s ease;
    }
    .sidebar-dropdown a {
      display: block;
      padding: 10px;
      color: #fff;
      font-size: 13px;
      text-decoration: none;
      transition: 0.3s;
    }
    .sidebar-dropdown a:hover {
      background: #7b0c17;
  
    }
    .sidebar-item:hover .sidebar-dropdown {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
    }

    /* Content */
    section.content {
      flex: 1;
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0,0,0,0.2);
      min-height: 400px;
      font-size: 14px;
      animation: fadeIn 0.5s ease;
	  /* max-height: 500px; */
    /* overflow-y: scroll; */
    }

    

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
	
	nav.submenu-layer-btn ul.links li:last-child {
    margin-bottom: 14px;
}
	
  

  /* CSP-safe extracted styles */
  .csp-slider-static { display: block !important; transform: none !important; }
.csp-slider-static .slide { display: none !important; }
.csp-slider-static .slide.active { display: block !important; }
.nav-links.csp-nav-open { left: 0 !important; }
.calendar-day.other-month { opacity: 0.3; }

  </style>



  <div class="branch-bar">{{$place_detail->place->name}}</div>

  <main>
    <aside>
      
                <!-- <div class="hod-profile"> -->
                   <!-- <div class="hod-photo branch" style=""> -->
				   <!-- <img src="images/hod.jpg"> -->
				   <!-- </div> -->
				    <!-- <h3 style=" ">Mr. Ram Upadhyay, -->
                        <!-- <br><span><small>Lt. General</small></span></h3> -->
                  <!-- <div class="btn-btn-success db-btn"><a href="#!">DOWNLOAD</a></div> -->
                  
                 <!-- </div> -->
                
				  <button class="tab-btn" data-tab="history">Brief History</button>
				  
    
   
				  
      <button class="tab-btn" data-tab="gallery">Gallery</button>
	  
     

     
    </aside>

    <section class="content place active" id="content-area">
      <h2 class="charter-duties">Welcome to Infosys Management</h2>
	  
	  {!!$place_detail->description !!}
  
  
    </section>
	
	
	 <section class="content place" id="gallery">
      <h2 class="charter-duties">Gallery</h2>
	  
	  <div class="sectionunder-content">
      <div class="hero-slider">
                    <div class="slider-container" id="sliderContainer">
                        <div class="slide">
                            <img src="{{asset($place_detail->gallery)}}" alt="HOD Leadership" />
                            
                        </div>
                        
                       
                    </div>
                    
                </div>
  </div>
  
  
  
    </section>
	
	 <section class="content place" id="history">
      <h3 class="charter-duties" id="charter"> Brief History</h3>
	   
            {!!$place_detail->history !!}
    </section>
	
	 <section class="content place" id="link1">
      <h3 class="charter-duties" id="charter"> PDF</h3>
	   <div class="sectionunder-content">
       <iframe src="{{asset($place_detail->link1)}}"></iframe>
		</div>
  
  
    </section>
	
	 <section class="content place" id="link2">
      <h3 class="charter-duties" id="charter"> PDF</h3>
	   <div class="sectionunder-content">
        <iframe src="{{asset($place_detail->link2)}}"></iframe>
  
		</div>
  
  
    </section>
	
	
	
 
 </main>

   

	
	<script nonce="{{ app('cspNonce') }}">
/* ----------- TABS ----------- */
const tabs = document.querySelectorAll(".tab-btn");
const contents = document.querySelectorAll(".content");

tabs.forEach(btn => {
    btn.addEventListener("click", () => {
        tabs.forEach(b => b.classList.remove("active"));
        contents.forEach(c => c.classList.remove("active"));

        btn.classList.add("active");
        document.getElementById(btn.dataset.tab).classList.add("active");

        // Re-initialize slider only if gallery tab is clicked
        if (btn.dataset.tab === "gallery") {
            showSlides(slideIndex);
        }
    });
});
</script>

     <script nonce="{{ app('cspNonce') }}">

    const buttons = document.querySelectorAll('.tab-btn');
    const contentArea = document.getElementById('content-area');

    buttons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const tab = btn.getAttribute('data-tab');
        contentArea.innerHTML = content[tab];
      });
    });
     </script>


    <script nonce="{{ app('cspNonce') }}">
        // search-box open close js code
        let navbar = document.querySelector(".navbar");
        let searchBox = document.querySelector(".search-box .fa-search");
        // let searchBoxCancel = document.querySelector(".search-box .bx-x");

        searchBox.addEventListener("click", () => {
            navbar.classList.toggle("showInput");
            if (navbar.classList.contains("showInput")) {
                searchBox.classList.replace("fa-search", "fa-search");
            } else {
                searchBox.classList.replace("fa-search", "fa-search");
            }
        });

        // sidebar open close js code
        let navLinks = document.querySelector(".nav-links");
        let menuOpenBtn = document.querySelector(".navbar .fa-bars");
        let menuCloseBtn = document.querySelector(".nav-links .fa-times");
        if (menuOpenBtn && navLinks) {
            menuOpenBtn.addEventListener("click", function () {
                navLinks.classList.add("csp-nav-open");
            });
        }
        if (menuCloseBtn && navLinks) {
            menuCloseBtn.addEventListener("click", function () {
                navLinks.classList.remove("csp-nav-open");
            });
        }

        // sidebar submenu open close js code
        let htmlcssArrow = document.querySelector(".htmlcss-arrow");
        if (htmlcssArrow && navLinks) {
            htmlcssArrow.addEventListener("click", function () {
                navLinks.classList.toggle("show1");
            });
        }
        let moreArrow = document.querySelector(".more-arrow");
        if (moreArrow && navLinks) {
            moreArrow.addEventListener("click", function () {
                navLinks.classList.toggle("show2");
            });
        }
        let jsArrow = document.querySelector(".js-arrow");
        if (jsArrow && navLinks) {
            jsArrow.addEventListener("click", function () {
                navLinks.classList.toggle("show3");
            });
        }

    </script>

    <script nonce="{{ app('cspNonce') }}">
        window.onscroll = function () { myFunction() };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
        function toggleDescriptionFromButton(button) {
            const container = button.closest('.slide-description');
            if (!container) return;
            const preview = container.querySelector('.description-preview');
            const full = container.querySelector('.description-full');
            if (!preview || !full) return;
            preview.classList.toggle('csp-hidden');
            full.classList.toggle('csp-hidden');
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.slide-description .description-full').forEach(function (full) {
                full.classList.add('csp-hidden');
            });

            document.querySelectorAll('.csp-toggle-desc').forEach(function (button) {
                button.addEventListener('click', function () {
                    toggleDescriptionFromButton(button);
                });
            });
        });
    </script>

    <script nonce="{{ app('cspNonce') }}">
        const scrollers = document.querySelectorAll(".scroller");

        if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
            addAnimation();
        }

        function addAnimation() {
            scrollers.forEach((scroller) => {
                scroller.setAttribute("data-animated", true);

                const scrollerInner = scroller.querySelector(".scroller__inner");
                const scrollerContent = Array.from(scrollerInner.children);

                scrollerContent.forEach((item) => {
                    const duplicatedItem = item.cloneNode(true);
                    duplicatedItem.setAttribute("aria-hidden", true);
                    scrollerInner.appendChild(duplicatedItem);
                });

                // 👇 Pause on hover + enable manual scroll
                scroller.addEventListener("mouseenter", () => {
                    scroller.classList.add("paused");
                });

                // 👇 Resume auto scroll when leaving
                scroller.addEventListener("mouseleave", () => {
                    scroller.classList.remove("paused");
                    scroller.scrollTop = 0; // reset position
                });
            });
        }

    </script>

    <script nonce="{{ app('cspNonce') }}">
        // Added slider functionality
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const sliderContainer = document.getElementById('sliderContainer');

        if (sliderContainer) {
            sliderContainer.classList.add('csp-slider-static');
        }

        function showSlide(index) {
            if (!slides.length) return;
            slideIndex = (index + slides.length) % slides.length;
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === slideIndex);
            });

            // Update dots
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === slideIndex);
            });
        }

        function nextSlide() {
            if (!slides.length) return;
            slideIndex = (slideIndex + 1) % slides.length;
            showSlide(slideIndex);
        }

        function prevSlide() {
            if (!slides.length) return;
            slideIndex = (slideIndex - 1 + slides.length) % slides.length;
            showSlide(slideIndex);
        }

        function currentSlide(index) {
            showSlide(index - 1);
        }

        document.querySelectorAll('.csp-prev-slide').forEach((button) => {
            button.addEventListener('click', function () {
                prevSlide();
            });
        });

        document.querySelectorAll('.csp-next-slide').forEach((button) => {
            button.addEventListener('click', function () {
                nextSlide();
            });
        });

        document.querySelectorAll('.csp-dot-trigger').forEach((button, index) => {
            button.addEventListener('click', function () {
                const target = Number(button.getAttribute('data-slide-index') || (index + 1));
                currentSlide(target);
            });
        });

        // Auto-play functionality
        if (slides.length) {
            showSlide(0);
            setInterval(nextSlide, 4000); // Change slide every 4 seconds
        }

        function toggleMenu() {
            const nav = document.getElementById('mainNav');
            nav.classList.toggle('active');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function (event) {
            const nav = document.getElementById('mainNav');
            const toggle = document.querySelector('.menu-toggle');

            if (!nav.contains(event.target) && !toggle.contains(event.target)) {
                nav.classList.remove('active');
            }
        });

        // Close mobile menu when window is resized to desktop
        window.addEventListener('resize', function () {
            if (window.innerWidth > 768) {
                document.getElementById('mainNav').classList.remove('active');
            }
        });

        let currentDate = new Date();
        const monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];

        // Sample events data
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

            document.getElementById('currentMonth').textContent = `${monthNames[month]} ${year}`;

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startDate = new Date(firstDay);
            startDate.setDate(startDate.getDate() - (firstDay.getDay() + 6) % 7);

            const calendarGrid = document.getElementById('calendarGrid');
            // Clear existing days (keep headers)
            const headers = calendarGrid.querySelectorAll('div:nth-child(-n+7)');
            calendarGrid.innerHTML = '';
            headers.forEach(header => calendarGrid.appendChild(header));

            // Generate calendar days
            for (let i = 0; i < 42; i++) {
                const date = new Date(startDate);
                date.setDate(startDate.getDate() + i);

                const dayElement = document.createElement('div');
                dayElement.className = 'calendar-day';
                dayElement.textContent = date.getDate();

                // Highlight today
                if (date.toDateString() === today.toDateString()) {
                    dayElement.classList.add('today');
                }

                // Check for events
                const hasEvent = events.birthdays.some(b => b.date === date.getDate() && b.month === date.getMonth()) ||
                    events.anniversaries.some(a => a.date === date.getDate() && a.month === date.getMonth());

                if (hasEvent) {
                    dayElement.classList.add('has-event');
                }

                // Dim days from other months
                if (date.getMonth() !== month) {
                    dayElement.classList.add('other-month');
                }

                calendarGrid.appendChild(dayElement);
            }

            updateEventLists();
        }

        function updateEventLists() {
            const month = currentDate.getMonth();

            // Update birthday list
            const birthdayList = document.getElementById('birthdayList');
            birthdayList.innerHTML = '';
            events.birthdays.filter(b => b.month === month).forEach(birthday => {
                const item = document.createElement('div');
                item.className = 'event-item';
                item.textContent = `${birthday.name} - ${monthNames[month].substr(0, 3)} ${birthday.date}`;
                birthdayList.appendChild(item);
            });

            // Update anniversary list
            const anniversaryList = document.getElementById('anniversaryList');
            anniversaryList.innerHTML = '';
            events.anniversaries.filter(a => a.month === month).forEach(anniversary => {
                const item = document.createElement('div');
                item.className = 'event-item';
                item.textContent = `${anniversary.name} - ${monthNames[month].substr(0, 3)} ${anniversary.date}`;
                anniversaryList.appendChild(item);
            });
        }

        function changeMonth(direction) {
            currentDate.setMonth(currentDate.getMonth() + direction);
            generateCalendar();
        }

        // Initialize calendar when page loads
        document.addEventListener('DOMContentLoaded', function () {
            generateCalendar();
        });
        function getCurrentSection() {
            const sections = document.querySelectorAll('.hero-section, .content-section, .calendar-section');
            let currentSection = 'hero-section';

            sections.forEach(section => {
                const rect = section.getBoundingClientRect();
                if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 2) {
                    currentSection = section.className.split(' ')[0];
                }
            });

            return currentSection;
        }
    </script>


 @endsection
