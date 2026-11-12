<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0" />

    <title>TERRITORIAL ARMY</title>

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}">


    <link
        href="{{ asset('public/website/css/bootstrap.min.css') }}"
        rel="stylesheet" />

    <link
        href="{{ asset('public/website/css/style.css') }}"
        rel="stylesheet" />

    <link
        href="{{ asset('public/website/font/css/all.min.css') }}"
        rel="stylesheet" />

  <link rel="icon" href="{{ asset('public/website/images/indian-aermy-1.png') }}" sizes="32x32" />
    <style nonce="{{ app('cspNonce') }}">

        /* =========================================================
           HEADER INLINE STYLE MOVED HERE FOR CSP
           ========================================================= */

        .header-left-logo {
            margin-left: 20px;
        }

        .header-main-title {
            font-size: 3.6rem;
            color: #f4d870;
        }

        .header-ta-logo {
            width: 100px;
            height: 100px;
            margin: -115px 0 0 615px;
        }


        /* =========================================================
           SEARCH BOX
           ========================================================= */

        .search-box {
            position: relative;
        }

        .pdf-img {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }


        /* =========================================================
           SEARCH SUGGESTIONS
           ========================================================= */

        #searchSuggestions {
            position: absolute;
            top: 100%;
            left: -200px;

            background: #fff;

            border: 1px solid #D8C48D;

            z-index: 9999;

            max-height: 300px;

            overflow-y: auto;

            display: none;
        }

        #searchSuggestions.is-visible {
            display: block;
        }


        /* =========================================================
           SEARCH ITEMS
           ========================================================= */

        #searchSuggestions .item {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #E8DDBF;
            transition: 0.2s;
        }

        #searchSuggestions .item:hover {
            background: #F3E8CF;
        }


        /* =========================================================
           SEARCH ROW
           ========================================================= */

        .item-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-row .left {
            display: flex;
            align-items: center;
            gap: 10px;
        }


        /* =========================================================
           PDF ICON
           ========================================================= */

        .pdf-icon {
            font-size: 18px;
        }


        /* =========================================================
           TEXT
           ========================================================= */

        .text {
            font-size: 14px;
            color: #173424;
            line-height: 20px;
        }

        .search-result-snippet {
            font-size: 12px;
            color: #777;
        }

        .search-result-type {
            font-size: 11px;
            color: #999;
        }


        /* =========================================================
           DOWNLOAD ICON
           ========================================================= */

        .download-icon {
            color: grey !important;
            font-size: 16px;
            cursor: pointer;
        }

        .download-icon:hover {
            transform: scale(1.2);
        }


        /* =========================================================
           EXISTING MENU DESIGN
           ========================================================= */

        nav .navbar .links li {
            box-shadow: 0 2px 2px #f4d870 !important;
        }

        nav .navbar .links li a {
            font-size: 1rem;
            font-weight: bold !important;
        }


        /* =========================================================
           CSP SAFE HIDDEN FORM
           ========================================================= */

        .csp-hidden-form {
            display: none !important;
        }

    </style>

</head>


<body class="archives-page">


    <!-- =========================================================
         HEADER
         ========================================================= -->

    <header
        class="header"
        id="myHeader">

        <div class="container-fluid">

            <div class="header-container">


                <!-- LEFT LOGO -->

                <a href="{{ route('home') }}">

                    <div class="logo-placeholder not-circle">

                        <img
                            src="{{ asset('public/website/logo1.png') }}"
                            class="w-100 header-left-logo"
                            alt="Territorial Army">

                    </div>

                </a>


                <!-- CENTER TITLE -->

                <div class="header-title-area">

                    <div class="header-title-top header-main-title">

                        TERRITORIAL ARMY

                    </div>


                    <img
                        src="{{ asset('public/website/ta.png') }}"
                        class="header-ta-logo"
                        alt="Territorial Army">

                </div>


                <!-- RIGHT LOGO -->

                <a href="{{ route('home') }}">

                    <div class="logo-placeholder not-circle">

                        <img
                            src="{{ asset('public/website/logo.png') }}"
                            class="w-100"
                            alt="Territorial Army">

                    </div>

                </a>


            </div>

        </div>


        <!-- =====================================================
             NAVIGATION
             ===================================================== -->

        <nav>

            <div class="navbar">


                <i
                    class="fa fa-bars"
                    aria-hidden="true">
                </i>


                <div class="nav-links">


                    <div class="sidebar-logo">

                        <i
                            class="fa fa-times"
                            aria-hidden="true">
                        </i>

                    </div>


                    <ul
                        class="links"
                        id="mainMenuLinks">


                        <li>

                            <a href="{{ url('/') }}">
                                HOME
                            </a>

                        </li>


                        <li>

                            <a href="https://portal.army.mil">
                                ARMY PORTAL
                            </a>

                        </li>


                        <li>

                            <a href="{{ url('org') }}">
                                ORGANOGRAM
                            </a>

                        </li>


                        <!-- =================================================
                             GO TO
                             ================================================= -->

                        <li class="menu-item">


                            <a
                                href="#"
                                class="go-to-link csp-menu-trigger"
                                aria-haspopup="true"
                                aria-expanded="false">

                                GO TO

                                <i
                                    class="fa fa-chevron-down htmlcss-arrow arrow"
                                    aria-hidden="true">
                                </i>

                            </a>


                            <ul class="htmlCss-sub-menu sub-menu">


                                <!-- =========================================
                                     TA GP HQ
                                     ========================================= -->

                                <li class="more">


                                    <span
                                        class="branches-link"
                                        role="button"
                                        tabindex="0"
                                        aria-expanded="false">


                                        <a
                                            href="#"
                                            class="csp-menu-trigger">

                                            TA GP HQ 'S'

                                        </a>


                                        <i
                                            class="fa fa-chevron-right arrow more-arrow"
                                            aria-hidden="true">
                                        </i>


                                    </span>


                                    <ul class="more-sub-menu sub-menu">


                                        <li>

                                            <a href="{{ url('branch/doc') }}">

                                                TA GP HQ EC

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/trg_b') }}">

                                                TA GP HQ WC

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/apvl') }}">

                                                TA GP HQ SC

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/nc') }}">

                                                TA GP HQ NC

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/cc') }}">

                                                TA GP HQ CC

                                            </a>

                                        </li>


                                    </ul>


                                </li>


                                <!-- =========================================
                                     DTE SECTIONS
                                     ========================================= -->

                                <li class="more">


                                    <span
                                        class="branches-link"
                                        role="button"
                                        tabindex="0"
                                        aria-expanded="false">


                                        <a
                                            href="#"
                                            class="csp-menu-trigger">

                                            DTE SECTIONS

                                        </a>


                                        <i
                                            class="fa fa-chevron-right arrow more-arrow"
                                            aria-hidden="true">
                                        </i>


                                    </span>


                                    <ul class="more-sub-menu sub-menu">


                                        <li>

                                            <a href="{{ url('branch/goc') }}">

                                                TA-1

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/cos') }}">

                                                TA-2

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/ms_br') }}">

                                                TA-3

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/gs_br') }}">

                                                TA-4

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/legal') }}">

                                                LEGAL CELL

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/veteran') }}">

                                                VETERAN CELL

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/taic') }}">

                                                TAIC

                                            </a>

                                        </li>


                                        <li>

                                            <a href="{{ url('branch/taschool') }}">

                                                TA SCHOOL

                                            </a>

                                        </li>


                                    </ul>


                                </li>


                            </ul>


                        </li>


                        <!-- TA UNITS -->

                        <li>

                            <a href="{{ url('knowledge') }}">

                                TA UNITS

                            </a>

                        </li>


                        <!-- TA RULES / POLICY -->

                        <li>

                            <a href="{{ url('resource') }}">

                                TA RULES/ POLICY

                            </a>

                        </li>


                        <!-- TEL DIR -->

                        <li>

                            <a href="{{ url('tell') }}">

                                TEL DIR

                            </a>

                        </li>


                        <!-- AWARDS -->

                        <li>

                            <a href="{{ url('awards') }}">

                                AWARDS

                            </a>

                        </li>


                        <!-- TAC / RECT -->

                        <li>

                            <a href="{{ url('gate') }}">

                                TAC/ RECT

                            </a>

                        </li>


                        <!-- =================================================
                             SEARCH
                             ================================================= -->

                        <div class="search-box search">


                            <div class="input-box">


                                <input
                                    id="globalSearchInput"
                                    type="text"
                                    placeholder="Search..."
                                    autocomplete="off">


                                <div class="searching">

                                    <i class="fa fa-search"></i>

                                </div>


                                <div
                                    id="searchSuggestions"
                                    class="search-suggestions">
                                </div>


                            </div>


                        </div>


                    </ul>


                </div>


            </div>


        </nav>


    </header>



    <!-- =========================================================
         SEARCH SCRIPT
         ========================================================= -->

    <script nonce="{{ app('cspNonce') }}">


        const PDF_ICON =
            "{{ asset('/public/images/pdf.png') }}";


        (function () {


            const input =
                document.getElementById('globalSearchInput');


            const box =
                document.getElementById('searchSuggestions');


            if (!input || !box) {

                return;

            }


            /* =====================================================
               CSP SAFE MENU LINKS
               ===================================================== */

            document
                .querySelectorAll('.csp-menu-trigger')
                .forEach(function (link) {


                    link.addEventListener(
                        'click',
                        function (event) {

                            event.preventDefault();

                        }
                    );


                });


            /* =====================================================
               DEBOUNCE
               ===================================================== */

            function debounce(fn, delay) {


                let timer;


                return function (...args) {


                    clearTimeout(timer);


                    timer = setTimeout(
                        () => fn.apply(this, args),
                        delay
                    );


                };


            }


            /* =====================================================
               ESCAPE HTML
               ===================================================== */

            function escapeHtml(text) {


                return String(text || '')

                    .replace(/&/g, '&amp;')

                    .replace(/</g, '&lt;')

                    .replace(/>/g, '&gt;')

                    .replace(/"/g, '&quot;')

                    .replace(/'/g, '&#039;');


            }


            /* =====================================================
               PDF ROUTES
               ===================================================== */

            const pdfMap = {


                'GatePdf':
                    '/gate_pdf/',


                'ResourcePdf':
                    '/resource_pdf/',


                'WhatsNew':
                    '/download-whatsnew/'


            };


            /* =====================================================
               SHOW SEARCH BOX
               ===================================================== */

            function showSearchBox() {


                box.classList.add(
                    'is-visible'
                );


            }


            /* =====================================================
               HIDE SEARCH BOX
               ===================================================== */

            function hideSearchBox() {


                box.classList.remove(
                    'is-visible'
                );


            }


            /* =====================================================
               OPEN PDF
               ===================================================== */

            function openPdf(model, id) {


                if (!pdfMap[model]) {

                    return;

                }


                const form =
                    document.createElement('form');


                form.method =
                    'POST';


                form.action =
                    pdfMap[model] + id;


                form.target =
                    '_blank';


                /*
                 * CSP safe replacement for
                 * form.style.display = 'none'
                 */
                form.className =
                    'csp-hidden-form';


                const token =
                    document
                        .querySelector(
                            'meta[name="csrf-token"]'
                        )
                        ?.getAttribute('content');


                if (token) {


                    const inp =
                        document.createElement('input');


                    inp.type =
                        'hidden';


                    inp.name =
                        '_token';


                    inp.value =
                        token;


                    form.appendChild(inp);


                }


                document.body.appendChild(form);


                form.submit();


                form.remove();


            }


            /* =====================================================
               RENDER RESULTS
               ===================================================== */

            function render(items) {


                box.innerHTML = '';


                const searchText =
                    input.value.trim();


                /* Empty input */

                if (!searchText) {


                    hideSearchBox();


                    return;


                }


                /* No results */

                if (!items || items.length === 0) {


                    box.innerHTML = `

                        <div class="item">

                            <div class="item-row">

                                <div class="left">

                                    <div>

                                        <div class="text">

                                            <b>
                                                No Data Found
                                            </b>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    `;


                    showSearchBox();


                    return;


                }


                /* =================================================
                   SEARCH RESULTS
                   ================================================= */

                items.forEach(function (it) {


                    const el =
                        document.createElement('div');


                    el.className =
                        'item';


                    const isPdf =
                        it.model &&
                        pdfMap[it.model];


                    el.innerHTML = `

                        <div class="item-row">

                            <div class="left">


                                ${
                                    isPdf

                                        ? '<img src="' +
                                            PDF_ICON +
                                            '" class="pdf-img" alt="PDF">'

                                        : '<i class=""></i>'
                                }


                                <div>


                                    <div class="text">

                                        <b>
                                            ${escapeHtml(it.title)}
                                        </b>

                                    </div>


                                    ${
                                        (!isPdf && it.snippet)

                                            ? '<div class="search-result-snippet">' +
                                                escapeHtml(it.snippet) +
                                              '</div>'

                                            : ''
                                    }


                                    ${
                                        (!isPdf && it.type)

                                            ? '<div class="search-result-type">' +
                                                escapeHtml(it.type) +
                                              '</div>'

                                            : ''
                                    }


                                </div>


                            </div>


                            ${
                                isPdf

                                    ? '<i class="fas fa-download download-icon"></i>'

                                    : ''
                            }


                        </div>

                    `;


                    /* =============================================
                       RESULT CLICK
                       ============================================= */

                    el.addEventListener(
                        'click',
                        function () {


                            if (isPdf) {


                                openPdf(
                                    it.model,
                                    it.id
                                );


                            } else if (it.url) {


                                window.open(
                                    it.url,
                                    '_blank'
                                );


                            }


                        }
                    );


                    /* =============================================
                       DOWNLOAD BUTTON
                       ============================================= */

                    const downloadBtn =
                        el.querySelector(
                            '.download-icon'
                        );


                    if (downloadBtn) {


                        downloadBtn.addEventListener(
                            'click',
                            function (event) {


                                event.stopPropagation();


                                openPdf(
                                    it.model,
                                    it.id
                                );


                            }
                        );


                    }


                    box.appendChild(el);


                });


                showSearchBox();


            }


            /* =====================================================
               SEARCH AJAX
               ===================================================== */

            const doSearch =
                debounce(
                    function () {


                        const value =
                            input.value.trim();


                        if (!value) {


                            hideSearchBox();


                            return;


                        }


                        fetch(
                            "{{ url('/search/ajax') }}" +
                            "?q=" +
                            encodeURIComponent(value),
                            {


                                headers: {


                                    'X-Requested-With':
                                        'XMLHttpRequest'


                                }


                            }
                        )


                        .then(function (response) {


                            return response.json();


                        })


                        .then(function (data) {


                            render(data);


                        })


                        .catch(function () {


                            render([]);


                        });


                    },
                    250
                );


            /* =====================================================
               INPUT EVENTS
               ===================================================== */

            input.addEventListener(
                'input',
                doSearch
            );


            input.addEventListener(
                'focus',
                doSearch
            );


            /* =====================================================
               CLICK OUTSIDE SEARCH
               ===================================================== */

            document.addEventListener(
                'click',
                function (event) {


                    if (
                        !event.target.closest(
                            '.search-box'
                        )
                    ) {


                        hideSearchBox();


                    }


                }
            );


        })();


    </script>


</body>

</html>
