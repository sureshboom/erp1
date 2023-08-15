@extends('admin.layout.app')

	@section('title')
	    {{ __('Contract Project Create') }}
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
                                        <li><span class="bread-blod">Create Project</span>
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
                    <h3 class="text-center">Contract Project Details</h3>
                    <form action="{{ route('contractproject.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input name="project_name" type="text" class="form-control" placeholder="Project Name" value="{{ old('project_name') }}">
                                @error('project_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>DTCP No</label>
                                <input name="dtcp_no" type="text" class="form-control" placeholder="DTCP No" value="{{ old('dtcp_no') }}">
                                @error('dtcp_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Registration No</label>
                                <input name="reg_no" type="text" class="form-control" placeholder="Registration No" value="{{ old('reg_no') }}">
                                @error('reg_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Started Date</label>
                                <input name="site_date"  type="date" class="form-control" placeholder="Started Date" value="{{ old('site_date') }}">
                                @error('site_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group res-mg-t-15">
                                <label>Project Location</label>
                                <textarea name="location" placeholder="Address"></textarea>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Total Land Area</label>
                                <input name="total_land_area" type="text" class="form-control" placeholder="Total Land Area" value="{{ old('total_land_area') }}">
                                @error('total_land_area')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Total Buildup Area</label>
                                <input name="total_buildup_area" type="text" class="form-control" placeholder="Total Buildup Area" value="{{ old('total_buildup_area') }}">
                                @error('total_buildup_area')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Site Engineer</label>
                                <select name="siteengineer_id" class="form-control">
                                        <option value="">Select Site Engineer</option>
                                        @foreach($users as $user)
                                            @if($user->siteengineer)
                                            <option value="{{$user->siteengineer->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                </select>
                                @error('siteengineer_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Cheif Engineer</label>
                                <select name="chiefengineer_id" class="form-control">
                                        <option value="">Select Cheif Engineer</option>
                                        @foreach($users as $user)
                                            @if($user->chiefengineer)
                                            <option value="{{$user->chiefengineer->id}}">{{$user->name}}</option>
                                            @endif
                                        @endforeach
                                </select>
                                @error('chiefengineer_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                        <option value="none" selected="" disabled="">Select Status</option>
                                        <option value="ready_to_start">Ready to Start</option>
                                        <option value="processing">Processing</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('contractproject.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- <div style="height:8vh;"></div> -->
@endsection    