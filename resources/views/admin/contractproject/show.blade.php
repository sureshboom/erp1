@extends('admin.layout.app')

	@section('title')
	    {{ __('Contract Project Details') }}
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
                                        <a href="{{route('contractproject.index')}}" class="btn btn-danger ">Back</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Contract Project</span>
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
                        <!-- {{$contractprojects[0]->materialhistory}}  -->

                        @foreach($contractprojects as $contractproject)
                        
                        <div class="row ">
                            <div class="col-lg-12 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4>Contract Project Details</h4>
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <p><span><b>Project Name</b></span> : <span>{{ $contractproject->project_name }}</span>, </p>
                                                <p><span><b>Project ID</b></span> : <span>{{ $contractproject->skscp_id }}</span>, </p>
                                                
                                                <p><span><b>Started Date</b></span> : <span>{{ $contractproject->site_date ? $contractproject->site_date : '' }}</span>, </p>
                                                <p><span><b>Project Status</b></span> : <span class="badge badge-primary">{{ ucfirst($contractproject->status) }}</span> , </p>
                                                <p><span><b>Project Location</b></span> : <span>{{ $contractproject->location }}</span> </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <p><span><b>DTCP No</b></span> : <span>{{ $contractproject->dtcp_no }}</span>, </p>
                                                <p><span><b>Registration No</b></span> : <span>{{ $contractproject->reg_no }}</span>, </p>
                                                <p><span><b>Total Land Area</b></span> : <span>{{ $contractproject->total_land_area }}</span>, </p>
                                                <p><span><b>Total Buildup Area</b></span> : <span>{{ $contractproject->total_buildup_area }}</span>, </p>
                                                
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
                                       <center><img src="{{$contractproject->chiefengineer->photo}}" style="width: 150px;"  alt="" /></center> 
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Name</b><br /> {{$contractproject->chiefengineer->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Role</b><br /> {{ucfirst($contractproject->chiefengineer->user->role)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Emp ID</b><br /> {{$contractproject->chiefengineer->user_code}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Phone</b><br /> {{$contractproject->chiefengineer->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <center><img src="{{$contractproject->siteengineer->photo}}" style="width: 150px;"  alt="" /></center> 
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Name</b><br /> {{$contractproject->siteengineer->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Role</b><br /> {{ucfirst($contractproject->siteengineer->user->role)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Emp ID</b><br /> {{$contractproject->siteengineer->user_code}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Phone</b><br /> {{$contractproject->siteengineer->phone}}</p>
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

                                       <!-- {{$contractproject->materialhistory}} -->
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
                                                    @forelse($contractproject->materialhistory as $material)
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
                        @endforeach
                        
                    </div>
                    
                    

                </div>

            </div>
        </div>
    </div>
    <br><br><br>
                
    @endsection