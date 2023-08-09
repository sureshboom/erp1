<li>
    <a  href="{{ route('siteengineer.assignedsite')}}">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Site Details</span>
    </a>
</li>
<li>
    <a  href="{{ route('siteengineer.mesthiri')}}">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Meshthri Details</span>
    </a>
</li>
<li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Material Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li><a title="owner" href="{{ route('siteengineer.supplier.index')}}"><span class="mini-sub-pro">Suppliers</span></a></li>
        <li><a title="sites" href="{{ route('siteengineer.material_order.index')}}"><span class="mini-sub-pro">Material Order</span></a></li>
        <li><a title="sites" href="#"><span class="mini-sub-pro">Material Received</span></a></li>
        <li><a title="sites" href="#"><span class="mini-sub-pro">Material Transfer</span></a></li>
    </ul>
</li>
<li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-event icon-wrap"></span>
       <span class="mini-click-non">Works Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li><a title="owner" href="{{ route('siteengineer.workerentry.index')}}"><span class="mini-sub-pro">Workers Entry</span></a></li>
        <li><a title="sites" href="{{ route('siteengineer.workentry.index')}}"><span class="mini-sub-pro">Work Entry</span></a></li>
    </ul>
</li>

<li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
</li>