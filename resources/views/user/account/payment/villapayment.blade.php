@extends('layouts.app')

	@section('title')
	    {{ __('Villa Payment') }}
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
                                        <li><span class="bread-blod">Villa Payment</span>
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
                                <h1>Villa Payment <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            <a href="{{ route('account.payment.create')}}" class="btn btn-primary">+ Pay Now</a>
                            {{-- {{$villapayments}} --}}
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
                                            <th data-field="date">Date</th>
                                            <th data-field="site">Project Details</th>
                                            <th data-field="total">Payment Details</th>
                                            
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($villapayments as $villapayment)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{ $villapayment->payment_date ? $villapayment->payment_date : '' }}
                                                
                                            </td>
                                            <td>
                                                <p>Project Name : <span>{{ $villapayment->villaproject->project_name ? $villapayment->villaproject->project_name : '' }}</span></p>
                                                <p>Customer Name : <span>{{ $villapayment->villacustomer->customer_name ? $villapayment->villacustomer->customer_name : '' }}</span></p>
                                                <p>Payment Mode : <span>{{  $villapayment->payment_mode }}</span></p>
                                                <p>Payment By : <span>{{  $villapayment->payment_by }}</span></p>
                                            </td>
                                            
                                            <td>
                                                <p>Total Amount : <span>{{  number_format($villapayment->total) }}</span></p>
                                                <p> Advance : <span>{{  number_format($villapayment->advance) }}</span></p>
                                                <p> Paid : <span>{{  number_format($villapayment->paid) }}</span></p>
                                                <p> Pending : <span>{{  number_format($villapayment->pending) }}</span></p>
                                                <p class="text-success"> Current Pay : <span class="btn btn-sm badge-success">{{  number_format($villapayment->amount) }}</span></p>
                                            </td>
                                            <td>
                                                <a href="{{ route('account.receiptview',$villapayment->id)}}"><i class="fa fa-download"></i></a>
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $villapayment->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('account.payment.destroy', $villapayment->id) }}" id="delete-post-{{ $villapayment->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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