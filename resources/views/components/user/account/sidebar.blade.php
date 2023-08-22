
<li class="{{ ((request()->routeIs('account.landcustomer.*')) ||(request()->routeIs('account.contractcustomer.*')) ||(request()->routeIs('account.villacustomer.*'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Customers</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li><a title="land" href="{{ route('account.landcustomer.index')}}"><span class="mini-sub-pro">Land Customers</span></a></li>
        <li><a title="contract" href="{{ route('account.contractcustomer.index')}}"><span class="mini-sub-pro">Contract Customers</span></a></li>
        <li><a title="villa" href="{{ route('account.villacustomer.index')}}"><span class="mini-sub-pro">Villa Customers</span></a></li>
    </ul>
</li>
<li>
    <a  href="{{ route('account.supplier.index')}}">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Suppliers</span>
    </a>
</li>
<li>
    <a  href="{{ route('account.materialstatus')}}">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Material Details</span>
    </a>
</li>
<li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Payments</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        
        <li><a title="sites" href="{{ route('account.material_payment.index')}}"><span class="mini-sub-pro">Material Payments</span></a></li>
        <li><a title="sites" href="{{ route('account.land_payment.index')}}"><span class="mini-sub-pro">Land Payments</span></a></li>
    </ul>
</li>
<li>
    <a  href="{{ route('account.expense.index')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Expense</span>
    </a>
</li>
<li>
    <a  href="#">
       <span class="educate-icon educate-event icon-wrap"></span>
       <span class="mini-click-non">Attendance</span>
    </a>
</li>
<li>
    <a  href="#">
       <span class="educate-icon educate-event icon-wrap"></span>
       <span class="mini-click-non">Salary</span>
    </a>
</li>
<li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
</li>