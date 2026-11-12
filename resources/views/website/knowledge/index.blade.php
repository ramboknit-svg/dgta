{{-- Main Blade File --}}

@extends('website.app_new')

@section('content')

<style nonce="{{ app('cspNonce') }}">

/* Branch bar */
.branch-bar {
    background: #ffffff;
    color: #0D2E1C;
    text-align: center;
    padding: 8px;
    font-weight: bold;
    font-size: 22px;
    box-shadow: rgb(218, 198, 145) 1.95px 1.95px 2.6px;
}


/* Main layout */
main {
    display: flex;
    padding: 20px;
    gap: 20px;
    background-color: #164229;
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


/* Sidebar dropdown */
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
}


/* Animations */
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
   CSP SAFE INTERNAL MENU CSS
   ========================================================= */

/*
 * Replacement for:
 * menu.style.display = "none"
 */
.sub-menu.csp-menu-hidden {
    display: none !important;
}


/*
 * Replacement for:
 * menu.style.display = "block"
 */
.sub-menu.csp-menu-visible {
    display: block !important;
}


/*
 * Used only while calculating submenu position.
 *
 * Replacement for:
 * menu.style.visibility = "hidden"
 * menu.style.display = "block"
 */
.sub-menu.csp-menu-measure {
    display: block !important;
    visibility: hidden !important;
    pointer-events: none !important;
}

</style>


<div class="branch-bar">
    TA UNITS
</div>


<main>

    <aside>

        <div class="hod-profile"></div>

        <nav class="submenu-layer-btn">

            <div class="navbar">

                <div class="nav-buttons">

                    @include('website.partials.category-menu', [
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
            <p>Click any category to view description here.</p>
        </div>

    </section>

</main>


<script nonce="{{ app('cspNonce') }}">

document.addEventListener("DOMContentLoaded", function () {

    const titleBox =
        document.getElementById("content-title");

    const descBox =
        document.getElementById("content-desc");


    /*
    |--------------------------------------------------------------------------
    | CSP SAFE MENU HELPERS
    |--------------------------------------------------------------------------
    */

    function openMenu(menu) {

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


    function closeMenu(menu) {

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


    function isMenuOpen(menu) {

        if (!menu) {
            return false;
        }

        return menu.classList.contains(
            "csp-menu-visible"
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Show category description
    |--------------------------------------------------------------------------
    */

    function showCategoryDescription(categoryElement) {

        if (!categoryElement) {
            return;
        }


        const title =
            categoryElement.dataset.title ||
            categoryElement.textContent.trim() ||
            "Content";


        const description =
            categoryElement.dataset.desc || "";


        if (titleBox) {

            titleBox.innerText =
                title;
        }


        if (descBox) {

            if (
                description.trim() !== ""
            ) {

                descBox.innerHTML =
                    description;

            } else {

                descBox.innerHTML =
                    "<p>No description available for this category.</p>";
            }
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Remove active class from all menu items
    |--------------------------------------------------------------------------
    */

    function removeActiveClasses() {

        document
            .querySelectorAll(
                ".tab-btn, button.sub-btn, div.sub-btn"
            )
            .forEach(function (item) {

                item.classList.remove(
                    "active"
                );
            });
    }


    /*
    |--------------------------------------------------------------------------
    | Top-level category click
    |--------------------------------------------------------------------------
    */

    document
        .querySelectorAll(
            ".btn-group.has-sub > .tab-btn"
        )
        .forEach(function (button) {

            button.addEventListener(
                "click",
                function (event) {

                    event.preventDefault();
                    event.stopPropagation();


                    const parent =
                        this.parentElement;


                    if (!parent) {
                        return;
                    }


                    const subMenu =
                        parent.querySelector(
                            ":scope > .sub-menu"
                        );


                    const isOpen =
                        isMenuOpen(
                            subMenu
                        );


                    /*
                     * Show selected category description
                     */
                    removeActiveClasses();


                    this.classList.add(
                        "active"
                    );


                    showCategoryDescription(
                        this
                    );


                    /*
                     * Close other top-level category menus
                     */
                    document
                        .querySelectorAll(
                            ".btn-group.has-sub"
                        )
                        .forEach(function (group) {

                            if (
                                group !== parent
                            ) {

                                const otherMenu =
                                    group.querySelector(
                                        ":scope > .sub-menu"
                                    );


                                const otherButton =
                                    group.querySelector(
                                        ":scope > .tab-btn"
                                    );


                                if (otherMenu) {

                                    closeMenu(
                                        otherMenu
                                    );
                                }


                                if (otherButton) {

                                    otherButton
                                        .classList
                                        .remove(
                                            "arrow-open"
                                        );
                                }
                            }
                        });


                    /*
                     * Open or close current submenu
                     */
                    if (subMenu) {

                        if (isOpen) {

                            closeMenu(
                                subMenu
                            );


                            this.classList.remove(
                                "arrow-open"
                            );

                        } else {

                            openMenu(
                                subMenu
                            );


                            this.classList.add(
                                "arrow-open"
                            );
                        }
                    }
                }
            );
        });


    /*
    |--------------------------------------------------------------------------
    | Child and nested category click
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        "click",
        function (event) {


            /*
             * Leaf category button
             */
            const leafButton =
                event.target.closest(
                    "button.sub-btn"
                );


            if (leafButton) {

                event.preventDefault();
                event.stopPropagation();


                removeActiveClasses();


                leafButton.classList.add(
                    "active"
                );


                showCategoryDescription(
                    leafButton
                );


                return;
            }


            /*
             * Nested parent category
             */
            const nestedParent =
                event.target.closest(
                    "div.sub-btn.has-sub"
                );


            if (nestedParent) {

                event.preventDefault();
                event.stopPropagation();


                removeActiveClasses();


                nestedParent.classList.add(
                    "active"
                );


                showCategoryDescription(
                    nestedParent
                );


                const nestedMenu =
                    nestedParent.querySelector(
                        ":scope > .sub-menu"
                    );


                if (nestedMenu) {

                    const isNestedOpen =
                        isMenuOpen(
                            nestedMenu
                        );


                    if (isNestedOpen) {

                        closeMenu(
                            nestedMenu
                        );

                    } else {

                        openMenu(
                            nestedMenu
                        );
                    }


                    nestedParent.classList.toggle(
                        "arrow-open",
                        !isNestedOpen
                    );
                }


                return;
            }
        }
    );


    /*
    |--------------------------------------------------------------------------
    | Default page load
    |--------------------------------------------------------------------------
    */

    const firstTopCategoryButton =
        document.querySelector(
            ".btn-group.has-sub > .tab-btn"
        );


    if (firstTopCategoryButton) {

        const firstTopCategoryGroup =
            firstTopCategoryButton.parentElement;


        const firstTopCategoryMenu =
            firstTopCategoryGroup
                ? firstTopCategoryGroup.querySelector(
                    ":scope > .sub-menu"
                )
                : null;


        /*
         * Remove active classes
         */
        document
            .querySelectorAll(
                ".tab-btn, button.sub-btn, div.sub-btn"
            )
            .forEach(function (item) {

                item.classList.remove(
                    "active",
                    "arrow-open"
                );
            });


        /*
         * Close all top-level menus
         */
        document
            .querySelectorAll(
                ".btn-group.has-sub > .sub-menu"
            )
            .forEach(function (menu) {

                closeMenu(
                    menu
                );
            });


        /*
         * Activate first main category
         */
        firstTopCategoryButton.classList.add(
            "active",
            "arrow-open"
        );


        /*
         * Open first main category submenu
         */
        if (firstTopCategoryMenu) {

            openMenu(
                firstTopCategoryMenu
            );
        }


        /*
         * Show first main category description
         */
        showCategoryDescription(
            firstTopCategoryButton
        );
    }

});

</script>


<script nonce="{{ app('cspNonce') }}">

(function () {

    const GAP = 8;


    /*
    |--------------------------------------------------------------------------
    | Position submenu
    |--------------------------------------------------------------------------
    */

    function placeMenu(menu) {

        if (!menu) {
            return;
        }


        menu.classList.remove(
            "flip-x",
            "flip-y"
        );


        const wasHidden =
            getComputedStyle(menu).display ===
            "none";


        /*
         * CSP safe temporary display
         *
         * Previously:
         *
         * menu.style.visibility = "hidden";
         * menu.style.display = "block";
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


        /*
         * Horizontal collision
         */
        if (
            menuPosition.right >
            viewportWidth - GAP
        ) {

            menu.classList.add(
                "flip-x"
            );
        }


        /*
         * Check left side after flipping
         */
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
         * Recalculate after horizontal flip
         */
        menuPosition =
            menu.getBoundingClientRect();


        /*
         * Vertical collision
         */
        if (
            menuPosition.bottom >
            viewportHeight - GAP
        ) {

            menu.classList.add(
                "flip-y"
            );
        }


        /*
         * Check top after vertical flipping
         */
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
         * Restore hidden menu
         */
        if (wasHidden) {

            menu.classList.remove(
                "csp-menu-measure"
            );
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Mouse / focus positioning
    |--------------------------------------------------------------------------
    */

    function onEnter(event) {

        const parent =
            event.currentTarget;


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


    /*
     * Apply to all menu parents
     */
    const parents =
        document.querySelectorAll(
            ".has-sub"
        );


    parents.forEach(function (parent) {

        parent.addEventListener(
            "mouseenter",
            onEnter
        );


        parent.addEventListener(
            "focusin",
            onEnter
        );
    });


    /*
    |--------------------------------------------------------------------------
    | Recalculate on resize
    |--------------------------------------------------------------------------
    */

    window.addEventListener(
        "resize",
        function () {

            document
                .querySelectorAll(
                    ".has-sub:hover > .sub-menu, " +
                    ".has-sub.open > .sub-menu, " +
                    ".sub-menu.csp-menu-visible"
                )
                .forEach(function (menu) {

                    placeMenu(
                        menu
                    );
                });
        }
    );


    /*
    |--------------------------------------------------------------------------
    | Recalculate on scroll
    |--------------------------------------------------------------------------
    */

    window.addEventListener(
        "scroll",
        function () {

            document
                .querySelectorAll(
                    ".has-sub:hover > .sub-menu, " +
                    ".has-sub.open > .sub-menu, " +
                    ".sub-menu.csp-menu-visible"
                )
                .forEach(function (menu) {

                    placeMenu(
                        menu
                    );
                });
        },
        {
            passive: true
        }
    );


    /*
    |--------------------------------------------------------------------------
    | Mouseover submenu positioning
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        "mouseover",
        function (event) {

            const parent =
                event.target.closest(
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

@endsection