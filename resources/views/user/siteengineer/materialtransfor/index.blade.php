@extends('layouts.app')

	@section('title')
	    {{ __('Material Transfors') }}
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
                                        <li><span class="bread-blod">Material Transfors</span>
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
                                <h1>Materials <span class="table-project-n">Transfor Detail</span> Table</h1>


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
                                            <th data-field="type">Material</th>
                                            <th data-field="name">Material From</th>
                                            <th data-field="mname">Material To</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @forelse($transfors as $transfor)
                                        <tr>
                                            <td></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $transfor->created_at ? formatDate($transfor->created_at) : '' }}</td>
                                            <td>
                                                <p><span class="text-success">Material :</span>{{ $transfor->material->meterial_name ?  $transfor->material->meterial_name : '' }}<p>
                                                <p><span class="text-success">Quantity :</span> {{ $transfor->quantity ?  $transfor->quantity : '' }} / {{ $transfor->material->unit ?  $transfor->material->unit : '' }}<p>
                                            </td>
                                            <td>
                                                @if($transfor->mp->project_type == 'villa')
                                                <p><span class="text-success">Project Type :</span>
                                                {{ ucfirst($transfor->mp->project_type)  }},
                                                </p>
                                                <p><span class="text-success">Project Name :</span>
                                                {{ $transfor->mp->villaproject ? $transfor->mp->villaproject->project_name : '' }},
                                                </p>
                                                <p><span class="text-success">Location :</span>
                                                {{ $transfor->mp->villaproject ? $transfor->mp->villaproject->location : '' }}.
                                                </p>
                                                @else
                                                <p><span class="text-success">Project Type :</span>
                                                {{ ucfirst($transfor->mp->project_type)  }},
                                                </p>
                                                <p><span class="text-success">Project Name :</span>
                                                {{ $transfor->mp->contractproject ? $transfor->mp->contractproject->project_name : '' }}
                                                </p>
                                                <p><span class="text-success">Location :</span>
                                                {{ $transfor->mp->contractproject ? $transfor->mp->contractproject->location : '' }}.
                                                </p>
                                                @endif
                                            </td>
                                            
                                            <td>
                                                

                                                @if($transfor->project_type == 'villa')
                                                <p><span class="text-success">Project Type :</span>
                                                {{ ucfirst($transfor->project_type)  }},
                                                </p>
                                                <p><span class="text-success">Project Name :</span>
                                                {{ $transfor->villaproject ? $transfor->villaproject->project_name : '' }},
                                                </p>
                                                <p><span class="text-success">Location :</span>
                                                {{ $transfor->villaproject ? $transfor->villaproject->location : '' }}.
                                                </p>
                                                @else
                                                <p><span class="text-success">Project Type :</span>
                                                {{ ucfirst($transfor->project_type)  }},
                                                </p>
                                                <p><span class="text-success">Project Name :</span>
                                                {{ $transfor->contractproject ? $transfor->contractproject->project_name : '' }}
                                                </p>
                                                <p><span class="text-success">Location :</span>
                                                {{ $transfor->contractproject ? $transfor->contractproject->location : '' }}.
                                                </p>
                                                @endif
                                            </td>
                                            <td class="datatable-ct">

                                                
                                                <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $transfor->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                <form method="post" action="{{ route('siteengineer.material_transfors.destroy', $transfor->id) }}" id="delete-post-{{ $transfor->id }}" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                
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