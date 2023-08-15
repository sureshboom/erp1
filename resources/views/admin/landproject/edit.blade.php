@extends('admin.layout.app')

	@section('title')
	    {{ __('Land Projects') }}
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
                                        <li><span class="bread-blod">Edit Project</span>
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
                    <h3 class="text-center">Land Project Details</h3>
                    <form action="{{ route('landproject.update',$landproject->id) }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Project Name</label>
                                <input name="project_name" type="text" class="form-control" placeholder="Project Name" value="{{ $landproject->project_name }}">
                                @error('project_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>DTCP No</label>
                                <input name="dtcp_no" type="text" class="form-control" placeholder="DTCP No" value="{{ $landproject->dtcp_no }}">
                                @error('dtcp_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Registration No</label>
                                <input name="reg_no" type="text" class="form-control" placeholder="Registration No" value="{{ $landproject->reg_no }}">
                                @error('reg_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Started Date</label>
                                <input name="site_date"  type="date" class="form-control" placeholder="Started Date" value="{{ $landproject->site_date }}">
                                @error('site_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group res-mg-t-15">
                                <label>Project Location</label>
                                <textarea name="location" placeholder="Address">{{ $landproject->location }}</textarea>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Total Area</label>
                                <input name="total_area" type="text" class="form-control" placeholder="Total Area" value="{{ $landproject->total_area }}">
                                @error('total_area')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Of Plots</label>
                                <input name="no_plots" type="text" class="form-control" placeholder="No of Plots" value="{{ $landproject->no_plots }}">
                                @error('no_plots')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Site Engineer</label>
                                <select name="siteengineer_id" class="form-control">
                                        <option value="">Select Site Engineer</option>
                                        @foreach($users as $user)
                                            @if($user->siteengineer)
                                            <option value="{{$user->siteengineer->id}}" {{ $landproject->siteengineer_id == $user->siteengineer->id ? 'selected' : ''}}>{{$user->name}}</option>
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
                                            <option value="{{$user->chiefengineer->id}}" {{ $landproject->chiefengineer_id == $user->chiefengineer->id ? 'selected' : ''}}>{{$user->name}}</option>
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
                                        <option value="" >Select Status</option>
                                        <option value="ready_to_start" {{ $landproject->status == 'ready_to_start' ? 'selected' : ''}}>Ready to Start</option>
                                        <option value="processing" {{ $landproject->status == 'processing' ? 'selected' : ''}}>Processing</option>
                                        <option value="completed" {{ $landproject->status == 'completed' ? 'selected' : ''}}>Completed</option>
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
                                <a href="{{route('landproject.index')}}" class="btn btn-danger">Back</a>
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