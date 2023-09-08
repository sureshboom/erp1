@extends('layouts.app')

	@section('title')
	    {{ __('Salary') }}
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
                                        <li><a href="{{ route('user.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Create Salary</span>
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
                    <h3 class="text-center">Salary Details</h3>
                    <form action="{{ route('account.salary.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Staff Name</label>
                                <select name="staff_id" id="staff_id" class="form-control">
                                        <option value="">Select Staff</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}" {{ old('staff_id') == $user->id ? 'selected':''}}>{{$user->name}}</option>
                                        @endforeach
                                </select>
                                @error('staff_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>From Date</label>
                                <input name="from_date" type="date" value="{{ old('from_date') }}" class="form-control" placeholder="GST No">
                                @error('from_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>To Date</label>
                                <input name="to_date" type="date" value="{{ old('to_date') }}" class="form-control" placeholder="GST No">
                                @error('to_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Advance</label>
                                <input name="advance" id="advance" type="number" min="0" class="form-control" placeholder="Advance" value="{{old('advance')? old('advance') : 0}}" readonly>
                                @error('advance')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Monthly Salary</label>
                                <input name="salary_amount" id="salary_amount" type="number" min="0" class="form-control" placeholder="Monthly Salary">
                                @error('salary_amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Detection</label>
                                <input name="detection" id="detection" type="number" min="0" class="form-control" value="{{old('detection')? old('detection') : 0}}" placeholder="Detection">
                                @error('detection')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Take Home</label>
                                <input name="salary" id="salary" type="number" min="0" class="form-control" placeholder="Take Home" readonly>
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
                                <a href="{{route('account.salary.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    