    @extends('admin.layout.app')

    @section('title')
        {{ __('Villa') }}
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
                                        <li><span class="bread-blod">Create villa</span>
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
                    <h3 class="text-center">Villa Details</h3>
                    <form action="{{ route('villa.store') }}" class="acount-infor" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3">
                            
                            <div class="form-group">
                                <label>Villa Project</label>
                                <select name="villaproject_id" id="villaproject_id" class="form-control">
                                        <option value="">Select Project </option>
                                        @foreach($villaprojects as $villaproject)
                                        <option value="{{$villaproject->id}}">{{$villaproject->project_name}}</option>
                                        @endforeach
                                        
                                </select>
                                @error('villaproject_id')
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
                                        <td>Villa No</td>
                                        <td>Villa Area</td>
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
                                <a href="{{route('villaproject.index')}}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection    