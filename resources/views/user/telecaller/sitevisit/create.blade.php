@extends('layouts.app')

	@section('title')
	    {{ __('Site Visit Arrange') }}
	@endsection

	@section('main')<br>
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
                                        <li><span class="bread-blod">Create Site Visit</span>
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
                    <h3 class="text-center">Site Visit Details</h3>
                    <form action="{{ route('telecaller.sitevisit.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <select name="customer_id" class="form-control">
                                        <option value="">Select Customer</option>
                                        @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{$customer->customer_name}}</option>
                                        @endforeach
                                </select>
                                @error('customer_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Site Name</label>
                                
                                <input name="site_name" type="text" class="form-control" placeholder="Site Name" value="{{ old('site_name') }}">
                                @error('site_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Visiting Date</label>
                                <input name="date" type="date" value="{{ old('date') }}" class="form-control" placeholder="Visiting Date">
                                @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('telecaller.sitevisit.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div style="height:16vh;"></div>
@endsection    