@extends('layouts.app')

	@section('title')
	    {{ __('Customers') }}
	@endsection

	@section('main')
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
                            <a href="{{ route('salesperson.direct_customer.create')}}" class="btn btn-primary">+ Add New</a>
                            <!-- {{ $customers }} -->
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
                                            <th data-field="source" data-editable="false">Source</th>
                                            <th data-field="date" data-editable="false">Feedback</th>
                                            
                                            <th data-field="action">Action</th>
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
                                            
                                            <td>{{ $customer->source ? $customer->source : '' }}</td>
                                            <td>
                                                {{ $customer->feedback ? $customer->feedback : '' }}
                                            </td>
                                            <td class="datatable-ct">
                                                <a href="{{ route('salesperson.direct_customer.edit', $customer->id) }}"
                                                    class="btn ll-mr-4 ll-p-0">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $customer->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('salesperson.direct_customer.destroy', $customer->id) }}" id="delete-post-{{ $customer->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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