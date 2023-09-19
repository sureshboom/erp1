@extends('layouts.app')

    @section('title')
        {{ __('Suppliers Report') }}
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
                                <h1>Material Supplier Payment <span class="table-project-n">Details</span> Table</h1>

                                <form class="form-inline" action="{{route('account.supplierreport')}}" method="GET">
                                    @csrf
                                    @method('GET')
                                    <div class="row">
                                        
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
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Supplier </label>
                                                <select name="supplier_id" id="supplier_id" class="form-control ">
                                                    <option value="">Select Supplier</option>
                                                    @foreach($suppliers as $supplier)
                                                    <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('project_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <input type="submit" name="submit" value="Filter" class="btn btn-primary">
                                            <a href="{{route('account.supplierreport')}}" class="btn btn-danger">Reset</a>
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
                                            <th data-field="date">Date</th>
                                            <th data-field="site">Supplier Name</th>
                                            <th data-field="mode">Payment Mode</th>
                                            <th data-field="by">Payment By</th>
                                            <th data-field="amount">Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($payments as $payment)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                {{ $payment->payment_date ? $payment->payment_date : '' }}
                                                
                                            </td>
                                            <td>{{ $payment->supplier->supplier_name ? $payment->supplier->supplier_name : '' }}</td>
                                            <td>{{  $payment->payment_mode }}</td>
                                            <td>{{  $payment->payment_by }}</td>
                                            <td>{{  moneyFormatIndia($payment->amount) }}</td>
                                                
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="7" class="text-center">No data</td>
                                            
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td align="right">Total &nbsp;=&nbsp;&nbsp;</td>
                                            <td>Rs.{{ moneyFormatIndia($payments->sum('amount'))}}</td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection