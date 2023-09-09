@extends('layouts.app')

	@section('title')
	    {{ __('Customers') }}
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
                                        <li><span class="bread-blod">Today's Work</span>
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
                                <h1>Work <span class="table-project-n">Details</span> Table</h1>

                                <form class="form-inline" action="{{route('salesmanager.alltelecallerwork')}}" method="GET">
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
                                                <label>Telecaller</label>
                                                <select name="telecaller_id" id="telecaller_id" class="form-control ">
                                                    <option value="">Select Land Project</option>
                                                    @foreach($telecallers as $telecaller)
                                                    <option value="{{$telecaller->id}}">{{$telecaller->user->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('telecaller_id')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <input type="submit" name="submit" value="Filter" class="btn btn-primary">
                                            <a href="{{route('salesmanager.alltelecallerwork')}}" class="btn btn-danger">Reset</a>
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
                                            <th data-field="day">Date</th>
                                            <th data-field="nday">Name</th>
                                            <th data-field="name">Number of Called</th>
                                            <th data-field="phone" data-editable="false">Number of Followup</th>
                                            <th data-field="location" data-editable="false">Number of Site Visits</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($teleworks as $telework)
                                        <tr>

                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $telework->created_at ? formatDate($telework->created_at) : '' }}</td>
                                            <td>{{ $telework->telecaller->user->name ? $telework->telecaller->user->name : '' }}</td>
                                            <td>{{ $telework->called ? $telework->called : '' }}</td>
                                            <td>{{ $telework->follow_up ? $telework->follow_up : '' }}</td>
                                            <td>{{ $telework->site_visit ? $telework->site_visit : '' }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td></td>
                                            <td colspan="6" class="text-center">No data</td>
                                            
                                            
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