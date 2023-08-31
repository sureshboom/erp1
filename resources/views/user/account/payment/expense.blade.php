@extends('layouts.app')

	@section('title')
	    {{ __('Expense Payment') }}
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
                                        <li><span class="bread-blod">Expense Payment</span>
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
                                <h1>Expense Payment <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            <a href="{{ route('account.payment.create')}}" class="btn btn-primary">+ Pay Now</a>
                            
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
                                            <th data-field="site">Expense Type</th>
                                            <th data-field="owner">Expense For</th>
                                            <th data-field="phone">Expense Reason</th>
                                            <th data-field="total">Amount</th>
                                            <th data-field="paid">Approved By</th>
                                            <th data-field="pending">Received By</th>
                                            
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($expensepayments as $expensepayment)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $expensepayment->payment_subtype ? ucfirst($expensepayment->payment_subtype) : '' }}</td>
                                            <td>
                                                @if($expensepayment->payment_subtype == 'office')
                                                    <p>Office Purpose</p>
                                                @else
                                                    @switch($expensepayment->expense_project_type)
                                                        
                                                        @case('land')
                                                            <p>Land Project : <span>{{ $expensepayment->landproject->project_name ? $expensepayment->landproject->project_name : '' }}
                                                                </span></p>
                                                        @break;
                                                        @case('contract')
                                                            <p>Contract Project : <span>{{ $expensepayment->landproject->project_name ? $expensepayment->landproject->project_name : '' }}
                                                                </span></p>
                                                        @break;
                                                        @case('villa')
                                                            <p>Villa Project : <span>{{ $expensepayment->landproject->project_name ? $expensepayment->landproject->project_name : '' }}
                                                                </span></p>
                                                        @break;
                                                        @default
                                                        <p></p>
                                                        @endswitch
                                                    
                                                @endif

                                            </td>
                                            <td>{{ $expensepayment->expense_for ? ucfirst($expensepayment->expense_for) : '' }}</td>
                                            <td>{{  moneyFormatIndia($expensepayment->amount) }}</td>
                                            <td>{{ $expensepayment->approved_by ? ucfirst($expensepayment->approved_by ) : '' }}</td>
                                            <td>{{ $expensepayment->received_by ? ucfirst($expensepayment->received_by) : '' }}</td>
                                            <td>
                                                <a href="{{ route('account.receiptview',$expensepayment->id)}}"><i class="fa fa-download"></i></a>
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $expensepayment->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('account.payment.destroy', $expensepayment->id) }}" id="delete-post-{{ $expensepayment->id }}" style="display: none;">
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