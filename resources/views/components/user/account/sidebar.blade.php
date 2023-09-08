
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
<li class="{{ ((request()->routeIs('account.supplier.*')) ||(request()->routeIs('account.labour_supplier.*'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Suppliers</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{request()->routeIs('account.supplier.*') ? 'active' : ''}}"><a title="land" href="{{ route('account.supplier.index')}}"><span class="mini-sub-pro">Material </span></a></li>
        <li class="{{request()->routeIs('account.labour_supplier.*') ? 'active' : ''}}"><a title="contract" href="{{ route('account.labour_supplier.index')}}"><span class="mini-sub-pro">Labour Suppliers</span></a></li>
    </ul>
</li>

<li class="{{request()->routeIs('account.materialstatus') ? 'active' : ''}}">
    <a  href="{{ route('account.materialstatus')}}">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Material Details</span>
    </a>
</li>
<li class="{{ ((request()->routeIs('account.payment.create')) ||(request()->routeIs('account.landpayment')) ||(request()->routeIs('account.contractpayment')) ||(request()->routeIs('account.villapayment')) ||(request()->routeIs('account.materialpayment')) 
||(request()->routeIs('account.supplier_payments.*')) 
||(request()->routeIs('account.expensepayment'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Payments</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        
        <li class="{{request()->routeIs('account.payment.create') ? 'active' : ''}}"><a title="sites" href="{{ route('account.payment.create')}}"><span class="mini-sub-pro">Create Payments</span></a></li>
        <li class="{{request()->routeIs('account.landpayment') ? 'active' : ''}}"><a title="land" href="{{ route('account.landpayment')}}"><span class="mini-sub-pro">Land Payments</span></a></li>
        <li class="{{request()->routeIs('account.contractpayment') ? 'active' : ''}}"><a title="land" href="{{ route('account.contractpayment')}}"><span class="mini-sub-pro">Contract Payments</span></a></li>
        <li class="{{request()->routeIs('account.villapayment') ? 'active' : ''}}"><a title="land" href="{{ route('account.villapayment')}}"><span class="mini-sub-pro">Villa Payments</span></a></li>
        <li class="{{request()->routeIs('account.materialpayment') ? 'active' : ''}}"><a title="land" href="{{ route('account.materialpayment')}}"><span class="mini-sub-pro">Supplier Payments</span></a></li>
        <li class="{{request()->routeIs('account.expensepayment') ? 'active' : ''}}"><a title="expense" href="{{ route('account.expensepayment')}}"><span class="mini-sub-pro">Expense Payments</span></a></li>
        <li class="{{request()->routeIs('account.supplier_payments.*') ? 'active' : ''}}"><a title="labour" href="{{ route('account.supplier_payments.index')}}"><span class="mini-sub-pro">Labour Payments</span></a></li> 
    </ul>
</li>
<li>
    <a  href="#">
       <span class="educate-icon educate-event icon-wrap"></span>
       <span class="mini-click-non">Attendance</span>
    </a>
</li>
<li class="{{ ((request()->routeIs('account.advance.*'))|| (request()->routeIs('account.salary.*'))) ? 'active' : ''}}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-event icon-wrap"></span>
       <span class="mini-click-non">Salary</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{request()->routeIs('account.advance.*') ? 'active' : ''}}"><a title="land" href="{{ route('account.advance.index')}}"><span class="mini-sub-pro">Advance</span></a></li>
        <li class="{{request()->routeIs('account.salary.*') ? 'active' : ''}}"><a title="contract" href="{{ route('account.salary.index')}}"><span class="mini-sub-pro">Salary</span></a></li>
    </ul>
</li>

<li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
</li>