@include('admin.parts.sidebar')
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro " >
                    <a href="#."><img style="max-height: 50px;" class="main-logo" src="{{ asset('image/skslogo.png') }}" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
    											<i class="educate-icon educate-nav"></i>
    										</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            
                                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                    <div class="notification-single-top">
                                                        <h1>Notifications</h1>
                                                    </div>
                                                    <ul class="notification-menu">
                                                        
                                                        
                                                    </ul>
                                                    <div class="notification-view">
                                                        <a href="#">View All Notification</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
    													<img src="{{Auth::user()->image_url}}" alt="" style="background:#fff;width: 50px;height: 40px;" />
    													<span class="admin-name">{{ Auth::user()->name }}  </span>
    													<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
    												</a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    
                                                    <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item nav-setting-open">
                                                <a  href="{{ route('admin.logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                                     <i class="fa fa-sign-out"></i>
                                                        <span>{{ __('Logout') }}</span>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                        
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a href="{{ route('admin.dashboard')}}">Dashboard</a></li>
                                <li><a href="{{ route('admin.staff')}}">Staff</a></li>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Supplier <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{ route('supplier.index')}}">Material Supplier</a></li>
                                        <li><a href="{{ route('supplierassignview')}}">Supplier Assign</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Customers <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{ route('landcustomer.index')}}">Land Customers</a></li>
                                        <li><a href="{{ route('contractcustomer.index')}}">Contract Customers</a></li>
                                        <li><a href="{{ route('villacustomer.index')}}">Villa Customers</a></li>
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Project Details <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{ route('landproject.index')}}">Land Projects</a></li>
                                        <li><a href="{{ route('contractproject.index')}}">Contract Projects</a></li>
                                        <li><a href="{{ route('villaproject.index')}}">Villa Projects</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('meterial.index')}}">Material Master</a></li>
                                <li><a href="{{ route('worker.index')}}">Worker Master</a></li>
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Reports <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="{{ route('salaryreport')}}">Salary Reports</a></li>
                                        <li><a href="{{ route('expensereport')}}">Expense Reports</a></li>
                                        <li><a href="{{ route('landprojectreport')}}">Land Reports</a></li>
                                        <li><a href="{{ route('contractprojectreport')}}">Contract Reports</a></li>
                                        <li><a href="{{ route('villaprojectreport')}}">Villa Reports</a></li>
                                        <li><a href="{{ route('income')}}">Income Reports</a></li>
                                        <li><a href="{{ route('supplierreport')}}">Supplier Reports</a></li>
                                        <li><a href="{{ route('lsupplierreport')}}">Labour Reports</a></li>
                                    </ul>
                                </li>
                                </ul>
                             </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        
