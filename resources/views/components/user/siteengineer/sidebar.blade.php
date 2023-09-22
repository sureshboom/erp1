<li class="{{ ((request()->routeIs('siteengineer.landsite')) ||(request()->routeIs('siteengineer.contractsite')) ||(request()->routeIs('siteengineer.villasite'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Project Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{ request()->routeIs('siteengineer.landsite') ? 'active' : ''}}"><a title="landsite" href="{{ route('siteengineer.landsite')}}"><span class="mini-sub-pro">Land Project</span></a></li>
        <li class="{{ request()->routeIs('siteengineer.contractsite') ? 'active' : ''}}"><a title="contractsite" href="{{ route('siteengineer.contractsite')}}"><span class="mini-sub-pro">Contract Project</span></a></li>
        <li class="{{ request()->routeIs('siteengineer.villasite') ? 'active' : ''}}"><a title="villasite" href="{{ route('siteengineer.villasite')}}"><span class="mini-sub-pro">Villa Project</span></a></li>
    </ul>
</li>
{{-- <li class="{{ (request()->routeIs('siteengineer.mesthiri'))  ? 'active' : '' }}">
    <a  href="{{ route('siteengineer.mesthiri')}}">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Meshthri Details</span>
    </a>
</li> --}}
<li class="{{ ((request()->routeIs('siteengineer.material_order.*')) ||(request()->routeIs('siteengineer.received')) ) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Material Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        {{-- <li><a title="owner" href="{{ route('siteengineer.supplier.index')}}"><span class="mini-sub-pro">Suppliers</span></a></li> --}}
        <li class="{{ request()->routeIs('siteengineer.material_order.*') ? 'active' : ''}}"><a title="sites" href="{{ route('siteengineer.material_order.index')}}"><span class="mini-sub-pro">Material Order</span></a></li>
        <li class="{{ request()->routeIs('siteengineer.received') ? 'active' : ''}}"><a title="sites" href="{{ route('siteengineer.received')}}"><span class="mini-sub-pro">Material Received</span></a></li>
        <li class="{{ request()->routeIs('siteengineer.material_transfors.*') ? 'active' : ''}}"><a title="sites" href="{{ route('siteengineer.material_transfors.index')}}"><span class="mini-sub-pro">Material </span></a></li>
        
    </ul>
</li>
<li class="{{ ((request()->routeIs('siteengineer.material_contract')) ||(request()->routeIs('siteengineer.material_villa')) ) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Material Transfor</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        
        <li class="{{ request()->routeIs('siteengineer.material_contract') ? 'active' : ''}}"><a title="sites" href="{{ route('siteengineer.material_contract')}}"><span class="mini-sub-pro">Contract Project</span></a></li>
        <li class="{{ request()->routeIs('siteengineer.material_villa') ? 'active' : ''}}"><a title="sites" href="{{ route('siteengineer.material_villa')}}"><span class="mini-sub-pro">Villa Project</span></a></li>
        
        <li class="{{ request()->routeIs('siteengineer.material_transfors.*') ? 'active' : ''}}"><a title="sites" href="{{ route('siteengineer.material_transfors.index')}}"><span class="mini-sub-pro">Material Transfor</span></a></li>
        
    </ul>
</li>


<li class="{{ ((request()->routeIs('siteengineer.workerentry.*')) ||(request()->routeIs('siteengineer.workentry.*'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-event icon-wrap"></span>
       <span class="mini-click-non">Works Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{ request()->routeIs('siteengineer.workerentry.*') ? 'active' : ''}}"><a title="owner" href="{{ route('siteengineer.workerentry.index')}}"><span class="mini-sub-pro">Workers Entry</span></a></li>
        <li class="{{ request()->routeIs('siteengineer.workentry.*') ? 'active' : ''}}"><a title="sites" href="{{ route('siteengineer.workentry.index')}}"><span class="mini-sub-pro">Work Entry</span></a></li>
    </ul>
</li>

<li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
</li>