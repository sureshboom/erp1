@extends('admin.layout.app')

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
                            <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                <div class="analytics-edu-wrap ant-res-b-30 reso-mg-b-30">
                                    <div class="skill-content-3 analytics-edu">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <h3><span class="counter">Customer</span> Status - <span class="{{$statuscolor}} badge"> {{$statusview}}</span></h3>
                                                    
                                                </div>
                                                <div class="progress-bar  wow fadeInLeft" data-progress="95%" style="width: {{ $levelPercentage }}%;background-color:{{ $levelColor }}" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>{{ $levelPercentage }}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 ">
                                <div class="profile-info-inner">
                                    
                                    <div class="profile-details-hr">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Name</b><br /> {{$customer->customer_name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">ID</b><br /> {{$customer->skslc_id}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Phone</b><br /> {{$customer->phone}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Location</b><br /> {{$customer->location}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Aadhar Card No</b><br /> {{$customer->aadharno}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">PanCard No</b><br /> {{$customer->pancard}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                @if(!empty($customer->attachment1))
                                                <center><a href="{{ $customer->attachment1 }}" class="btn btn-primary" target="_blank" download><span class="fa fa-download"></span> Aadhar Card</a></center>
                                                @endif
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                @if(!empty($customer->attachment2))
                                                <center><a href="{{ $customer->attachment2 }}" class="btn btn-primary" target="_blank" download><span class="fa fa-download"></span> Pancard</a></center>
                                                @endif
                                            </div>
                                            
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Project Name</b><br /> {{$customer->landproject->project_name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Project ID</b><br /> {{$customer->landproject->skslp_id}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Plot No</b><br /> {{$customer->plotno}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Plot Area(Cent)</b><br /> {{$customer->plot_area}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Total Amount</b><br /> {{$customer->amount}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Advance</b><br /> {{$customer->advance}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="address-hr">
                                                    <p><b class="text-primary">Lead From</b><br /> {{ucfirst($customer->leadfrom)}}</p>
                                                    @if($customer->leadfrom =='middleman')
                                                    <p><b class="text-primary">Middle Man Name</b><br /> {{ucfirst($customer->middleman )}}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="address-hr">
                                                    <p><b class="text-primary">Remarks</b><br /> {{$customer->remarks}}</p>
                                                    
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