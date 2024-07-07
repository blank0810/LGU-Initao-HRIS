@extends('hrViews.layouts.body')
@section('title', 'Payroll')
@section('pagespecificstyle')
<style>
    .modal-dialog-scrollable .modal-content {
      overflow-x: hidden;
    }

    .modal-dialog-scrollable .modal-body {
      overflow-x: auto;
      white-space: nowrap;
    }
  </style>
@stop
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2><i class="fas fas fa-dollar-sign mr-2"></i>Payroll</h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div clas="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-header">
                <div class="card-title text-danger">
                  <strong>Note: Please complete the form below to generate the employee list required for payslip generation.</strong>
                </div>
              </div>
              <div class="card-body box-profile">
                <div class="container">
                  <form id="payroll-parameters-form" action="/submit-overtime-application" method="post" class="needs-validation" novalidate>
                    @if(Session::has('success'))
                      <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                      <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-row">
                      <div class="col">
                        <label>Payslip Type</label>
                        <select class="form-control select2" style="width: 100%" id="payslip-type" name="payslip_type" required>
                          <option value="" selected disabled>Type / Select Payslip Type</option>
                          <option value="1">Monthly</option>
                          <option value="2">Semi-monthly</option>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="form-row">
                      <div class="col">
                        <label>Employment Type</label>
                        <select class="form-control select2" style="width: 100%" id="employment-type" name="employment_type" required>
                          <option value="" selected disabled>Type / Select Employment Type</option>
                          <option value="1">Regular</option>
                          <option value="2">Job Order</option>
                          <option value="3">Both</option>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="form-row">
                      <div class="col">
                        <label>Payslip Period</label>
                        <h6 class="text-muted">Starting Date:</h6>
                        <input type="date" class="form-control float-right" id="payslip-starting-date" name="payslip_starting_date" required>
                      </div>
                    </div>
                    <br>
                    <div class="form-row">
                      <div class="col">
                        <h6 class="text-muted">Ending Date:</h6>
                        <input type="date" class="form-control float-right" id="payslip-ending-date" name="payslip_ending_date" required>
                      </div>
                    </div>
                    <hr>
                    <!-- Submit Button -->
                    <div class="footer justify-content-between">
                      <button type="button" class="btn btn-primary btn-block" id="generateBtn">Generate List</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <div class="card-title text-muted">
                  <strong>List of Employees Eligible for Payroll During the Selected Period</strong>
                </div>
                <div class="card-tools">
                  <button type="button" id="generate-all-btn" class="btn btn-primary btn-sm">
                    <i class="fas fa-print mr-2"></i>
                    Generate All Payslips
                  </button>
                </div>
              </div>

              <div class="card-body">
                <table id="employee-list-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Employee</th>
                      <th>Department</th>
                      <th>Employment Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Rows are dynamically being inputted -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="job-order-payslip" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Employees' Payslip Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card">
            <div class="card-header text-center">
              <div class="card-title text-muted">
                <strong>Employees' List</strong>
              </div>
              <div class="card-tools">
                <button type="button" id="print-job-order" class="btn btn-success btn-sm">
                  <i class="fas fa-print mr-2"></i>
                  Print Payslip
                </button>
              </div>
            </div>
            <div class="card-body">
                <table id="job-order-payslip-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Employee</th>
                      <th>Occupation</th>
                      <th>Rate</th>
                      <th>Deductions</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Rows are dynamically being inputted -->
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="regular-payslip" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Employees' Payslip Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="text-center mb-4"><strong>Employees' List</strong></h5>
            <table id="regular-payslip-table" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th rowspan="2">Employee</th>
                  <th rowspan="2">Occupation</th>
                  <th rowspan="2">Rate</th>
                  <th id="deduction-header" colspan="4" class="text-center">Deductions</th>
                  <th rowspan="2">Total</th>
                </tr>
                <tr id="deduction-sub-headers">
                  <!-- Rows for sub-headers will be dynamically populated here -->  
                </tr>
              </thead>
              <tbody>
                <!-- Table rows will be dynamically populated here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="authorization-modal" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Authorization Panel</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-danger"><em>Note: Please enter your user credentials for verification.</em></p>
            <form id="updateForm" action="/check-authorization" method="post" class="modal-body needs-validation" novalidate>
            @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username" value="{{old('username')}}">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" value="">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="button" id="signinBtn" class="btn btn-primary btn-block">Submit</button>
                </div>
                <!-- /.col -->
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('pagespecificscript')
<script src="{{ asset('custom/js/hrViewsScript/payslip.js') }}"></script>
<script>
  $(document).ready(function()
  {
    $('#generate-all-btn').click(function()
    {
      //$('#job-order-payslip').modal('show');
      $('#regular-payslip').modal('show');
    });

    $('#print-job-order').click(function()
    {
      // Show loading animation
        Swal.fire
        ({
          title: 'Generating Payslip...',
          html: 'Please wait while we generate Payslip List.',
          allowOutsideClick: false,
          didOpen: () => 
          {
            Swal.showLoading();
            // Add a slight delay to ensure the loading animation is shown
            setTimeout(() => 
            {
              var printUrl = '/print-job-order-payslip';
              window.open(printUrl, '_blank');
              Swal.close();
            }, 3000); // Adjust the delay as needed
          }
      });
    });

    $('#generateBtn').click(function()
    {
      $('#authorization-modal').modal('show');
    });
  });
</script>
@stop