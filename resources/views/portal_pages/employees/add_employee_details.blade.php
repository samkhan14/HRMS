@extends('portal_pages.layouts.master')
@section('content')
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col">
            <h3 class="page-title">Add New Employee</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Add Employee Details</li>
            </ul>
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
          <div class="card">
            <div class="card-header">
              <h4 class="card-title mb-0">Fill all the required fields</h4>
            </div>
            <div class="card-body">
              <h4 class="card-title">Employee Meta Information</h4>
              <form method="post" action="{{ url('/add-employee')}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-xl-6">
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">First Name</label>
                      <div class="col-lg-9">
                        <input type="text" name="fname" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Last Name</label>
                      <div class="col-lg-9">
                        <input name="lname" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Gender</label>
                        <div class="col-lg-9">
                          <select name="gender" id="" class="form-control">
                            <option selected>Select...</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Father's Name</label>
                        <div class="col-lg-9">
                          <input type="text" name="son_of"  class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Personal Email</label>
                        <div class="col-lg-9">
                          <input type="email" name="persnol_email" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Age</label>
                        <div class="col-lg-9">
                          <input  type="tel" name="age" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">DOB</label>
                        <div class="col-lg-9">
                          <input type="date" name="dob" class="form-control">
                        </div>
                      </div>

                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Department</label>
                      <div class="col-lg-9">
                        <select name="department" id="" class="form-control">
                            <option value="1" selected>Select Department...</option>
                           @foreach ($department as $dep)
                           <option value="{{ $dep->id}}">{{ $dep->dep_name}}</option>
                           @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">City</label>
                      <div class="col-lg-9">
                        <input type="text" name="city" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Address</label>
                      <div class="col-lg-9">
                        <input type="text" name="address" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Personal No</label>
                      <div class="col-lg-9">
                        <input type="tel" name="persnol_number" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Marital Status</label>
                      <div class="col-lg-9">
                        <input type="text" name="marital_status" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Employee Image</label>
                        <div class="col-lg-9">
                          <input type="file" name="image[]" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Salary</label>
                        <div class="col-lg-9">
                          <input type="tel" name="salary" class="form-control">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Employee Type</label>
                        <div class="col-lg-9">
                            <select name="empType" id="" class="form-control">
                                <option value="1" selected>Select Employee Type...</option>
                                @foreach ($etypes as $etype )
                                <option value="{{ $etype->id}}">{{ $etype->emp_type}}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Designation</label>
                        <div class="col-lg-9">
                            <select lect name="designation" id="" class="form-control">
                                <option value="1" selected>Select Designation...</option>
                                @foreach ($designation as $des)
                                <option value="{{ $des->id}}" >{{ $des->des_title }}</option>
                                @endforeach
                            </select>
                        </div>
                      </div>

                  </div>
                </div>

                <div class="text-right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection
