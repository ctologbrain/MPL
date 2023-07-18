   <?php $value = Session::get('id');?>
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
                           <a href="{{url('CashDashboard')}}" class="side-nav-link">
                                <i class="uil-dashboard"></i>

                              <span> Cash Dashboard </span>
                            </a>
                         </li>
                       
                         <li class="side-nav-item">
                            <a href="{{url('CashDepositHo')}}" class="side-nav-link">
                                <i class="uil-money-insert"></i>
                                <span> Cash Deposit at HO </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{url('AdvancePayout')}}" class="side-nav-link">
                                <i class="uil-money-insert"></i>
                                <span>Advance Payout</span>
                            </a>
                        </li>
                       
                        <li class="side-nav-item">
                            <a href="{{url('ExpenseClaimed')}}" class="side-nav-link">
                                <i class="uil-moneybag-alt"></i>
                                <span> Expense Claimed </span>
                            </a>
                        </li> 
                         <!-- <li class="side-nav-item">
                            <a href="{{url('webadmin/ExpenseClaimedEdit')}}" class="side-nav-link">
                                <i class="uil-presentation-edit"></i>
                                <span> Expense Claimed - Edit </span>
                            </a>
                        </li> -->
                        <!-- <li class="side-nav-item">
                            <a href="{{url('webadmin/AddressList')}}" class="side-nav-link">
                                <i class=" uil-presentation-play"></i>
                                <span> Expense Claimed - Special</span>
                            </a>
                        </li>  -->
                      <!--   <li class="side-nav-item">
                            <a href="{{url('webadmin/AddressList')}}" class="side-nav-link">
                                <i class=" uil-presentation-minus"></i>
                                <span> Expense Approval - Special</span>
                            </a>
                        </li>  -->
                        <!-- <li class="side-nav-item">
                            <a href="{{url('webadmin/AddressList')}}" class="side-nav-link">
                                <i class="uil-money-withdrawal"></i>
                                <span> Expense Payment</span>
                            </a>
                        </li>  -->
                       <!--  <li class="side-nav-item">
                            <a href="{{url('webadmin/ExpenseCancle')}}" class="side-nav-link">
                                <i class=" uil-right-indent-alt"></i>
                                <span> Expense Cancel</span>
                            </a>
                        </li> -->
                       
                        <!-- <li class="side-nav-item">
                            <a href="{{url('webadmin/CashRequestApproved')}}" class="side-nav-link">
                                <i class="uil-presentation"></i>
                                <span> Cash Request Approve </span>
                            </a>
                        </li> -->

                        <!-- <li class="side-nav-item">
                            <a href="{{url('webadmin/ExpenseRequest')}}" class="side-nav-link">
                                <i class="uil-moneybag-alt"></i>
                                <span> Expense Request </span>
                            </a>
                        </li>-->
                        <li class="side-nav-item">
                            <a href="{{url('ExpenseRequestApproved')}}" class="side-nav-link">
                                <i class="uil-presentation"></i>
                                <span> Expense Request Approve </span>
                            </a>
                        </li> 
                        
                         <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link collapsed">
                                <i class="uil-store"></i>
                                <span> Report </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce" style="">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{url('CashLedger')}}">Imprest Ledger</a>
                                    </li>
                                    <li>
                                        <a href="{{url('CashPaymentRegister')}}">Cash Payment Register</a>
                                    </li>
                                    <li>
                                        <a href="{{url('ExpenseRegister')}}">Expense Register</a>
                                    </li>
                                    
                                    <li>
                                        <a href="{{url('HeadWiseRegisterNew')}}">Head Wise Expense Register</a>
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
                                    
                                        <span class="account-user-name">{{'Sachin'}}</span>
                                  
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
                                        <a href="{{url('webadmin/profile')}}" class="dropdown-item notify-item">
                                            <i class="mdi mdi-calendar-month me-1"></i>
                                            <span>Planner</span>
                                        </a>

                                        <a href="{{url('webadmin/profile')}}" class="dropdown-item notify-item">
                                            <i class="mdi mdi-key me-1"></i>
                                            <span>Reset Password</span>
                                        </a>
                                        <a href="{{url('webadmin/profile')}}" class="dropdown-item notify-item">
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

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
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