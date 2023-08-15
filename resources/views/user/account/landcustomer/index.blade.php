@extends('layouts.app')

	@section('title')
	    {{ __('Land Customers') }}
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
                                        <li><span class="bread-blod">Land Customers</span>
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
                                <h1>Land Customers <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            <a href="{{ route('account.landcustomer.create')}}" class="btn btn-primary">+ Create</a>
                            
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
                                            <th data-field="cid">Land ID</th>
                                            <th data-field="customer">Customer Name</th>
                                            <th data-field="phone">Phone No</th>
                                            <th data-field="location">Location</th>
                                            <th data-field="site">Site Name</th>
                                            <th data-field="plot">Plot No</th>
                                            <th data-field="total">Amount</th>
                                            <th data-field="name">Lead From</th>
                                            <th data-field="status" data-editable="false">Status</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($customers as $customer)
                                        
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>SKSLD {{ $customer->id ? $customer->id : '' }}</td>
                                            <td>{{ $customer->customer_name ? $customer->customer_name : '' }}</td>
                                            <td>{{ $customer->phone ? $customer->phone : '' }}</td>
                                            <td>{{ $customer->location ? $customer->location : '' }}</td>
                                            <td>{{ $customer->sitename ? $customer->sitename : '' }}</td>
                                            <td>{{ $customer->plotno ? $customer->plotno : '' }}</td>
                                            <td>{{  number_format($customer->amount) }}</td>
                                            
                                            <td>{{ $customer->leadfrom ? ucfirst($customer->leadfrom) : '' }}</td>
                                            
                                            <td>
                                                @if($customer->status == 'booking')
                                                <h2 class="badge badge-danger ">Booking</h2>
                                                @else
                                                <h2 class="badge badge-success "> Completed</h2>
                                                @endif
                                            </td>
                                            
                                            <td class="datatable-ct">
                                                
                                                <a href="{{ route('account.landcustomer.edit', $customer->id) }}"
                                                    class="btn btn-link ">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $customer->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('account.landcustomer.destroy', $customer->id) }}" id="delete-post-{{ $customer->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            
                                            
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