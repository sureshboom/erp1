@extends('layouts.app')

	@section('title')
	    {{ __('Site Visit') }}
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
                                        <li><span class="bread-blod">Site Visit</span>
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
                                <h1>Site Visit <span class="table-project-n">Arrangement</span> Table</h1>


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
                                            <th data-field="cname">Customer Name</th>
                                            <th data-field="day">Date</th>
                                            <th data-field="sname">Site Name</th>
                                            <th data-field="status" data-editable="false">Status</th>
                                            <th data-field="feedback" data-editable="false">Feedback</th>
                                            <th data-field="remarks" data-editable="false">Remarks</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($sitevisits as $sitevisit)
                                        <tr>

                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $sitevisit->customer->customer_name ? $sitevisit->customer->customer_name : '' }}</td>
                                            <td>{{ $sitevisit->date ? formatDate($sitevisit->date) : '' }}</td>
                                            <td>{{ $sitevisit->site_name ? $sitevisit->site_name : '' }}</td>
                                            <td>@if($sitevisit->status == 'open')
                                                <h2 class="badge badge-success ">{{ucfirst($sitevisit->status)}}</h2>
                                                @elseif($sitevisit->status == 'visited')
                                                <h2 class="badge badge-warning ">{{ucfirst($sitevisit->status)}}</h2>
                                                @else
                                                <h2 class="badge badge-danger ">{{ucfirst($sitevisit->status)}}</h2>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $sitevisit->customer->feedback ? $sitevisit->customer->feedback : '' }}
                                            </td>
                                            <td>
                                                {{ $sitevisit->customer->remarks ? $sitevisit->customer->remarks : '' }}
                                            </td>
                                            <td class="datatable-ct">
                                                <!-- <i class="fa fa-check"></i> -->
                                                @if($sitevisit->status == 'open')
                                                <a href="{{ route('salesperson.viewvisitchange',['id'=>$sitevisit->customer->id,'siteid'=>$sitevisit->id]) }}"
                                                    class="btn badge-primary">
                                                    <i class="fa fa-edit"></i> Change
                                                </a>
                                                @else
                                                    <p class="text-success"> Site Visit Completed</p>
                                                @endif
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