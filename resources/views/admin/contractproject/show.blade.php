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
                        @endforeach
                    </div>
                    
                    

                </div>

            </div>
        </div>
    </div>
    <br><br><br>
                
    @endsection