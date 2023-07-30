<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href=""><img class="main-logo" src="{{ asset('image/skslogo.png') }}" alt="" /></a>
                <strong><a href=""><img src="{{ asset('image/skslogo.png') }}" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a  href="{{ route('user.dashboard')}}">
                                   <span class="educate-icon educate-home icon-wrap"></span>
                                   <span class="mini-click-non">Dashboard</span>
                                </a>
                        </li>
                        @auth('user')
                            @if (auth()->user()->role == 'telecaller')
                                <x-user.telecaller.sidebar />
                            @endif
                            @if (auth()->user()->role == 'account')
                                <x-user.account.sidebar />
                            @endif
                            @if (auth()->user()->role == 'siteengineer')
                                <x-user.siteengineer.sidebar />
                            @endif
                            @if (auth()->user()->role == 'chiefengineer')
                                <x-user.chiefengineer.sidebar />
                            @endif
                            @if (auth()->user()->role == 'salesmanager')
                                <x-user.salesmanager.sidebar />
                            @endif
                            @if (auth()->user()->role == 'salesperson')
                                <x-user.salesperson.sidebar />
                            @endif
                        @endauth
                    </ul>
                </nav>
            </div>
        </nav>
    </div>