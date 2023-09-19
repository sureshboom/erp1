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
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Material Suppliers</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\Supplier::count('id'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Labour Suppliers</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\LabourSupplier::count('id'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Staffs</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\User::count('id'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Land Customer</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\LandCustomer::count('id'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Contract Customer</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\ContractCustomer::count('id'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                        <div class="panel-body">
                            <div class="stats-title pull-left">
                                <h4>Villa Customer</h4>
                            </div>
                            <div class="stats-icon pull-right">
                                <i class="educate-icon educate-professor"></i>
                            </div>
                            <div class="m-t-xl widget-cl-2">
                                <h1 class="text-info">{{ \App\Models\ProjectCustomer::count('id'); }}</h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
	@endsection