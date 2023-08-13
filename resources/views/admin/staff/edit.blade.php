@extends('admin.layout.app')

	@section('title')
	    {{ __('Staff') }}
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
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Edit Staff</span>
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
                    <form action="{{ route('admin.staff.update', $user->id) }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input name="name" type="text" class="form-control" placeholder="Full Name" value="{{ $user->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" id="password" type="text" class="form-control" placeholder="password" value="{{ $user->account ? $user->account->vpassword : ($user->siteengineer ? $user->siteengineer->vpassword : ($user->telecaller ? $user->telecaller->vpassword : ($user->chiefengineer ? $user->chiefengineer->vpassword : ($user->salesmanager ? $user->salesmanager->vpassword : ($user->salesperson ? $user->salesperson->vpassword : ''))))) }}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Role</label>
                                <input type="hidden" name="role" value="{{ $user->role }}">
                                <select  disabled="true" class="form-control">
                                        <option value="" >Select Role</option>
                                        <option value="account" {{ $user->role === 'account' ? 'selected' : '' }}>Account</option>
                                        <option value="telecaller" {{ $user->role === 'telecaller' ? 'selected' : '' }}>Telecaller</option>
                                        <option value="siteengineer" {{ $user->role === 'siteengineer' ? 'selected' : '' }}>Site Engineer</option>
                                        <option value="chiefengineer" {{ $user->role === 'chiefenginee' ? 'selected' : '' }}>Chief Engineer</option>
                                        <option value="salesmanager" {{ $user->role === 'salesmanager' ? 'selected' : '' }}>Sales Manager</option>
                                        <option value="salesperson" {{ $user->role === 'salesperson' ? 'selected' : '' }}>Sales Person</option>
                                </select>
                                @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Emp ID</label>
                                <input name="user_code" type="text" class="form-control" placeholder="Emp-Id" value="{{ $user->account ? $user->account->user_code : ($user->siteengineer ? $user->siteengineer->user_code : ($user->telecaller ? $user->telecaller->user_code : ($user->chiefengineer ? $user->chiefengineer->user_code : ($user->salesmanager ? $user->salesmanager->user_code : ($user->salesperson ? $user->salesperson->user_code : ''))))) }}">
                                @error('user_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Aadhar Card No</label>
                                <input name="aadharno" type="text" class="form-control" placeholder="Aadhar Card No" value="{{ $user->account ? $user->account->aadharno : ($user->siteengineer ? $user->siteengineer->aadharno : ($user->telecaller ? $user->telecaller->aadharno : ($user->chiefengineer ? $user->chiefengineer->aadharno : ($user->salesmanager ? $user->salesmanager->aadharno : ($user->salesperson ? $user->salesperson->aadharno : ''))))) }}">
                                @error('aadharno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pan Card No</label>
                                <input name="pancard" type="text" class="form-control" placeholder="Pan Card No" value="{{ $user->account ? $user->account->pancard : ($user->siteengineer ? $user->siteengineer->pancard : ($user->telecaller ? $user->telecaller->pancard : ($user->chiefengineer ? $user->chiefengineer->pancard : ($user->salesmanager ? $user->salesmanager->pancard : ($user->salesperson ? $user->salesperson->pancard : ''))))) }}">
                                @error('pancard')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>PF No</label>
                                <input name="pfno" type="text" class="form-control" placeholder="PF No" value="{{ $user->account ? $user->account->pfno : ($user->siteengineer ? $user->siteengineer->pfno : ($user->telecaller ? $user->telecaller->pfno : ($user->chiefengineer ? $user->chiefengineer->pfno : ($user->salesmanager ? $user->salesmanager->pfno : ($user->salesperson ? $user->salesperson->pfno : ''))))) }}">
                                @error('pfno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Experience</label>
                                <input name="experience" type="text" class="form-control" placeholder="Experience" value="{{ $user->account ? $user->account->experience : ($user->siteengineer ? $user->siteengineer->experience : ($user->telecaller ? $user->telecaller->experience : ($user->chiefengineer ? $user->chiefengineer->experience : ($user->salesmanager ? $user->salesmanager->experience : ($user->salesperson ? $user->salesperson->experience : ''))))) }}">
                                @error('experience')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Date of Joining</label>
                                <input name="joined_date" id="finish" type="text" class="form-control" placeholder="Date of Joining" value="{{ $user->account ? $user->account->joined_date : ($user->siteengineer ? $user->siteengineer->joined_date : ($user->telecaller ? $user->telecaller->joined_date : ($user->chiefengineer ? $user->chiefengineer->joined_date : ($user->salesmanager ? $user->salesmanager->joined_date : ($user->salesperson ? $user->salesperson->joined_date : ''))))) }}">
                                @error('joined_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phono</label>
                                <input name="phone" type="tel" pattern="[0-9]*" class="form-control" placeholder="Phono" value="{{ $user->account ? $user->account->phone : ($user->siteengineer ? $user->siteengineer->phone : ($user->telecaller ? $user->telecaller->phone : ($user->chiefengineer ? $user->chiefengineer->phone : ($user->salesmanager ? $user->salesmanager->phone : ($user->salesperson ? $user->salesperson->phone : ''))))) }} ">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Alter Phono</label>
                                <input name="alternate_no" type="tel" pattern="[0-9]*" class="form-control" placeholder="Alter Phono" value="{{ $user->account ? $user->account->alternate_no : ($user->siteengineer ? $user->siteengineer->alternate_no : ($user->telecaller ? $user->telecaller->alternate_no : ($user->chiefengineer ? $user->chiefengineer->alternate_no : ($user->salesmanager ? $user->salesmanager->alternate_no : ($user->salesperson ? $user->salesperson->alternate_no : ''))))) }}">
                                @error('alternate_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label>Address</label>
                                <textarea name="location" placeholder="Address">{{ $user->account ? $user->account->location : ($user->siteengineer ? $user->siteengineer->location : ($user->telecaller ? $user->telecaller->location : ($user->chiefengineer ? $user->chiefengineer->location : ($user->salesmanager ? $user->salesmanager->location : ($user->salesperson ? $user->salesperson->location : ''))))) }}</textarea>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Monthly Salary</label>
                                <input name="salary" type="number" min="0" step="0.01" class="form-control" placeholder="Monthly Salary" value="{{ $user->account ? $user->account->salary : ($user->siteengineer ? $user->siteengineer->salary : ($user->telecaller ? $user->telecaller->salary : ($user->chiefengineer ? $user->chiefengineer->salary : ($user->salesmanager ? $user->salesmanager->salary : ($user->salesperson ? $user->salesperson->salary : ''))))) }}">
                                @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Aadhar Card</label>
                                <input name="attachment" type="file" class="form-control" placeholder="Monthly Salary" >
                                @error('attachment')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pan Card</label>
                                <input name="attachment1" type="file" class="form-control" placeholder="Monthly Salary" >
                                @error('attachment1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Others</label>
                                <input name="attachment2" type="file" class="form-control" placeholder="Monthly Salary" >
                                @error('attachment2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Update</button>
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