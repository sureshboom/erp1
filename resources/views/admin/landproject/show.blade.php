@extends('admin.layout.app')

	@section('title')
	    {{ __('Land Project Details') }}
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
                                        <a href="{{route('landproject.index')}}" class="btn btn-danger ">Back</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Land Project</span>
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

                        @foreach($landprojects as $landproject)
                        <div class="row ">
                            <div class="col-lg-12 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4>Land Project Details</h4>
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <p><span><b>Project Name</b></span> : <span>{{ $landproject->project_name }}</span>, </p>
                                                <p><span><b>Project ID</b></span> : <span>{{ $landproject->skslp_id }}</span>, </p>
                                                
                                                <p><span><b>Started Date</b></span> : <span>{{ $landproject->site_date ? $landproject->site_date : '' }}</span>, </p>
                                                <p><span><b>Project Status</b></span> : <span class="btn badge-primary">{{ ucfirst($landproject->status) }}</span> , </p>
                                                <p><span><b>Project Location</b></span> : <span>{{ $landproject->location }}</span> </p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <p><span><b>DTCP No</b></span> : <span>{{ $landproject->dtcp_no }}</span>, </p>
                                                <p><span><b>Registration No</b></span> : <span>{{ $landproject->reg_no }}</span>, </p>
                                                <p><span><b>Total Area</b></span> : <span>{{ $landproject->total_area }}</span>, </p>
                                                <p><span><b>No Of Plots</b></span> : <span>{{ $landproject->no_plots  }}</span>. </p>
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
                                       <center><img src="{{$landproject->chiefengineer->photo}}" style="width: 150px;"  alt="" /></center> 
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Name</b><br /> {{$landproject->chiefengineer->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Role</b><br /> {{ucfirst($landproject->chiefengineer->user->role)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Emp ID</b><br /> {{$landproject->chiefengineer->user_code}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Phone</b><br /> {{$landproject->chiefengineer->phone}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <center><img src="{{$landproject->siteengineer->photo}}" style="width: 150px;"  alt="" /></center> 
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Name</b><br /> {{$landproject->siteengineer->user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Role</b><br /> {{ucfirst($landproject->siteengineer->user->role)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Emp ID</b><br /> {{$landproject->siteengineer->user_code}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Phone</b><br /> {{$landproject->siteengineer->phone}}</p>
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