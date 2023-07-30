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
                                        <li><span class="bread-blod">Create Staff</span>
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
                    <h3 class="text-center">Staff Details</h3>
                    <form action="{{ route('admin.staff.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email / Username</label>
                                <input name="email" type="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="password">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input name="vpassword" id="vpassword" type="password" class="form-control" placeholder="Confirm password">
                                @error('vpassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                        <option value="" selected="" disabled="">Select Role</option>
                                        <option value="account">Account</option>
                                        <option value="telecaller">Telecaller</option>
                                        <option value="siteengineer">Site Engineer</option>
                                        <option value="chiefengineer">Chief Engineer</option>
                                        <option value="salesmanager">Sales Manager</option>
                                        <option value="salesperson">Sales Person</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Emp ID</label>
                                <input name="user_code" type="text" class="form-control" placeholder="Emp-Id" value="{{ old('user_code') }}">
                                @error('user_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Date of Joining</label>
                                <input name="joined_date" id="finish" type="text" class="form-control" placeholder="Date of Joining" value="{{ old('joined_date') }}">
                                @error('joined_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phono</label>
                                <input name="phone" type="tel" pattern="[0-9]*" class="form-control" placeholder="Phono" value="{{ old('phone') }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alter Phono</label>
                                <input name="alternate_no" type="tel" pattern="[0-9]*" class="form-control" placeholder="Alter Phono" value="{{ old('alternate_no') }}">
                                @error('alternate_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label>Address</label>
                                <textarea name="location" placeholder="Address"></textarea>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Monthly Salary</label>
                                <input name="salary" type="number" min="0" step="0.01" class="form-control" placeholder="Monthly Salary" value="{{ old('salary') }}">
                                @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('admin.staff')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- <div style="height:8vh;"></div> -->
@endsection    