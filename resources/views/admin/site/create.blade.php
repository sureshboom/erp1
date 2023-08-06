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
                                        <li><span class="bread-blod">Create Site</span>
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
                    <h3 class="text-center">Site Details</h3>
                    <form action="{{ route('site.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Site Name</label>
                                <input name="sitename" type="text" class="form-control" placeholder="Site Name" value="{{ old('sitename') }}">
                                @error('sitename')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Site ID </label>
                                <input name="siteid" type="text" class="form-control" placeholder="Site-Id" value="SKSPR0{{ $site? $site+1 : 1}} ">
                                @error('siteid')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Site Type</label>
                                <select name="sitetype" class="form-control">
                                        <option value="none" selected="" disabled="">Select Type</option>
                                        <option value="Construction">Construction</option>
                                        <option value="Land & Construction">Land & Construction</option>
                                </select>
                                @error('sitetype')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Work Started Date</label>
                                <input name="site_date" id="finish" type="text" class="form-control" placeholder="Work Started Date" value="{{ old('site_date') }}">
                                @error('site_date')
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
                            
                            <div class="form-group">
                                <label> Amount</label>
                                <input name="amount" id="amount" type="number" min="0" value="{{ old('amount') }}" class="form-control" placeholder="Amount">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            
                            <div class="form-group">
                                <label>Owner</label>
                                <select name="owner_id" class="form-control">
                                        <option value="">Select Owner</option>
                                        @foreach($owners as $owner)
                                        <option value="{{$owner->id}}">{{$owner->owner_name}}</option>
                                        @endforeach
                                </select>
                                @error('owner_id')
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
                            <div class="form-group res-mg-t-15">
                                <label>Site Location</label>
                                <textarea name="location" placeholder="Address"></textarea>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('site.index')}}" class="btn btn-danger">Back</a>
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