@php
    use App\Models\HitCount;

    $month = now()->format('F');
    $year  = now()->format('Y');

    $todayHits = HitCount::whereDate('date', now()->toDateString())
        ->count();

    $monthHits = HitCount::whereYear('date', now()->year)
        ->whereMonth('date', now()->month)
        ->count();

    $yearHits = HitCount::whereYear('date', now()->year)
        ->count();
@endphp


<style nonce="{{ app('cspNonce') }}">
/* =========================================================
   ATTRACTIVE FLOATING HIT COUNTER
   ========================================================= */

.floating-hit-counter {
    position: fixed;
    right: 18px;
    bottom: 22px;
    z-index: 99999;

    width: 175px;
    padding: 5px 15px 5px;

    background:
        linear-gradient(
            145deg,
            rgba(22, 66, 41, 0.98),
            rgba(7, 45, 27, 0.98)
        );

    color: #ffffff;

    border: 1px solid rgba(255, 215, 0, 0.9);
    border-radius: 18px;

    box-shadow:
        0 12px 30px rgba(0, 0, 0, 0.42),
        inset 0 1px 0 rgba(255, 255, 255, 0.14),
        0 0 0 4px rgba(255, 215, 0, 0.08);

    overflow: hidden;

    opacity: 1;
    visibility: visible;
    pointer-events: auto;

    transform: translateY(0) scale(1);

    transition:
        opacity 0.35s ease,
        visibility 0.35s ease,
        transform 0.35s ease;
}

/* Decorative light effect */
.floating-hit-counter::before {
    content: "";
    position: absolute;
    top: -45px;
    right: -35px;

    width: 105px;
    height: 105px;

    background: rgba(255, 215, 0, 0.12);
    border-radius: 50%;

    pointer-events: none;
}

.floating-hit-counter::after {
    content: "";
    position: absolute;
    left: 18px;
    right: 18px;
    top: 44px;

    height: 1px;

    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 215, 0, 0.75),
        transparent
    );

    pointer-events: none;
}

/* Floating counter hide state */
.floating-hit-counter.hide-hit-counter {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;

    transform: translateY(30px) scale(0.94);
}

.floating-hit-counter .hit-counter-title {
    position: relative;
    z-index: 2;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    margin: 0 0 13px;

    color: #ffd700;

    font-size: 14px;
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}

.floating-hit-counter .hit-counter-title::before {
    content: "◉";

    color: #ffffff;
    font-size: 11px;

    animation: hitCounterPulse 1.6s infinite;
}

.floating-hit-counter .date-display {
    position: relative;
    z-index: 2;

    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
}

.floating-hit-counter .date-display span {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    min-height: 58px;
    padding: 7px 4px;

    background: rgba(255, 255, 255, 0.07);

    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 11px;

    color: rgba(255, 255, 255, 0.92);

    font-size: 12px;
    font-weight: 500;
    line-height: 1.2;

    transition:
        background 0.25s ease,
        transform 0.25s ease,
        border-color 0.25s ease;
}

.floating-hit-counter .date-display span:hover {
    background: rgba(255, 215, 0, 0.14);
    border-color: rgba(255, 215, 0, 0.6);

    transform: translateY(-2px);
}

.floating-hit-counter .number {
    margin-top: 5px;

    color: #ffd700;

    font-size: 18px;
    font-weight: 800;
    line-height: 1;
}

@keyframes hitCounterPulse {
    0%,
    100% {
        opacity: 1;
        transform: scale(1);
    }

    50% {
        opacity: 0.55;
        transform: scale(1.3);
    }
}


/* =========================================================
   FOOTER HIT COUNTER
   ========================================================= */

.footer {
    background: #000000;
    color: #ffffff;
    padding: 10px 0;
    text-align: center;
}

.footer .footer-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
}

.footer .footer-info {
    flex: 1;
    text-align: center;
}

.footer .footer-info p {
    margin: 0;

    color: #ffffff;

    font-size: 13px;
    line-height: 1.5;
}

.footer-hit-counter {
    flex: 0 0 auto;

    min-width: 166px;
    padding: 9px 12px;

    background: linear-gradient(
        135deg,
        #164229,
        #0d2e1c
    );

    border: 1px solid #ffd700;
    border-radius: 10px;

    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

.footer-hit-counter .hit-counter-title {
    margin-bottom: 6px;

    color: #ffd700;

    font-size: 14px;
    font-weight: 700;
    line-height: 1.2;
}

.footer-hit-counter .date-display {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 22px;
}

.footer-hit-counter .date-display span {
    display: flex;
    flex-direction: column;
    align-items: center;

    color: #ffffff;

    font-size: 12px;
    line-height: 1.3;
}

.footer-hit-counter .number {
    margin-top: 3px;

    color: #ffffff;

    font-size: 14px;
    font-weight: 700;
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 767px) {

    .floating-hit-counter {
        right: 8px;
        bottom: 12px;

        width: 205px;
        padding: 11px 10px;
        border-radius: 14px;
    }

    .floating-hit-counter .hit-counter-title {
        margin-bottom: 10px;
        font-size: 13px;
    }

    .floating-hit-counter .date-display {
        gap: 5px;
    }

    .floating-hit-counter .date-display span {
        min-height: 50px;
        padding: 5px 2px;

        font-size: 10px;
    }

    .floating-hit-counter .number {
        font-size: 15px;
    }

    .footer .footer-content {
        flex-direction: column;
        justify-content: center;
        gap: 10px;
    }

    .footer .footer-info {
        text-align: center;
    }

    .footer-hit-counter {
        width: 100%;
        max-width: 260px;
    }
}
</style>


{{-- =========================================================
     FLOATING HIT COUNTER
     ========================================================= --}}
<div
    class="floating-hit-counter"
    id="floatingHitCounter"
>

    <div class="hit-counter-title">
        Hit Counter
    </div>

    <div class="date-display">

        <span>
            Today

            <div class="number">
                {{ $todayHits }}
            </div>
        </span>

        <span>
            {{ $month }}

            <div class="number">
                {{ $monthHits }}
            </div>
        </span>

        <span>
            {{ $year }}

            <div class="number">
                {{ $yearHits }}
            </div>
        </span>

    </div>

</div>


{{-- =========================================================
     FOOTER
     ========================================================= --}}
<footer
    class="footer"
    id="websiteFooter"
>

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


            {{-- Footer Hit Counter --}}
            <div
                class="footer-hit-counter"
                id="footerHitCounter"
            >

                <div class="hit-counter-title">
                    Hit Counter
                </div>

                <div class="date-display">

                    <span>
                        Today

                        <div class="number">
                            {{ $todayHits }}
                        </div>
                    </span>

                    <span>
                        {{ $month }}

                        <div class="number">
                            {{ $monthHits }}
                        </div>
                    </span>

                    <span>
                        {{ $year }}

                        <div class="number">
                            {{ $yearHits }}
                        </div>
                    </span>

                </div>

            </div>

        </div>

    </div>

</footer>


<script nonce="{{ app('cspNonce') }}">
document.addEventListener("DOMContentLoaded", function () {

    const floatingHitCounter =
        document.getElementById("floatingHitCounter");

    const footerHitCounter =
        document.getElementById("footerHitCounter");

    if (!floatingHitCounter || !footerHitCounter) {
        return;
    }


    /*
    |--------------------------------------------------------------------------
    | Hide floating counter when footer hit counter becomes visible
    |--------------------------------------------------------------------------
    */
    const hitCounterObserver =
        new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        floatingHitCounter.classList.add(
                            "hide-hit-counter"
                        );

                    } else {

                        floatingHitCounter.classList.remove(
                            "hide-hit-counter"
                        );
                    }
                });
            },
            {
                root: null,
                rootMargin: "0px 0px 0px 0px",
                threshold: 0.10
            }
        );


    hitCounterObserver.observe(
        footerHitCounter
    );

});
</script>

<!-- ================= BOOTSTRAP ================= -->
<script nonce="{{ app('cspNonce') }}" src="{{ asset('public/website/js/bootstrap.bundle.min.js') }}"></script>

<!-- ================= FOOTER JS ================= -->

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
    // bulletinLink.addEventListener("click", function (e) {
    //     e.preventDefault();
    //     e.stopPropagation();

    //     const open = navLinks.classList.contains("show3");
    //     navLinks.classList.remove("show1", "show2");
    //     resetArrows();

    //     if (!open) {
    //         navLinks.classList.add("show3");
    //         jsArrow.style.transform = "rotate(180deg)";
    //         announce("Bulletins menu opened");
    //     } else {
    //         navLinks.classList.remove("show3");
    //         announce("Bulletins menu closed");
    //     }
    // });

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

<!-- SLIDER -->
<script nonce="{{ app('cspNonce') }}">
document.addEventListener('DOMContentLoaded', function () {

  const slides = document.querySelectorAll('.slide');
  const dots = document.querySelectorAll('.dot');
  const sliderContainer = document.getElementById('sliderContainer');

  if (!slides.length || !sliderContainer) return;

  let slideIndex = 0;
  let timer;

  function updateDots() {
    if (!dots || !dots.length) return;
    dots.forEach((dot, i) => dot.classList.toggle('active', i === slideIndex));
  }

  function showSlide(index) {
    slideIndex = (index + slides.length) % slides.length; // safe wrap
    sliderContainer.style.transform = `translateX(-${slideIndex * 100}%)`;
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
    if (timer) clearInterval(timer);
  }

  // expose for inline onclick=""
  window.currentSlide = i => { showSlide(i - 1); startAuto(); };
  window.nextSlide = () => { nextSlide(); startAuto(); };
  window.prevSlide = () => { prevSlide(); startAuto(); };

  // initial
  showSlide(0);
  startAuto();
});
</script>



<script nonce="{{ app('cspNonce') }}">
document.addEventListener("DOMContentLoaded", function () {
    const scrollers = document.querySelectorAll(".scroller");
    if (!scrollers.length) return;

    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

    scrollers.forEach(scroller => {
        const inner = scroller.querySelector(".scroller__inner");
        if (!inner) return;

        scroller.setAttribute("data-animated", "true");

        scroller.addEventListener("mouseenter", () => {
            scroller.classList.add("paused");
        });

        scroller.addEventListener("mouseleave", () => {
            scroller.classList.remove("paused");
        });
    });
});
</script>

</body>

</html>
