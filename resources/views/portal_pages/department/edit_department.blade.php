@extends('portal_pages.layouts.master')
@section('content')
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col">
            <h3 class="page-title">Edit Department</h3>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active">Edit Department</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-12 d-flex">
          <div class="card flex-fill">
            <div class="card-header">
              <h4 class="card-title mb-0">Basic Form</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('departments.update',$department->id)}}">
                @method('PATCH')
                @csrf

                <div class="form-group row">
                    <input type="hidden" name="dep_name" value="">
                  <label class="col-lg-3 col-form-label">Title</label>
                  <div class="col-lg-9">
                    <input type="text" name="dep_name" value="{{ $department->dep_name}}" class="form-control">
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
