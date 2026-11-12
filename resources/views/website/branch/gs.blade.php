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
    aside button:hover, aside button.active {
      background: #7b0c17;

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
  

  /* CSP-safe extracted styles */
  .csp-text-block { font-size: 18px; color: #333; margin-bottom:20px; line-height: 1.6; }

  </style>
<div class="branch-bar">GS BRANCH</div>

  <main>
    <aside>
      
                <div class="hod-profile">
                   <div class="hod-photo branch">
				   <img src="{{asset('/public/website/f.jpg')}}">
				   </div>
				    <h3>Mr. Gaurav,
                        <br><span><small>Lt. General</small></span></h3>
                  
                  
                 </div>
                
				  <button class="tab-btn" data-tab="policy">Role</button>
      <button class="tab-btn" data-tab="duties">CHARTER OF DUTIES</button>
        
       <button class="tab-btn" data-tab="duties">POLICY LETTERS</button>
     

     
    </aside>

    <section class="content" id="content-area">
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
  </main>
  <!-- Added Bootstrap JS CDN -->
    

     <script nonce="{{ app('cspNonce') }}">
    const content = {
      
      duties: `
       <h3 class="charter-duties" id="charter"> Charter of Duties</h3>
	   <div class="sectionunder-content">
        <p>
    <strong>The Charter of Duties</strong>  outlines the principles and responsibilities expected from every member of the organization. Each individual must uphold integrity, discipline, and professionalism in every task undertaken. Duties should be carried out with efficiency, commitment, and a sense of accountability, ensuring that personal conduct reflects the values and reputation of the institution. Members are expected to safeguard confidentiality, promote teamwork, and contribute to an atmosphere of mutual respect and cooperation. Continuous learning, adaptability, and dedication to service excellence are central to this charter. Above all, every action must be guided by loyalty, transparency, and an unwavering commitment to the organization’s mission and ethical standards.
  </p>
  
  <ul class="duites">
  <li><strong>Strategic Leadership & Oversight:</strong> Formulate and execute strategic plans, doctrinal consistency, and joint operations.</li>
  <li><strong>Operational Policy Formulation:</strong> Develop multi-domain warfare doctrines integrating modern technologies.</li>
  <li><strong>Education and Doctrine Development:</strong> Design and validate military academic curricula, encourage advanced research.</li>
  <li><strong>Inter-Service Coordination:</strong> Ensure seamless collaboration between Army, Navy, and Air Force branches.</li>
  <li><strong>Human Capital Development:</strong> Lead officer education, leadership grooming, and performance evaluation systems.</li>
  <li><strong>International Collaboration:</strong> Promote defense diplomacy and joint military education programs globally.</li>
  <li><strong>Crisis and Conflict Response:</strong> Strategically advise during national emergencies and live conflict scenarios.</li>
  
  <li><strong>Uphold Integrity and Discipline:</strong> Maintain the highest standards of honesty, discipline, and professional ethics in all duties.</li>
  <li><strong>Ensure Operational Efficiency:</strong> Perform all assigned tasks with diligence, accuracy, and timeliness to ensure smooth organizational functioning.</li>
  <li><strong>Commitment to Service:</strong> Prioritize organizational objectives over personal interests and serve with dedication and loyalty.</li>
  <li><strong>Accountability and Responsibility:</strong> Take full responsibility for assigned work and be accountable for actions and decisions taken.</li>
  <li><strong>Maintain Confidentiality:</strong> Safeguard sensitive information and ensure it is used only for authorized purposes.</li>
  <li><strong>Promote Teamwork and Cooperation:</strong> Encourage collaboration, respect diversity, and maintain a spirit of unity and mutual support.</li>
  <li><strong>Continuous Improvement:</strong> Strive for excellence by upgrading professional knowledge, adapting to new systems, and adopting best practices.</li>
  <li><strong>Public Service and Conduct:</strong> Exhibit courteous, transparent, and impartial behavior in dealing with the public and colleagues.</li>
</ul>

  
		</div>
   
      `,
      policy: `
           <h3 class="charter-duties" id="charter"> Role</h3>
       <div class="sectionunder-content">
        <p>
    <strong>The Role</strong>  encompasses providing visionary leadership, strategic guidance, and operational direction to ensure the organization’s objectives are met with efficiency and integrity. It involves developing and implementing policies, doctrines, and systems that align with national priorities and institutional mandates. As a central link between strategy and execution, the role demands fostering inter-departmental coordination, mentoring future leaders, and ensuring resource optimization. It also emphasizes modernization through research, innovation, and global collaboration. Ultimately, the role serves as the cornerstone of organizational strength — ensuring preparedness, discipline, and excellence across all levels of command and operation.
  </p>
  
  <ul class="duites">
  <!-- Charter of Duties -->
  <li><strong>Strategic Leadership & Oversight:</strong> Formulate and execute strategic plans, doctrinal consistency, and joint operations.</li>
  <li><strong>Operational Policy Formulation:</strong> Develop multi-domain warfare doctrines integrating modern technologies.</li>
  <li><strong>Education and Doctrine Development:</strong> Design and validate military academic curricula, encourage advanced research.</li>
  <li><strong>Inter-Service Coordination:</strong> Ensure seamless collaboration between Army, Navy, and Air Force branches.</li>
  <li><strong>Human Capital Development:</strong> Lead officer education, leadership grooming, and performance evaluation systems.</li>
  <li><strong>International Collaboration:</strong> Promote defense diplomacy and joint military education programs globally.</li>
  <li><strong>Crisis and Conflict Response:</strong> Strategically advise during national emergencies and live conflict scenarios.</li>
  
  <li><strong>Uphold Integrity and Discipline:</strong> Maintain the highest standards of honesty, discipline, and professional ethics in all duties.</li>
  <li><strong>Ensure Operational Efficiency:</strong> Perform all assigned tasks with diligence, accuracy, and timeliness to ensure smooth organizational functioning.</li>
  <li><strong>Commitment to Service:</strong> Prioritize organizational objectives over personal interests and serve with dedication and loyalty.</li>
  <li><strong>Accountability and Responsibility:</strong> Take full responsibility for assigned work and be accountable for actions and decisions taken.</li>
  <li><strong>Maintain Confidentiality:</strong> Safeguard sensitive information and ensure it is used only for authorized purposes.</li>
  <li><strong>Promote Teamwork and Cooperation:</strong> Encourage collaboration, respect diversity, and maintain a spirit of unity and mutual support.</li>
  <li><strong>Continuous Improvement:</strong> Strive for excellence by upgrading professional knowledge, adapting to new systems, and adopting best practices.</li>
  <li><strong>Public Service and Conduct:</strong> Exhibit courteous, transparent, and impartial behavior in dealing with the public and colleagues.</li>

  <!-- Role Section -->
  <li><strong>Advisor to Command:</strong> Provide strategic guidance and expert advice to senior leadership on organizational planning, operations, and resource optimization.</li>
  <li><strong>Policy and Doctrine Custodian:</strong> Formulate, interpret, and implement policies and doctrines ensuring alignment with national defense and institutional objectives.</li>
  <li><strong>Operational Coordinator:</strong> Oversee coordination between various departments, units, and inter-service branches to achieve operational synergy.</li>
  <li><strong>Leadership and Mentorship:</strong> Foster professional growth, discipline, and leadership qualities among officers and staff.</li>
  <li><strong>Institutional Representative:</strong> Represent the organization in inter-governmental, academic, and international forums for defense cooperation and policy exchange.</li>
  <li><strong>Resource Management:</strong> Ensure optimal utilization of human, technological, and financial resources for mission readiness and institutional development.</li>
  <li><strong>Innovation and Modernization:</strong> Encourage adoption of new technologies, data-driven decision-making, and continuous process improvement.</li>
  <li><strong>Crisis Management:</strong> Lead strategic decision-making during contingencies, emergencies, and conflict scenarios with precision and composure.</li>
</ul>

  
		</div>
      `
    };

    const buttons = document.querySelectorAll('.tab-btn');
    const contentArea = document.getElementById('content-area');

    buttons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const tab = btn.getAttribute('data-tab');
        contentArea.innerHTML = content[tab];
      });
    });
     </script>


   
  @endsection
