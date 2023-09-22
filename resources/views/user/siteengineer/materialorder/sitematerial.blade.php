@extends('layouts.app')

	@section('title')
	    {{ __('Materials ') }}
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
                                        <a href="{{ url()->previous(); }}" class="btn btn-danger">Back</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="{{ route('user.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Material Details</span>
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
                                <h1>Materials <span class="table-project-n">Detail</span> Table</h1>


                            </div>
                            @if(($materials[0]->materialin->status == 'request') or ($materials[0]->materialin->status == 'cancel'))
                            <a href="{{ route('siteengineer.material_order.edit', $materialinid) }}" class="btn btn-primary">
                                                    Edit
                                                </a>
                            @endif
                            
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
                                            <th data-field="name">Material Name</th>
                                            <th data-field="unit">Unit</th>
                                            <th data-field="sname" data-editable="false">Quantity</th>
                                            <th data-field="desc" data-editable="false">Description</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($materials as $material)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $material->material ? $material->material->meterial_name : '' }}</td>
                                            <td>{{ $material->material ? $material->material->unit : '' }}</td>
                                            <td>{{ $material->quantity ? $material->quantity : '' }}</td>
                                            <td>{{ $material->description ? $material->description : '' }}</td>
                                            <td class="datatable-ct">
                                                
                                                @if(($material->materialin->status == 'request') or ($material->materialin->status == 'cancel'))
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $material->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('siteengineer.purchasedelete', $material->id) }}" id="delete-post-{{ $material->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @elseif($material->materialin->status == 'verified')
                                                <p class="text-success">Order Completed</p>
                                                @else
                                                <p class="text-success">Order Moved Next Process</p>
                                                @endif
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