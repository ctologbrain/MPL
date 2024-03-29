<?php $role=Auth::user()->Role;
if(isset($role))
{

 $project=DB::table('role_wise_permissions')
 ->leftjoin('main_manus','main_manus.id','=','role_wise_permissions.MenuId')
 ->leftjoin('parent_manus','parent_manus.id','=','main_manus.ParentMenu')
 ->select('parent_manus.ParentMenu','parent_manus.id','parent_manus.MenuIcon','parent_manus.class','role_wise_permissions.MenuId')
 ->where('role_wise_permissions.roleId',$role)
 ->where('main_manus.projectName',2)
 ->groupBy('main_manus.ParentMenu')
 ->get();
}
else{ ?>
    <script>
     var base_url = '{{url('')}}';
  location.href = base_url+'/logout';

</script>
<?php }
 ?>
   <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true" data-leftbar-compact-mode="condensed">
        <!-- Begin page -->
        <div class="wrapper">
           <div class="leftside-menu">
           <a href="{{url('')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{url('assets/images/Metrologo.png')}}" alt="" width="100%">
                    </span>
                    <span class="logo-sm">
                        <img src="{{url('assets/images/Metrologo50.png')}}" alt="" width="302px;">
                    </span>
                </a>
                <a href="index.html" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="{{url('assets/images/logo-dark.png')}}" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="{{url('assets/images/logo_sm_dark.png')}}" alt="" height="16">
                    </span>
                </a>
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                
                    <ul class="side-nav">
                         <li class="side-nav-item">
                           <a href="{{url('AccountDashboard')}}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                              <span> Dashboards </span>
                            </a>
                         </li>
                         @foreach($project as $projectName)
                       <li class="side-nav-item">
                       <a data-bs-toggle="collapse" href="#{{$projectName->class}}" aria-expanded="false" aria-controls="{{$projectName->class}}" class="side-nav-link">
                                <i class="{{$projectName->MenuIcon}}"></i>
                                <span>{{$projectName->ParentMenu}}</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="{{$projectName->class}}" style="">
                                <ul class="side-nav-second-level">
                                    <?php 
                                    
                                    $mainMenu=DB::table('role_wise_permissions')
                                   ->leftjoin('main_manus','main_manus.id','=','role_wise_permissions.MenuId')
                                   ->where('role_wise_permissions.roleId',$role)
                                   ->where('main_manus.ParentMenu',$projectName->id)
                                   ->get();?>
                                   @foreach($mainMenu as $menus)
                                    <li>
                                        <a href="{{url($menus->MenuIcon)}}">{{$menus->MenuName}}</a>
                                    </li>
                                    @endforeach
                                 
                                   
                                   
                                </ul>
                            </div>
                        </li>
                        @endforeach
                        
                        
                        
                        
                       
                        
                        </ul>
                    
                          
                 <div class="clearfix"></div>
               </div>
             </div>
            <div class="content-page">
                   <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                               
                            </li>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="{{url('assets/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                                    </span>
                                    
                                        <span class="account-user-name"> {{ Auth::user()->name }}</span>
                                  
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="{{url('webadmin/profile')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{url('webadmin/profile')}}" class="dropdown-item notify-item">
                                            <i class="mdi mdi-calendar-month me-1"></i>
                                            <span>Planner</span>
                                        </a>

                                        <a href="{{url('webadmin/profile')}}" class="dropdown-item notify-item">
                                            <i class="mdi mdi-key me-1"></i>
                                            <span>Reset Password</span>
                                        </a>
                                        <a href="{{url('HolidayListMaster')}}" class="dropdown-item notify-item">
                                            <i class="mdi mdi-menu me-1"></i>
                                            <span>Holiday List</span>
                                        </a>
                                        <a href="{{url('docketTracking')}}" class="dropdown-item notify-item">
                                            <i class="mdi mdi-magnify me-1"></i>
                                            <span>Docket Tracking</span>
                                        </a>
                                        <a href="{{url('fpmTracking')}}" class="dropdown-item notify-item">
                                            <i class="mdi mdi-magnify me-1"></i>
                                            <span>FPM  Tracking</span>
                                        </a>

                                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="mdi mdi-logout me-1"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                       
                                 
                                </div>
                            </li>

                        </ul>
                    </div>