@extends('layouts.app')

	@section('title')
	    {{ __('Work Entry') }}
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
                                        <li><span class="bread-blod">Works</span>
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
                                <h1>Work <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            <a href="{{ route('siteengineer.workentry.create')}}" class="btn btn-primary">+ Add New</a>
                            <!-- {{ $works }} -->
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
                                            <th data-field="phone" data-editable="false">Project ID</th>
                                            <th data-field="location" data-editable="false">Work Details</th>
                                            <th data-field="status">Status</th>
                                            
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($works as $work)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $work->working_date ? formatDate($work->working_date) : '' }}</td>
                                            <td>{{ $work->project_type ? $work->project_type : '' }}</td>
                                            <td>@if($work->project_type == 'villa')
                                                {{ $work->villaProject ? $work->villaProject->project_name : '' }}
                                                @else
                                                {{ $work->contractProject ? $work->contractProject->project_name : '' }}
                                                @endif</td>
                                            <td>@if($work->project_type == 'villa')
                                                {{ $work->villaProject ? $work->villaProject->sksvp_id : '' }}
                                                @else
                                                {{ $work->contractProject ? $work->contractProject->skscp_id : '' }}
                                                @endif</td>
                                            <td>{{ $work->works ? $work->works : '' }}</td>
                                            <td>
                                                @if($work->status != 'verified')
                                                <p class="text-danger">{{ $work->status ? ucfirst($work->status) : '' }}</p>
                                                @else
                                                <p class="text-success">{{ $work->status ? ucfirst($work->status) : '' }}</p>
                                                @endif
                                            </td>
                                           
                                            
                                            <td class="datatable-ct">
                                                @if($work->status != 'verified')
                                                <a href="{{ route('chiefengineer.workverify',$work->id) }}"
                                                    class="btn badge-primary">
                                                    <i class="fa fa-edit"></i> Verify
                                                </a>
                                                
                                                @else
                                                <p class="text-success"> Work Verified</p>
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