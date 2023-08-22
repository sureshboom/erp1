<li class="{{ request()->routeIs('salesperson.direct_customer.*') ? 'active' : '' }}">
    <a  href="{{route('salesperson.direct_customer.index')}}">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Customer</span>
    </a>
</li>
<li class="{{ (request()->routeIs('salesperson.sitevisit') || request()->routeIs('salesperson.viewvisitchange')) ? 'active' : '' }}">
    <a  href="{{route('salesperson.sitevisit')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Site Visit</span>
    </a>
</li>
<li>
   <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
</li>


