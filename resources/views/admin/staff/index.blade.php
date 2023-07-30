@extends('admin.layout.app')

	@section('title')
	    {{ __('Staff') }}
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
                                        <li><span class="bread-blod">Staff</span>
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
                                    <h1>Staff <span class="table-project-n">Details</span> Table</h1>


                                </div>
                                <a href="{{ route('admin.staff.create')}}" class="btn btn-primary">+ Add New</a>
                                
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
                                                <th data-field="code">Emp ID</th>
                                                <th data-field="name" data-editable="false">Name</th>
                                                <th data-field="email" data-editable="false">Email</th>
                                                <th data-field="phone" data-editable="false">Phone</th>
                                                <th data-field="role">Role</th>
                                                <th data-field="date" data-editable="false">DOJ</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $user)
                                            <tr>

                                                <td></td>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $user->account ? $user->account->user_code : ($user->siteengineer ? $user->siteengineer->user_code : ($user->telecaller ? $user->telecaller->user_code : ($user->chiefengineer ? $user->chiefengineer->user_code : ($user->salesmanager ? $user->salesmanager->user_code : ($user->salesperson ? $user->salesperson->user_code : ''))))) }}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{ $user->account ? $user->account->phone : ($user->siteengineer ? $user->siteengineer->phone : ($user->telecaller ? $user->telecaller->phone : ($user->chiefengineer ? $user->chiefengineer->phone : ($user->salesmanager ? $user->salesmanager->phone : ($user->salesperson ? $user->salesperson->phone : ''))))) }} </td>
                                                <td>{{ucfirst   ($user->role)}}</td>
                                                
                                                <td>
                                                    {{ $user->account ? formatDate($user->account->joined_date) : ($user->chiefengineer ? formatDate($user->chiefengineer->joined_date)  : ($user->telecaller ? formatDate($user->telecaller->joined_date) : ($user->siteengineer ? formatDate($user->siteengineer->joined_date) : ($user->salesmanager ? formatDate($user->salesmanager->joined_date) : ($user->salesperson ? formatDate($user->salesperson->joined_date) : ''))))) }}
                                                </td>
                                                <td class="datatable-ct"><i class="fa fa-check"></i>
                                                    <a href="{{ route('admin.staff.show', $user->id) }}"
                                                        class="btn ll-mr-4 ll-p-0">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.staff.edit', $user->id) }}"
                                                        class="btn ll-mr-4 ll-p-0">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-link btn-danger" onclick="document.getElementById('delete-post-{{ $user->id }}').submit();"><i class="fa fa-trash"></i></a>
                                                    <form method="post" action="{{ route('admin.staff.delete', $user->id) }}" id="delete-post-{{ $user->id }}" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8"> No data</td>
                                                
                                                
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