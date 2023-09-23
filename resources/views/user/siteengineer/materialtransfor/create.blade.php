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
                    <h3 class="text-center">Material Transfor Details</h3>
                    <form action="{{ route('siteengineer.material_transfors.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            
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
                                <select name="contract_project_id" class="form-control">
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
                                <select name="villa_project_id" class="form-control">
                                        <option value="">Select Villa Project</option>
                                        @foreach($villaprojects as $villaproject)
                                        <option value="{{$villaproject->id}}">{{$villaproject->project_name}}</option>
                                        @endforeach
                                </select>
                                @error('villa_project_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                        </div>
                    </div>
                    <!-- {{$materials}} -->
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 table-responsive">
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
                                <a href="{{route('siteengineer.material_transfors.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    