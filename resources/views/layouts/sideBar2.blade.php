<?php 
 $role=Auth::user()->Role;
 $project=DB::table('role_wise_permissions')
 ->leftjoin('main_manus','main_manus.id','=','role_wise_permissions.MenuId')
 ->leftjoin('parent_manus','parent_manus.id','=','main_manus.ParentMenu')
 ->select('parent_manus.ParentMenu','parent_manus.id','parent_manus.MenuIcon','parent_manus.class','role_wise_permissions.MenuId')
 ->where('role_wise_permissions.roleId',$role)
 ->where('main_manus.projectName',4)
 ->orderBy('parent_manus.Order','ASC')
 ->groupBy('main_manus.ParentMenu')
 ->get();

 $pickupRequest = DB::table('Pickup_Request')->select(DB::raw('COUNT(Pickup_Request.id) as Total'))->first();
 $UrgentDelivery = DB::table('Docket_Case')->leftjoin("docket_masters","docket_masters.Docket_No","=","Docket_Case.Docket_Number")
 ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
 ->select(DB::raw('COUNT(Docket_Case.Docket_Number) as Total'))
 ->where("docket_allocations.Status","!=",8)
 ->where("Docket_Case.Case_Status","!=",'CLOSED')->first();

 $UserId = Auth::id();
 $EmployeeOffice = DB::table('employees')->leftjoin('office_masters','office_masters.id','employees.OfficeName')
 ->select('office_masters.OfficeCode','office_masters.OfficeName')->where("employees.user_id",$UserId)->first();
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
                           <a href="{{url('OperationDashboard')}}" class="side-nav-link">
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
                        <div class="headoffice"><b>OFFICE :</b> {{$EmployeeOffice->OfficeCode}}  -  {{$EmployeeOffice->OfficeName}}</div>
                        <div class="d-flex">
                            <div class="d-flex justify-content-between">

                                <div class="header-box header-box-green">
                                    <div class="d-flex align-items-center"> 
                                    <i class="fa fa-envelope-o" style="margin-right: 10px;"></i>
                                    <span> 0</span>
                                    </div>
                                    <div>TRAINING DOC.</div>
                                   
                                </div>
                                <div class="header-box header-box-red">
                                   <div class="d-flex align-items-center"> 
                                    <i class="fa fa-bicycle" style="margin-right: 10px;"></i>
                                    <a href="{{url('UrgentDeliveryDashboard')}}" style="text-decoration: underline;color: #fff;"> {{$UrgentDelivery->Total}}</a>
                                    </div>
                                    <div>URGENT</div>
                                </div>
                                <div class="header-box header-box-yellow">
                                    <div class="d-flex align-items-center"> 
                                    <i class="fa fa-bicycle" style="margin-right: 10px;"></i>
                                    <a href="{{url('PendingPickupRequestDashboard')}}" style="text-decoration: underline;color: #000;"> {{$pickupRequest->Total}}</a>
                                    </div>
                                    <div>PICKUP</div>
                                </div>
                                
                            </div>
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
                    
                    </div>