@include('layouts.parts.sidebar')
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
                                                    @php $user = Auth::user(); @endphp
                                                        <img src="{{ $user->account ? $user->account->photo : ($user->siteengineer ? $user->siteengineer->photo : ($user->telecaller ? $user->telecaller->photo : ($user->chiefengineer ? $user->chiefengineer->photo : ($user->salesmanager ? $user->salesmanager->photo : ($user->salesperson ? $user->salesperson->photo : ''))))) }}" alt="" style="width:35px;" />
                                                        <span class="admin-name">{{ Auth::user()->name }}  </span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    
                                                    <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                    </li>
                                                    
                                                    <li>
                                                        <a  href="{{ route('admin.logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                                     <i class="fa fa-sign-out"></i>
                                                        <span>{{ __('Logout') }}</span>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                    </li>

                                                </ul>
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
                                <li><a  href="{{ route('user.dashboard')}}">Dashboard <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        
                                </li>
                                @auth('user')
                                    @if (auth()->user()->role == 'telecaller')
                                        <x-user.telecaller.mobilebar />
                                    @endif
                                    @if (auth()->user()->role == 'account')
                                        <x-user.account.mobilebar />
                                    @endif
                                    @if (auth()->user()->role == 'siteengineer')
                                        <x-user.siteengineer.mobilebar />
                                    @endif
                                    @if (auth()->user()->role == 'chiefengineer')
                                        <x-user.chiefengineer.mobilebar />
                                    @endif
                                    @if (auth()->user()->role == 'salesmanager')
                                        <x-user.salesmanager.mobilebar />
                                    @endif
                                    @if (auth()->user()->role == 'salesperson')
                                        <x-user.salesperson.mobilebar />
                                    @endif
                                @endauth
                                <br>
                                </ul>

                             </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        
