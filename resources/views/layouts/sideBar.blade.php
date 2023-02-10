<?php $value = Session::get('id');?>
   <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true" data-leftbar-compact-mode="condensed">
        <!-- Begin page -->
        <div class="wrapper">
           <div class="leftside-menu">
           <a href="{{url('webadmin/dashboard')}}" class="logo text-center logo-light">
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
                           <a href="{{url('home')}}" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                              <span> Dashboards </span>
                            </a>
                         </li>
                       <li class="side-nav-item">
                       <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span>   Offcie Setup   </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce" style="">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{url('ProductMaster')}}">Product Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('CheckList')}}">Driver Checklist Master</a>
                                    </li>
                                  
                                    <li>
                                        <a href="{{url('OfficeType')}}">Office Type Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ViewOfficeMaster')}}">Office  Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('AddDesign')}}">Designation Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ViewDept')}}">Department Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('EmployeeMaster')}}">Employee Master</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('Complaint')}}">Complaint Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('NDRMaster')}}">NDR Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ViewDeliveryProof')}}">Delivery Proof Master</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                <i class="uil uil-book-reader"></i>
                                <span> Company Setup </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEmail" style="">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{url('ViewCountry')}}">Country Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('StateList')}}">State Master</a>
                                    </li>
                                  
                                    <li>
                                        <a href="{{url('ZoneList')}}">Zone Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('CityMaster')}}">City Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ViewPinCode')}}">Pincode Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('BankMaster')}}">Bank Master</a>
                                    </li>
                                  
                                   
                                </ul>
                            </div>
                        </li>
                        
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#StockList" aria-expanded="false" aria-controls="StockList" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Stock </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="StockList" style="">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{url('DocketType')}}">Docket Type</a>
                                    </li>
                                    <li>
                                        <a href="{{url('DocketSeriesMaster')}}">Docket Series</a>
                                    </li>
                                    <li>
                                        <a href="{{url('DocketSeriesAllocation')}}">Docket Transfer</a>
                                    </li>
                                    <li>
                                        <a href="{{url('DocketCancel')}}">Docket Cancel</a>
                                    </li>
                                    <li>
                                        <a href="{{url('DocketReport')}}">Docket Report</a>
                                    </li>
                                  
                                   
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#Vendor" aria-expanded="false" aria-controls="Vendor" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Vendor Managment </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Vendor" style="">
                                <ul class="side-nav-second-level">
                                   
                                    <li>
                                        <a href="{{url('VehicleType')}}">Vehicle Model Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ViewVehicle')}}">Vendor Vehicle Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ViewDriver')}}">Driver Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('VendorMaster')}}">Vendor Master</a>
                                    </li>
                                  
                                   
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#operation" aria-expanded="false" aria-controls="operation" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Operation Management </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="operation" style="">
                                <ul class="side-nav-second-level">
                                   <li>
                                        <a href="{{url('PickupScan')}}">Pickup Scan</a>
                                    </li>
                                    <li>
                                        <a href="{{url('PickupScanReport')}}">Pickup Scan Report</a>
                                    </li>
                                   </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#Security" aria-expanded="false" aria-controls="Security" class="side-nav-link">
                                <i class="uil-window"></i>
                                <span> Security </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="Security" style="">
                                <ul class="side-nav-second-level">
                                   <li>
                                        <a href="{{url('RoleMasterList')}}">Role Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('AddProject')}}">Project Master</a>
                                    </li>
                                    <li>
                                        <a href="{{url('AddParentManu')}}">Parent Menu</a>
                                    </li>
                                    <li>
                                        <a href="{{url('AddMainMenu')}}">Main Menu</a>
                                    </li>
                                    <li>
                                 <a href="{{url('PermissionMaster')}}">Role Wise  Permission</a>
                                    </li>
                                   </ul>
                            </div>
                        </li>
                        </ul>
                    
                          
                 <div class="clearfix"></div>
               </div>
             </div>
            <div class="content-page">
                   <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
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
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    
                    </div>