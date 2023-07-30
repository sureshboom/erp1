@extends('layouts.app')

	@section('title')
	    {{ __('Site Visit Details') }}
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
                                        <a href="{{route('salesmanager.siteview')}}" class="btn btn-danger ">Back</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <ul class="breadcome-menu">
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Visiting Details</span>
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
                        @foreach($siteviews as $siteview)
                            
                        <div class="row ">
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4 class="text-success">Visiting Details</h4>
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <p><span><b>Visiting Date</b></span> : <span>{{ $siteview->date }}</span>, </p>
                                                <p><span><b>Site Name</b></span> : <span>{{ $siteview->site_name }}</span>, </p>
                                                <p><span><b>Visiting Status</b></span> :
                                                @if($siteview->status == 'open')
                                                <span class="badge badge-danger">{{ ucfirst($siteview->status) }}</span>
                                                @elseif($siteview->status == 'visited')
                                                <span class="badge badge-warning">{{ ucfirst($siteview->status) }}</span>
                                                @else
                                                <span class="badge badge-success">{{ ucfirst($siteview->status) }}</span>
                                                @endif
                                                  </p>
                                                <p><br></p>
                                                <p><br></p>
                                                <p><br></p>
                                                <p><br></p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4 class="text-success">Customer Details</h4>
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <p><span><b>Customer Name</b></span> : <span>{{ $siteview->customer->customer_name }}</span>, </p>
                                                <p><span><b>Customer Phone</b></span> : <span>{{ $siteview->customer->phone }}</span>, </p>
                                                <p><span><b>Interested Project</b></span> : <span>{{ $siteview->customer->interested_project }}</span>, </p>
                                                <p><span><b>Interested Area</b></span> : <span>{{ $siteview->customer->interested_area }}</span>, </p>
                                                <p><span><b>Customer Feedback</b></span> : <span>{{ $siteview->customer->feedback }}</span>, </p>
                                                <p><span><b>Source</b></span> : <span>{{ $siteview->customer->source }}</span>, </p>
                                                <p><span><b>Customer Location</b></span> : <span>{{ $siteview->customer->location }}</span> </p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row ">
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4 class="text-success">Created By</h4>
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                @if($siteview->customer->created_by_type == 'salesperson')
                                                <p><span><b>Role</b></span> : <span>{{ ucfirst($siteview->customer->salesperson->user->role)}}</span>, </p>
                                                <p><span><b>Salesperson Name</b></span> : <span>{{ $siteview->customer->salesperson->user->name}}</span>, </p>
                                                <p><span><b>Salesperson ID</b></span> : <span>{{ $siteview->customer->salesperson->user_code}}</span>, </p>
                                                <p><span><b>Created Date</b></span> :
                                                    {{ formatDate($siteview->customer->created_at)}}
                                                  </p>
                                                @elseif($siteview->customer->created_by_type == 'telecaller')
                                                <p><span><b>Role</b></span> : <span>{{ ucfirst($siteview->customer->telecaller->user->role)}}</span>, </p>
                                                <p><span><b>Salesperson Name</b></span> : <span>{{ $siteview->customer->telecaller->user->name}}</span>, </p>
                                                <p><span><b>Salesperson ID</b></span> : <span>{{ $siteview->customer->telecaller->user_code}}</span>, </p>
                                                <p><span><b>Created Date</b></span> :
                                                    {{ formatDate($siteview->customer->created_at)}}
                                                  </p>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <h4 class="text-success">Customer Received By</h4>
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                @if($siteview->received_id != null)
                                                <p><span><b>Role</b></span> : <span>{{ ucfirst($siteview->salesperson->user->role)}}</span>, </p>
                                                <p><span><b>Salesperson Name</b></span> : <span>{{ $siteview->salesperson->user->name}}</span>, </p>
                                                <p><span><b>Salesperson ID</b></span> : <span>{{ $siteview->salesperson->user_code}}</span>, </p>
                                                <p><br></p>
                                                @endif
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