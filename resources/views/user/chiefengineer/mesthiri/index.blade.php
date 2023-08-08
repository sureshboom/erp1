@extends('layouts.app')

	@section('title')
	    {{ __('Suppliers') }}
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
                                        <li><span class="bread-blod">Mesthiris</span>
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
                                <h1>Mesthiri <span class="table-project-n">Details</span> Table</h1>


                            </div>
                            <a href="{{ route('chiefengineer.mesthiri.create')}}" class="btn btn-primary">+ Add New</a>
                            <!-- {{ $mesthiris }} -->
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
                                            <th data-field="mid">Mesthiri ID</th>
                                            <th data-field="day">Date</th>
                                            <th data-field="name">Mesthiri Name</th>
                                            <th data-field="phone" data-editable="false">Phone</th>
                                            <th data-field="phone" data-editable="false">Alternate No</th>
                                            <th data-field="location" data-editable="false">Location</th>
                                            
                                            <th data-field="gpay">Gpay/Phonepay</th>
                                            <th data-field="date" data-editable="false">Account Details</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($mesthiris as $mesthiri)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $mesthiri->id ? 'SKSMT '.$mesthiri->id : '' }}</td>
                                            <td>{{ $mesthiri->created_at ? formatDate($mesthiri->created_at) : '' }}</td>
                                            <td>{{ $mesthiri->name ? $mesthiri->name : '' }}</td>
                                            <td>{{ $mesthiri->phone ? $mesthiri->phone : '' }}</td>
                                            <td>{{ $mesthiri->alternate_no ? $mesthiri->alternate_no : '' }}</td>

                                            <td>{{ $mesthiri->location ? $mesthiri->location : '' }}</td>
                                            <td>{{ $mesthiri->gpay ? $mesthiri->gpay : '' }}</td>
                                            <td>
                                                {{ $mesthiri->account ? $mesthiri->account : '' }}
                                            </td>
                                            
                                            <td class="datatable-ct">
                                                <a href="{{ route('chiefengineer.mesthiri.edit', $mesthiri->id) }}"
                                                    class="btn ll-mr-4 ll-p-0">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $mesthiri->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('chiefengineer.mesthiri.destroy', $mesthiri->id) }}" id="delete-post-{{ $mesthiri->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="10" class="text-center">No data</td>
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