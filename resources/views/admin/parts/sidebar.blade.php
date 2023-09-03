<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="{{ route('admin.dashboard')}}"><img class="main-logo" src="{{ asset('image/skslogo.png') }}" alt="" /></a>
                <strong><a href="{{ route('admin.dashboard')}}"><img src="{{ asset('image/skslogo.png') }}" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="{{(request()->routeIs('admin.dashboard')) ? 'active' : '' }}">
                            <a  href="{{ route('admin.dashboard')}}">
                               <span class="educate-icon educate-home icon-wrap"></span>
                               <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                        <li class="{{(request()->routeIs('admin.staff')) ? 'active' : '' }}">
                            <a  href="{{ route('admin.staff')}}">
                               <span class="educate-icon educate-professor icon-wrap"></span>
                               <span class="mini-click-non">Staff</span>
                            </a>
                        </li>
                        <li class="{{(request()->routeIs('supplier.index')) ? 'active' : '' }}">
                            <a  href="{{ route('supplier.index')}}">
                               <span class="educate-icon educate-professor icon-wrap"></span>
                               <span class="mini-click-non">Supplier</span>
                            </a>
                        </li>
                        
                        <li class="{{ ((request()->routeIs('landcustomer.*')) ||(request()->routeIs('contractcustomer.*')) ||(request()->routeIs('villacustomer.*'))) ? 'active' : '' }}">
                            <a class="has-arrow" href="#">
                               <span class="educate-icon educate-professor icon-wrap"></span>
                               <span class="mini-click-non">Customers</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                
                                <li class="{{(request()->routeIs('landcustomer.*')) ? 'active' : '' }}"><a title="owner" href="{{ route('landcustomer.index')}}"><span class="mini-sub-pro">Land Customers</span></a></li>
                                <li class="{{(request()->routeIs('contractcustomer.*')) ? 'active' : '' }}"><a title="sites" href="{{ route('contractcustomer.index')}}"><span class="mini-sub-pro">Contract Customers</span></a></li>
                                <li class="{{(request()->routeIs('villacustomer.*')) ? 'active' : '' }}"><a title="sites" href="{{ route('villacustomer.index')}}"><span class="mini-sub-pro">Villa Customers</span></a></li>
                            </ul>
                        </li>
                        <li class="{{ ((request()->routeIs('landproject.*')) ||(request()->routeIs('contractproject.*')) ||(request()->routeIs('villaproject.*'))) ? 'active' : '' }}">
                            <a class="has-arrow" href="#">
                               <span class="educate-icon educate-form icon-wrap"></span>
                               <span class="mini-click-non">Project Details</span>
                            </a>
                            <ul class="submenu-angle" aria-expanded="true">
                                
                                <li class="{{(request()->routeIs('landproject.*')) ? 'active' : '' }}"><a title="owner" href="{{ route('landproject.index')}}"><span class="mini-sub-pro">Land Projects</span></a></li>
                                <li class="{{(request()->routeIs('contractproject.*')) ? 'active' : '' }}"><a title="sites" href="{{ route('contractproject.index')}}"><span class="mini-sub-pro">Contract Projects</span></a></li>
                                <li class="{{(request()->routeIs('villaproject.*')) ? 'active' : '' }}"><a title="sites" href="{{ route('villaproject.index')}}"><span class="mini-sub-pro">Villa Projects</span></a></li>
                            </ul>
                        </li>
                        <li class="{{(request()->routeIs('meterial.*')) ? 'active' : '' }}">
                            <a  href="{{ route('meterial.index')}}">
                               <span class="educate-icon educate-form icon-wrap"></span>
                               <span class="mini-click-non">Meterial Master</span>
                            </a>
                        </li>
                        <li class="{{(request()->routeIs('worker.*')) ? 'active' : '' }}">
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