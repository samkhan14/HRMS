@extends('portal_pages.layouts.master')
@section('content')


<div class="page-wrapper">
  <div class="content container-fluid">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="page-title">Employees List</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Employee</li>
          </ul>
        </div>
        <div class="col-auto float-right ml-auto">
          <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add Employee</a>
          <div class="view-icons">
            <a href="employees.html" class="grid-view btn btn-link"><i class="fa fa-th"></i></a>
            <a href="employees-list.html" class="list-view btn btn-link active"><i class="fa fa-bars"></i></a>
          </div>
        </div>
      </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
    @endif

    <div class="row filter-row">
      <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
          <input type="text" class="form-control floating">
          <label class="focus-label">Employee ID</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus">
          <input type="text" class="form-control floating">
          <label class="focus-label">Employee Name</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="form-group form-focus select-focus">
          <select class="select floating">
            <option>Select Designation</option>
            <option>Web Developer</option>
            <option>Web Designer</option>
            <option>Android Developer</option>
            <option>Ios Developer</option>
          </select>
          <label class="focus-label">Designation</label>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <a href="#" class="btn btn-success btn-block"> Search </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped custom-table datatable">
            <thead>
              <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th class="text-nowrap">Join Date</th>
                <th>Role</th>
                <th>Status</th>
                <th class="text-right no-sort">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($all_employees as $all_emps)
              <tr>
                <td>{{$all_emps->user_id}}</td>
                <td>
                  <h2 class="table-avatar">
                    <a href="{{url('employee/profile',$all_emps->user_id)}}" class="avatar">
                        <img alt="" src="{{ asset('uploads/employee_images/'.$all_emps->image)}}">
                    </a>
                    <a href="{{url('employee/profile',$all_emps->user_id)}}">{{$all_emps->fname}} {{$all_emps->lname}} <span>{{$all_emps->designation->des_title}}</span></a>
                  </h2>
                </td>
                <td><a href="{{isset($all_emps->userinfo->email)?$all_emps->userinfo->email:'N/A'}}" class="__cf_email__" data-cfemail="046e6b6c6a606b6144617c65697468612a676b69">{{isset($all_emps->userinfo->email)?$all_emps->userinfo->email:'N/A'}}</a></td>
                <td>{{$all_emps->persnol_number}}</td>
                <td>{{isset($all_emps->userinfo->created_at)?$all_emps->userinfo->created_at:'N/A'}}</td>
                <td> <a href="" class="btn btn-white btn-sm btn-rounded" aria-expanded="false">{{$all_emps->designation->des_title}} </a></td>
            <td>
                {{ $all_emps->status == 1 ? 'Active' : 'InActive' }}
            </td>
                <td class="text-right">
                  <div class="dropdown dropdown-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="{{ url('edit/employee/'.$all_emps->id)}}" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
                      <!-- <a class="dropdown-item" href="{{ url('/change-employee-status/id/'.$all_emps->id)}}"><i class="fa fa-trash-o m-r-5"></i> {{ $all_emps->status == 1 ? 'InActive' : 'Active' }}</a>
                    </div> -->
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div id="add_user" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add User First for Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" id="brandForm" name="brandForm" action="{{ url('add-employee-user')}}" enctype="multipart/form-data">
              @csrf
            <div class="row">
              <input type="hidden" name="user_id" value="">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Full Name <span class="text-danger">*</span></label>
                  <input name="name" class="form-control" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Email <span class="text-danger">*</span></label>
                  <input name="email" class="form-control" type="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" name="password" type="password">
                </div>
              </div>

            </div>

            <div class="submit-section">
              <button class="btn btn-primary submit-btn">Add User</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- {{-- <div id="add_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                  <input class="form-control" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Last Name</label>
                  <input class="form-control" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Username <span class="text-danger">*</span></label>
                  <input class="form-control" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Email <span class="text-danger">*</span></label>
                  <input class="form-control" type="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input class="form-control" type="password">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Confirm Password</label>
                  <input class="form-control" type="password">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                  <input type="text" class="form-control">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                  <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Phone </label>
                  <input class="form-control" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Company</label>
                  <select class="select">
                    <option value="">Global Technologies</option>
                    <option value="1">Delta Infotech</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department <span class="text-danger">*</span></label>
                  <select class="select">
                    <option>Select Department</option>
                    <option>Web Development</option>
                    <option>IT Management</option>
                    <option>Marketing</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Designation <span class="text-danger">*</span></label>
                  <select class="select">
                    <option>Select Designation</option>
                    <option>Web Designer</option>
                    <option>Web Developer</option>
                    <option>Android Developer</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="table-responsive m-t-15">
              <table class="table table-striped custom-table">
                <thead>
                  <tr>
                    <th>Module Permission</th>
                    <th class="text-center">Read</th>
                    <th class="text-center">Write</th>
                    <th class="text-center">Create</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Import</th>
                    <th class="text-center">Export</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Holidays</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Leaves</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Clients</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Projects</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Tasks</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Chats</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Assets</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Timing Sheets</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="submit-section">
              <button class="btn btn-primary submit-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- <div id="edit_employee" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">First Name <span class="text-danger">*</span></label>
                  <input class="form-control" value="John" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Last Name</label>
                  <input class="form-control" value="Doe" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Username <span class="text-danger">*</span></label>
                  <input class="form-control" value="johndoe" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Email <span class="text-danger">*</span></label>
                  <input class="form-control" value="johndoe@example.com" type="email">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <input class="form-control" value="johndoe" type="password">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Confirm Password</label>
                  <input class="form-control" value="johndoe" type="password">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
                  <input type="text" value="FT-0001" readonly="" class="form-control floating">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
                  <div class="cal-icon"><input class="form-control datetimepicker" type="text"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Phone </label>
                  <input class="form-control" value="9876543210" type="text">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="col-form-label">Company</label>
                  <select class="select">
                    <option>Global Technologies</option>
                    <option>Delta Infotech</option>
                    <option selected="">International Software Inc</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Department <span class="text-danger">*</span></label>
                  <select class="select">
                    <option>Select Department</option>
                    <option>Web Development</option>
                    <option>IT Management</option>
                    <option>Marketing</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Designation <span class="text-danger">*</span></label>
                  <select class="select">
                    <option>Select Designation</option>
                    <option>Web Designer</option>
                    <option>Web Developer</option>
                    <option>Android Developer</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="table-responsive m-t-15">
              <table class="table table-striped custom-table">
                <thead>
                  <tr>
                    <th>Module Permission</th>
                    <th class="text-center">Read</th>
                    <th class="text-center">Write</th>
                    <th class="text-center">Create</th>
                    <th class="text-center">Delete</th>
                    <th class="text-center">Import</th>
                    <th class="text-center">Export</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Holidays</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Leaves</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Clients</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Projects</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Tasks</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Chats</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Assets</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                  <tr>
                    <td>Timing Sheets</td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input checked="" type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                    <td class="text-center">
                      <input type="checkbox">
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="submit-section">
              <button class="btn btn-primary submit-btn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal custom-modal fade" id="delete_employee" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="form-header">
            <h3>Delete Employee</h3>
            <p>Are you sure want to delete?</p>
          </div>
          <div class="modal-btn delete-action">
            <div class="row">
              <div class="col-6">
                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
              </div>
              <div class="col-6">
                <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}} -->
</div>

@endsection
