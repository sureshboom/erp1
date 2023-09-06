    @extends('layouts.app')

	@section('title')
	    {{ __('Payments') }}
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
                                        <li><span class="bread-blod">Create Payments</span>
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
                    <h3 class="text-center">Payments Details</h3>
                    <form action="{{route('account.payment.store')}}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date"  name="payment_date" class="form-control" value="{{old('payment_date')}}">
                                @error('payment_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group" id="displayland">
                                <label>Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="form-control ">
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" id="displayproject">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Project Type</label>
                                <select name="project_type" id="project_type" class="form-control">
                                        <option value="">Select Project Type</option>
                                        
                                        <option value="contract" {{old('project_type') == 'contract' ? 'selected':'' }}>Contract Projects</option>
                                        <option value="villa" {{old('project_type') == 'villa' ? 'selected':'' }}>Villa Projects</option>
                                        
                                </select>
                                @error('project_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group" id="displayvillaunit">
                                <label>Villa</label>
                                <select name="villa_id" id="villa_id" class="form-control project_id">
                                        <option value="">Select Villa Project</option>
                                </select>
                                @error('villa_id')
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
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group" id="displaycontract">
                                <label>Contract Project</label>
                                <select name="contract_project_id" id="contract_project_id" class="form-control project_id">
                                        <option value="">Select Contract Project</option>
                                        
                                </select>
                                @error('contract_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayvilla">
                                <label>Villa Project</label>
                                <select name="villa_project_id" id="villa_project_id" class="form-control project_id">
                                        <option value="">Select Villa Project</option>
                                        
                                </select>
                                @error('villa_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
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
                                <a href="{{route('account.supplier_payments.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    