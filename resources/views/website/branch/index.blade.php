@extends('website.app_new')

@section('content')

<style nonce="{{ app('cspNonce') }}">

    /* =========================================================
       BRANCH BAR
       ========================================================= */
    .branch-bar {
        background: #ffffff;
        color: #164229;
        text-align: center;
        padding: 8px;
        font-weight: bold;
        font-size: 22px;
        box-shadow: rgb(227 227 227) 1.95px 1.95px 2.6px;
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
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
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
        background: #ccc;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .sidebar-item {
        position: relative;
    }


    /* =========================================================
       HOD PROFILE
       ========================================================= */
    .hod-profile-title {
        text-align: center;
    }

    .hod-profile-title a {
        color: #164229;
        font-size: 26px;
        font-weight: 600;
        text-decoration: none;
    }


    /* =========================================================
       SIDEBAR BUTTONS
       ========================================================= */
    aside button {
        display: block;
        width: 100%;
        padding: 10px 20px;
        margin-bottom: 18px;
        background: linear-gradient(45deg, #890a1d, #cc1030);
        border-radius: 8px;
        color: #fff;
        border: none;
        box-shadow: rgb(255 255 255 / 80%) 1.95px 1.95px 2.6px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        text-align: left;
        font-weight: 600;
    }

    aside button:hover,
    aside button.active {
        background: #164229;
        box-shadow: 0 0 12px rgba(255, 204, 0, 0.6);
        transition: unset;
        transform: scale(1.01);
        z-index: 9;
    }


    /* =========================================================
       SIDEBAR DROPDOWN
       ========================================================= */
    .sidebar-dropdown {
        position: absolute;
        left: 100%;
        top: 0;
        background: #164229;
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
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
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

</style>


<div class="branch-bar">
    {{ $branch->name }}
</div>


<main>

    <aside>

        <div class="hod-profile">

            @if($branch->slug == "goc" || $branch->slug == "cos")

                <h2 class="hod-profile-title">
                    <a href="#">
                        {{ $branch->name }}
                    </a>
                </h2>

                <div class="hod-photo branch">
                    <a href="#">
                        <img src="{{ asset($branch->image) }}">
                    </a>
                </div>

            @else

                <h2 class="hod-profile-title">
                    <a href="javascript:">
                        {{ $branch->name }}
                    </a>
                </h2>

                <div class="hod-photo branch">
                    <a href="javascript:">
                        <img src="{{ asset($branch->image) }}">
                    </a>
                </div>

            @endif


            <h3>
                <span>
                    <small>{{ $branch->designation }}</small>
                </span>

                {{ $branch->head_name }}
            </h3>


            @if($branch->slug == "goc" || $branch->slug == "cos")

                <div class="btn-btn-success db-btn">
                    <a href="{{ asset($branch->image) }}" download>
                        DOWNLOAD
                    </a>
                </div>

            @endif

        </div>


        <button
            class="tab-btn"
            data-tab="policy">
            Role
        </button>


        <button
            class="tab-btn"
            data-tab="duties">
            CHARTER OF DUTIES
        </button>


        <button
            class="tab-btn"
            data-tab="charter">
            POLICY LETTERS
        </button>

    </aside>


    <section
        class="content"
        id="content-area">

        <h2 class="charter-duties">
            Welcome to Infosys Management
        </h2>

        {!! $branch->description !!}

    </section>

</main>


<script nonce="{{ app('cspNonce') }}">

    const content = {

        policy: {
            title: 'Role',
            body: `
                {!! $branch->role !!}
            `
        },

        duties: {
            title: 'CHARTER OF DUTIES',
            body: `
                {!! $branch->duty !!}
            `
        },

        charter: {
            title: 'POLICY LETTERS',
            body: `
                {!! $branch->policy !!}
            `
        }

    };


    const buttons =
        document.querySelectorAll('.tab-btn');

    const contentArea =
        document.getElementById('content-area');


    buttons.forEach(btn => {

        btn.addEventListener('click', function (e) {

            e.preventDefault();


            document
                .querySelectorAll('.tab-btn')
                .forEach(button => {

                    button.classList.remove('active');

                });


            this.classList.add('active');


            const tab =
                this.getAttribute('data-tab');


            if (content[tab]) {

                contentArea.innerHTML = `
                    <h2 class="charter-duties">
                        ${content[tab].title}
                    </h2>

                    ${content[tab].body}
                `;

            }

        });

    });

</script>


@endsection