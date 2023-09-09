<li class="{{ request()->routeIs('telecaller.customer.*') ? 'active' : '' }}">
    <a  href="{{ route('telecaller.customer.index')}}">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Customer</span>
    </a>
</li>
<li class="{{ request()->routeIs('telecaller.sitevisit.*') ? 'active' : '' }}">
    <a  href="{{ route('telecaller.sitevisit.index')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Site Visits</span>
    </a>
</li>
<li class="{{ request()->routeIs('telecaller.todays_work.*') ? 'active' : '' }}">
    <a  href="{{ route('telecaller.todays_work.index')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Todays Work</span>
    </a>
</li>
<li class="{{ request()->routeIs('telecaller.teleworkreport') ? 'active' : '' }}">
    <a  href="{{ route('telecaller.teleworkreport')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Work Report</span>
    </a>
</li>
<!-- <li>
   <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
</li> -->
