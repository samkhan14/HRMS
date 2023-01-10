@extends('portal_pages.layouts.master')
@section('title', 'All Attendance')
@section('content')
<div class="main-wrapper">
   <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">

        <div class="row align-items-center">
          <div class="col">
            <h3 class="page-title">All ATTENDANCES</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Attendance</li>
            </ul>
          </div>
          <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Add Manual Attendance</a>
            <a href="#" class="btn add-btn mx-3" data-toggle="modal" data-target="#add_department"><i class="fa fa-plus"></i> Upload Attendance</a>
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
            <table class="table table-striped custom-table mb-0 datatable">
              <thead>
                <tr>
                  <th>Employee</th>
                  <th>Date</th>
                  <th>Time-in</th>
                  <th>Time-out</th>
                  <th>Type</th>
                  <th class="text-right">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($table as $at )
                <tr>
                  <td>{{$at->name}}</td>
                  <td>{{ $at->date}}</td>
                  <td>{{$at->checkin}}</td>
                  <td>{{$at->checkout}}</td>
                  <td>{{$at->attendance_type}}</td>
                  <td class="text-right">
                    <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href=""><i class="fa fa-pencil m-r-5"></i> Edit</a>

                        <form action="" method="post">
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
    <div id="add_department" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Manual Attendance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('mark-manual-attendance')}}">
                @csrf
                <input type="hidden" name="des_id" value="">
              <div class="form-group">
                <label>Select Employee <span class="text-danger">*</span></label>
                <select name="empid" id="" class="form-control select2">
                    <option selected>Select Employee </option>
                     @foreach ($table as $c )
                     <option value="{{$c->id}}">{{$c->name}}</option>
                     @endforeach
                 </select>
              </div>
              <div class="form-group">
                <label>Select Date <span class="text-danger">*</span></label>
                <input type="date" name="att_date" value="" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Checkin Time<span class="text-danger">*</span></label>
                <input type="time" name="att_time_in" value="" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Checkout Time<span class="text-danger">*</span></label>
                <input type="time" name="att_time_out" value="" class="form-control" >
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
    <div id="upload_attendance" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload Attendance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ url('upload-attendance')}}" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label>Upload sheet <span class="text-danger">*</span></label>
                  <input type="file" name="up_attendance" value="" class="form-control" >
                </div>
                <div class="submit-section">
                  {{-- <button type="submit" class="btn btn-primary submit-btn">Submit</button> --}}
                  <input type="submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    {{-- <div id="edit_department" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Department</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('departments.update',$department->id)}}">
                @csrf
                @method('PATCH')
              <div class="form-group">
                <label>Department Name <span class="text-danger">*</span></label>
                <input class="form-control" value="{{$department->dep_name}}" name="dep_name" type="text">
              </div>
              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal custom-modal fade" id="delete_department" role="dialog">
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
