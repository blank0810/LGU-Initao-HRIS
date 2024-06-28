@extends('hrViews.layouts.body')
@section('title', 'Dashboard')
@section('pagespecificstyle')
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</h2>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>
              <p>Departments</p>
            </div>
            <div class="icon">
              <i class="fas fa-building"></i> 
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
            </div>
            <!-- ./col -->
            <div class="col">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>53</h3>
                  <p>Regular Personnel</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i> <!-- Replaced with a users icon -->
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>44</h3>
                  <p>Job Order Personnel</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-tie"></i> <!-- Replaced with a user-tie icon -->
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

          <div class="card">
            <div class="card-header">
              <div class="card-title text-muted" id="department-list-text">
                <strong>Department List</strong>
              </div>
              <div class="card-title text-muted" id="department-details-text" style="display: none;">
                <strong>Department Details</strong>
              </div>
              <div class="card-title text-muted" id="add-department-text" style="display: none;">
                <strong>Add new Department</strong>
              </div>
              <div class="card-tools">
                <button type="button" id="add-department-btn" class="btn btn-primary btn-sm">
                  Add Department
                </button>
                <button type="button" id="return-btn" class="btn btn-secondary btn-sm" style="display:none;">
                  Return
                </button>
              </div>
            </div>

            <div class="card-body">
              <!-- Department list table -->
              <table id="department-table" class="table table-bordered table-hover" style="display: none;">
                <thead>
                  <tr class="text-muted">
                    <th>Department name</th>
                    <th>Total personnel</th>
                    <th>Regular Employees</th>
                    <th>Job Order Employees</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Rows are dynamically being inputted -->
                </tbody>
              </table>

              <div class="row" id="department-details" style="display: none;">
                <div class="col-md-3">

                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="../../dist/img/user4-128x128.jpg"
                            alt="User profile picture">
                      </div>

                      <h3 class="profile-username text-center">Nina Mcintire</h3>

                      <p class="text-muted text-center"> Department Head </p>

                      <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                          <b>Department Assigned</b>
                          <a class="float-right text-ellipsis" style="width: 180px; display: inline-block;" id="department-assigned-text">
                            Department of Social Welfare and Development
                          </a>
                        </li>
                        <li class="list-group-item">
                          <b>Employment Status</b> <a class="float-right">Regular</a>
                        </li>
                      </ul>

                      <a href="#" class="btn btn-primary btn-block"><b>Employee Full Details</b></a>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <h4 class="nav-item"><a class="nav-link"><strong>Employee Lists</strong></a></h4>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">

                        <div class="active tab-pane" id="activity">
                          <table id="department-employee-table" class="table table-bordered table-hover">
                            <thead>
                              <tr class="text-muted">
                                <th>Employee name</th>
                                <th>Date Hired</th>
                                <th>Job Description</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <!-- Rows are dynamically being inputted -->
                            </tbody>
                          </table>
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            </div>
          </div>
          
        </div>
      </div>
    </div>

    <div class="modal fade" id="add-department-modal" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add new Department</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="updateForm" action="/update-overtime-application" method="post" class="modal-body needs-validation" novalidate>
            @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group">
              <label for="application_code">Department Name</label>
              <input type="text" class="form-control" id="department-name" name="department_name" required>
            </div>
            <div class="form-group">
              <label for="date_overtime">Department Initials</label>
              <input type="text" class="form-control" id="department-initials" name="department_initials" required>
            </div>
            <div class="form-group">
              <label>Department Head Description</label>
                  <select class="form-control" id="department-head-select" style="width: 100%;">
                    <option selected disabled>Select within the options</option>
                    <option>Department Head</option>
                    <option>Human Resource Personnel</option>
                    <option>Mayor</option>
                    <option>Vice Mayor</option>
                  </select>
            </div>
            <div class="form-group">
              <div class="col custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1"> Is this department active? </label>
              </div>
            </div>
            <div class="form-group row modal-footer justify-content-between">
              <div class="col">
                <button type="button" class="btn btn-primary btn-block" id="submit-btn"> Add Department </button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-danger btn-block" id="close-btn"> Close </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="employee-service-record">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><strong>Employee Service Record</strong></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="timeline timeline-inverse" id="service-record-history">
              <!-- Details are dynamically added -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('pagespecificscript')
<script src="{{ asset('custom/js/hrViewsScript/departmentList.js') }}"></script>
<!-- Initialize Select2 -->
<script>
  $(document).ready(function() {
      $('#department-head-select').select2()
  });

  // Reset form fields when the modal is closed
    $('#add-department-modal').on('hidden.bs.modal', function () {
        $('#updateForm')[0].reset();
        // Reset Select2 fields if any
        $('.select2').val(null).trigger('change');
    });
</script>

<script>
  $(document).ready(function()
  {
    var returnBtn = document.getElementById('return-btn');

    returnBtn.addEventListener('click', function()
    {
      console.log('clicked');
      $('#department-details').hide();
      $('#department-table').show();
      $('.dataTables_paginate, .dataTables_info').toggle();
      $('#department-details').hide();
      $('#department-details-text').toggle();
      $('#department-list-text').toggle();
      $('#return-btn').toggle();
      $('#add-department-btn').show();
    });
  });
</script>

<script>
  $(document).ready(function()
  {
    $(document).on('click', '#view-department-details-btn', function()
    {
      $('#department-table').hide();
      $('.dataTables_paginate, .dataTables_info').toggle();
      $('#department-details').show();
      $('#department-details-text').toggle();
      $('#department-list-text').toggle();
      $('#return-btn').toggle();
      $('#add-department-btn').hide();
    });

    $(document).on('click', '#view-service-btn', function()
    {
      $('#employee-service-record').modal('show');
    });
  });
</script>

<script>
  $(document).ready(function() 
  {
    var addBtn = document.getElementById('add-department-btn');
    var closeBtn = document.getElementById('close-btn');
    var addModal = document.getElementById('add-department-modal');
    var serviceModal = document.getElementById('employee-service-record');

    addBtn.addEventListener('click', function() 
    {
      $(addModal).modal('show');
    });

    closeBtn.addEventListener('click', function() 
    {
      $(addModal).modal('hide');
    });

    document.addEventListener('keydown', function(event) 
    {
      // Check if the pressed key is the "Esc" key (key code 27)
      if (event.keyCode === 27) {
        $(addModal).modal('hide');
      }
    });
  });
</script>

<script>
  $(document).ready(function() 
  {
    var addBtn = document.getElementById('add-department-btn');
    var addModal = document.getElementById('add-department-modal');

    addBtn.addEventListener('click', function() 
    {
      $(addModal).modal('show');
    });
  });
</script>
@stop