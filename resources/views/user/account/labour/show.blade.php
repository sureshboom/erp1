@extends('layouts.app')

	@section('title')
	    {{ __('Land Customer') }}
	@endsection

	@section('main')
    <br>
    <br>
    </div>
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-sm-12 col-xs-12">
                    <div class="">
                        <div class="row">
                            
                            <div class="col-lg-12 ">
                                <div class="profile-info-inner">
                                    
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Name</b><br /> {{$labour->name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">ID</b><br /> {{$labour->sksls_id}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Phone</b><br /> {{$labour->phone}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Address</b><br /> {{$labour->address}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Aadhar Card No</b><br /> {{$labour->aadharno}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">PanCard No</b><br /> {{$labour->pancard}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                @if(!empty($labour->attachment1))
                                                <center><a href="{{ $labour->attachment1 }}" class="btn btn-primary" target="_blank" download><span class="fa fa-download"></span> Aadhar Card</a></center>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                @if(!empty($labour->attachment2))
                                                <center><a href="{{ $labour->attachment2 }}" class="btn btn-primary" target="_blank" download><span class="fa fa-download"></span> Pancard</a></center>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">GST No</b><br /> {{$labour->gstno}}</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="address-hr">
                                                    <a href="{{url()->previous();}}" class="btn btn-default text-danger">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
        </div>
    </div>
    @endsection