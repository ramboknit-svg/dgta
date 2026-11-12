@extends('website.app_cosco')
@section('content')

<style nonce="{{ app('cspNonce') }}">

.card {
    min-width: unset;
}

/* ===== BRANCH BAR ===== */
.branch-bar {
    background: #ffffff;
    color: #5a0a12;
    text-align: center;
    padding: 8px;
    font-weight: bold;
    font-size: 22px;
    box-shadow: rgb(227 227 227) 1.95px 1.95px 2.6px;
}

/* ===== MAIN LAYOUT ===== */
main {
    display: flex;
    padding: 20px;
    gap: 20px;
    background-color: #7b0c17;
}

/* ===== SIDEBAR ===== */
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

/* BUTTONS */
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
    font-size: 16px;
    cursor: pointer;
    text-align: left;
    font-weight: 600;
}

aside button:hover,
aside button.active {
    background: #7b0c17;
    box-shadow: 0 0 12px rgba(255, 204, 0, 0.6);
    transform: scale(1.01);
}

/* DROPDOWN */
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
}

.sidebar-dropdown a:hover {
    background: #7b0c17;
}

.sidebar-item:hover .sidebar-dropdown {
    opacity: 1;
    pointer-events: auto;
}

/* CONTENT */
section.content {
    flex: 1;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
    min-height: 400px;
    font-size: 14px;
    animation: fadeIn 0.5s ease;
}

/* PARAGRAPH REPLACEMENT (for ALL inline styles) */
.exam-text {
    font-size: 18px;
    color: #333;
    margin-bottom: 20px;
    line-height: 1.6;
}

/* ANIMATION */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

/* MISC */
nav.submenu-layer-btn ul.links li:last-child {
    margin-bottom: 14px;
}

.sub-menu.flip-left {
    left: auto;
    right: 100%;
    border-left: none;
    border-right: 2px solid #475569;
}

.sub-menu.flip-up {
    top: auto !important;
    bottom: 0 !important;
}

</style>

<!-- ================= HEADER ================= -->
<div class="branch-bar">EXAM CELL</div>

<main class="fp-cell-section">

    <!-- LEFT SIDEBAR -->
    <aside>

        <button class="tab-btn" data-tab="role">EXAM SECTION </button>
        <button class="tab-btn" data-tab="duties">EXAM PORTION</button>

    </aside>

    <!-- ================= CONTENT AREA ================= -->
    <section class="content place active" id="content-area">

        <h2 class="charter-duties">Welcome to Infosys Management</h2>

        <div class="sectionunder-content">

            <p class="exam-text">
                <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
            </p>

            <p class="exam-text">
                <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
            </p>

            <p class="exam-text">
                <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
            </p>

            <p class="exam-text">
                <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
                At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force.
                This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
            </p>

        </div>

    </section>

    <!-- ================= ROLE ================= -->
    <section class="content place" id="role">

        <h2 class="charter-duties">EXAM SECTION</h2>

        <div class="sectionunder-content">

            <p class="exam-text">
                <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission.
                At Infosys Management, we cultivate strategic thought...
            </p>

            <p class="exam-text">
                At Infosys Management, we cultivate strategic thought, develop defense doctrines...
            </p>

            <p class="exam-text">
                At Infosys Management, we cultivate strategic thought...
            </p>

            <p class="exam-text">
                At Infosys Management, we cultivate strategic thought...
            </p>

        </div>

    </section>

    <!-- ================= DUTIES ================= -->
    <section class="content place" id="duties">

        <h2 class="charter-duties">EXAM PORTION</h2>

        <div class="sectionunder-content">

            <p class="exam-text">
                <strong>Excellence in the Art & Science of War</strong> is not just a motto...
                At Infosys Management, we cultivate strategic thought...
            </p>

            <p class="exam-text">
                At Infosys Management, we cultivate strategic thought...
            </p>

            <p class="exam-text">
                At Infosys Management, we cultivate strategic thought...
            </p>

            <p class="exam-text">
                At Infosys Management, we cultivate strategic thought...
            </p>

        </div>

    </section>

</main>

<!-- ================= JS ================= -->
<script nonce="{{ app('cspNonce') }}">

const tabs = document.querySelectorAll(".tab-btn");
const contents = document.querySelectorAll(".content");

tabs.forEach(btn => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();

        tabs.forEach(b => b.classList.remove("active"));
        contents.forEach(c => c.classList.remove("active"));

        btn.classList.add("active");

        const target = btn.dataset.tab;
        const targetContent = document.getElementById(target);

        if (targetContent) {
            targetContent.classList.add("active");
        }
    });
});

</script>

@endsection