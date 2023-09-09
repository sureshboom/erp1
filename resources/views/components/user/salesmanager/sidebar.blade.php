<li class="{{ request()->routeIs('salesmanager.allcustomers') ? 'active' : '' }}">
    <a  href="{{route('salesmanager.allcustomers')}}">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Customer</span>
    </a>
</li>
<li class="{{ request()->routeIs('salesmanager.teleworks') ? 'active' : '' }}">
    <a  href="{{route('salesmanager.teleworks')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Telecaller's Work</span>
    </a>
</li>
<li class="{{ (request()->routeIs('salesmanager.siteview') || request()->routeIs('salesmanager.siteviewshow') || request()->routeIs('salesmanager.viewsiteviewchange')) ? 'active' : '' }}">
    <a  href="{{route('salesmanager.siteview')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Site Visit</span>
    </a>
</li>
<li class="{{request()->routeIs('salesmanager.alltelecallerwork') ? 'active' : ''}}">
   <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{request()->routeIs('salesmanager.alltelecallerwork') ? 'active' : ''}}"><a title="owner" href="{{ route('salesmanager.alltelecallerwork')}}"><span class="mini-sub-pro">TeleWork Reports</span></a></li>
        
    </ul>
</li>

alltelecallerwork
