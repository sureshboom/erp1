@extends('layouts.app')

    @section('title')
        {{ __('Labour Supplier Report') }}
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
                                        <li><span class="bread-blod">Labours</span>
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
                                <h1>Labour Supplier Payment <span class="table-project-n">Details</span> Table</h1>

                                <form class="form-inline" action="{{route('account.lsupplierreport')}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <!-- <div class="row">
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>From :</label>
                                                
                                                <input name="from_date" type="date"  class="form-control" placeholder="No of Called" value="{{ old('from_date') }}" >
                                                @error('from_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        
                                            <div class="form-group">
                                                <label>To :</label>
                                                <input name="to_date" type="date"  value="{{ old('to_date') }}" class="form-control" placeholder="No of Followup" >
                                                @error('to_date')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> -->
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Type :</label>
                                                <select name="type" id="staff_id" class="form-control ">
                                                    <option value="">Select Type</option>
                                                    <option value="villa">Villa Project</option>
                                                    <option value="contract">Contract Project</option>
                                                </select>
                                                @error('staff_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Supplier </label>
                                                <select name="supplier_id" id="supplier_id" class="form-control ">
                                                    <option value="">Select Supplier</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('project_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                            <input type="submit" name="submit" value="Filter" class="btn btn-primary">
                                            <a href="{{route('account.lsupplierreport')}}" class="btn btn-danger">Reset</a>
                                        </div>
                                    </div>

                                </form>

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
                                            <th data-field="gpay">Project Details</th>
                                            <th data-field="name">Supplier Details</th>
                                            <th data-field="payment">Payment Details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($payments as $payment)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                Project Type: 
                                                {{ $payment->project_type ? ucfirst($payment->project_type) : '' }}
                                                @switch($payment->project_type)
                                                    @case('contract')                
                                                    <br>Project Name : {{$payment->contractproject->project_name}}
                                                    <br>Buildup Area : {{$payment->contractproject->total_buildup_area}}
                                                    
                                                    @break
                                                    @case('villa')                
                                                       <br> Project Name : {{$payment->villaproject->project_name}}
                                                       <br>Villa No: {{$payment->villa->villa_no}}
                                                       <br>Villa Area: {{$payment->villa->villa_area}}
                                                    @break
                                                    @default
                                                        -   
                                                    @break              
                                                @endswitch
                                            </td>
                                            <td>Name :{{ $payment->laboursupplier->name ? $payment->laboursupplier->name : '' }}
                                                <br>
                                                Phone No:{{ $payment->laboursupplier->phone ? $payment->laboursupplier->phone : '' }}
                                            </td>
                                            
                                            <td>
                                                Amount : {{'Rs.'.moneyFormatIndia($payment->
                                                total).'.00'}},
                                                <br>Paid : {{'Rs.'.moneyFormatIndia($payment->paid).'.00'}},
                                                <br>Pending : {{'Rs.'.moneyFormatIndia($payment->pending).'.00'}}.
                                            </td>
                                            
                                        </tr>
                                        @forelse($payment->paymenthistory as $hpayment)
                                        @if ($loop->first)
                                            <tr>
                                                <td></td>
                                                <td colspan="4"> <h4>Payments</h4></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td> Date</td>
                                                <td> Payment</td>
                                                <td> Amount</td>
                                            </tr>
                                        @endif
                                        
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $hpayment->payment_date ? $hpayment->payment_date : '' }}</td>
                                            <td><p>Payment Mode : <span>{{  $hpayment->payment_mode }},</span></p>
                                                <p>Payment By : <span>{{  $hpayment->payment_by }}.</span></p></td>
                                            <td>{{ $hpayment->amount ? moneyFormatIndia($hpayment->amount) : '' }}</td>
                                        </tr>
                                        @empty
                                        <tr></tr>
                                        @endforelse
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