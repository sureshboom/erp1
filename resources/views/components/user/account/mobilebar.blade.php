<li><a data-toggle="collapse" data-target="#Charts" href="#">Customers <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    <ul class="collapse dropdown-header-top">
        <li><a href="{{ route('account.landcustomer.index')}}">Land Customers</a></li>
        <li><a href="{{ route('account.contractcustomer.index')}}">Contract Customers</a></li>
        <li><a href="{{ route('account.villacustomer.index')}}">Villa Customers</a></li>
    </ul>
</li>
<li><a data-toggle="collapse" data-target="#Charts" href="#">Suppliers <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    <ul class="collapse dropdown-header-top">
        <li><a href="{{ route('account.supplier.index')}}">Material Suppliers</a></li>
        <li><a href="{{ route('account.labour_supplier.index')}}">Labour Suppliers</a></li>
    </ul>
</li>
<li><a href="{{ route('account.materialstatus')}}">Material Details</a></li>
<li><a data-toggle="collapse" data-target="#Charts" href="#">Payments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    <ul class="collapse dropdown-header-top">
        <li><a href="{{ route('account.payment.create')}}">Create Payments</a></li>
        <li><a href="{{ route('account.landpayment')}}">Land Payments</a></li>
        <li><a href="{{ route('account.contractpayment')}}">Contract Payments</a></li>
        <li><a href="{{ route('account.villapayment')}}">Villa Payments</a></li>
        <li><a href="{{ route('account.materialpayment')}}">Supplier Payments</a></li>
        <li><a href="{{ route('account.expensepayment')}}">Expense Payments</a></li>
        <li><a href="{{ route('account.supplier_payments.index')}}">Labour Payments</a></li>
    </ul>
</li>

<li><a href="#.">Attendance</a></li>
<li><a data-toggle="collapse" data-target="#Charts" href="#">Salary Details<span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    <ul class="collapse dropdown-header-top">
        <li><a href="{{ route('account.advance.index')}}">Advance</a></li>
        <li><a href="{{ route('account.salary.index')}}">Salary Suppliers</a></li>
    </ul>
</li>

<li><a data-toggle="collapse" data-target="#Charts" href="#">Reports <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
    <ul class="collapse dropdown-header-top">
        <li><a href="{{ route('account.payment.create')}}">Salary Report</a></li>
        <li><a href="{{ route('account.landpayment')}}">Expense Report</a></li>
        <li><a href="{{ route('account.contractpayment')}}">Land Report</a></li>
        <li><a href="{{ route('account.villapayment')}}">Contract Report</a></li>
        <li><a href="{{ route('account.materialpayment')}}">Villa Report</a></li>
        <li><a href="{{ route('account.expensepayment')}}">Income Report</a></li>
        <li><a href="{{ route('account.supplier_payments.index')}}">Supplier Report</a></li>
        <li><a href="{{ route('account.supplier_payments.index')}}">Labour Report</a></li>
    </ul>
</li>