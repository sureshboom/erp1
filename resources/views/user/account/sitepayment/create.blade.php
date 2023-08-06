@extends('layouts.app')

	@section('title')
	    {{ __('Supplier') }}
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
                                        <li><span class="bread-blod">Payment</span>
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
                    <h3 class="text-center">Site Payment Details</h3>
                    <form action="{{ route('account.site_payment.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Site Name</label>
                                <select name="site_id" id="site_id" class="form-control">
                                        <option value="">Select Site</option>
                                        @foreach($sites as $site)
                                        <option value="{{$site->id}}">{{$site->sitename}}</option>
                                        @endforeach
                                </select>
                                @error('site_id')
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
                            <div class="form-group">
                                <label>Payment Mode</label>
                                <select name="paytype" class="form-control">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Gpay/Phonepay">Gpay/Phonepay</option>
                                        <option value="Bank Transfor">Bank Transfor</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Voucher">Voucher</option>
                                </select>
                                @error('paytype')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Payment By(Gpay_no/Account_no/Check_no/Voucher)</label>
                                <input name="payway" type="text" value="{{ old('payway') }}" class="form-control" placeholder="Payment By">
                                @error('payway')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Total Amount</label>
                                <input name="total" type="number" id="total" min="0" value="{{ old('total') }}" class="form-control" placeholder="Total" readonly>
                                @error('total')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Paid</label>
                                <input name="paid" type="number" id="paid" class="form-control" placeholder="Paid" value="{{ old('paid') }}" readonly>
                                <input type="hidden" id="oldpaid" >
                                @error('paid')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pending</label>
                                <input name="pending" type="number" id="pending" class="form-control" placeholder="Pending" value="{{ old('pending') }}" readonly>
                                @error('pending')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('siteengineer.supplier.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    