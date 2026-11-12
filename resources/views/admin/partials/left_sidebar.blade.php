<style  nonce="{{ app('cspNonce') }}">
aside.main-sidebar {
    background: #002C5F !important;
}

.sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
.sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
    background-color: #ffffff;
    color: #000;
}

.side-active {
    background: #ffffff;
    color: #000 !important;
}

li.nav-item.side-active a {
    color: #000;
}

.brand-image.elevation-3 {
        /* width: 100%; */
    border-radius: 0 !important;
    margin-top: -8px;
    /* box-shadow: unset !important; */
    max-height: 100%;
    margin-left: 0;
    box-shadow: rgb(0 0 0 / 27%) 0px 54px 55px, rgb(0 0 0 / 30%) 0px -12px 30px, rgb(0 0 0 / 35%) 0px 4px 6px, rgb(0 0 0 / 26%) 0px 12px 13px, rgb(0 0 0 / 20%) 0px -3px 5px !important;
    border-radius: 50% !important;

}

.layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]) {
       background-color: #ffffff !important;
    display: flex
;
    justify-content: center;
}

.brand-link .brand-text {
    font-size: 14px;
    color: #000;
    font-weight: 800 !important;

}

.sidebar-mini.sidebar-collapse .brand-link .brand-image.elevation-3 {
    width: 50px;
    margin-top: 8px;
    margin-left: 0;
    
}

.layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]) {}


.brand-link .brand-text {
    color: #fff;
}

li.nav-item.side-active a:hover {
    color: #000 !important;
}

li.nav-item.side-active a {
    color: #000 !important;
}

.brand-image.elevation-3 {
        /* width: 100%; */
    border-radius: 0 !important;
    margin-top: -8px;
    /* box-shadow: unset !important; */
    max-height: 100%;
    margin-left: 0;
    box-shadow: rgb(0 0 0 / 27%) 0px 54px 55px, rgb(0 0 0 / 30%) 0px -12px 30px, rgb(0 0 0 / 35%) 0px 4px 6px, rgb(0 0 0 / 26%) 0px 12px 13px, rgb(0 0 0 / 20%) 0px -3px 5px !important;
    border-radius: 50% !important;
    width: 100px;

}
.os-padding {
    top: 44px !important;
}

body.sidebar-mini.layout-fixed.layout-navbar-fixed.layout-footer-fixed .brand-image.elevation-9 {
    display: none;
}

body.sidebar-mini.layout-fixed.layout-navbar-fixed.layout-footer-fixed.sidebar-collapse .brand-image.elevation-9 {
    display: block;
}

body.sidebar-mini.layout-fixed.layout-navbar-fixed.layout-footer-fixed.sidebar-collapse .brand-image.elevation-3 {
    display: none;
}
.layout-navbar-fixed.layout-fixed .wrapper .sidebar {
    margin-top: calc(6.5rem + 1px);
}


.brand-image .img-circle{
   opacity: .8; 
}

</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/dashboard')}}" class="brand-link">
 <img src="{{asset('public/banner.png')}}" alt="" class="brand-image img-circle elevation-3">
        <img src="{{asset('public/banner.png')}}" alt="" class="brand-image img-circle elevation-9">
        <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset(auth()->user()->profile_image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{url('admin/dashboard')}}" class="d-block">{{auth()->user()->name ?? ""}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               
                <li class="nav-item {{ (request()->is('admin/hod_list')) 
                || (request()->is('admin/users-list')) 
                || (request()->is('admin/banner_list')) 
                || (request()->is('admin/news_list')) 
                || (request()->is('admin/application_list')) 
                || (request()->is('admin/new_list')) 
                || (request()->is('admin/get-profile')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Manage Home Page
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                     <ul class="nav nav-treeview">
                 <li class="nav-item {{ request()->is('admin/hod_list') || request()->is('admin/hod_edit/*') ? 'side-active' : '' }}">
                            <a href="{{ url('admin/hod_list') }}" class="nav-link {{ request()->is('admin/hod_list') || request()->is('admin/hod_edit/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>DGTA</p>
                            </a>
                        </li>
                <li class="nav-item {{ request()->is('admin/users-list') || request()->is('admin/users_edit/*') ? 'side-active' : '' }}">
                            <a href="{{ url('admin/users-list') }}" class="nav-link {{ request()->is('admin/users-list')  ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>Organogram</p>
                            </a>
                        </li>

                <li class="nav-item @if(URL::current()==url('admin/banner_list')) {{'side-active'}} @endif">
                    <a href="{{url('admin/banner_list')}}" class="nav-link">
                        <i class="nav-icon fas  fa-cog"></i>
                        <p>
                            Manage Banner
                        </p>
                    </a>
                </li>

               
                                <li class="nav-item @if(URL::current()==url('admin/news_list')) {{'side-active'}} @endif">
                                <a href="{{url('admin/news_list')}}" class="nav-link">
                                 <i class="nav-icon fas  fa-cog"></i>
                                <p>
                            Manage Milestone
                           </p>
                           </a>
                         </li>
            <li class="nav-item @if(URL::current()==url('admin/application_list')) {{'side-active'}} @endif">
<a href="{{url('admin/application_list')}}" class="nav-link">
<i class="nav-icon fas  fa-cog"></i>
<p>

                            Manage Applications
</p>
</a>
</li>

<li class="nav-item @if(URL::current()==url('admin/new_list')) {{'side-active'}} @endif">
<a href="{{url('admin/new_list')}}" class="nav-link">
<i class="nav-icon fas  fa-cog"></i>
<p>
                            Manage Whats New
</p>
</a>
</li>
</ul>
</li>




<li class="nav-item {{ (request()->is('admin/profile')) || (request()->is('admin/change-password-view')) || (request()->is('admin/get-profile')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Manage DGTA Detail
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item @if(URL::current()==url('admin/dgta_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/dgta_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>DGTA Detail</p>
                            </a>
                        </li>
                    </ul>
                </li>

  <li class="nav-item {{ request()->is('admin/branch_list') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-code-branch"></i>
                        <p>
                            Manage Branch
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                       <li class="nav-item @if(URL::current()==url('admin/branch_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/branch_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Branch</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item {{ request()->is('admin/teldir_list') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-phone-alt"></i>
                        <p>
                            Manage Tel Dir
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                      <li class="nav-item @if(URL::current()==url('admin/teldir_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/teldir_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>Tel Dir</p>
                            </a>
                        </li>
                    </ul>
                </li>    
                <li class="nav-item {{ request()->is('admin/award_list') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-phone-alt"></i>
                        <p>
                            Manage Award
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                      <li class="nav-item @if(URL::current()==url('admin/award_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/award_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>Award</p>
                            </a>
                        </li>
                    </ul>
                </li>   
                  <li class="nav-item {{ (request()->is('admin/profile')) || (request()->is('admin/change-password-view')) || (request()->is('admin/get-profile')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>Manage TA UNIT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item @if(URL::current()==url('admin/knowledge_category_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/knowledge_category_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>TA UNITS</p>
                            </a>
                        </li>

                         
                    </ul>
                </li>
                 <li class="nav-item {{ (request()->is('admin/profile')) || (request()->is('admin/change-password-view')) || (request()->is('admin/get-profile')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Manage TAC/REACT
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item @if(URL::current()==url('admin/gate_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/gate_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>TAC/REACT</p>
                            </a>
                        </li>

                         <li class="nav-item @if(URL::current()==url('admin/gate_pdf_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/gate_pdf_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p> TAC/REACT Pdf</p>
                            </a>
                        </li>
                    </ul>
                </li>
                 <li class="nav-item {{ (request()->is('admin/profile')) || (request()->is('admin/change-password-view')) || (request()->is('admin/get-profile')) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                       <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Manage TA Rules/Policy
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item @if(URL::current()==url('admin/resources_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/resources_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>Rules/Policy</p>
                            </a>
                        </li>

                         <li class="nav-item @if(URL::current()==url('admin/resource_pdf_list')) {{'side-active'}} @endif">
                            <a href="{{url('admin/resource_pdf_list')}}" class="nav-link">
                                <i class="nav-icon fas fa-file-pdf"></i>
                                <p>Rules/Policy Pdf</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="nav-item">
                    <a href="{{route('Admin.Logout')}}" class="nav-link" ">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a href="{{route('saml.slo')}}" class="nav-link" ">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script  nonce="{{ app('cspNonce') }}">
function confirmLogout() {
    return confirm('Are you sure you want to logout?');
}
</script>
