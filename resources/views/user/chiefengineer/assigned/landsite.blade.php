@extends('layouts.app')

	@section('title')
	    {{ __('Land Projects') }}
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
                                        <li><span class="bread-blod">Projects</span>
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
                                <h1>Assigned Land Projects <span class="table-project-n"></span> Table</h1>


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
                                            <th data-field="name">Site Name</th>
                                            <th data-field="siteid">Site ID</th>

                                            <th data-field="location">Location</th>
                                            <th data-field="chief" data-editable="false">Chief Engineer</th>
                                            <th data-field="site" data-editable="false">Site Engineer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($landprojects as $landproject)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $landproject->project_name ? $landproject->project_name : '' }}</td>
                                            <td>{{ $landproject->skslp_id ? $landproject->skslp_id : '' }}</td>
                                            
                                            <td>{{ $landproject->location ? $landproject->location : '' }}</td>
                                            <td>{{ $landproject->chiefengineer->user ? $landproject->chiefengineer->user->name : '' }}</td>
                                            <td>{{ $landproject->siteengineer->user ? $landproject->siteengineer->user->name : '' }}</td>
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