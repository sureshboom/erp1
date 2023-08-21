@extends('layouts.app')

	@section('title')
	    {{ __('Mesthiri Assign') }}
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
                                        <li><span class="bread-blod">Create Assign</span>
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
                    <h3 class="text-center">Assign Details</h3>
                    <form action="{{ route('chiefengineer.assignstore') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-sm-6 col-xs-12">
                            
                            <div class="form-group">
                                <label>Project Type</label>
                                <select name="project_type" id="project_type" class="form-control">
                                        <option value="">Select Project Type</option>
                                        
                                        <option value="contract" {{old('project_type') == 'contract' ? 'selected':'' }}>Contract Projects</option>
                                        <option value="villa" {{old('project_type') == 'villa' ? 'selected':'' }}>Vila Projects</option>
                                        
                                </select>
                                @error('project_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displaycontract">
                                <label>Contract Project</label>
                                <select name="contract_project_id" class="form-control">
                                        <option value="">Select Contract Project</option>
                                        @foreach($contractprojects as $contractproject)
                                        <option value="{{$contractproject->id}}">{{$contractproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('contract_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayvilla">
                                <label>Villa Project</label>
                                <select name="villa_project_id" class="form-control">
                                        <option value="">Select Villa Project</option>
                                        @foreach($villaprojects as $villaproject)
                                        <option value="{{$villaproject->id}}">{{$villaproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('villa_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Mesthiri</label>
                                
                                <select name="mesthiri_id" class="form-control">
                                        <option value="">Select Mesthiri</option>
                                        @foreach($mesthiris as $mesthiri)
                                        
                                            <option value="{{$mesthiri->id}}">SKSMT {{$mesthiri->id}} - {{($mesthiri->nickname)}}</option>
                                        
                                        @endforeach
                                </select>
                                @error('mesthiri_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
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