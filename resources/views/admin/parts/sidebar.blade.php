<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard')}}"><img class="main-logo" src="{{ asset('image/skslogo.png') }}" alt="" /></a>
                <strong><a href="{{ route('admin.dashboard')}}"><img src="{{ asset('image/skslogo.png') }}" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a  href="{{ route('admin.dashboard')}}">
                               <span class="educate-icon educate-home icon-wrap"></span>
                               <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                        <li >
                            <a  href="{{ route('admin.staff')}}">
                               <span class="educate-icon educate-professor icon-wrap"></span>
                               <span class="mini-click-non">Staff</span>
                            </a>
                        </li>
                        <li class="{{ ((request()->routeIs('site.*')) ||(request()->routeIs('owner.*'))) ? 'active' : '' }}">
                            <a class="has-arrow" href="#">
                               <span class="educate-icon educate-form icon-wrap"></span>
                               <span class="mini-click-non">Sites</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="owner" href="{{ route('owner.index')}}"><span class="mini-sub-pro">Site Owners</span></a></li>
                                <li><a title="sites" href="{{ route('site.index')}}"><span class="mini-sub-pro">Site Details</span></a></li>
                            </ul>
                        </li>
                        <li >
                            <a  href="{{ route('meterial.index')}}">
                               <span class="educate-icon educate-form icon-wrap"></span>
                               <span class="mini-click-non">Meterial Master</span>
                            </a>
                        </li>
                        <li >
                            <a  href="{{ route('worker.index')}}">
                               <span class="educate-icon educate-professor icon-wrap"></span>
                               <span class="mini-click-non">Worker Master</span>
                            </a>
                        </li>
                        <li >
                            <a  href="#">
                               <span class="educate-icon educate-form icon-wrap"></span>
                               <span class="mini-click-non">Reports</span>
                            </a>
                        </li>
                            
                    </ul>
                </nav>
            </div>
        </nav>
    </div>