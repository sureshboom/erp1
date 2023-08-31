@extends('layouts.app')

    @section('title')
        {{ __('Villa Customer') }}
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
                                                    <p><b class="text-primary">ID</b><br /> {{$customer->sksvc_id}}</p>
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
                                                    
                                                    <p><b class="text-primary">Project Name</b><br /> {{$customer->villaproject->project_name}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Project ID</b><br /> {{$customer->villaproject->sksvp_id}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Villa No</b><br /> {{$customer->vilano}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Villa Area(Square)</b><br /> {{$customer->villa_area}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr">
                                                    
                                                    <p><b class="text-primary">Total Amount</b><br /> Rs.{{moneyFormatIndia($customer->amount).'.00'}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                                <div class="address-hr ">
                                                    <p><b class="text-primary">Advance</b><br /> Rs.{{moneyFormatIndia($customer->advance).'.00'}}</p>
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