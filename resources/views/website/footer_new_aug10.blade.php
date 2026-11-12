@php
    use App\Models\HitCount;

    $month = now()->format('F');
    $year  = now()->format('Y');

    $todayHits = HitCount::where('date', now()->toDateString())->count();

    $monthHits = HitCount::where('date', 'LIKE', now()->format('Y-m') . '%')
                         ->count();

    $yearHits = HitCount::where('date', 'LIKE', now()->format('Y') . '%')
                        ->count();
@endphp

<!-- Updated Footer to be simpler -->
<footer class="footer">
    <div class="container-fluid">
        <div class="footer-content">
            <div class="footer-info">
                <p>
                    <strong>
                        Copyright ©2025 Developed By HOD & Maintained By HR **
                        Vetted by CDG on 26 Nov 2025 **
                    </strong>
                </p>
            </div>

            <div class="hit-counter-section">
                <div class="hit-counter-title"> Hit Counter</div>
                <div class="date-display">
                   <span>Today <div class="number">{{ $todayHits }}</div></span>
<span>{{ $month }} <div class="number">{{ $monthHits }}</div></span>
<span>{{ $year }} <div class="number">{{ $yearHits }}</div></span>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- ================= BOOTSTRAP ================= -->
<script nonce="{{ app('cspNonce') }}" src="{{ asset('public/website/js/bootstrap.bundle.min.js') }}"></script>

<!-- ================= FOOTER JS ================= -->

<script nonce="{{ app('cspNonce') }}">
document.addEventListener("DOMContentLoaded", function () {

    const navLinks = document.querySelector(".nav-links");
    const navbar  = document.querySelector(".navbar");

    const menuOpen  = document.querySelector(".navbar .fa-bars");
    const menuClose = document.querySelector(".nav-links .fa-times");

    const goToLink      = document.querySelector(".go-to-link");
    const bulletinLink  = document.querySelector(".bulletin-link");

    const htmlArrow = document.querySelector(".htmlcss-arrow");
    const jsArrow   = document.querySelector(".js-arrow");

    const moreItems = document.querySelectorAll(".more");

    /* ---------------- MOBILE MENU ---------------- */
    menuOpen.addEventListener("click", function (e) {
        e.stopPropagation();
        navLinks.style.left = "0";
    });

    menuClose.addEventListener("click", function (e) {
        e.stopPropagation();
        closeAll();
    });

    /* ---------------- UTILITIES ---------------- */
    function closeAll() {
        navLinks.style.left = "-100%";
        navLinks.classList.remove("show1", "show2", "show3");
        closeNested();
        resetArrows();
        announce("Menu closed");
    }

    function closeNested() {
        moreItems.forEach(item => {
            item.classList.remove("open");
            item.setAttribute("aria-expanded", "false");
        });
    }

    function resetArrows() {
        if (htmlArrow) htmlArrow.style.transform = "rotate(0deg)";
        if (jsArrow) jsArrow.style.transform = "rotate(0deg)";
        document.querySelectorAll(".more-arrow").forEach(a => {
            a.style.transform = "rotate(0deg)";
        });
    }

    function announce(text) {
        let live = document.getElementById("sr-live");
        if (!live) {
            live = document.createElement("div");
            live.id = "sr-live";
            live.className = "sr-only";
            live.setAttribute("aria-live", "polite");
            document.body.appendChild(live);
        }
        live.textContent = text;
    }

    /* ---------------- GO TO ---------------- */
    goToLink.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        const open = navLinks.classList.contains("show1");
        navLinks.classList.remove("show3");
        resetArrows();

        if (!open) {
            navLinks.classList.add("show1", "show2"); // show2 REQUIRED
            htmlArrow.style.transform = "rotate(180deg)";
            announce("Go To menu opened");
        } else {
            navLinks.classList.remove("show1", "show2");
            announce("Go To menu closed");
        }
    });

    /* ---------------- BULLETINS ---------------- */
    bulletinLink.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        const open = navLinks.classList.contains("show3");
        navLinks.classList.remove("show1", "show2");
        resetArrows();

        if (!open) {
            navLinks.classList.add("show3");
            jsArrow.style.transform = "rotate(180deg)";
            announce("Bulletins menu opened");
        } else {
            navLinks.classList.remove("show3");
            announce("Bulletins menu closed");
        }
    });

    /* ---------------- COMDS & BRANCHES ---------------- */
    moreItems.forEach(item => {
        const trigger = item.querySelector("span");
        const arrow   = item.querySelector(".more-arrow");

        trigger.addEventListener("click", function (e) {
            e.preventDefault();
            e.stopPropagation();

            const isOpen = item.classList.contains("open");

            closeNested();
            resetArrows();

            if (!isOpen) {
                navLinks.classList.add("show2"); // required for CSS
                item.classList.add("open");
                item.setAttribute("aria-expanded", "true");
                arrow.style.transform = "rotate(90deg)";
                announce(trigger.innerText.trim() + " opened");
            }
        });

        // keyboard support
        trigger.addEventListener("keydown", function (e) {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                trigger.click();
            }
        });
    });

    /* ---------------- AUTO CLOSE ON LINK CLICK ---------------- */
    document.querySelectorAll(".sub-menu a").forEach(link => {
        link.addEventListener("click", function () {
            closeAll();
        });
    });

    /* ---------------- ESC CLOSE ---------------- */
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            closeAll();
        }
    });

    /* ---------------- CLICK OUTSIDE CLOSE ---------------- */
    document.addEventListener("click", function (e) {
        if (!e.target.closest(".navbar")) {
            closeAll();
        }
    });

});
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

<script nonce="{{ app('cspNonce') }}">
(function () {
    "use strict";

    
    /* ================= STICKY HEADER ================= */
    const header = document.getElementById("myHeader");
    if (header) {
        const sticky = 500;
        const placeholder = document.createElement("div");
        placeholder.style.height = header.offsetHeight + "px";
        placeholder.style.display = "none";
        header.parentNode.insertBefore(placeholder, header);

        window.addEventListener("scroll", () => {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
                placeholder.style.display = "block";
            } else {
                header.classList.remove("sticky");
                placeholder.style.display = "none";
            }
        });
    }

    /* ================= SCROLLER ================= */
    const scrollers = document.querySelectorAll(".scroller");
    scrollers.forEach(scroller => {
        scroller.addEventListener("mouseenter", () => scroller.classList.add("paused"));
        scroller.addEventListener("mouseleave", () => scroller.classList.remove("paused"));
    });

    /* ================= SLIDER ================= */
    let slideIndex = 0;
    const sliderContainer = document.getElementById("sliderContainer");
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");

    function showSlide(index) {
        if (!sliderContainer || slides.length === 0) return;
        slideIndex = index;
        sliderContainer.style.transform = `translateX(-${slideIndex * 100}%)`;
        dots.forEach((dot, i) => dot.classList.toggle("active", i === slideIndex));
    }

    function nextSlide() {
        if (slides.length === 0) return;
        slideIndex = (slideIndex + 1) % slides.length;
        showSlide(slideIndex);
    }

    if (slides.length > 0) {
        setInterval(nextSlide, 4000);
    }

    /* ================= CALENDAR ================= */
    const monthNames = ["January","February","March","April","May","June",
        "July","August","September","October","November","December"];

    let currentDate = new Date();

    const currentMonth = document.getElementById("currentMonth");
    const calendarGrid = document.getElementById("calendarGrid");
    const birthdayList = document.getElementById("birthdayList");
    const anniversaryList = document.getElementById("anniversaryList");

    if (currentMonth && calendarGrid) {
        currentMonth.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
    }

})();
</script>

</body>

</html>
