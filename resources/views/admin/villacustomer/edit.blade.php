@extends('admin.layout.app')

	@section('title')
	    {{ __('Villa Customer') }}
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
                                        <li><a href="{{ route('admin.dashboard')}}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Edit Villa Customer</span>
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
                    <h3 class="text-center">Villa Customer Details</h3>
                    <form action="{{ route('villacustomer.update',$customer->id) }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Customer Name</label>
                                <input name="customer_name" type="text" class="form-control" placeholder="Supplier Name" value="{{ $customer->customer_name }}">
                                @error('customer_name')
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
                            <div class="form-group res-mg-t-15">
                                <label>Address</label>
                                <textarea name="location" placeholder="Address">{{ $customer->location }}</textarea>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Aadhar Card No</label>
                                <input name="aadharno" type="text" value="{{ $customer->aadharno}}" class="form-control" placeholder="Aadhar Card No">
                                @error('aadharno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Aadhar Card</label>
                                <input name="attachment1" accept="image/*" type="file" class="form-control" >
                                @error('attachment1')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pan Card No</label>
                                <input name="pancard" type="text" value="{{ $customer->pancard}}" class="form-control" placeholder="Pan Card No">
                                @error('pancard')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pan Card</label>
                                <input name="attachment2" accept="image/*" type="file"  class="form-control" placeholder="Aadhar Card No">
                                @error('attachment2')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Villa Project</label>
                                <select name="project_id" class="form-control">
                                        <option value="">Select Land Project</option>
                                        @foreach($villaprojects as $villaproject)
                                        <option value="{{$villaproject->id}}" {{$customer->project_id == $villaproject->id ? 'selected' : ''}}>{{$villaproject->project_name}} ({{$villaproject->sksvp_id}})</option>
                                        @endforeach
                                </select>
                                @error('project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Villa No</label>
                                <input name="vilano" type="text" value="{{ $customer->vilano }}" class="form-control" placeholder="Villa No">
                                @error('vilano')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Villa Area (Square)</label>
                                <input name="villa_area" type="text" value="{{ $customer->villa_area }}" class="form-control" placeholder="Villa Area">
                                @error('villa_area')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Total Amount</label>
                                <input name="amount" type="text" value="{{ $customer->amount }}" class="form-control" placeholder="Total Amount">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Advance</label>
                                <input name="advance" type="text" value="{{ $customer->advance}}" class="form-control" placeholder="Advance">
                                @error('advance')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Lead From</label>
                                <select name="leadfrom" id="leadfrom" class="form-control">
                                        <option value="">Select Lead From</option>
                                        <option value="salesteam" {{$customer->leadfrom == 'salesteam' ? 'selected': ''}}>Sales Team</option>
                                        <option value="middleman" {{$customer->leadfrom == 'middleman' ? 'selected': ''}}>Middle Man</option>
                                </select>
                                @error('leadfrom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="middle">
                                <label>Middle Man</label>
                                <input type="text" id="middleman" name="middleman" placeholder="Middle Man" value="{{$customer->middleman}}" class="form-control">
                                @error('middleman')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" >
                                <label>Remarks</label>
                                <textarea name="remarks" class="form-control" placeholder="Remarks">{{$customer->remarks}}</textarea>
                                @error('middleman')
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
    
@endsection    