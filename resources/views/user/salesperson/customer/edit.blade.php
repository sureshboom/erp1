@extends('layouts.app')

	@section('title')
	    {{ __('Customer') }}
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
                                        <li><span class="bread-blod">Edit Customer</span>
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
                    <h3 class="text-center">Customer Details</h3>
                    <form action="{{ route('salesperson.direct_customer.update',$customer->id) }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                
                                <input name="customer_name" type="text" class="form-control" placeholder="Customer Name" value="{{ $customer->customer_name }}">
                                @error('customer_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Interested Project</label>
                                <input name="interested_project" type="text" value="{{ $customer->interested_project }}" class="form-control" placeholder="Interested Project">
                                @error('interested_project')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phono</label>
                                <input name="phone" type="tel" pattern="[0-9]*" class="form-control" placeholder="Phono" value="{{ $customer->phone }}">
                                @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Interested Area</label>
                                <input name="interested_area" type="text"  class="form-control" placeholder="Interested Area" value="{{ $customer->interested_area }}">
                                @error('interested_area')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Source</label>
                                <select name="source" class="form-control">
                                        <option value="" selected="" disabled="">Select Source</option>
                                        <option value="News Paper" {{ $customer->source === 'News Paper' ? 'selected' : '' }}>News Paper</option>
                                        <option value="Ad Banner" {{ $customer->source === 'Ad Banner' ? 'selected' : '' }}>Ad Banner</option>
                                        <option value="FB" {{ $customer->source === 'FB' ? 'selected' : '' }}>FB</option>
                                        <option value="Instagram" {{ $customer->source === 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                        <option value="Website" {{ $customer->source === 'Website' ? 'selected' : '' }}>Website</option>
                                        <option value="Walk In" {{ $customer->source === 'Walk In' ? 'selected' : '' }}>Walk In</option>
                                        <option value="Telecaller" {{ $customer->source === 'Telecaller' ? 'selected' : '' }}>Telecaller</option>
                                </select>
                                @error('source')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            
                            <div class="form-group res-mg-t-15">
                                <label>Address</label>
                                <textarea name="location" placeholder="Address">{{ $customer->location }}</textarea>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group res-mg-t-15">
                                <label>Feedback</label>
                                <textarea name="feedback" placeholder="Feedback">{{ $customer->feedback }}</textarea>
                                @error('feedback')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('salesperson.direct_customer.index')}}" class="btn btn-danger">Back</a>
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