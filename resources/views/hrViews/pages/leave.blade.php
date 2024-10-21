@extends('hrViews.layouts.body')
@section('title', 'Leave')
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
            <h2><i class="far fa-calendar-check mr-2"></i>Leave Applications</h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title text-muted" id="leave-list-text">
                  <strong>Leave Applications</strong>
                </div>
                <div class="card-tools">
                  <button type="button" id="add-leave-btn" class="btn btn-primary btn-sm">
                    <i class="fas fa-file-alt mr-2"></i>
                    File Leave Request
                  </button>
                  <button type="button" id="return-btn" class="btn btn-secondary btn-sm" style="display: none;">
                    <i class="fas fa-list mr-2"></i>
                    Return to list
                  </button>
                </div>
              </div>

              <div class="card-body">

                <!-- Employee Master List Table -->
                <table id="leave-list-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Employee</th>
                      <th>Department</th>
                      <th>Date Filed</th>
                      <th>Leave Type</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Rows are dynamically being inputted -->
                  </tbody>
                </table>

                <!-- Form for viewing -->
                <div class="container">
                  <form id="leave-view-form" action="" method="post" class="needs-validation" novalidate style="display: none;">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <input type="text" id="view-application-number-hidden" name="view_application_number" class="d-none" readonly/>
                    <div class="form-group d-flex justify-content-end text-muted small">
                        <span class="mr-2"><strong>Application Number:</strong></span>
                        <span id="view-application-number"></span>
                        <span class="ml-3 mr-2"><strong>Date Filed:</strong></span>
                        <span id="view-date-filed" name="view_date_filed"></span>
                    </div>
                    <div class="form-row">
                      <!-- /.input group -->
                      <div class="col">
                        <label for="view-employee-id">Employee Name</label>
                        <select class="form-control select2" style="width: 100%;" id="view-employee-id" name="view_employee_name" disabled>
                          <option value="" selected disabled>Type / Select Employee</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                    </div>
                    <hr> <!-- Horizontal line separator before the title -->
                    <!-- Leave Date -->
                    <!-- Date range -->
                    <div class="form-row">
                      <div class="col">
                        <label for="view-leave-starting-date">Leave Starting Date</label>
                        <input type="date" class="form-control float-right" id="view-leave-starting-date" name="view_leave_starting_date" readonly>
                      </div>
                      <!-- /.input group -->
                      <div class="col">
                        <label for="view-leave-ending-date">Leave Ending Date</label>
                        <input type="date" class="form-control float-right" id="view-leave-ending-date" name="view_leave_ending_date" readonly>
                      </div>
                    </div>
                    <hr> <!-- Horizontal line separator -->
                    <div class="form-row">
                      <div class="col">
                        <label for="view-leave-type">Leave Type</label>
                        <select class="form-control select2" style="width: 100%;" name="view_leave_type" id="view-leave-type" disabled>
                          <option value="" selected disabled>Select Leave Type</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="view-reason">Reason</label>
                        <input type="text" class="form-control" id="view-reason" name="view_reason" placeholder="Enter reason" readonly>
                        <!-- Error message for Time Out generated by jquery -->
                        <span id="time_out_error" class="text-danger" style="display: none;"></span>
                      </div>
                      <div class="col">
                        <label for="view-recommendation">Recommendation</label>
                        <select class="form-control select2" style="width: 100%;" name="view_recommendation" id="view-recommendation" disabled>
                          <option value="" selected disabled>Select Recommendation</option>
                        </select>
                      </div>
                    </div>
                    <hr> <!-- Horizontal line separator -->
                    <!-- Leave Credits Information -->
                    <div class="form-row">
                      <div class="col">
                        <label for="view-credits-balance" class="text-muted">Credit Balance</label>
                        <input type="text" class="form-control" id="view-credits-balance" name="view_credits_balance" readonly>
                      </div>
                      <div class="col">
                        <label for="view-used-credits" class="text-muted">Used Credits</label>
                        <input type="text" class="form-control" id="view-used-credits" name="view_used_credits" readonly>
                      </div>
                      <div class="col">
                        <label for="view-remaining-credits" class="text-muted">Remaining Credits</label>
                        <span class="text-muted small">(If approved)</span>
                        <input type="text" class="form-control" id="view-remaining-credits" name="view_remaining_credits" readonly>
                      </div>
                    </div>
                    <hr>
                    <!-- Submit Button -->
                    <div class="footer justify-content-between">
                      
                    </div>
                  </form>
                </div>

                <!-- Form for leave applications -->
                <div class="container">
                    <form id="leave-form" action="/submit-overtime-application" method="post" class="needs-validation" novalidate style="display: none;">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf
                        <div class="form-row">
                          <!-- /.input group -->
                            <div class="col">
                                <label for="employee-name">Employee Name</label>
                                <select class="form-control select2" style="width: 100%;" id="employee-id">
                                    <option value="" selected disabled>Type / Select Employee</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                        </div>
                        <hr> <!-- Horizontal line separator before the title -->
                        <!-- Leave Date -->
                        <!-- Date range -->
                        <div class="form-row">
                            <div class="col">
                                <label>Leave Starting Date</label>
                                <input type="date" class="form-control float-right" id="leave-starting-date" name="leave_starting_date" required>
                            </div>
                            <!-- /.input group -->
                            <div class="col">
                                <label>Leave Ending Date</label>
                                <input type="date" class="form-control float-right" id="leave-ending-date" name="leave_ending_date" required>
                            </div>
                        </div>
                        <hr> <!-- Horizontal line separator -->
                        <div class="form-row">
                          <div class="col">
                                <label for="leave-type">Leave Type</label>
                                <select class="form-control select2" style="width: 100%;" name="leave_type" id="leave_type">
                                    <option value="" selected disabled>Select Leave Type</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="reason">Reason</label>
                                <input type="text" class="form-control" id="reason" name="reason" placeholder="Enter reason" required>
                                <!-- Error message for Time Out generated by jquery -->
                                <span id="time_out_error" class="text-danger" style="display: none;"></span>
                            </div>
                            <div class="col">
                              <label for="recommendation">Recommendation</label>
                                <select class="form-control select2" style="width: 100%;" name="recommendation" id="recommendation">
                                    <option value="" selected disabled>Select Recommendation</option>
                                </select>
                            </div>
                        </div>
                        <hr> <!-- Horizontal line separator -->
                        <!-- Leave Credits Information -->
                        <div class="form-row">
                            <div class="col">
                                <label for="from_date" class="text-muted">Credit Balance</label>
                                <input type="text" class="form-control" id="credits_balance" name="credits_balance" readonly>
                            </div>
                            <div class="col">
                                <label for="from_date" class="text-muted">Used Credits</label>
                                <input type="text" class="form-control" id="used_credits" name="used_credits" readonly>
                            </div>
                            <div class="col">
                                <label for="from_date" class="text-muted">Remaining Credits</label>
                                <span class="text-muted small">(If approved)</span>
                                <input type="text" class="form-control" id="remaining_credits" name="remaining_credits" readonly>
                            </div>
                        </div>
                        <hr>
                        <!-- Submit Button -->
                        <div class="footer justify-content-between">
                            <button type="button" class="btn btn-primary btn-block" id="submitButton">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- Leave Update Form -->
                <div class="container">
                  <form id="update-leave-form" action="/submit-overtime-application" method="post" class="needs-validation" novalidate style="display: none;">
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-row">
                        <!-- /.input group -->
                        <div class="col">
                            <label for="update-employee-id">Employee Name</label>
                            <select class="form-control select2" style="width: 100%;" name="update_employee_id" id="update-employee-id">
                                <option value="" selected disabled>Type / Select Employee</option>
                            </select>
                        </div>
                    </div>
                    <hr> <!-- Horizontal line separator before the title -->
                    <!-- Leave Date -->
                    <!-- Date range -->
                    <div class="form-row">
                        <div class="col">
                            <label for="update-leave-starting-date">Leave Starting Date</label>
                            <input type="date" class="form-control float-right" id="update-leave-starting-date" name="update_leave_starting_date" required>
                        </div>
                        <!-- /.input group -->
                        <div class="col">
                            <label for="update-leave-ending-date">Leave Ending Date</label>
                            <input type="date" class="form-control float-right" id="update-leave-ending-date" name="update_leave_ending_date" required>
                        </div>
                    </div>
                    <hr> <!-- Horizontal line separator -->
                    <div class="form-row">
                        <div class="col">
                            <label for="update-leave_type">Leave Type</label>
                            <select class="form-control select2" style="width: 100%;" name="update_leave_type" id="update-leave_type">
                                <option value="" selected disabled>Select Leave Type</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="update-reason">Reason</label>
                            <input type="text" class="form-control" id="update-reason" name="update_reason" placeholder="Enter reason" required>
                            <!-- Error message for Time Out generated by jquery -->
                            <span id="update-time_out_error" class="text-danger" style="display: none;"></span>
                        </div>
                        <div class="col">
                            <label for="update-recommendation">Recommendation</label>
                            <select class="form-control select2" style="width: 100%;" name="update_recommendation" id="update-recommendation">
                                <option value="" selected disabled>Select Recommendation</option>
                            </select>
                        </div>
                    </div>
                    <hr> <!-- Horizontal line separator -->
                    <!-- Leave Credits Information -->
                    <div class="form-row">
                        <div class="col">
                            <label for="update-credits_balance" class="text-muted">Credit Balance</label>
                            <input type="text" class="form-control" id="update-credits_balance" name="update_credits_balance" readonly>
                        </div>
                        <div class="col">
                            <label for="update-used_credits" class="text-muted">Used Credits</label>
                            <input type="text" class="form-control" id="update-used_credits" name="update_used_credits" readonly>
                        </div>
                        <div class="col">
                            <label for="update-remaining_credits" class="text-muted">Remaining Credits</label>
                            <span class="text-muted small">(If approved)</span>
                            <input type="text" class="form-control" id="update-remaining_credits" name="update_remaining_credits" readonly>
                        </div>
                    </div>
                    <hr>
                    <!-- Submit Button -->
                    <div class="footer justify-content-between">
                        <button type="button" class="btn btn-success btn-block" id="update-btn">Update</button>
                    </div>
                </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memberModalLabel">Member Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="memberDetails">Loading...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('pagespecificscript')
<script src="{{ asset('custom/js/hrViewsScript/leaveList.js') }}"></script>

<script>
    $(document).on('click', '#modify-btn', function()
    {
      $('#update-leave-form').show();
      $('#leave-list-table').hide();
      $('#add-leave-btn').toggle();
      $('#return-btn').toggle();
      $('#employee-list-text').html('<strong>Modify Leave Application</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });

    $(document).on('click', '#view-details-btn', function()
    {
      $('#leave-view-form').show();
      $('#leave-list-table').hide();
      $('#add-leave-btn').toggle();
      $('#return-btn').toggle();
      $('#leave-list-text').html('<strong>Leave Application Details</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });

    $('#return-btn').click(function() 
    {
      $('#leave-view-form').hide();
      $('#update-leave-form').hide();
      $('#leave-form').hide();
      $('#leave-list-table').show();
      $('#add-leave-btn').toggle();
      $('#return-btn').toggle();
      $('#leave-list-text').html('<strong>Leave Applications</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });

    $('#add-leave-btn').click(function()
    {
      $('#leave-form').show();
      $('#leave-list-table').hide();
      $('#add-leave-btn').toggle();
      $('#return-btn').toggle();
      $('#leave-list-text').html('<strong>Add New Leave Application</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });

    $(document).on('click', '#print-btn', function() 
    {
       var applicationNumber = $(this).data('application-number');

        // Show loading animation
        Swal.fire({
            title: 'Generating PDF...',
            html: 'Please wait while we generate your PDF.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: '/print-leave',
            method: 'post',
            data: {
                application_number: applicationNumber,
            },
            success: function(response) {
                // Close loading animation
                Swal.close();

                // Check if the request was successful and file path is provided
                if (response.success && response.file_path) 
                {
                  // Open the PDF file in a new tab
                  console.log(response.file_path);
                  const pdfWindow = window.open(response.file_path, '_blank');

                  // Trigger the print dialog when the PDF is loaded
                  pdfWindow.onload = function () 
                  {
                    pdfWindow.print();
                  }
                    
                } 
                else 
                {
                    // Handle error or no file path provided
                    Swal.fire({
                      icon: 'error',
                      title: 'Error generating file',
                      text: response.message,
                      showConfirmButton: false,
                      timer: 2000,
                      timerProgressBar: true
                    });

                    console.error('Error generating PDF or file path not provided');
                }
            },
            error: function(error) {
                // Close loading animation
                Swal.close(); 
                // Handle error response
                Swal.fire({
                  icon: 'error',
                  title: 'System Error',
                  text: error.message,
                  showConfirmButton: false,
                  timer: 2000,
                  timerProgressBar: true
                });

                console.error('Error generating PDF:', error);
            }
        });
    });
</script>
@stop