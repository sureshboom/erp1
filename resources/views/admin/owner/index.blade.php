@extends('admin.layout.app')

    @section('title')
        {{ __('Owner') }}
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
                                        <li><span class="bread-blod">Owner</span>
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
    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Owner <span class="table-project-n">Details</span> Table</h1>


                                </div>
                                <a href="{{ route('owner.create')}}" class="btn btn-primary">+ Add New</a>
                                <!-- <p>{{ $owners }}</p> -->
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                            <option value="">Export Basic</option>
                                            <option value="all">Export All</option>
                                            <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">ID</th>
                                                
                                                <th data-field="name" data-editable="false">Owner Name</th>
                                                <th data-field="phono" data-editable="false">Phone</th>
                                                <th data-field="location" data-editable="false">Location</th>
                                                <th data-field="role">Referred By</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($owners as $owner)
                                            <tr>

                                                <td></td>
                                                <td>{{$loop->iteration}}</td>
                                                
                                                <td>{{$owner->owner_name}}</td>
                                                <td>{{$owner->phone}}</td>
                                                <td>{{ $owner->location }}</td>
                                                <td>{{$owner->referred_by}}</td>
                                                
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                    <a href="{{ route('owner.edit', $owner->id) }}"
                                                        class="btn ll-mr-4 ll-p-0">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $owner->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                    <form method="post" action="{{ route('owner.destroy', $owner->id) }}" id="delete-post-{{ $owner->id }}" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td></td>
                                                <td colspan="6"> No data</td>
                                            </tr>
                                            @endforelse
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection