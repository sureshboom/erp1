@extends('layouts.app')

	@section('title')
	    {{ __('Villa Project Mesthiri') }}
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
                                        <li><span class="bread-blod">Project</span>
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
                                <h1>Assigned Villa <span class="table-project-n">Project</span> Table</h1>

                                <a href="{{ route('chiefengineer.assign')}}" class="btn btn-primary">+ Assign</a>
                            </div>
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
                                            <th data-field="name">Project Name</th>
                                            <th data-field="siteid">Project ID</th>
                                            <th data-field="location">Location</th>
                                            <th data-field="chief" data-editable="false">Mesthiri ID</th>
                                            <th data-field="site" data-editable="false">Mesthiri Name</th>
                                            <th data-field="action" data-editable="false">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($villaprojects as $villaproject)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $villaproject->project_name ? $villaproject->project_name : '' }}</td>
                                            <td>{{ $villaproject->sksvp_id ? $villaproject->sksvp_id : '' }}</td>
                                            <td>{{ $villaproject->location ? $villaproject->location : '' }}</td>
                                            <td>{{ $villaproject->mesthiri_id ? 'SKSMT'.$villaproject->mesthiri_id : '-' }}</td>
                                            <td>
                                                {{ $villaproject->mesthiri_id ? ($villaproject->mesthiri ? $villaproject->mesthiri->name : '-') : '' }}
                                            </td>
                                            <td>
                                                <a href="{{route('chiefengineer.assignvilla',$villaproject->id)}}" class="btn btn-link">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="4" class="text-center">No data</td>
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