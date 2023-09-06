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
                                <h1>Suppliers Assign <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            
                            <!-- {{ $assignviews }} -->
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
                                            <th data-field="name">Supplier Details</th>
                                            
                                            <th data-field="gpay">Project Details</th>
                                            <th data-field="date" data-editable="false">Status</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($assignviews as $assignview)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $assignview->created_at ? formatDate($assignview->created_at) : '' }}</td>
                                            <td>Name :{{ $assignview->laboursupplier->name ? $assignview->laboursupplier->name : '' }}
                                                <br>
                                                Phone No:{{ $assignview->laboursupplier->phone ? $assignview->laboursupplier->phone : '' }}
                                            </td>
                                            <td>
                                                Project Type: 
                                                {{ $assignview->project_type ? ucfirst($assignview->project_type) : '' }}
                                                @switch($assignview->project_type)
                                                    @case('contract')                
                                                    <br>Project Name : {{$assignview->contractproject->project_name}}
                                                    <br>Buildup Area : {{$assignview->contractproject->total_buildup_area}}
                                                    
                                                    @break
                                                    @case('villa')                
                                                       <br> Project Name : {{$assignview->villaproject->project_name}}
                                                       <br>Villa No: {{$assignview->villa->villa_no}}
                                                       <br>Villa Area: {{$assignview->villa->villa_area}}
                                                    @break
                                                    @default
                                                        -   
                                                    @break              
                                                @endswitch
                                                <br>Amount : {{moneyFormatIndia($assignview->amount)}}
                                            </td>
                                            <td>
                                                {{ $assignview->status ? ucfirst($assignview->status) : '' }}
                                            </td>
                                            
                                            <td class="datatable-ct">
                                                <!-- <a href="{{ route('supplierassignapprove', $assignview->id) }}"
                                                    class="btn badge-primary">
                                                    Approve
                                                </a> -->
                                                @if($assignview->status == 'cancel')
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $assignview->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('chiefengineer.laboursupplier.destroy', $assignview->id) }}" id="delete-post-{{ $assignview->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @else
                                                <p class="text-danger">Waiting For Approve</p>

                                                @endif
                                                
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