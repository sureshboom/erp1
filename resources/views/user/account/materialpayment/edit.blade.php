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
                    <h3 class="text-center">Material Payment Details</h3>
                    <form action="{{ route('account.material_payment.update', $history->id) }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-sm-6 col-xs-12">
                            
                            <div class="form-group">
                                <label> Amount</label>
                                <input name="amount"  type="number" value="{{ $history->amount }}" class="form-control" placeholder="Amount">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Payment Mode</label>
                                <select name="paytype" class="form-control">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Gpay/Phonepay" {{ $history->paytype == 'Gpay/Phonepay' ? 'selected' : ''}}>Gpay/Phonepay</option>
                                        <option value="Bank Transfor" {{ $history->paytype == 'Bank Transfor' ? 'selected' : ''}}>Bank Transfor</option>
                                        <option value="Cheque" {{ $history->paytype == 'Cheque' ? 'selected' : ''}}>Cheque</option>
                                        <option value="Voucher" {{ $history->paytype == 'Voucher' ? 'selected' : ''}}>Voucher</option>
                                </select>
                                @error('paytype')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Payment By(Gpay_no/Account_no/Check_no/Voucher)</label>
                                <input name="payway" type="text" value="{{ $history->payway }}" class="form-control" placeholder="Payment By">
                                @error('payway')
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