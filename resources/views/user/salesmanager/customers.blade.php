@extends('layouts.app')

	@section('title')
	    {{ __('Customers') }}
	@endsection

	@section('main')<br>
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
                                        <li><span class="bread-blod">Customers</span>
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
                                <h1>Customer <span class="table-project-n">Details</span> Table</h1>


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
                                            <th data-field="day">Date</th>
                                            <th data-field="name">Customer Name</th>
                                            <th data-field="phone" data-editable="false">Phone</th>
                                            <th data-field="location" data-editable="false">Location</th>
                                            <th data-field="interested_project" data-editable="false">Interested Project</th>
                                            <th data-field="interested_area">Interested Area</th>
                                            <th data-field="date" data-editable="false">Response</th>
                                            <!-- <th data-field="source" data-editable="false">Source</th> -->
                                            <th data-field="created_by">Created By</th>
                                            <th data-field="feedback">Feedback</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($customers)
                                        @forelse($customers as $customer)
                                        <tr>

                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $customer->created_at ? formatDate($customer->created_at) : '' }}</td>
                                            <td>{{ $customer->customer_name ? $customer->customer_name : '' }}</td>
                                            <td>{{ $customer->phone ? $customer->phone : '' }}</td>
                                            <td>{{ $customer->location ? $customer->location : '' }}</td>
                                            <td>{{ $customer->interested_project ? $customer->interested_project : '' }}</td>
                                            <td>{{ $customer->interested_area ? $customer->interested_area : '' }}</td>
                                            <td>
                                                <p class="text-success">{{ $customer->response ? $customer->response : '' }}</p>
                                            </td>
                                            <!-- <td>{{ $customer->source ? $customer->source : '' }}</td> -->
                                            <td>@if($customer->created_by_type == 'telecaller'){{$customer->telecaller->user->name}}@elseif($customer->created_by_type == 'salesperson'){{$customer->salesperson->user->name}}@endif-{{ $customer->created_by_type ? ucfirst($customer->created_by_type) : '' }}</td>
                                            <td>
                                                <p class="text-danger">{{ $customer->feedback ? $customer->feedback : '' }}</p>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="8" class="text-center">No data</td>
                                            
                                            
                                        </tr>
                                        @endforelse
                                        @endif
                                        
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