@extends('layouts.app')

	@section('title')
	    {{ __('Assigned Contract Project') }}
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
                                        <li><span class="bread-blod">Supplier</span>
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
                                <h1>Assigned Supplier <span class="table-project-n">Details</span> Table</h1>
                                {{-- {{$supplierassigns}} --}}
                                
                                <a href="{{ route('chiefengineer.laboursupplier.index')}}" class="btn btn-danger">back</a>
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
                                            <th data-field="siteid">Project Details</th>
                                            <th data-field="name">Supplier Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($supplierassigns as $supplierassign)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $supplierassign->created_at ? formatDate($supplierassign->created_at) : '' }}</td>
                                            <td>
                                                Project Name:
                                                {{ $supplierassign->contractproject->project_name ? $supplierassign->contractproject->project_name : '' }},
                                                <br>Project ID:
                                                {{ $supplierassign->contractproject->skscp_id ? $supplierassign->contractproject->skscp_id : '' }},
                                                <br>Location :
                                                
                                                {{ $supplierassign->contractproject->location ? $supplierassign->contractproject->location : '' }},
                                                <br>Land Area :
                                                
                                                {{ $supplierassign->contractproject->total_land_area ? $supplierassign->contractproject->total_land_area : '' }},
                                                <br>BuildUp Area :
                                                
                                                {{ $supplierassign->contractproject->total_buildup_area ? $supplierassign->contractproject->total_buildup_area : '' }}.
                                            </td>
                                            <td>
                                                Name :
                                                {{ $supplierassign->laboursupplier->name ? $supplierassign->laboursupplier->name : '' }}
                                                <br>Phone :
                                                {{ $supplierassign->laboursupplier->phone ? $supplierassign->laboursupplier->phone : '' }}
                                                <br>From Date :
                                                {{ $supplierassign->laboursupplier->name ? formatDate($supplierassign->from_date) : '' }}
                                                <br>To Date :
                                                {{ $supplierassign->laboursupplier->name ? formatDate($supplierassign->end_date) : '' }}
                                                <br>Amount :
                                                {{ $supplierassign->amount ?moneyFormatIndia( $supplierassign->amount) : '' }}
                                            </td>
                                            
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="5" class="text-center">No data</td>
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