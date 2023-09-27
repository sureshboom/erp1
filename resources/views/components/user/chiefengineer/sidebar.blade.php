<li class="{{ ((request()->routeIs('chiefengineer.landsite')) ||(request()->routeIs('chiefengineer.contractsite')) ||(request()->routeIs('chiefengineer.villasite'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-data-table icon-wrap"></span>
       <span class="mini-click-non">Project Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{request()->routeIs('chiefengineer.landsite') ? 'active' : ''}}"><a title="landsite" href="{{ route('chiefengineer.landsite')}}"><span class="mini-sub-pro">Land Project</span></a></li>
        <li class="{{request()->routeIs('chiefengineer.contractsite') ? 'active' : ''}}"><a title="contractsite" href="{{ route('chiefengineer.contractsite')}}"><span class="mini-sub-pro">Contract Project</span></a></li>
        <li class="{{request()->routeIs('chiefengineer.villasite') ? 'active' : ''}}"><a title="villasite" href="{{ route('chiefengineer.villasite')}}"><span class="mini-sub-pro">Villa Project</span></a></li>
    </ul>
</li>
<li class="{{ ((request()->routeIs('chiefengineer.mesthiri.*')) ||(request()->routeIs('chiefengineer.mesthiricontract')) ||(request()->routeIs('chiefengineer.mesthirivilla')) ||(request()->routeIs('chiefengineer.assigncontract')) ||(request()->routeIs('chiefengineer.assignvilla'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Mesthiri</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{request()->routeIs('chiefengineer.mesthiri.*') ? 'active' : ''}}"><a title="owner" href="{{ route('chiefengineer.mesthiri.index')}}"><span class="mini-sub-pro">Mesthiri Create</span></a></li>
        <li class="{{(request()->routeIs('chiefengineer.mesthiricontract') || request()->routeIs('chiefengineer.assigncontract')) ? 'active' : ''}}"><a title="sites" href="{{ route('chiefengineer.mesthiricontract')}}"><span class="mini-sub-pro">Contract Project</span></a></li>
        <li class="{{(request()->routeIs('chiefengineer.mesthirivilla') || request()->routeIs('chiefengineer.assignvilla')) ? 'active' : ''}}"><a title="sites" href="{{ route('chiefengineer.mesthirivilla')}}"><span class="mini-sub-pro">Villa Project</span></a></li>
    </ul>
</li>
<li class="{{ ((request()->routeIs('chiefengineer.laboursupplier.*')) ||(request()->routeIs('chiefengineer.villaprojectindex')) ||(request()->routeIs('chiefengineer.villaindex')) ||(request()->routeIs('chiefengineer.suppliercontract')) 
||(request()->routeIs('chiefengineer.supplierassignview')) 
||(request()->routeIs('chiefengineer.suppliervilla'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-professor icon-wrap"></span>
       <span class="mini-click-non">Labour Supplier</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{ (request()->routeIs('chiefengineer.supplierassignview')) ? 'active' : '' }}"><a title="sites" href="{{ route('chiefengineer.supplierassignview')}}"><span class="mini-sub-pro">Assign Views</span></a></li>
        <li class="{{ ((request()->routeIs('chiefengineer.laboursupplier.*')) ||(request()->routeIs('chiefengineer.suppliercontract'))) ? 'active' : '' }}"><a title="sites" href="{{ route('chiefengineer.laboursupplier.index')}}"><span class="mini-sub-pro">Contract Project</span></a></li>
        <li class="{{ ((request()->routeIs('chiefengineer.villaprojectindex')) ||(request()->routeIs('chiefengineer.villaindex')) ||(request()->routeIs('chiefengineer.suppliervilla'))) ? 'active' : '' }}"><a title="sites" href="{{ route('chiefengineer.villaprojectindex')}}"><span class="mini-sub-pro">Villa Project</span></a></li>
    </ul>
</li>
<li class="{{ ((request()->routeIs('chiefengineer.material_status.*')) ||(request()->routeIs('chiefengineer.received')) ||(request()->routeIs('chiefengineer.materialview'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-form icon-wrap"></span>
       <span class="mini-click-non">Material Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        
        <li class="{{ ((request()->routeIs('chiefengineer.material_status.*'))|| (request()->routeIs('chiefengineer.materialview'))) ? 'active' : '' }}"><a title="sites" href="{{ route('chiefengineer.material_status.index')}}"><span class="mini-sub-pro">Material Order</span></a></li>
        <li class="{{ request()->routeIs('chiefengineer.received') ? 'active' : '' }}"><a title="sites" href="{{ route('chiefengineer.received')}}"><span class="mini-sub-pro">Material Received</span></a></li>
        
    </ul>
</li>
<li class="{{ ((request()->routeIs('chiefengineer.workersentry')) ||(request()->routeIs('chiefengineer.workentry'))) ? 'active' : '' }}">
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-event icon-wrap"></span>
       <span class="mini-click-non">Works Details</span>
    </a>
    <ul class="submenu-angle" aria-expanded="true">
        <li class="{{ (request()->routeIs('chiefengineer.workersentry')) ? 'active' : '' }}"><a title="owner" href="{{ route('chiefengineer.workersentry')}}"><span class="mini-sub-pro">Workers Entry</span></a></li>
        <li class="{{ (request()->routeIs('chiefengineer.workentry')) ? 'active' : '' }}"><a title="sites" href="{{ route('chiefengineer.workentry')}}"><span class="mini-sub-pro">Work Entry</span></a></li>
    </ul>
</li>
<!-- <li>
    <a class="has-arrow" href="#">
       <span class="educate-icon educate-library icon-wrap"></span>
       <span class="mini-click-non">Reports</span>
    </a>
</li> -->