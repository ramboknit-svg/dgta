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
  .csp-text-center { text-align:center; }
  .csp-link-heading-accent { color: #7b0c17; font-size: 26px; font-weight: 600; text-decoration: none; }

  </style>
<div class="branch-bar">{{$branch->name}}</div>

  <main>
    <aside>
                 
                <div class="hod-profile">
                  @if($branch->slug=="goc" || $branch->slug=="cos" )
                  <h2 class="csp-text-center"><a href="{{url('hod')}}" class="csp-link-heading-accent">{{$branch->name}}</a></h2>
                  @else
                  <h2 class="csp-text-center"><a href="javascript:" class="csp-link-heading-accent">{{$branch->name}}</a></h2>
                  @endif
                   <div class="hod-photo branch">
				   <a href="{{url('hod')}}"><img src="{{asset($branch->image)}}"></a>
				   </div>
				    <h3><span><small>{{$branch->designation}}</small></span> {{$branch->head_name}}
                        </h3>
                  
                  
                 </div>
                
				  <button class="tab-btn" data-tab="policy">Role</button>
      <button class="tab-btn" data-tab="duties">CHARTER OF DUTIES</button>
       <button class="tab-btn" data-tab="charter">POLICY LETTERS</button>
     

       
     
    </aside>

    <section class="content" id="content-area">
      <h2 class="charter-duties">Welcome to Infosys Management</h2>
	  
	       
      {!! $branch->description !!}
  
    </section>
  </main>
  <!-- Added Bootstrap JS CDN -->
    

     <script nonce="{{ app('cspNonce') }}">
    const content = {
      
      duties: `
        {!! $branch->duty !!}
   
      `,
       charter: `
       {!! $branch->policy !!}
   
      `,
      policy: `
            {!! $branch->role !!}
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
