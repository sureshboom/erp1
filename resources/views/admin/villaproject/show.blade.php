@extends('admin.layout.app')

	@section('title')
	    {{ __('Villa Project Details') }}
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
                                        <a href="{{route('villaproject.index')}}" class="btn btn-danger ">Back</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Villa Project</span>
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
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="">
                        
                        <!-- {{$villaprojects}}  -->
                        @foreach($villaprojects as $villaproject)
                        
                        <div class="row ">
                            <div class="col-lg-12 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4>Villa Project Details</h4>
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <p><span><b>Project Name</b></span> : <span>{{ $villaproject->project_name }}</span>, </p>
                                                <p><span><b>Project ID</b></span> : <span>{{ $villaproject->sksvp_id }}</span>, </p>
                                                
                                                <p><span><b>Started Date</b></span> : <span>{{ $villaproject->site_date ? $villaproject->site_date : '' }}</span>, </p>
                                                <p><span><b>Project Status</b></span> : <span class="btn badge-primary">{{ ucfirst($villaproject->status) }}</span> , </p>
                                                <p><span><b>Project Location</b></span> : <span>{{ $villaproject->location }}</span> </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <p><span><b>DTCP No</b></span> : <span>{{ $villaproject->dtcp_no }}</span>, </p>
                                                <p><span><b>Registration No</b></span> : <span>{{ $villaproject->reg_no }}</span>, </p>
                                                <p><span><b>Total Land Area</b></span> : <span>{{ $villaproject->total_land_area }}</span>, </p>
                                                <p><span><b>Total Buildup Area</b></span> : <span>{{ $villaproject->total_buildup_area }}</span>, </p>
                                                <p><span><b>No Of Units</b></span> : <span>{{ $villaproject->no_of_unit  }}</span>. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <center><img src="{{$villaproject->chiefengineer->photo}}" style="width: 150px;"  alt="" /></center> 
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Name</b><br /> {{$villaproject->chiefengineer->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Role</b><br /> {{ucfirst($villaproject->chiefengineer->user->role)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Emp ID</b><br /> {{$villaproject->chiefengineer->user_code}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Phone</b><br /> {{$villaproject->chiefengineer->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <center><img src="{{$villaproject->siteengineer->photo}}" style="width: 150px;"  alt="" /></center> 
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Name</b><br /> {{$villaproject->siteengineer->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Role</b><br /> {{ucfirst($villaproject->siteengineer->user->role)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Emp ID</b><br /> {{$villaproject->siteengineer->user_code}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Phone</b><br /> {{$villaproject->siteengineer->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-lg-12 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4> Project Overall Material Details</h4>
                                    </div>

                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Material</th>
                                                        <th>Unit</th>
                                                        <th>Quantity</th>
                                                        <th>Transfor In</th>
                                                        <th>Transfor Out</th>
                                                        
                                                    </tr>
                                                    @forelse($villaproject->materialhistory as $material)
                                                    <tr style="background: #607d8b;color: white;">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$material->material->meterial_name}}</td>
                                                        <td>{{$material->material->unit}}</td>
                                                        <td>{{$material->qty}}</td>
                                                        <td>{{$material->transfor_in}}</td>
                                                        <td>{{$material->transfor_out}}</td>
                                                        
                                                    </tr>
                                                    @forelse($material->transforout as $transfor)
                                                         @if ($loop->first)
                                                            <tr>
                                                                <td></td>
                                                                <td colspan="5"> <h4 class="text-center">Transfor Details</h4></td>
                                                            </tr>
                                                            <tr style="background: #bbb6b6;color: white;">
                                                                <td></td>
                                                                <td>Date</td>
                                                                <td>Project Type</td>
                                                                <td>Project</td>
                                                                <td>Location</td>
                                                                <td>Quantity</td>
                                                            </tr>
                                                        @endif
                                                            <tr>
                                                                <td></td>
                                                                <td>{{ $transfor->created_at ? formatDate($transfor->created_at) : '' }}</td>
                                                                <td>{{ ucfirst($transfor->project_type)  }}</td>
                                                                <td>
                                                                @if($transfor->project_type == 'villa')
                                                                {{ $transfor->villaproject ? $transfor->villaproject->project_name : '' }}
                                                                @else
                                                                {{ $transfor->contractproject ? $transfor->contractproject->project_name : '' }}
                                                                @endif
                                                                </td>
                                                                <td>@if($transfor->project_type == 'villa')
                                                                {{ $transfor->villaproject ? $transfor->villaproject->location : '' }}
                                                                @else
                                                                {{ $transfor->contractproject ? $transfor->contractproject->location : '' }}
                                                                @endif</td>
                                                                <td>{{ $transfor->quantity ?  $transfor->quantity : '' }}</td>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                    @empty
                                                    <tr>
                                                        <td colspan="4">No Records</td>
                                                        
                                                    </tr>
                                                    @endforelse
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="sparkline13-list">
                                    <div class="sparkline13-hd">
                                        <div class="main-sparkline13-hd">
                                            <h1>Villas <span class="table-project-n">Details</span> Table</h1>
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
                                                        <th data-field="code">Villa No</th>
                                                        <th data-field="name" data-editable="false">Villa Area</th>
                                                        
                                                        <th data-field="action">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($villaproject->villas as $villa)
                                                    <tr>

                                                        <td></td>
                                                        <td>{{$loop->iteration}}</td>
                                                        
                                                        <td>{{$villa->villa_no}}</td>
                                                        <td>{{$villa->villa_area}}</td>
                                                        
                                                        <td class="datatable-ct">
                                                            <a href="{{ route('villa.edit', $villa->id) }}"
                                                                class="btn ll-mr-4 ll-p-0">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $villa->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                            <form method="post" action="{{ route('villa.destroy', $villa->id) }}" id="delete-post-{{ $villa->id }}" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="4"> No data</td>
                                                    </tr>
                                                    @endforelse
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    
                
    @endsection