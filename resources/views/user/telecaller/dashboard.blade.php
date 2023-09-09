@extends('layouts.app')

	@section('title')
	    {{ __('Dashboard') }}
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
                                        <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Dashboard</span>
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
	<div class="widgets-programs-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Total Customers</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">
                                     @php 
                                        $uid = \App\Models\Telecaller::where('user_id',(Auth::user()->id))->first();
                                    @endphp

                                    {{ \App\Models\Customer::where('created_by_id',$uid->id)->where('created_by_type','telecaller')->count('id'); }}</h1>
                                    
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h5>Total No.Of.Called</h5>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-interface"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Telework::where('telecaller_id',($uid->id))->sum('called'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h5>Total No.Of.Followup</h5>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-interface"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Telework::where('telecaller_id',($uid->id))->sum('follow_up'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h5>Total No.Of.Site Visits</h5>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-interface"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Telework::where('telecaller_id',($uid->id))->sum('site_visit'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Today's Customers</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Customer::where('created_by_id',($uid->id))->where('created_by_type','telecaller')->whereRaw('Date(created_at) = CURDATE()')->count('id'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h5>Today's No.Of.Called</h5>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-interface"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Telework::where('telecaller_id',($uid->id))->whereRaw('Date(created_at) = CURDATE()')->sum('called'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h5>Today's No.Of.Followup</h5>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-interface"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Telework::where('telecaller_id',($uid->id))->whereRaw('Date(created_at) = CURDATE()')->sum('follow_up'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h5>Today's No.Of.Site Visits</h5>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-interface"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Telework::where('telecaller_id',($uid->id))->whereRaw('Date(created_at) = CURDATE()')->sum('site_visit'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
	@endsection