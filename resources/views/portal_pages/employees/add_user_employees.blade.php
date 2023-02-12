@extends('portal_pages.layouts.master')
@section('content')
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="page-title">Users</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ul>
          </div>

          <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
          </div>


        </div>
      </div>

      <div class="row filter-row">
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus">
            <input type="text" class="form-control floating">
            <label class="focus-label">Name</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus select-focus">
            <select class="select floating">
              <option>Select Company</option>
              <option>Global Technologies</option>
              <option>Delta Infotech</option>
            </select>
            <label class="focus-label">Company</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="form-group form-focus select-focus">
            <select class="select floating">
              <option>Select Roll</option>
              <option>Web Developer</option>
              <option>Web Designer</option>
              <option>Android Developer</option>
              <option>Ios Developer</option>
            </select>
            <label class="focus-label">Role</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <a href="#" class="btn btn-success btn-block"> Search </a>
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
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Created Date</th>
                  <th>Update Date</th>
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($get_users as $user)
                <tr>
                  <td>
                    <h2 class="table-avatar">
                      <a href="{{ url('employee/profile/'.$user->id)}}" class="avatar">
                        <img src="{{ asset('uploads/employee_images/'.$user->empRelation->image)}}" alt="">
                    </a>
                      <a href="profile.html">{{$user->name}}<span>Admin</span></a>
                    </h2>
                  </td>
                  <td><a href="mailto:{{$user->email}}" class="__cf_email__" data-cfemail="482c2926212d2438273a3c2d3a082d30292538242d662b2725">{{$user->email}}</a></td>
                  <td>
                    <span class="badge bg-inverse-danger">{{$user->rol_id == 1 ? 'Super Admin' : 'Executive'}}</span>
                  </td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->updated_at}}</td>
                  <td class="text-right">
                    <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_user"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user"><i class="fa fa-trash-o m-r-5"></i> Delete</a> -->
                      </div>
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
            <h5 class="modal-title">Add User</h5>
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
                {{-- <div class="col-sm-6">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password">
                  </div>
                </div> --}}

                {{-- <div class="col-sm-6">
                  <div class="form-group">
                    <label>Role</label>
                    <select class="select">
                      <option>Admin</option>
                      <option>Client</option>
                      <option>Employee</option>
                    </select>
                  </div>
                </div> --}}

              </div>
              {{-- <div class="table-responsive m-t-15">
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
                      <td>Employee</td>
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
                      </td>
                    </tr>
                    <tr>
                      <td>Holidays</td>
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
                      </td>
                    </tr>
                    <tr>
                      <td>Events</td>
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div> --}}
              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Add User</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{-- <div id="edit_user" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input class="form-control" value="John" type="text">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" value="Doe" type="text">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Username <span class="text-danger">*</span></label>
                    <input class="form-control" value="johndoe" type="text">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input class="form-control" value="johndoe@example.com" type="email">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="password">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Phone </label>
                    <input class="form-control" value="9876543210" type="text">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Role</label>
                    <select class="select">
                      <option>Admin</option>
                      <option>Client</option>
                      <option selected="">Employee</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Company</label>
                    <select class="select">
                      <option>Global Technologies</option>
                      <option>Delta Infotech</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Employee ID <span class="text-danger">*</span></label>
                    <input type="text" value="FT-0001" class="form-control floating">
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
                      <td>Employee</td>
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
                      </td>
                    </tr>
                    <tr>
                      <td>Holidays</td>
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
                      </td>
                    </tr>
                    <tr>
                      <td>Events</td>
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
                        <input checked="" type="checkbox">
                      </td>
                      <td class="text-center">
                        <input checked="" type="checkbox">
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
    </div> --}}
    <div class="modal custom-modal fade" id="delete_user" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-header">
              <h3>Delete User</h3>
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
    </div>
  </div>
@endsection
