@extends('admin.layout.app')

    @section('title')
        {{ __('Expense Report') }}
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
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Expense</span>
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
                                <h1>Expense <span class="table-project-n">Details</span> Table</h1>

                                <form class="form-inline" action="{{route('expensereport')}}" method="GET">
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
                                                <label>Type :</label>
                                                <select name="type" id="staff_id" class="form-control ">
                                                    <option value="">Select Type</option>
                                                    <option value="office">Office</option>
                                                    <option value="project">Project</option>
                                                </select>
                                                @error('staff_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <input type="submit" name="submit" value="Filter" class="btn btn-primary">
                                            <a href="{{route('expensereport')}}" class="btn btn-danger">Reset</a>
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
                                            <th data-field="site">Expense Type</th>
                                            <th data-field="owner">Expense For</th>
                                            <th data-field="phone">Expense Reason</th>
                                            <th data-field="paid">Approved By</th>
                                            <th data-field="pending">Received By</th>
                                            <th data-field="total">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($expenses as $expense)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $expense->payment_date ? formatDate($expense->payment_date) : '' }}</td>
                                            <td>{{ $expense->payment_subtype ? ucfirst($expense->payment_subtype) : '' }}</td>
                                            <td>
                                                @if($expense->payment_subtype == 'office')
                                                    <p>Office Purpose</p>
                                                @else
                                                    @switch($expense->expense_project_type)
                                                        
                                                        @case('land')
                                                            <p>Land Project : <span>{{ $expense->landproject->project_name ? $expense->landproject->project_name : '' }}
                                                                </span></p>
                                                        @break;
                                                        @case('contract')
                                                            <p>Contract Project : <span>{{ $expense->landproject->project_name ? $expense->landproject->project_name : '' }}
                                                                </span></p>
                                                        @break;
                                                        @case('villa')
                                                            <p>Villa Project : <span>{{ $expense->landproject->project_name ? $expense->landproject->project_name : '' }}
                                                                </span></p>
                                                        @break;
                                                        @default
                                                        <p></p>
                                                        @endswitch
                                                    
                                                @endif

                                            </td>
                                            <td>{{ $expense->expense_for ? ucfirst($expense->expense_for) : '' }}</td>
                                            
                                            <td>{{ $expense->approved_by ? ucfirst($expense->approved_by ) : '' }}</td>
                                            <td>{{ $expense->received_by ? ucfirst($expense->received_by) : '' }}</td>
                                            <td>{{  moneyFormatIndia($expense->amount) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="8" class="text-center">No data</td>
                                            
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td></td>
                                            <td colspan="7" align="right">Total = </td>
                                            <td class="text-center"> {{ 'Rs.'.moneyFormatIndia($expenses->sum('amount')).'.00' }}</td>
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