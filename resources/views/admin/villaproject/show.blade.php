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
                        @endforeach
                    </div>
                    
                    

                </div>

            </div>
        </div>
    </div>
    <br><br><br>
                
    @endsection