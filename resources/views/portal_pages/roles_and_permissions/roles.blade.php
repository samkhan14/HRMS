@extends('portal_pages.layouts.master')
@section('content')
<div class="main-wrapper">
   <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">

        <div class="row align-items-center">
          <div class="col">
            <h3 class="page-title">Roles</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Roles</li>
            </ul>
          </div>
          <div class="col-auto float-right ml-auto">
            <a href="javascript:void(0)" class="btn add-btn" id="create-new-post"><i class="fa fa-plus"></i> Add Role</a>
          </div>
        </div>
        <div class="textmsg"></div>
      </div>
      <div class="row">
        <div class="col-lg-12">
        <x-message />
        </div>
      </div>
      <div class="row">
       <div class="col-md-12">
          <div>
            <table class="table table-striped custom-table mb-0 datatable" id="role_crud">
              <thead>
                <tr>
                  <th style="width: 30px;">#</th>
                  <th>Role Name</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="role-crud">
                @foreach($roles as $role)
                <tr id="role_id_{{ $role->id }}">
                  <td>{{ $role->id}}</td>
                  <td>{{ $role->name}}</td>
                  <td>{{$role->created_at}}</td>
                  <td>
                    <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item roleUpdate" href="javascript:void(0)" id="edit-role" data-id="{{ $role->id }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                         <a href="javascript:void(0)" class="dropdown-item delete-role" id="delete-role" data-id="{{ $role->id }}">Delete</a>

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
      <div class="row mt-5">
        <div class="col-lg-12">
            <div class="role_permissions">
            <h3>Role Permissions</h3>
            <ul>
                @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission )
                    <li>{{$role_permission->name}}</li>
                    @endforeach
                @endif
                </ul>
            </div>
        </div>
      </div>
    </div>

    <div id="ajax-roles-crud-modal" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="postCrudModal"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="rolesForm" method="POST" action="{{ route('roles.store')}}" name="rolesForm">
            <input type="hidden" name="role_id" id="role_id" value="">
              <div class="form-group">
                <label>Role Name <span class="text-danger">*</span></label>
                <input class="form-control" id="name" type="text" name="name" required>
              </div>
              <div class="submit-section">
                 <button type="submit" id="role-save" value="create" class="btn btn-primary submit-btn">Save</button>
                <!-- <input type="submit" class="btn btn-primary" value="Add New"> -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

     <!-- <div id="edit_role" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Role</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{route('roles.update', $role->id)}}">
                @csrf
                @method('HEAD')
              <div class="form-group">
              <input class="form-control" value="{{$role->id}}" id="role_id" name="role_id" type="hidden">
                <label>Role Name <span class="text-danger">*</span></label>
                <input class="form-control" value="{{ $role->name}}" id="role_name" name="name" type="text">
              </div>
              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <!-- <div class="modal custom-modal fade" id="delete_department" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-header">
              <h3>Delete Department</h3>
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
    </div> -->
  </div>
</div>
@endsection


