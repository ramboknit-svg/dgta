<!DOCTYPEhtml>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARMY TRAINING COMMAND</title>
<!-- Added Bootstrap CDN for responsiveness -->
<link href="{{ asset('public/website/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/website/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/website/font/css/all.min.css') }}" rel="stylesheet">

<link rel="icon" href="{{ asset('public/website/images/indian-aermy-1.png') }}" sizes="32x32" />


   
    
 
    

</head>
   <body class="archives-page">
   <!--- Navigation ---->
  
<body>
    <!-- Header -->
   <header class="header" id="myHeader">
    <div class="container-fluid">
        <div class="header-container">
            <a href="{{url('/')}}">
                <div class="logo-placeholder">
                    <img src="{{asset('public/website/logo1.png')}}" class="w-100">
                </div>
            </a>

            <div class="header-title-area">
                <div class="header-title-top">ARMY TRAINING COMMAND</div>
                    <div class="header-title-main">EXCELLENCE IN THE ART & SCIENCE OF WAR</div>
                    <div class="header-title-sanskrit">युद्धकला समरविज्ञाने च श्रेष्ठता</div>
            </div>

            <a href="{{url('/')}}">
                <div class="logo-placeholder not-circle">
                    <img src="{{asset('public/website/logo.png')}}" class="w-100">
                </div>
            </a>
        </div>
    </div>

    <nav>
        <div class="navbar">
            <i class="fa fa-bars"></i>

            <div class="nav-links">
                <div class="sidebar-logo">
                    <i class="fa fa-times"></i>
                </div>

                <ul class="links">

                    <li><a href="{{ url('/') }}">HOME</a></li>
                    <li><a href="{{ route('cosco') }}">COSCO</a></li>
                    <li><a href="{{ url('org') }}">ORGANOGRAM</a></li>

                    <!-- GO TO -->
                    <li>
                        <a href="javascript:void(0)" class="go-to-link" aria-haspopup="true" aria-expanded="false">
                            GO TO
                            <i class="fa fa-chevron-down htmlcss-arrow arrow"></i>
                        </a>

                        <ul class="htmlCss-sub-menu sub-menu">

                            <!-- COMDS -->
                            <li class="more">
                                <span class="comds-link" role="button" tabindex="0" aria-expanded="false">
                                    <a href="javascript:void(0)">COMDS</a>
                                    <i class="fa fa-chevron-right arrow more-arrow"></i>
                                </span>

                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="https://scweb.army.mil">SOUTHERN</a></li>
                                    <li><a href="https://ecweb.army.mil">EASTERN</a></li>
                                    <li><a href="https://wcweb.army.mil">WESTERN</a></li>
                                    <li><a href="https://ccweb.army.mil">CENTRAL</a></li>
                                    <li><a href="https://ncweb.army.mil">NORTHERN</a></li>
                                    <li><a href="https://swcweb.army.mil">SOUTH WESTERN</a></li>
                                </ul>
                            </li>

                            <!-- BRANCHES -->
                            <li class="more">
                                <span class="branches-link" role="button" tabindex="0" aria-expanded="false">
                                    <a href="javascript:void(0)">BRANCHES</a>
                                    <i class="fa fa-chevron-right arrow more-arrow"></i>
                                </span>

                                <ul class="more-sub-menu sub-menu">
                                    <li><a href="{{ url('goc') }}">GOC-IN-C SECTT</a></li>
                                    <li><a href="{{ url('cos') }}">COS SECTT</a></li>
                                    <li><a href="{{ url('branch_ms') }}">MS BR</a></li>
                                    <li><a href="{{ url('gs') }}">GS BR</a></li>
                                    <li><a href="{{ url('adm') }}">ADM BR</a></li>
                                    <li><a href="{{ url('branch_red') }}">REDFOR BR</a></li>
                                    <li><a href="{{ url('doc') }}">DOC BR</a></li>
                                    <li><a href="{{ url('trg_a') }}">TRG A</a></li>
                                    <li><a href="{{ url('trg_b') }}">TRG B</a></li>
                                    <li><a href="{{ url('apvl') }}">APVL & PLG</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- BULLETINS -->
                    <li>
                        <a href="javascript:void(0)" class="bulletin-link" aria-haspopup="true" aria-expanded="false">
                            BULLETINS
                            <i class="fa fa-chevron-down js-arrow arrow"></i>
                        </a>

                        <ul class="js-sub-menu sub-menu">
                            <li><a href="{{ route('call_bulletin') }}">CALL BULLETIN</a></li>
                            <li><a href="{{ route('infosis_bulletin') }}">INFOSIS BULLETIN</a></li>
                        </ul>
                    </li>

                    <li><a href="{{url('resource')}}">RESOURCES</a></li>
                    <li><a href="{{url('tell')}}">TEL DIR</a></li>
                    <li><a href="{{url('study')}}">STUDY LVE/MOU</a></li>
                    <li><a href="{{url('gate')}}">M.TECH / GATE</a></li>
                    <li><a href="{{url('stn')}}">STN</a></li>
                     <!-- <div class="search-box">
                            <i class="fa fa-search"></i>
                            <div class="input-box">
                                <input type="text" placeholder="Search...">
                            </div>
                        </div> -->

                </ul>
            </div>
        </div>
    </nav>
</header>

