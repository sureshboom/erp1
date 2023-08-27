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
                        <div class="col-lg-6 col-lg-offset-3">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date"  name="payment_date" class="form-control" value="{{old('payment_date')}}">
                                @error('payment_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Payment Type</label>
                                <select name="payment_type" id="payment_type" class="form-control">
                                        <option value="">Select Payment Type</option>
                                        <option value="project" {{old('payment_type') == 'project' ? 'selected':'' }}>Project</option>
                                        <option value="material" {{old('payment_type') == 'material' ? 'selected':'' }}>Material</option>
                                        <option value="expense" {{old('payment_type') == 'expense' ? 'selected':'' }}>Expense</option>
                                </select>
                                @error('payment_type')
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
                                        <option value="land" {{old('project_type') == 'land' ? 'selected':'' }}>Land Projects</option>
                                        <option value="contract" {{old('project_type') == 'contract' ? 'selected':'' }}>Contract Projects</option>
                                        <option value="villa" {{old('project_type') == 'villa' ? 'selected':'' }}>Vila Projects</option>
                                        
                                </select>
                                @error('project_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="customers">
                                <label>Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control">
                                        <option value="">Select Customers</option>
                                </select>
                                @error('customer_id')
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
                            <div class="form-group" id="displayland">
                                <label>Land Project</label>
                                <select name="land_project_id" id="land_project_id" class="form-control ">
                                        <option value="">Select Land Project</option>
                                        @foreach($landprojects as $landproject)
                                        <option value="{{$landproject->id}}">{{$landproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('land_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displaycontract">
                                <label>Contract Project</label>
                                <select name="contract_project_id" id="contract_project_id" class="form-control project_id">
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
                                <select name="villa_project_id" id="villa_project_id" class="form-control project_id">
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
                                <label>Total Amount</label>
                                <input name="total" type="number" id="total" min="0" value="{{ old('total') }}" class="form-control" placeholder="Total" readonly>
                                @error('total')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Advance Amount</label>
                                <input name="advance" id="advance" class="form-control" placeholder="Total" readonly>
                                @error('advance')
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
                    <div class="row" id="displaymaterial">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group" id="displayland">
                                <label>Supplier</label>
                                <select name="supplier_id" id="supplier_id" class="form-control ">
                                        <option value="">Select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->supplier_name}}</option>
                                        @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> Amount</label>
                                <input name="mamount" id="mamount" type="number" min="0" value="{{ old('mamount') }}" class="form-control" placeholder="Amount">
                                @error('mamount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Payment Mode</label>
                                <select name="mpaytype" class="form-control">
                                        <option value="">Select Payment Mode</option>
                                        <option value="Gpay/Phonepay">Gpay/Phonepay</option>
                                        <option value="Bank Transfor">Bank Transfor</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Voucher">Voucher</option>
                                </select>
                                @error('mpaytype')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Payment By(Gpay_no/Account_no/Check_no/Voucher)</label>
                                <input name="mpayway" type="text" value="{{ old('mpayway') }}" class="form-control" placeholder="Payment By">
                                @error('mpayway')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Total Amount</label>
                                <input name="mtotal" type="number" id="mtotal" min="0" value="{{ old('mtotal') }}" class="form-control" placeholder="Total" readonly>
                                @error('mtotal')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Paid</label>
                                <input name="mpaid" type="number" id="mpaid" class="form-control" placeholder="Paid" value="{{ old('mpaid') }}" readonly>
                                <input type="hidden" id="moldpaid" >
                                @error('mpaid')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pending</label>
                                <input name="mpending" type="number" id="mpending" class="form-control" placeholder="Pending" value="{{ old('mpending') }}" readonly>
                                @error('mpending')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" id="displayexpense">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Expense Type</label>
                                <select class="form-control" name="expense_type" id="expense_type">
                                    <option value="">Select Expense Type</option>
                                    <option value="office" {{old('expense_type') == 'office' ? 'selected':'' }}>Office</option>
                                    <option value="project" {{old('expense_type') == 'project' ? 'selected':'' }}>Project</option>
                                </select>
                                @error('expense_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayprojecttype">
                                <label>Project Type</label>
                                <select name="expense_project_type" id="expense_project_type" class="form-control">
                                    <option value="">Select Project Type</option>
                                    <option value="land" {{old('expense_project_type') == 'land' ? 'selected':'' }}>Land Projects</option>
                                    <option value="contract" {{old('expense_project_type') == 'contract' ? 'selected':'' }}>Contract Projects</option>
                                    <option value="villa" {{old('expense_project_type') == 'villa' ? 'selected':'' }}>Vila Projects</option>
                                </select>
                                @error('expense_project_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayexpenseland">
                                <label>Land Project</label>
                                <select name="eland_project_id" id="eland_project_id" class="form-control ">
                                        <option value="">Select Land Project</option>
                                        @foreach($landprojects as $landproject)
                                        <option value="{{$landproject->id}}">{{$landproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('eland_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayexpensecontract">
                                <label>Contract Project</label>
                                <select name="econtract_project_id" id="econtract_project_id" class="form-control project_id">
                                        <option value="">Select Contract Project</option>
                                        @foreach($contractprojects as $contractproject)
                                        <option value="{{$contractproject->id}}">{{$contractproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('econtract_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayexpensevilla">
                                <label>Villa Project</label>e
                                <select name="evilla_project_id" id="evilla_project_id" class="form-control project_id">
                                        <option value="">Select Villa Project</option>
                                        @foreach($villaprojects as $villaproject)
                                        <option value="{{$villaproject->id}}">{{$villaproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('evilla_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Approved By</label>
                                <input name="approved_by"  type="text" value="{{ old('approved_by') }}" class="form-control" placeholder="Approved By">
                                @error('approved_by')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Expense For</label>
                                <input name="name" type="text" value="{{ old('name') }}" class="form-control" placeholder="Expense">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input name="eamount" type="number" min="0" value="{{ old('amount') }}" class="form-control" placeholder="Amount">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Received By</label>
                                <input name="received_by" type="text" value="{{ old('received_by') }}" class="form-control" placeholder="Received By">
                                @error('received_by')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    