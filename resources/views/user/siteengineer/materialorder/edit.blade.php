@extends('layouts.app')

	@section('title')
	    {{ __('Materials Edit') }}
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
                                        <li><span class="bread-blod">Edit Materials </span>
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
                    <h3 class="text-center">Material Details</h3>
                    <form action="{{ route('siteengineer.purchaseupdate') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="project_type" value="{{$siteid->project_type}}">
                    <input type="hidden" name="materialin_id" value="{{$siteid->materialin_id}}">
                    @if($siteid->project_type == 'contract')

                    <input type="hidden" name="contract_project_id" value="{{$siteid->contract_project_id}}">
                    @else
                    <input type="hidden" name="villa_project_id" value="{{$siteid->villa_project_id}}">
                    @endif
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 table-responsive">
                            
                            <table class="table table-responsive">
                                <thead >
                                    <tr>
                                        <td>Product Name</td>
                                        <td>Quantity</td>
                                        <td>Description</td>
                                        <td><button type="button" class="btn btn-primary add_item">+Add</button></td>
                                    </tr>    
                                </thead>
                                <tbody class="show_item">
                                    
                                    @foreach($materialspurs as $materialspur)
                                    <tr><td><select name="meterial_id[]" class="form-control"><option value="">Select Material</option>@foreach($materials as $material)<option value="{{$material->id}}" {{ $materialspur->meterial_id === $material->id ? 'selected' : '' }}>{{$material->meterial_name}}</option>@endforeach</select></td><td><input class="form-control" name="quantity[]" type="number" min="0" value="{{$materialspur->quantity}}"></td><td><textarea name="description[]" id="description">{{$materialspur->description}}</textarea></td><td></td></tr>
                                    @endforeach
                                </tbody>
                            </table>
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