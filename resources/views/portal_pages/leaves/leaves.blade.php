@extends('portal_pages.layouts.master')
@section('content')

<div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="page-title">Leaves</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Leaves</li>
            </ul>
          </div>
          <div class="col-auto float-right ml-auto">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="stats-info">
            <h6>Today Presents</h6>
            <h4>12 / 60</h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stats-info">
            <h6>Planned Leaves</h6>
            <h4>8 <span>Today</span></h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stats-info">
            <h6>Unplanned Leaves</h6>
            <h4>0 <span>Today</span></h4>
          </div>
        </div>
        <div class="col-md-3">
          <div class="stats-info">
            <h6>Pending Requests</h6>
            <h4>12</h4>
          </div>
        </div>
      </div>
      <div class="row filter-row">
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
          <div class="form-group form-focus">
            <input type="text" class="form-control floating">
            <label class="focus-label">Employee Name</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
          <div class="form-group form-focus select-focus">
            <select class="select floating">
              <option> -- Select -- </option>
              <option>Casual Leave</option>
              <option>Medical Leave</option>
              <option>Loss of Pay</option>
            </select>
            <label class="focus-label">Leave Type</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
          <div class="form-group form-focus select-focus">
            <select class="select floating">
              <option> -- Select -- </option>
              <option> Pending </option>
              <option> Approved </option>
              <option> Rejected </option>
            </select>
            <label class="focus-label">Leave Status</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
          <div class="form-group form-focus">
            <div class="cal-icon">
              <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">From</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
          <div class="form-group form-focus">
            <div class="cal-icon">
              <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">To</label>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
          <a href="#" class="btn btn-success btn-block"> Search </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped custom-table mb-0 datatable">
              <thead>
                <tr>
                  <th>Employee</th>
                  <th>Leave Type</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Reason</th>
                  <th>No of Days</th>
                  <th>Remaining</th>
                  <th>Total</th>
                  <th class="text-center">Status</th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($all_leaves as $all_lvs )
                <tr>
                    <td hidden class="id" name="id">{{ $all_lvs->id}}</td>
                  <td>
                    <h2 class="table-avatar">
                      <a href="profile.html" class="avatar"><img alt="" src="assets/img/profiles/avatar-02.jpg"></a>
                      <a> {{ $all_lvs->userinfo->name }} </a>
                    </h2>
                  </td>
                  <td>{{ $all_lvs->leave_type}}</td>
                  <td class="start_date">{{ date('d F, Y', strtotime( $all_lvs->start_date))}}</td>
                  <td>{{ date('d F, Y', strtotime( $all_lvs->end_date))}}</td>
                  <td>{{$all_lvs->reason}}</td>
                  <td>{{$all_lvs->days}}</td>
                  <td>{{$all_lvs->remaining_leaves }}</td>
                  <td>{{$all_lvs->total_leaves}}</td>
                  <td class="text-center">
                    <div class="dropdown action-label">
                      <a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-dot-circle-o text-success"></i> {{$all_lvs->status}}
                      </a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
                        <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                        <a class="dropdown-item" href="{{ url('approve-leave',$all_lvs->id)}}"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
                        <a class="dropdown-item" href="{{ url('reject-leave',$all_lvs->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> Rejected</a>
                        </div>
                    </div>
                  </td>
                  <td class="text-right">
                    <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ $all_lvs->id}}" data-toggle="modal" data-target="#edit_leave"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a class="dropdown-item" href="{{ $all_lvs->id }}" data-toggle="modal" data-target="#delete_approve"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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


    <div id="add_leave"  class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Leave</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ url('add-leave')}}">
                @csrf
                <input type="hidden" name="user_id_as_emp_id" value="{{ Auth::user()->id }}">
              <div class="form-group">
                <label>Leave Type <span class="text-danger">*</span></label>
                <select class="select" name="leave_type">
                  <option>Select Leave Type</option>
                  <option>Casual Leave 12 Days</option>
                  <option>Medical Leave</option>
                  <option>Loss of Pay</option>
                </select>
              </div>
              <div class="form-group">
                <label>From <span class="text-danger">*</span></label>
                <div class="cal-icon">
                  <input class="form-control" type="date" name="start_date">
                </div>
              </div>
              <div class="form-group">
                <label>To <span class="text-danger">*</span></label>
                <div class="cal-icon">
                  <input class="form-control" type="date" name="end_date">
                </div>
              </div>
              {{-- <div class="form-group">
                <label>Number of days <span class="text-danger">*</span></label>
                <input class="form-control" readonly type="text">
              </div> --}}
              {{-- <div class="form-group">
                <label>Remaining Leaves <span class="text-danger">*</span></label>
                <input class="form-control" readonly value="12" type="text">
              </div> --}}
              <div class="form-group">
                <label>Leave Reason <span class="text-danger">*</span></label>
                <textarea rows="4" class="form-control" name="reason"></textarea>
              </div>
              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div id="edit_leave" class="modal custom-modal fade" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Leave</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ url('leave/edit')}}" method="POST">
                @csrf
                <input type="text" name="id" id="l_id" value="">
              <div class="form-group">
                <label>Leave Type <span class="text-danger">*</span></label>
                <select class="select" id="leave_type" name="leave_type">
                    <option>Select Leave Type</option>
                    <option>Casual Leave 12 Days</option>
                    <option>Medical Leave</option>
                    <option>Loss of Pay</option>
                </select>
              </div>
              <div class="form-group">
                <label>From <span class="text-danger">*</span></label>
                <div class="cal-icon">
                  <input class="form-control datetimepicker" value="" type="date" name="start_date" id="start_date">
                </div>
              </div>
              <div class="form-group">
                <label>To <span class="text-danger">*</span></label>
                <div class="cal-icon">
                  <input class="form-control datetimepicker" value="" type="date" name="end_date" id="end_date">
                </div>
              </div>
              <div class="form-group">
                <label>Leave Reason <span class="text-danger">*</span></label>
                <textarea rows="4" class="form-control" name="reason" id="reason"></textarea>
              </div>
              <div class="submit-section">
                <button class="btn btn-primary submit-btn">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal custom-modal fade" id="approve_leave" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-header">
              <h3>Leave Approve</h3>
              <p>Are you sure want to approve for this leave?</p>
            </div>
            <div class="modal-btn delete-action">
              <div class="row">
                <div class="col-6">
                  <a href="" class="btn btn-primary continue-btn">Approve</a>
                </div>
                <div class="col-6">
                  <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Decline</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal custom-modal fade" id="delete_approve" role="dialog">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-header">
              <h3>Delete Leave</h3>
              <p>Are you sure want to delete this leave?</p>
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
{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).on('click',  function(){
        var __this = $(this).parents('tr');
        $('#l_id').val(__this.find('.id'));
        $('#start_date').val(__this.find('.start_date'));
    });
</script> --}}

@endsection
