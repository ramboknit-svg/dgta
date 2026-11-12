@extends('website.app_new')

@section('content')

<style nonce="{{ app('cspNonce') }}">

/* =========================================================
   BRANCH BAR
   ========================================================= */

.branch-bar {
    background: #ffffff;
    color: #0D2E1C;
    text-align: center;
    padding: 8px;
    font-weight: bold;
    font-size: 22px;
    box-shadow: rgb(218, 198, 145) 1.95px 1.95px 2.6px;
}


/* =========================================================
   MAIN LAYOUT
   ========================================================= */

main {
    display: flex;
    padding: 20px;
    gap: 20px;
    background-color: #164229;
}


/* =========================================================
   SIDEBAR
   ========================================================= */

aside {
    flex: 0 0 300px;
    background: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0,0,0,0.2);
}

aside h3 {
    background: #164229;
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
    background: #CDB77A;
    border-radius: 8px;
    margin-bottom: 15px;
}

.sidebar-item {
    position: relative;
}

aside button {
    display: block;
    width: 100%;
    margin-bottom: 10px;
    padding: 10px;
    background: linear-gradient(45deg, #1B4E2F, #2F6B43);
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
    background: #0D2E1C;
    color: #fff;
    transform: scale(1.01);
    box-shadow: 0 0 12px rgba(255,204,0,0.6);
}


/* =========================================================
   SIDEBAR DROPDOWN
   ========================================================= */

.sidebar-dropdown {
    position: absolute;
    left: 100%;
    top: 0;
    background: #0D2E1C;
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
    background: #164229;
}

.sidebar-item:hover .sidebar-dropdown {
    opacity: 1;
    pointer-events: auto;
    transform: translateY(0);
}


/* =========================================================
   CONTENT
   ========================================================= */

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


/* =========================================================
   ANIMATION
   ========================================================= */

@keyframes fadeIn {

    from {
        opacity: 0;
        transform: translateY(10px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================================
   NOTES TABLE
   Previously:
   style="width:80px;"
   ========================================================= */

.knowledge-table .sn-column {
    width: 80px;
}


/* =========================================================
   CSP SAFE SUB MENU STATES
   ========================================================= */

/*
 * Previously:
 * element.style.display = "none"
 */
.sub-menu.csp-menu-hidden {
    display: none !important;
}


/*
 * Previously:
 * element.style.display = "block"
 */
.sub-menu.csp-menu-visible {
    display: block !important;
}


/*
 * Used temporarily while measuring hidden menu.
 *
 * Previously:
 * menu.style.visibility = "hidden";
 * menu.style.display = "block";
 */
.sub-menu.csp-menu-measure {
    display: block !important;
    visibility: hidden !important;
    pointer-events: none !important;
}

</style>


<div class="branch-bar">
    TAC/ RECT
</div>


<main>

    <aside>

        <div class="hod-profile"></div>

        <nav class="submenu-layer-btn">

            <div class="navbar">

                <div class="nav-buttons">

                    @include('website.partials.gate-menu', [
                        'categories' => $categories,
                        'level' => 1
                    ])

                </div>

            </div>

        </nav>

    </aside>


    <section
        class="content place active"
        id="content-area"
    >

        <h2
            class="charter-duties"
            id="content-title"
        >
            Content
        </h2>


        <div
            class="sectionunder-content"
            id="content-desc"
        >

            <p>
                Click any category to view description here.
            </p>

        </div>

    </section>

</main>


{{-- =========================================================
     TOGGLE MENU + SHOW DESCRIPTION
     ========================================================= --}}

<script nonce="{{ app('cspNonce') }}">

document.addEventListener(
    "DOMContentLoaded",
    function () {

        const titleBox =
            document.getElementById(
                "content-title"
            );

        const descBox =
            document.getElementById(
                "content-desc"
            );


        /* =====================================================
           CSP SAFE SUBMENU HELPERS
           ===================================================== */

        function isSubMenuOpen(menu) {

            return !!menu &&
                menu.classList.contains(
                    "csp-menu-visible"
                );
        }


        function openSubMenu(menu) {

            if (!menu) {
                return;
            }

            menu.classList.remove(
                "csp-menu-hidden"
            );

            menu.classList.add(
                "csp-menu-visible"
            );
        }


        function closeSubMenu(menu) {

            if (!menu) {
                return;
            }

            menu.classList.remove(
                "csp-menu-visible"
            );

            menu.classList.add(
                "csp-menu-hidden"
            );
        }


        /* =====================================================
           SHOW DESCRIPTION
           ===================================================== */

        function showDescription(
            title,
            html
        ) {

            if (titleBox) {

                titleBox.innerText =
                    title || "Content";
            }

            if (descBox) {

                descBox.innerHTML =
                    html ||
                    `<p>No description available</p>`;
            }
        }


        /* =====================================================
           LOAD NOTES
           ===================================================== */

        function loadNotes(
            categoryId,
            title
        ) {

            const url =
                `{{ url('/resource/notes') }}/${categoryId}`;


            showDescription(
                title || "Content",
                `<p>Loading...</p>`
            );


            fetch(
                url,
                {
                    headers: {
                        "Accept":
                            "application/json"
                    }
                }
            )

            .then(
                function (response) {

                    return response.json();
                }
            )

            .then(
                function (json) {

                    if (
                        !json ||
                        json.ok !== true
                    ) {

                        showDescription(
                            title,
                            `<p>Unable to load notes.</p>`
                        );

                        return;
                    }


                    const notes =
                        json.data || [];


                    if (
                        notes.length === 0
                    ) {

                        showDescription(
                            title,
                            `<p>No pdf found for this category.</p>`
                        );

                        return;
                    }


                    let html = `

                        <div class="table-responsive">

                            <table class="table table-hover align-middle mb-0 knowledge-table">

                                <thead>

                                    <tr>

                                        <th class="sn-column">
                                            SN
                                        </th>

                                        <th>
                                            Title
                                        </th>

                                    </tr>

                                </thead>

                                <tbody>

                    `;


                    const baseDownloadUrl =
                        "{{ url('resource_pdf') }}";


                    notes.forEach(
                        function (note, index) {

                            const id =
                                note.id ?? 0;


                            const link =
                                `${baseDownloadUrl}/${id}`;


                            const name =
                                note.name
                                    ? note.name
                                    : "Untitled";


                            html += `

                                <tr>

                                    <td>

                                        <span class="badge bg-secondary">

                                            ${index + 1}

                                        </span>

                                    </td>


                                    <td>

                                        <div>

                                            <a
                                                href="${link}"
                                                class="whatsnew-link text-decoration-none"
                                                data-id="${id}">

                                                ${name}

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            `;
                        }
                    );


                    html += `

                                </tbody>

                            </table>

                        </div>

                    `;


                    showDescription(
                        title,
                        html
                    );
                }
            )

            .catch(
                function () {

                    showDescription(
                        title,
                        `<p>Server error while loading notes.</p>`
                    );
                }
            );
        }


        /* =====================================================
           TOP LEVEL CATEGORY
           ===================================================== */

        document
            .querySelectorAll(
                ".btn-group.has-sub > .tab-btn"
            )
            .forEach(
                function (btn) {

                    btn.addEventListener(
                        "click",
                        function (e) {

                            e.stopPropagation();


                            const parent =
                                this.parentElement;


                            if (!parent) {
                                return;
                            }


                            const subMenu =
                                parent.querySelector(
                                    ":scope > .sub-menu"
                                );


                            const categoryId =
                                this.dataset.id;


                            const title =
                                this.dataset.title ||
                                "Content";


                            /* ===============================
                               NO CHILDREN
                               =============================== */

                            if (!subMenu) {

                                document
                                    .querySelectorAll(
                                        "button.tab-btn, button.sub-btn"
                                    )
                                    .forEach(
                                        function (button) {

                                            button.classList.remove(
                                                "active"
                                            );
                                        }
                                    );


                                this.classList.add(
                                    "active"
                                );


                                if (!categoryId) {

                                    showDescription(
                                        title,
                                        `<p>Category id missing (data-id not found).</p>`
                                    );

                                    return;
                                }


                                loadNotes(
                                    categoryId,
                                    title
                                );


                                return;
                            }


                            const isOpen =
                                isSubMenuOpen(
                                    subMenu
                                );


                            /* ===============================
                               CLOSE OTHER GROUPS
                               =============================== */

                            document
                                .querySelectorAll(
                                    ".btn-group.has-sub"
                                )
                                .forEach(
                                    function (group) {

                                        if (
                                            group !== parent
                                        ) {

                                            const otherMenu =
                                                group.querySelector(
                                                    ":scope > .sub-menu"
                                                );


                                            const otherBtn =
                                                group.querySelector(
                                                    ":scope > .tab-btn"
                                                );


                                            if (otherMenu) {

                                                closeSubMenu(
                                                    otherMenu
                                                );
                                            }


                                            if (otherBtn) {

                                                otherBtn
                                                    .classList
                                                    .remove(
                                                        "arrow-open"
                                                    );
                                            }
                                        }
                                    }
                                );


                            /* ===============================
                               CURRENT MENU
                               =============================== */

                            if (isOpen) {

                                closeSubMenu(
                                    subMenu
                                );


                                this.classList.remove(
                                    "arrow-open"
                                );

                            } else {

                                openSubMenu(
                                    subMenu
                                );


                                this.classList.add(
                                    "arrow-open"
                                );
                            }
                        }
                    );
                }
            );


        /* =====================================================
           GLOBAL NESTED MENU CLICK
           ===================================================== */

        document.addEventListener(
            "click",
            function (e) {


                /* ===============================================
                   LEAF CHILD
                   =============================================== */

                const leafBtn =
                    e.target.closest(
                        "button.sub-btn"
                    );


                if (leafBtn) {

                    e.stopPropagation();


                    document
                        .querySelectorAll(
                            "button.tab-btn, button.sub-btn"
                        )
                        .forEach(
                            function (button) {

                                button.classList.remove(
                                    "active"
                                );
                            }
                        );


                    leafBtn.classList.add(
                        "active"
                    );


                    const categoryId =
                        leafBtn.dataset.id;


                    const title =
                        leafBtn.dataset.title ||
                        "Content";


                    if (!categoryId) {

                        showDescription(
                            title,
                            `<p>Category id missing (data-id not found).</p>`
                        );

                        return;
                    }


                    loadNotes(
                        categoryId,
                        title
                    );


                    return;
                }


                /* ===============================================
                   NESTED PARENT
                   =============================================== */

                const nestedParent =
                    e.target.closest(
                        ".sub-btn.has-sub"
                    );


                if (nestedParent) {

                    e.stopPropagation();


                    const subMenu =
                        nestedParent.querySelector(
                            ":scope > .sub-menu"
                        );


                    if (subMenu) {

                        if (
                            isSubMenuOpen(
                                subMenu
                            )
                        ) {

                            closeSubMenu(
                                subMenu
                            );

                        } else {

                            openSubMenu(
                                subMenu
                            );
                        }
                    }


                    return;
                }
            }
        );

    }
);

</script>


{{-- =========================================================
     SUB MENU POSITION
     ========================================================= --}}

<script nonce="{{ app('cspNonce') }}">

(function () {

    const GAP = 8;


    /* =====================================================
       PLACE MENU
       ===================================================== */

    function placeMenu(menu) {

        if (!menu) {
            return;
        }


        menu.classList.remove(
            "flip-x",
            "flip-y"
        );


        const wasHidden =
            getComputedStyle(
                menu
            ).display === "none";


        /*
         * Previously:
         *
         * menu.style.visibility = "hidden";
         * menu.style.display = "block";
         *
         * Now handled using CSS class.
         */
        if (wasHidden) {

            menu.classList.add(
                "csp-menu-measure"
            );
        }


        let menuPosition =
            menu.getBoundingClientRect();


        const viewportWidth =
            window.innerWidth;


        const viewportHeight =
            window.innerHeight;


        /* =====================================================
           HORIZONTAL COLLISION
           ===================================================== */

        if (
            menuPosition.right >
            viewportWidth - GAP
        ) {

            menu.classList.add(
                "flip-x"
            );
        }


        if (
            menu.classList.contains(
                "flip-x"
            )
        ) {

            const flippedPosition =
                menu.getBoundingClientRect();


            if (
                flippedPosition.left <
                GAP
            ) {

                menu.classList.remove(
                    "flip-x"
                );
            }
        }


        /*
         * Recalculate after horizontal change
         */
        menuPosition =
            menu.getBoundingClientRect();


        /* =====================================================
           VERTICAL COLLISION
           ===================================================== */

        if (
            menuPosition.bottom >
            viewportHeight - GAP
        ) {

            menu.classList.add(
                "flip-y"
            );
        }


        if (
            menu.classList.contains(
                "flip-y"
            )
        ) {

            const flippedVerticalPosition =
                menu.getBoundingClientRect();


            if (
                flippedVerticalPosition.top <
                GAP
            ) {

                menu.classList.remove(
                    "flip-y"
                );
            }
        }


        /*
         * Restore original hidden state
         */
        if (wasHidden) {

            menu.classList.remove(
                "csp-menu-measure"
            );
        }
    }


    /* =====================================================
       HOVER / FOCUS
       ===================================================== */

    function onEnter(e) {

        const parent =
            e.currentTarget;


        if (!parent) {
            return;
        }


        const directMenu =
            parent.querySelector(
                ":scope > .sub-menu"
            );


        placeMenu(
            directMenu
        );
    }


    /* =====================================================
       APPLY TO ALL PARENTS
       ===================================================== */

    const parents =
        document.querySelectorAll(
            ".has-sub"
        );


    parents.forEach(
        function (parent) {

            parent.addEventListener(
                "mouseenter",
                onEnter
            );


            parent.addEventListener(
                "focusin",
                onEnter
            );
        }
    );


    /* =====================================================
       RESIZE
       ===================================================== */

    window.addEventListener(
        "resize",
        function () {

            document
                .querySelectorAll(
                    ".has-sub:hover > .sub-menu, " +
                    ".has-sub.open > .sub-menu"
                )
                .forEach(
                    function (menu) {

                        placeMenu(
                            menu
                        );
                    }
                );
        }
    );


    /* =====================================================
       SCROLL
       ===================================================== */

    window.addEventListener(
        "scroll",
        function () {

            document
                .querySelectorAll(
                    ".has-sub:hover > .sub-menu, " +
                    ".has-sub.open > .sub-menu"
                )
                .forEach(
                    function (menu) {

                        placeMenu(
                            menu
                        );
                    }
                );
        },
        {
            passive: true
        }
    );


    /* =====================================================
       MOUSEOVER
       ===================================================== */

    document.addEventListener(
        "mouseover",
        function (e) {

            const parent =
                e.target.closest(
                    ".has-sub"
                );


            if (!parent) {
                return;
            }


            const menu =
                parent.querySelector(
                    ":scope > .sub-menu"
                );


            if (menu) {

                placeMenu(
                    menu
                );
            }
        }
    );

})();

</script>


{{-- =========================================================
     PDF DOWNLOAD
     ========================================================= --}}

<script nonce="{{ app('cspNonce') }}">

document.addEventListener(
    "click",
    function (e) {

        const link =
            e.target.closest(
                ".whatsnew-link"
            );


        if (!link) {
            return;
        }


        e.preventDefault();


        const now =
            new Date();


        const localDateTime =

            now.getFullYear()

            + "-"

            + String(
                now.getMonth() + 1
            ).padStart(
                2,
                "0"
            )

            + "-"

            + String(
                now.getDate()
            ).padStart(
                2,
                "0"
            )

            + " "

            + String(
                now.getHours()
            ).padStart(
                2,
                "0"
            )

            + ":"

            + String(
                now.getMinutes()
            ).padStart(
                2,
                "0"
            )

            + ":"

            + String(
                now.getSeconds()
            ).padStart(
                2,
                "0"
            );


        const form =
            document.createElement(
                "form"
            );


        form.method =
            "POST";


        form.action =
            link.href;


        form.target =
            "_blank";


        const token =
            document.createElement(
                "input"
            );


        token.type =
            "hidden";


        token.name =
            "_token";


        token.value =
            "{{ csrf_token() }}";


        const time =
            document.createElement(
                "input"
            );


        time.type =
            "hidden";


        time.name =
            "local_time";


        time.value =
            localDateTime;


        form.appendChild(
            token
        );


        form.appendChild(
            time
        );


        document.body.appendChild(
            form
        );


        form.submit();


        document.body.removeChild(
            form
        );
    }
);

</script>

@endsection