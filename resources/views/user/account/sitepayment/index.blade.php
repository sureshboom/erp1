@extends('layouts.app')

	@section('title')
	    {{ __('Site Payment') }}
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
                                        <li><span class="bread-blod">Site Payment</span>
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
                                <h1>Site Payment <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            <a href="{{ route('account.site_payment.create')}}" class="btn btn-primary">+ Pay Now</a>
                            
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
                                            <th data-field="site">SiteName</th>
                                            <th data-field="owner">Owner Name</th>
                                            <th data-field="phone">Phone No</th>
                                            <th data-field="total">Total</th>
                                            <th data-field="paid">Paid</th>
                                            <th data-field="pending">Pending</th>
                                            <th data-field="status" data-editable="false">Status</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($sitepayments as $sitepayment)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $sitepayment->sitename ? $sitepayment->sitename : '' }}</td>
                                            <td>{{ $sitepayment->owner->owner_name ? $sitepayment->owner->owner_name : '' }}</td>
                                            <td>{{ $sitepayment->owner->phone ? $sitepayment->owner->phone : '' }}</td>
                                            <td>{{  number_format($sitepayment->amount) }}</td>
                                            <td>{{  number_format($sitepayment->paid)  }}</td>
                                            <td>{{  number_format($sitepayment->pending)  }}</td>
                                            <td>
                                                @if($sitepayment->amount !== $sitepayment->paid)
                                                <h2 class="badge badge-danger ">Pending Payment</h2>
                                                @else
                                                <h2 class="badge badge-success ">Payment Completed</h2>
                                                @endif
                                            </td>
                                            
                                            <td class="datatable-ct">
                                                
                                                <a href="{{ route('account.site_payment.show', $sitepayment->id) }}"
                                                    class="btn badge-primary">
                                                    <i class="fa fa-eye"></i> History
                                                </a>
                                                
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