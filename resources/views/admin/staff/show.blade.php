@extends('admin.layout.app')

	@section('title')
	    {{ __('Staff') }}
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
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Staff Staff</span>
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
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="profile-info-inner">
                                    <div class="profile-img">
                                       <center><img src="{{ $user->account ? $user->account->photo : ($user->siteengineer ? $user->siteengineer->photo : ($user->telecaller ? $user->telecaller->photo : ($user->chiefengineer ? $user->chiefengineer->photo : ($user->salesmanager ? $user->salesmanager->photo : ($user->salesperson ? $user->salesperson->photo : ''))))) }}" style="width: 150px;"  alt="" /></center> 
                                    </div>
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Name</b><br /> {{$user->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Role</b><br /> {{ucfirst($user->role)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><b>Emp ID</b><br /> {{ $user->account ? $user->account->user_code : ($user->siteengineer ? $user->siteengineer->user_code : ($user->telecaller ? $user->telecaller->user_code : ($user->chiefengineer ? $user->chiefengineer->user_code : ($user->salesmanager ? $user->salesmanager->user_code : ($user->salesperson ? $user->salesperson->user_code : ''))))) }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b>Date of Joining</b><br /> {{ $user->account ? formatDate($user->account->joined_date) : ($user->siteengineer ? formatDate($user->siteengineer->joined_date)  : ($user->telecaller ? formatDate($user->telecaller->joined_date) : ($user->chiefengineer ? formatDate($user->chiefengineer->joined_date) : ($user->salesmanager ? formatDate($user->salesmanager->joined_date) : ($user->salesperson ? formatDate($user->salesperson->joined_date) : ''))))) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><span class="fa fa-envelope"></span> <b>Email ID</b><br /> {{$user->email}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><span class="fa fa-lock"></span>  <b>Password</b><br /> {{ $user->account ? $user->account->vpassword : ($user->siteengineer ? $user->siteengineer->vpassword : ($user->telecaller ? $user->telecaller->vpassword : ($user->chiefengineer ? $user->chiefengineer->vpassword : ($user->salesmanager ? $user->salesmanager->vpassword : ($user->salesperson ? $user->salesperson->vpassword : ''))))) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    <p><span class="fa fa-phone"></span> <b>Phone no</b><br /> {{ $user->account ? $user->account->phone     : ($user->siteengineer ? $user->siteengineer->phone  : ($user->telecaller ? $user->telecaller->phone   : ($user->chiefengineer ? $user->chiefengineer->phone : ($user->salesmanager ? $user->salesmanager->phone : ($user->salesperson ? $user->salesperson->phone : ''))))) }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><span class="fa fa-phone"></span>  <b>Alter Phone no</b><br /> {{ $user->account ? $user->account->alternate_no : ($user->siteengineer ? $user->siteengineer->alternate_no : ($user->telecaller ? $user->telecaller->alternate_no : ($user->chiefengineer ? $user->chiefengineer->alternate_no : ($user->salesmanager ? $user->salesmanager->alternate_no : ($user->salesperson ? $user->salesperson->alternate_no : ''))))) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="address-hr">
                                                    <p><b>Address</b><br />{{ $user->account ? $user->account->location : ($user->siteengineer ? $user->siteengineer->location : ($user->telecaller ? $user->telecaller->location : ($user->chiefengineer ? $user->chiefengineer->location : ($user->salesmanager ? $user->salesmanager->location : ($user->salesperson ? $user->salesperson->location : ''))))) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="address-hr">
                                                    <p><b>Monthly Salary</b><br />Rs.{{ $user->account ? $user->account->salary : ($user->siteengineer ? $user->siteengineer->salary : ($user->telecaller ? $user->telecaller->salary : ($user->chiefengineer ? $user->chiefengineer->salary : ($user->salesmanager ? $user->salesmanager->salary : ($user->salesperson ? $user->salesperson->salary : ''))))) }}.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="address-hr">
                                                    <a href="{{route('admin.staff')}}" class="btn btn-default text-danger">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
    @endsection