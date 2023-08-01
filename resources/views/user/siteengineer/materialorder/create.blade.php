    @extends('layouts.app')

	@section('title')
	    {{ __('Material') }}
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
                                        <li><span class="bread-blod">Create Order</span>
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
                    <h3 class="text-center">Material Order Details</h3>
                    <form action="{{ route('siteengineer.material_order.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <select name="supplier_id" class="form-control">
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
                                <label>Site Name</label>
                                <select name="site_id" class="form-control">
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
                                <label>Amount</label>
                                <input type="number"  name="amount" class="form-control">
                                @error('amount')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            <table class="table table-responsive">
                                <thead >
                                    <tr>
                                        <td>Product Name</td>
                                        <td>Quantity</td>
                                        <td><button type="button" class="btn btn-primary add_item">+Add</button></td>
                                    </tr>    
                                </thead>
                                <tbody class="show_item">
                                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="payment-adress">
                                <button type="submit" class="btn btn-success ">Submit</button>
                                <a href="{{route('siteengineer.material_order.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    