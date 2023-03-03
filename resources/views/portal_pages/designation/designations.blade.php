@extends('portal_pages.layouts.master')
@section('content')
<div class="main-wrapper">
   <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">

        <div class="row align-items-center">
          <div class="col">
            <h3 class="page-title">Designation</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Designation</li>
            </ul>
          </div>
          <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i class="fa fa-plus"></i> Add Designation</a>
          </div>
        </div>
      </div>
      <div class="row">
            <div class="col-lg-12">
                <x-message />
            </div>
        </div>
      <div class="row">
        <div class="col-md-12">
          <div>
            <div class="outputmsg" id="outputmsg"></div>
            <table class="table table-striped custom-table mb-0 datatable" id="table_designation">
              <thead>
                <tr>
                  <th style="width: 30px;">#</th>
                  <th>Designation Name</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($get_designations as $get_des)
                <tr {{ $get_des->id}}>
                  <td>{{ $get_des->id}}</td>
                  <td>{{ $get_des->des_title}}</td>
                  <td>{{$get_des->created_at}}</td>
                  <td>
                    <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('designations.edit', $get_des->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                        <form action="{{ route('designations.destroy', $get_des->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="dropdown-item">Delete</button>
                        </form>
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
    <div id="add_designation" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Designation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="saveDesignation" method="POST" action="{{ route('designations.store')}}">
                @csrf
              <div class="form-group">
                <label>Designation Name <span class="text-danger">*</span></label>
                <input type="hidden" name="des_id" value="">
                <input class="form-control" type="text" name="des_title" id="des_title" required>
              </div>
              <div class="submit-section">
                {{-- <button type="submit" class="btn btn-primary submit-btn">Submit</button> --}}
                <input type="submit" class="btn btn-primary" value="Add">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div id="edit_designation" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
                @csrf
                @method('PATCH')
              <div class="form-group">
                <label>Department Name <span class="text-danger">*</span></label>
                <input class="form-control" value="" name="des_title" type="text" >
              </div>
              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    {{--  <div class="modal custom-modal fade" id="delete_department" role="dialog">
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
    </div> --}}
  </div>
</div>
@endsection


