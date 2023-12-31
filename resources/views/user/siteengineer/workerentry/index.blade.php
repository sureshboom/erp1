@extends('layouts.app')

	@section('title')
	    {{ __('Workers Entry') }}
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
                                        <li><span class="bread-blod">Workers</span>
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
                                <h1>Workers <span class="table-project-n">Detail</span> Table</h1>


                            </div>
                            <a href="{{ route('siteengineer.workerentry.create')}}" class="btn btn-primary">+ Add New</a>
                            {{-- {{ $workers }} --}}

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
                                            <th data-field="type">Project Type</th>
                                            <th data-field="name">Project Name</th>
                                            <th data-field="phone" data-editable="false">Mesthiri Name (Nickname)</th>
                                            <th data-field="location" data-editable="false">Workers Details</th>
                                            <th data-field="count" data-editable="false">Count</th>
                                            <th data-field="status">Status</th>
                                            
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($workers as $worker)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $worker->workeddate ? formatDate($worker->workeddate) : '' }}</td>
                                            <td>{{ $worker->project_type ? ucfirst($worker->project_type).' Project' : '' }}</td>
                                            <td>@if($worker->project_type == 'contract')
                                                {{ $worker->contractproject->project_name ? $worker->contractproject->project_name : '' }}
                                                @else
                                                {{ $worker->villaproject->project_name ? $worker->villaproject->project_name : '' }}
                                                @endif
                                            </td>
                                            <td>{{ $worker->mesthiri->name ? $worker->mesthiri->name : '' }} {{ $worker->mesthiri->nickname ? '( '.$worker->mesthiri->nickname.' )' : '' }}</td>
                                            <td>
                                                @if($worker->workers)
                                                @foreach ($worker->workers as $workerv)
                                                    @foreach ($workerv as $workerType => $count)
                                                        <p>{{ $workerType }}: {{ $count }}</p>
                                                    @endforeach
                                                @endforeach
                                                
                                                @endif
                                            </td>
                                            <td>{{ $worker->count ? $worker->count : '' }}</td>
                                            <td>
                                                @if($worker->status == 'pending')
                                                <p class="text-danger">{{ $worker->status ? ucfirst($worker->status) : '' }}</p>
                                                @else
                                                <p class="text-success">{{ $worker->status ? ucfirst($worker->status) : '' }}</p>
                                                @endif
                                            </td>
                                           
                                            
                                            <td class="datatable-ct">
                                                @if($worker->status = 'pending')
                                                <a href="{{ route('siteengineer.workerentry.edit', $worker->id) }}"
                                                    class="btn ll-mr-4 ll-p-0">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $worker->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('siteengineer.workerentry.destroy', $worker->id) }}" id="delete-post-{{ $worker->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @else
                                                <p class="text-success"> Work Verified</p>
                                                @endif
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="8" class="text-center">No data</td>
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