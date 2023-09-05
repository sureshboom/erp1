@extends('layouts.app')

	@section('title')
	    {{ __('Labour Supplier Assign') }}
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
                    <form action="{{ route('chiefengineer.laboursupplier.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        
                        <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12">
                            
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
                                <select name="contractproject_id" class="form-control">
                                        <option value="">Select Contract Project</option>
                                        @foreach($contractprojects as $contractproject)
                                        <option value="{{$contractproject->id}}">{{$contractproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('contractproject_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayvilla">
                                <label>Villa Project</label>
                                <select name="villaproject_id" id="villa_project_id" class="form-control">
                                        <option value="">Select Villa Project</option>
                                        @foreach($villaprojects as $villaproject)
                                        <option value="{{$villaproject->id}}">{{$villaproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('villaproject_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group" id="displayv">
                                <label>Villa No</label>
                                <select name="villa_id" id="villa_id" class="form-control">
                                        <option value="">Select Villa </option>
                                </select>
                                @error('villa_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                
                                <select name="supplier_id" class="form-control">
                                        <option value="">Select Supplier</option>
                                        @foreach($laboursuppliers as $laboursupplier)
                                        
                                            <option value="{{$laboursupplier->id}}">SKSMT {{$laboursupplier->id}} - {{($laboursupplier->name)}}</option>
                                        
                                        @endforeach
                                </select>
                                @error('supplier_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>From Date</label>
                                <input name="from_date" type="date" class="form-control" placeholder="Phono" value="{{ old('from_date') }}">
                                @error('from_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>To Date</label>
                                <input name="end_date" type="date" class="form-control" placeholder="Phono" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Amount</label>
                                <input name="amount" type="number" min="0" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                                @error('amount')
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
    
@endsection    