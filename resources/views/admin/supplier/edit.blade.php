@extends('admin.layout.app')

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
                                        <li><a href="{{ route('admin.dashboard') }}">Home</a> <span class="bread-slash">/</span>
                                        </li>
                                        <li><span class="bread-blod">Edit Supplier</span>
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
                    <h3 class="text-center">Supplier Details</h3>
                    <form action="{{ route('supplier.update',$supplier->id) }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input name="supplier_name" type="text" class="form-control" placeholder="Supplier Name" value="{{ $supplier->supplier_name }}">
                                @error('supplier_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>GST No</label>
                                <input name="supplier_gstno" type="text" value="{{ $supplier->supplier_gstno }}" class="form-control" placeholder="GST No">
                                @error('supplier_gstno')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Phono</label>
                                <input name="supplier_phone" type="tel" pattern="[0-9]*" class="form-control" placeholder="Phono" value="{{ $supplier->supplier_phone }}">
                                @error('supplier_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Gpay/Phonepay</label>
                                <input name="supplier_gpay" type="tel" pattern="[0-9]*"  class="form-control" placeholder="Gpay/Phonepay" value="{{ $supplier->supplier_gpay }}">
                                @error('supplier_gpay')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            
                            
                            <div class="form-group res-mg-t-15">
                                <label>Address</label>
                                <textarea name="supplier_location" placeholder="Address">{{ $supplier->supplier_location }}</textarea>
                                @error('supplier_location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group res-mg-t-15">
                                <label>Account Details</label>
                                <textarea name="supplier_account" placeholder="Account Details">{{ $supplier->supplier_account }}</textarea>
                                @error('supplier_account')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('supplier.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    