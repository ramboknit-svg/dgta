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
      margin-bottom: 10px;
      padding: 10px;
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
      background: #5a0a12;
  
      transform: scale(1.03);
      box-shadow: 0 0 12px rgba(255,204,0,0.6);
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
	  <!-- max-height: 500px; -->
    <!-- overflow-y: scroll; -->
    }

    

    /* Animations */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>

 <div class="branch-bar">Call Bulletin</div>

  <main>
    <aside>
      
                <div class="hod-profile">
                   
                 </div>

  <nav class="submenu-layer-btn">
            <div class="navbar">
               
                <div class="nav-links">
                   
                    <ul class="links">

                        <li>
                            <a href="#">UNCLASS PUB</a>
                              <i class='fa fa-chevron-right arrow more-arrow'></i>
                           <ul class="htmlCss-sub-menu sub-menu">
    <li class="more">
        <span><a href="#">ARTICLES</a>
          
        </span>
    </li>

    <li class="more">
        <span><a href="#">JOURNALS</a>
           
        </span>
    </li>

    <li class="more">
        <span><a href="#">PERIODICALS</a>
           
        </span>
    </li>

    <li class="more">
        <span><a href="#">AMSB STUDIES</a>
           
        </span>
    </li>

    <li class="more">
        <span><a href="#">INFOSIS LIASON</a>
            
        </span>
    </li>

    <li class="more">
        <span><a href="#">WEDDED TO OLIVE GREEN</a>
          
        </span>
    </li>

    <li class="more">
        <span><a href="#">PINNACLE</a>
           
        </span>
    </li>
</ul>

                        </li>
                       
                        <li>
                            <a href="#">CLASS PUB</a>
                              <i class='fa fa-chevron-right arrow more-arrow'></i>
                            <ul class="htmlCss-sub-menu sub-menu">
                                <li class="more">
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
                                    <span><a href="#">INFOSIS PAPERS</a>
                                       
                                    </span>
                                   

                                </li>
                                  <li class="more">
                                    <span><a href="#">GS TRG PAMPH</a>
                                        <i class='fa fa-chevron-right arrow more-arrow'></i>
                                    </span>
                                    <ul class="more-sub-menu sub-menu">
                                        <li class="has-submenu">
                                            <a href="#">CAT I GSP</a> 
                                        </li>
                                        <li class="has-submenu">
                                            <a href="#">CAT II GSP </a><i
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
                                            <a href="#">CAT III GSP </a>
                                           
                                        </li>

                                        <li class="has-submenu">
                                            <a href="#">CAT IV GSP </a>
                                            
                                        </li>
                                        
                                    </ul>




                                </li>
                            
							
							</ul>
                        </li>
                       
                    </ul>

                </div>

            </div>
        </nav>
       
   


				 
	  <!-- <button class="tab-btn" data-tab="policy">UNCLASS PUB</button> -->
      <!-- <button class="tab-btn" data-tab="duties">CLASS PUB</button> -->
     

     
    </aside>

    <section class="content" id="content-area">
      <h2 class="charter-duties">Content</h2>
	  
	  <div class="sectionunder-content">
     <p style="">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
   <p style="font-size: 18px; color: #333; margin-bottom:20px; line-height: 1.6;">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p style="">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p style="">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  <p style="font-size: 18px; color: #333; margin-bottom:20px; line-height: 1.6;">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  <p style="font-size: 18px; color: #333; margin-bottom:20px; line-height: 1.6;">
    <strong>Excellence in the Art & Science of War</strong> is not just a motto, but a mission. 
    At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
	 At Infosys Management, we cultivate strategic thought, develop defense doctrines, and mentor future leaders across the Army, Navy, and Air Force. 
    This platform is dedicated to empowering excellence in joint warfare strategy, military education, and leadership.
  </p>
  
  </div>
  
    </section>
  </main>

  @endsection
