@extends('layouts.app')

	@section('title')
	    {{ __('Labour Suppliers') }}
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
                                        <li><span class="bread-blod">Suppliers</span>
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
                                <h1>Suppliers Payment <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            <a href="{{ route('account.supplier_payments.index')}}" class="btn btn-danger">Back</a>
                            <!-- {{ $payments }} -->
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
                                            <th data-field="gpay">Project Details</th>
                                            <th data-field="name">Supplier Details</th>
                                            <th data-field="payment">Payment Details</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($payments as $payment)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                Project Type: 
                                                {{ $payment->supplierpayment->project_type ? ucfirst($payment->supplierpayment->project_type) : '' }}
                                                @switch($payment->supplierpayment->project_type)
                                                    @case('contract')                
                                                    <br>Project Name : {{$payment->supplierpayment->contractproject->project_name}}
                                                    <br>Buildup Area : {{$payment->supplierpayment->contractproject->total_buildup_area}}
                                                    
                                                    @break
                                                    @case('villa')                
                                                       <br> Project Name : {{$payment->supplierpayment->villaproject->project_name}}
                                                       <br>Villa No: {{$payment->supplierpayment->villa->villa_no}}
                                                       <br>Villa Area: {{$payment->supplierpayment->villa->villa_area}}
                                                    @break
                                                    @default
                                                        -   
                                                    @break              
                                                @endswitch
                                            </td>
                                            <td>
                                                Supplier Name: {{$payment->supplierpayment->laboursupplier->name}}
                                                <br>
                                                Supplier Phone: {{$payment->supplierpayment->laboursupplier->phone}}
                                            </td>
                                            
                                            <td>
                                                Amount : {{'Rs.'.moneyFormatIndia($payment->
                                                amount).'.00'}},
                                                
                                            </td>
                                            
                                            <td class="datatable-ct">
                                                <a href="{{ route('account.rcview', $payment->id) }}"
                                                    class="btn btn-link">
                                                    <i class="fa fa-download"></i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $payment->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('account.supplier_payments.destroy', $payment->id) }}" id="delete-post-{{ $payment->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="9" class="text-center">No data</td>
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