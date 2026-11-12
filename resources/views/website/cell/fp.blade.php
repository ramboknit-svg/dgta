@extends('website.app_cosco')
 @section('content')
  <style nonce="{{ app('cspNonce') }}">
    
.card {
       
     min-width: unset;

    
    }
   
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
     font-size: 16px;
      cursor: pointer;
      transition: 0.3s;
      text-align: left;
	      font-weight: 600;
    }
    aside button:hover, aside button.active {
      background: #7b0c17;
    color: #fff;
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


 /* Flip left */
    .sub-menu.flip-left {
        left: auto;
        right: 100%;
        border-left: none;
        border-right: 2px solid #475569;
    }

    /* Flip upward */
    .sub-menu.flip-up {
        top: auto !important;
        bottom: 0 !important;
    }
	
  

  /* CSP-safe extracted styles */
  .csp-text-block { font-size: 18px; color: #333; margin-bottom:20px; line-height: 1.6; }

  </style>

  <div class="branch-bar">FP CELL</div>

  <main class="fp-cell-section">
    <aside>
      
               
                
				  <button class="tab-btn" data-tab="role">ROLE</button>
				  
				  
           <!-- <nav class="submenu-layer-btn">
            <div class="navbar">
               
                <div class="nav-links">
                   
                    <ul class="links">

                          
                        <li>
                            <a href="#">Important Letter</a>
                              <i class='fa fa-chevron-right arrow more-arrow'></i>
                            <ul class="htmlCss-sub-menu sub-menu">
                                <li class="more tab-btn"  data-tab="link3">
                                    <span><a href="#">ATN</a>
                                       
                                    </span>
                                   
								</li>
                                <li class="more">
                                    <span><a href="#">ATM/SATM</a>
                                      
                                    </span>
                                  
                                </li>
                                <li class="more">
                                    <span><a href="#">DOCTRINES</a>
                                     
                                    </span>
                                
                                </li>
                                <li class="more">
                                    <span><a href="#">TRG ESTS</a>
                                        <i class='fa fa-chevron-right arrow more-arrow'></i>
                                    </span>
                                    <ul class="more-sub-menu sub-menu has-sub">
                                        <li class="has-submenu">
                                            <a href="#">ARMY TRG </a> <i
                                                class='fa fa-chevron-right arrow more-arrow'></i>
                                            <ul class="sub-menu">
                                                <li><a href="#">SCHOOL OF ARTY</a></li>
                                                <li><a href="#">ACC&S</a></li>
                                                <li><a href="#">INF SCHOOL</a></li>
                                                <li><a href="#">CAATS</a></li>
                                                <li><a href="#">AADS</a></li>
                                                <li><a href="#">SFTS</a></li>
                                                <li><a href="#">JL WING</a></li>
                                                <li><a href="#">AATS</a></li>
                                                <li><a href="#">MIC&S</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="#">ALL ARMY TRG </a><i
                                                class='fa fa-chevron-right arrow more-arrow'></i>
                                            <ul class="sub-menu">
                                                <li><a href="#"> AWC</a></li>
                                                <li><a href="#"> CIJW</a></li>
                                                <li><a href="#"> MINT SD</a></li>
                                                <li><a href="#"> JLA</a></li>
                                                <li><a href="#"> NCO ACADEMY</a></li>
                                                <li><a href="#"> IML</a></li>
                                                <li><a href="#"> INI</a></li>
                                                <li><a href="#"> HAWS</a></li>
                                                <li><a href="#"> AIPT</a></li>
                                                <li><a href="#"> AEC T&C</a></li>

                                            </ul>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="#">SERVICES TRG </a><i
                                                class='fa fa-chevron-right arrow more-arrow'></i>
                                            <ul class="sub-menu">
                                                <li><a href="#"> AMC C&C</a></li>
                                                <li><a href="#"> ASC C&C</a></li>
                                                <li><a href="#"> CMM</a></li>
                                                <li><a href="#"> RVC C&C</a></li>
                                                <li><a href="#"> CMP C&S</a></li>
                                            </ul>
                                        </li>

                                        <li class="has-submenu">
                                            <a href="#">TECH TRG </a><i
                                                class='fa fa-chevron-right arrow more-arrow'></i>
                                            <ul class="sub-menu">
                                                <li><a href="#"> CME</a></li>
                                                <li><a href="#"> MCEME</a></li>
                                                <li><a href="#"> MCTE</a></li>
                                                <li><a href="#"> EME SCHOOL</a></li>
                                                <li><a href="#"> SDD</a></li>

                                            </ul>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="#">PRE COMMISION TRG </a><i
                                                class='fa fa-chevron-right arrow more-arrow'></i>
                                            <ul class="sub-menu">
                                                <li><a href="#"> IMA</a></li>
                                                <li><a href="#"> OTA GAYA</a></li>
                                                <li><a href="#"> OTA CHENNAI</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-submenu">
                                            <a href="#">WARGAMING DEV CENTER</a>

                                        </li>

                                    </ul>




                                </li>
                                	
							</ul>
                        </li>
                       
                    </ul>

                </div>

            </div>
        </nav> -->
       
   
				  
      <button class="tab-btn" data-tab="duties">Charter Duties</button>
      <!-- <button class="tab-btn" data-tab="link1">Guideline PPP</button>
      <button class="tab-btn" data-tab="link2">Budgetary SP</button> -->

     
    </aside>


      <section class="">
    <section class="content place active" id="content-area">
      <h2 class="charter-duties">Welcome to Infosys Management</h2>
	  
	  <div class="sectionunder-content">
     <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
   <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  </div>
  
  
  
    </section>
	
	
	 <section class="content place" id="role">
      <h2 class="charter-duties">Role</h2>
	  
	  <div class="sectionunder-content">
     <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
   <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  </div>
  
  
  
    </section>
	
	 <section class="content place" id="duties">
      <h2 class="charter-duties">Charter Duties</h2>
	  
	  <div class="sectionunder-content">
     <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
   <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p>
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  <p class="csp-text-block">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  </div>
  
  
  
    </section>
	
	 
	
	
	


	 
	

</section>

	   

  



</main>


    
<script nonce="{{ app('cspNonce') }}">
document.querySelectorAll(".btn-group.has-sub > .tab-btn").forEach(btn => {
    btn.addEventListener("click", function () {
        let parent = this.parentElement;

        // close other open groups
        document.querySelectorAll(".btn-group").forEach(g => {
            if (g !== parent) g.classList.remove("open");
        });

        // toggle this one
        parent.classList.toggle("open");
    });
});
</script>
<script nonce="{{ app('cspNonce') }}">
document.querySelectorAll('.whatsnew-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();

        const now = new Date();
        const localDateTime =
            now.getFullYear() + '-' +
            String(now.getMonth() + 1).padStart(2, '0') + '-' +
            String(now.getDate()).padStart(2, '0') + ' ' +
            String(now.getHours()).padStart(2, '0') + ':' +
            String(now.getMinutes()).padStart(2, '0') + ':' +
            String(now.getSeconds()).padStart(2, '0');

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = this.href;
        form.target = '_blank';

        const token = document.createElement('input');
        token.type = 'hidden';
        token.name = '_token';
        token.value = '{{ csrf_token() }}';

        const time = document.createElement('input');
        time.type = 'hidden';
        time.name = 'local_time';
        time.value = localDateTime;

        form.appendChild(token);
        form.appendChild(time);
        document.body.appendChild(form);
        form.submit();
        form.remove();
    });
});
</script>

<script nonce="{{ app('cspNonce') }}">
/* ----------- TABS ----------- */
const tabs = document.querySelectorAll(".tab-btn");
const contents = document.querySelectorAll(".content");

tabs.forEach(btn => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();

        // Remove active class from all tabs and contents
        tabs.forEach(b => b.classList.remove("active"));
        contents.forEach(c => c.classList.remove("active"));

        // Activate clicked tab and its content
        btn.classList.add("active");
        const target = btn.dataset.tab;
        const targetContent = document.getElementById(target);
        if (targetContent) {
            targetContent.classList.add("active");
        }

        // Optional: Re-initialize slider only if gallery tab is clicked
        if (target === "gallery" && typeof showSlides === "function") {
            showSlides(slideIndex);
        }
    });
});
</script>
   

  @endsection
