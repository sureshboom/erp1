@extends('layouts.app')

	@section('title')
	    {{ __('Material Orders') }}
	@endsection

	@section('main')
    <br>
		<div class="breadcome-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="breadcome-list single-page-breadcome">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="breadcome-heading">
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="{{ route('user.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Material Order</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Materials <span class="table-project-n">Received Detail</span> Table</h1>


                            </div>
                            <!-- <a href="{{ route('siteengineer.material_order.create')}}" class="btn btn-primary">+ Add Order</a> -->
                            <!-- {{ $materials }} -->
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
										<option value="">Export Basic</option>
										<option value="all">Export All</option>
										<option value="selected">Export Selected</option>
									</select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">ID</th>
                                            <th data-field="day">Date</th>
                                            <th data-field="type">Project Type</th>
                                            <th data-field="name">Project Name</th>
                                            <th data-field="status" data-editable="false">Status</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($materials as $material)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $material->created_at ? formatDate($material->created_at) : '' }}</td>
                                            <td><p>{{ $material->project_type ? ucfirst($material->project_type).' Project' : '' }}<p></td>
                                            <td>
                                                @if($material->project_type == 'villa')
                                                {{ $material->villaProject ? $material->villaProject->project_name : '' }}
                                                @else
                                                {{ $material->contractProject ? $material->contractProject->project_name : '' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($material->status == 'order')
                                                <p class="text-danger">Order Placed</p>
                                                @elseif($material->status == 'verified')
                                                <p class="text-success">Order Completed</p>
                                                @endif
                                            </td>
                                            <td class="datatable-ct">

                                                <a href="{{ route('siteengineer.material_order.show', $material->id) }}"
                                                    class="btn badge-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                
                                                @if($material->status == 'order')
                                                <a href="{{ route('siteengineer.verified', $material->id) }}"
                                                    class="btn badge-success">
                                                    Verified
                                                </a>
                                                {{-- <a href="{{ route('siteengineer.note', $material->id) }}"
                                                    class="btn badge-success">
                                                    Note
                                                </a> --}}
                                                {{-- <a href="{{ route('chiefengineer.materialcancel', $material->id) }}"
                                                    class="btn badge-danger">
                                                    Cancel
                                                </a> --}}
                                                
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="7" class="text-center">No data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	@endsection