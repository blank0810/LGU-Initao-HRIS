@extends('hrViews.layouts.body')
@section('title', 'Employee List')
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
            <h2><i class="fas fa-users mr-2"></i>Employee List</h2>
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
                <div class="card-title text-muted" id="employee-list-text">
                  <strong>Employee Master List</strong>
                </div>
                <div class="card-tools">
                  <button type="button" id="add-employee-btn" class="btn btn-primary btn-sm" data-toggle="modal" data-target="">
                    Add Employee
                  </button>
                  <button type="button" id="return-btn" class="btn btn-secondary btn-sm" style="display: none;">
                    <i class="fas fa-list mr-2"></i>
                    Return to list
                  </button>
                </div>
              </div>

              <div class="card-body">

                <!-- Employee Master List Table -->
                <table id="employee-list-table" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Employee name</th>
                      <th>Employment Status</th>
                      <th>Department Assigned</th>
                      <th>Job Description</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Rows are dynamically being inputted -->
                  </tbody>
                </table>

                <!-- Employee Details -->
                <div class="row" id="employee-details" style="display:none;">
                  <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                              src="{{ asset('dist/img/user4-128x128.jpg') }}"
                              alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">Nina Mcintire</h3>

                        <p class="text-muted text-center">Software Engineer</p>

                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>Department</b> <a class="float-right text-ellipsis" style="width: 180px; display: inline-block;">Department of Social Worker and Development</a>
                          </li>
                          <li class="list-group-item">
                            <b>Employment Status</b> <a class="float-right">Regular</a>
                          </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block" id="update-btn"><b>Update Image</b></a>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>

                  <div class="col-md-9">
                    <div class="card">
                      <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal</a></li>
                          <li class="nav-item"><a class="nav-link" href="#education" data-toggle="tab">Education</a></li>
                          <li class="nav-item"><a class="nav-link" href="#employment" data-toggle="tab">Employment</a></li>
                          <li class="nav-item"><a class="nav-link" href="#benefits" data-toggle="tab">Benefits</a></li>
                          <li class="nav-item"><a class="nav-link" href="#service-record" data-toggle="tab">Service Record</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">

                          <div class="active tab-pane" id="personal">
                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b>Employee Name</b> <a class="float-right" id="employee-name">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Address</b> <a class="float-right" id="address">
                                  N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Mobile Number</b> <a class="float-right" id="mobile">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Birthday</b> <a class="float-right" id="birthday">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Gender</b> <a class="float-right" id="gender">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Civil Status</b> <a class="float-right" id="civil-status">N/A</a>
                              </li>
                            </ul>
                          </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="education">
                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b>Educational Attainment</b> <a class="float-right" id="educational-attainment">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>School Name</b> <a class="float-right" id="school-name">
                                  N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>School Address</b> <a class="float-right" id="school-address">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Course</b> <a class="float-right" id="course">N/A</a>
                              </li>
                            </ul>
                          </div>

                          <div class="tab-pane" id="employment">
                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b>Employee ID</b> <a class="float-right" id="employee-id">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Department Assigned</b> <a class="float-right" id="department">
                                  N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Job Description</b> <a class="float-right" id="job-description">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Salary Rate</b> <a class="float-right" id="salary-rate">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Salary Value</b> <a class="float-right" id="salary-value">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Employment Status</b> <a class="float-right" id="employment-status">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Date Hired</b> <a class="float-right" id="date-hired">N/A</a>
                              </li>
                              <li class="list-group-item">
                                <b>Date Resign</b> <a class="float-right" id="date-resign">N/A</a>
                              </li>
                            </ul>
                          </div>

                          <div class="tab-pane" id="benefits">
                            <ul class="list-group list-group-unbordered mb-3">
                              <li class="list-group-item">
                                <b id="benefit-name">(Benefit name)</b> <a class="float-right" id="benefit-value">(Benefit Value)</a>
                              </li>
                            </ul>
                          </div>

                          <div class="tab-pane" id="service-record">
                            <!-- Time line -->
                              <div class="timeline timeline-inverse" id="service-record-details">
                                <!-- Contents is dynamically added -->
                              </div>
                          </div>
                        </div>
                        <!-- /.tab-content -->
                      </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>

                <!-- Add Employee Form -->
                <div class="container">
                  <form id="add-employee-form" action="/" method="post" class="needs-validation" novalidate style="display: none;">
                    @if(Session::has('success'))
                      <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                    <div id="form-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Personal Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="first-name">First Name</label>
                                  <input type="text" class="form-control" id="first-name" name="first_name" placeholder="Employee first name" required>
                                  <div class="invalid-feedback">Please enter the first name.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="middle-name">Middle Name</label>
                                  <input type="text" class="form-control" id="middle-name" name="middle_name" placeholder="Employee middle name" required>
                                  <div class="invalid-feedback">Please enter the middle name.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="last-name">Last Name</label>
                                  <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Employee last name" required>
                                  <div class="invalid-feedback">Please enter the middle name.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="birthdate">Birthdate</label>
                                  <input type="date" class="form-control" id="birth-date" name="birth_date" required>
                                  <div class="invalid-feedback">Please enter the appropriate date</div>
                                </div>
                                <div class="form-group col">
                                  <label for="sex">Sex</label>
                                  <select class="form-control" id="sex" name="sex" required>
                                  <option value="" selected disabled>Select Sex</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                              </select>
                                  <div class="invalid-feedback">Please select one of the choices.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="civil-status">Civil Status</label>
                                  <select class="form-control" id="civil-status" name="civil_status" required>
                                    <option selected disabled>Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Not to say">Prefer not to say</option>
                                  </select>
                                  <div class="invalid-feedback">Please select one of the choices.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="nationality">Nationality</label>
                                  <input type="text" class="form-control" id="nationality" name="nationality" placeholder="e.g Filipino" required>
                                  <div class="invalid-feedback">Please enter the nationality.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="mobile-number">Mobile Number</label>
                                  <input type="text" class="form-control" id="mobile-number" name="mobile_number" placeholder="e.g 09123456789" required>
                                  <div class="invalid-feedback">Please provide the mobile number.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="mobile-number">Email address</label>
                                  <input type="text" class="form-control" id="email-address" name="email_address" placeholder="e.g employee@gmail.com" required>
                                  <div class="invalid-feedback">Please provide the email address.</div>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-primary" href="#form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Employee Image and Signature Upload -->
                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Employee Image and Signature Upload</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="employee-image">Employee Image</label>
                                  <input type="file" class="form-control-file" id="employee-image" name="employee_image">
                                  <div class="invalid-feedback">Please upload the employee image.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="employee-signature">Employee Signature</label>
                                  <input type="file" class="form-control-file" id="employee-signature" name="employee_signature">
                                  <div class="invalid-feedback">Please upload the employee signature.</div>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#form-carousel" role="button" data-slide="prev">Previous</a>
                                <a class="btn btn-primary" href="#form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Educational Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="educational-attainment">Highest Educational Attainment</label>
                                  <select class="form-control" id="educational-attainment" name="educational_attainment" required>
                                    <option selected disabled>Select Educational Attainment</option>
                                    <option value="Phd">Doctorate</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                    <option value="Bachelor Degree">Bachelor's Degree</option>
                                    <option value="College Level">College Level</option>
                                    <option value="Senior High School Graduate">Senior High School Graduate</option>
                                    <option value="High School Graduate">High School Graduate</option>
                                    <option value="High School Level">High School Level</option>
                                    <option value="Elementary Graduate">Elementary Graduate</option>
                                  </select>
                                  <div class="invalid-feedback">Please select one of the choices.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="school-address">School Address</label>
                                  <input type="text" class="form-control" id="school-address" name="school-address" placeholder="Enter the school address" required>
                                  <div class="invalid-feedback">Please enter the school address.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="school-name">School name</label>
                                  <input type="text" class="form-control" id="school-name" name="school_name" placeholder="Enter the school name" required>
                                  <div class="invalid-feedback">Please enter the school name</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="course">Course</label>
                                  <input type="text" class="form-control" id="course" name="course" placeholder="Enter the course" required>
                                  <div class="invalid-feedback">Please provide the course.</div>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#form-carousel" role="button" data-slide="prev">Previous</a>
                                <a class="btn btn-primary" href="#form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Employment Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                    <label for="employee-id">Employee ID</label>
                                    <input type="text" class="form-control" id="employee-id" name="employee_id" required>
                                    <div class="invalid-feedback">Please enter the Employee ID</div>
                                </div>
                                <div class="form-group col">
                                    <label for="date-hired">Date Hired</label>
                                    <input type="date" class="form-control" id="date-hired" name="date_hired" value="{{ date('Y-m-d') }}" readonly>
                                    <div class="invalid-feedback">Please enter the Date Hired</div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col">
                                    <label for="department-assigned">Department Assigned</label>
                                    <select class="form-control" id="department-assigned" name="department_assigned" required>
                                        <option selected disabled>Select Department</option>
                                        <!-- Dynamically populated options -->
                                    </select>
                                    <div class="invalid-feedback">Please select a Department</div>
                                </div>
                                <div class="form-group col">
                                    <label for="job-description">Job Description</label>
                                    <input type="text" class="form-control" id="job-description" name="job_description" placeholder="e.g Software Developer" required>
                                    <div class="invalid-feedback">Please enter the Job Description</div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col">
                                    <label for="employment-status">Employment Status</label>
                                    <select class="form-control" id="employment-status-form" name="employment_status_form" required>
                                        <option selected disabled>Select Employment Status</option>
                                        <!-- Dynamically populated options -->
                                    </select>
                                    <div class="invalid-feedback">Please select an Employment Status</div>
                                </div>
                                <div class="form-group col">
                                    <label for="access-level">Access Level</label>
                                    <select class="form-control" id="access-level" name="access_level" required>
                                        <option selected disabled>Select Access Level</option>
                                        <!-- Dynamically populated options -->
                                    </select>
                                    <div class="invalid-feedback">Please select an Access Level</div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col">
                                    <label for="salary-rate">Salary Rate / Salary Grade</label>
                                    <select class="form-control" id="salary-rate-form" name="salary_rate_form" required>
                                        <option selected disabled>Select Salary Rate</option>
                                        <!-- Dynamically populated options -->
                                    </select>
                                    <div class="invalid-feedback">Please select a Salary Rate</div>
                                </div>
                                <div class="form-group col">
                                    <label for="salary-value">Salary Value</label>
                                    <input type="text" class="form-control" id="salary-value" name="salary_value" readonly>
                                    <div class="invalid-feedback">Please enter the Salary Value</div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="payroll-schedule">Payroll Schedule</label>
                                <select class="form-control" id="payroll-schedule" name="payroll_schedule" required>
                                    <option selected disabled>Select Payroll Schedule</option>
                                    <!-- Dynamically populated options -->
                                </select>
                                <div class="invalid-feedback">Please select a Payroll Schedule</div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#form-carousel" role="button" data-slide="prev">Previous</a>
                                <a class="btn btn-primary" href="#form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Benefits Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="benefit-list">Benefit List</label>
                                  <select id="benefit-list" name="benefit_list" class="form-control" required>
                                    <option selected disabled>Select Benefit</option>
                                    <!-- Options will be dynamically populated -->
                                  </select>
                                  <div class="invalid-feedback">Please select a benefit</div>
                                </div>
                                <div class="form-group col">
                                  <label for="personal-share">Personal Share</label>
                                  <input type="number" class="form-control" id="personal-share" name="personal_share" placeholder="e.g $1,500" required>
                                  <div class="invalid-feedback">Please enter the personal share value</div>
                                </div>
                                <div class="form-group col">
                                  <label for="employer-share">Employer Share</label>
                                  <input type="number" class="form-control" id="employer-share" name="employer_share" placeholder="e.g $1,500" required>
                                  <div class="invalid-feedback">Please enter the employer share value</div>
                                </div>
                              </div>
                              <div class="form-group col">
                                <button type="button" class="btn btn-primary" id="add-benefit-btn" style="margin-top: 30px;">+</button>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <table id="benefits-table" class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th>Benefit Name</th>
                                        <th>Personal Share</th>
                                        <th>Employer Share</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <!-- Rows will be dynamically added here -->
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#form-carousel" role="button" data-slide="prev">Previous</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </form>
                </div>

                <!-- Modify Employee Form -->
                <div class="container">
                  <form id="modify-employee-form" action="/" method="post" class="needs-validation" novalidate style="display: none;">
                    @if(Session::has('success'))
                      <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('fail'))
                      <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                    <div id="modify-form-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Personal Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-first-name">First Name</label>
                                  <input type="text" class="form-control" id="update-first-name" name="update_first_name" placeholder="Employee first name" required>
                                  <div class="invalid-feedback">Please enter the first name.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-middle-name">Middle Name</label>
                                  <input type="text" class="form-control" id="update-middle-name" name="update_middle_name" placeholder="Employee middle name" required>
                                  <div class="invalid-feedback">Please enter the middle name.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-last-name">Last Name</label>
                                  <input type="text" class="form-control" id="update-last-name" name="update_last_name" placeholder="Employee last name" required>
                                  <div class="invalid-feedback">Please enter the last name.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-birth-date">Birthdate</label>
                                  <input type="date" class="form-control" id="update-birth-date" name="update_birth_date" required>
                                  <div class="invalid-feedback">Please enter the appropriate date</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-sex">Sex</label>
                                  <select class="form-control" id="update-sex" name="update_sex" required>
                                    <option selected disabled>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  <div class="invalid-feedback">Please select one of the choices.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-civil-status">Civil Status</label>
                                  <select class="form-control" id="update-civil-status" name="update_civil_status" required>
                                    <option selected>Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widow">Widow</option>
                                    <option value="Not to say">Prefer not to say</option>
                                  </select>
                                  <div class="invalid-feedback">Please select one of the choices.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-nationality">Nationality</label>
                                  <input type="text" class="form-control" id="update-nationality" name="update_nationality" placeholder="e.g Filipino" required>
                                  <div class="invalid-feedback">Please enter the nationality.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-mobile-number">Mobile Number</label>
                                  <input type="text" class="form-control" id="update-mobile-number" name="update_mobile_number" placeholder="e.g 09123456789" required>
                                  <div class="invalid-feedback">Please provide the mobile number.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-email-address">Email address</label>
                                  <input type="text" class="form-control" id="update-email-address" name="update_email_address" placeholder="e.g employee@gmail.com" required>
                                  <div class="invalid-feedback">Please provide the email address.</div>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-primary" href="#modify-form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Employee Image and Signature Upload -->
                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Employee Image and Signature Upload</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-employee-image">Employee Image</label>
                                  <input type="file" class="form-control-file" id="update-employee-image" name="update_employee_image">
                                  <div class="invalid-feedback">Please upload the employee image.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-employee-signature">Employee Signature</label>
                                  <input type="file" class="form-control-file" id="update-employee-signature" name="update_employee_signature">
                                  <div class="invalid-feedback">Please upload the employee signature.</div>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#modify-form-carousel" role="button" data-slide="prev">Previous</a>
                                <a class="btn btn-primary" href="#modify-form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Educational Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-educational-attainment">Highest Educational Attainment</label>
                                  <select class="form-control" id="update-educational-attainment" name="update_educational_attainment" required>
                                    <option selected disabled>Select Educational Attainment</option>
                                    <option value="Phd">Doctorate</option>
                                    <option value="Master's Degree">Master's Degree</option>
                                    <option value="Bachelor Degree">Bachelor's Degree</option>
                                    <option value="College Level">College Level</option>
                                    <option value="Senior High School Graduate">Senior High School Graduate</option>
                                    <option value="High School Graduate">High School Graduate</option>
                                    <option value="High School Level">High School Level</option>
                                    <option value="Elementary Graduate">Elementary Graduate</option>
                                  </select>
                                  <div class="invalid-feedback">Please select one of the choices.</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-school-address">School Address</label>
                                  <input type="text" class="form-control" id="update-school-address" name="update_school_address" placeholder="Enter the school address" required>
                                  <div class="invalid-feedback">Please enter the school address.</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-school-name">School name</label>
                                  <input type="text" class="form-control" id="update-school-name" name="update_school_name" placeholder="Enter the school name" required>
                                  <div class="invalid-feedback">Please enter the school name</div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-course">Course</label>
                                  <input type="text" class="form-control" id="update-course" name="update_course" placeholder="Enter the course" required>
                                  <div class="invalid-feedback">Please provide the course.</div>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#modify-form-carousel" role="button" data-slide="prev">Previous</a>
                                <a class="btn btn-primary" href="#modify-form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Employment Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-employee-id">Employee ID</label>
                                  <input type="text" class="form-control" id="update-employee-id" name="update_employee_id" required>
                                  <div class="invalid-feedback">Please enter the Employee ID</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-date-hired">Date Hired</label>
                                  <input type="date" class="form-control" id="update-date-hired" name="update_date_hired" value="{{ date('Y-m-d') }}" readonly>
                                  <div class="invalid-feedback">Please enter the Date Hired</div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-department-assigned">Department Assigned</label>
                                  <select class="form-control" id="update-department-assigned" name="update_department_assigned" required>
                                    <option selected disabled>Select Department</option>
                                    <!-- Dynamically populated options -->
                                  </select>
                                  <div class="invalid-feedback">Please select a Department</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-job-description">Job Description</label>
                                  <input type="text" class="form-control" id="update-job-description" name="update_job_description" placeholder="e.g Software Developer" required>
                                  <div class="invalid-feedback">Please enter the Job Description</div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-employment-status-form">Employment Status</label>
                                  <select class="form-control" id="update-employment-status-form" name="update_employment_status_form" required>
                                    <option selected disabled>Select Employment Status</option>
                                    <!-- Dynamically populated options -->
                                  </select>
                                  <div class="invalid-feedback">Please select an Employment Status</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-access-level">Access Level</label>
                                  <select class="form-control" id="update-access-level" name="update_access_level" required>
                                    <option selected disabled>Select Access Level</option>
                                    <!-- Dynamically populated options -->
                                  </select>
                                  <div class="invalid-feedback">Please select an Access Level</div>
                                </div>
                              </div>

                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-salary-rate-form">Salary Rate / Salary Grade</label>
                                  <select class="form-control" id="update-salary-rate-form" name="update_salary_rate_form" required>
                                    <option selected disabled>Select Salary Rate</option>
                                    <!-- Dynamically populated options -->
                                  </select>
                                  <div class="invalid-feedback">Please select a Salary Rate</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-salary-value">Salary Value</label>
                                  <input type="text" class="form-control" id="update-salary-value" name="update_salary_value" readonly>
                                  <div class="invalid-feedback">Please enter the Salary Value</div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="update-payroll-schedule">Payroll Schedule</label>
                                <select class="form-control" id="update-payroll-schedule" name="update_payroll_schedule" required>
                                  <option selected disabled>Select Payroll Schedule</option>
                                  <!-- Dynamically populated options -->
                                </select>
                                <div class="invalid-feedback">Please select a Payroll Schedule</div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#modify-form-carousel" role="button" data-slide="prev">Previous</a>
                                <a class="btn btn-primary" href="#modify-form-carousel" role="button" data-slide="next">Next</a>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="carousel-item">
                          <div class="card">
                            <div class="card-header">
                              <h4><strong>Benefits Information</strong></h4>
                            </div>
                            <div class="card-body">
                              <div class="form-row">
                                <div class="form-group col">
                                  <label for="update-benefit-list">Benefit List</label>
                                  <select id="update-benefit-list" name="update_benefit_list" class="form-control" required>
                                    <option selected disabled>Select Benefit</option>
                                    <!-- Options will be dynamically populated -->
                                  </select>
                                  <div class="invalid-feedback">Please select a benefit</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-personal-share">Personal Share</label>
                                  <input type="number" class="form-control" id="update-personal-share" name="update_personal_share" placeholder="e.g $1,500" required>
                                  <div class="invalid-feedback">Please enter the personal share value</div>
                                </div>
                                <div class="form-group col">
                                  <label for="update-employer-share">Employer Share</label>
                                  <input type="number" class="form-control" id="update-employer-share" name="update_employer_share" placeholder="e.g $1,500" required>
                                  <div class="invalid-feedback">Please enter the employer share value</div>
                                </div>
                              </div>
                              <div class="form-group col">
                                <button type="button" class="btn btn-primary" id="update-add-benefit-btn" style="margin-top: 30px;">+</button>
                              </div>
                              <div class="form-row">
                                <div class="form-group col">
                                  <table id="update-benefits-table" class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th>Benefit Name</th>
                                        <th>Personal Share</th>
                                        <th>Employer Share</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <!-- Rows will be dynamically added here -->
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <div class="card-footer text-right">
                                <a class="btn btn-secondary" href="#modify-form-carousel" role="button" data-slide="prev">Previous</a>
                                <button type="submit" class="btn btn-success">Submit</button>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
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
  </div>
  <!-- /.content-wrapper -->
@endsection
@section('pagespecificscript')
<script src="{{ asset('custom/js/hrViewsScript/employeeList.js') }}"></script>

<script>
  $(document).on('click', '#view-details-btn', function()
    {
      $('#employee-details').show();
      $('#employee-list-table').hide();
      $('#add-employee-btn').toggle();
      $('#return-btn').toggle();
      $('#employee-list-text').html('<strong>Employee Details</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });

    $(document).on('click', '#modify-btn', function()
    {
      $('#modify-employee-form').show();
      $('#employee-list-table').hide();
      $('#add-employee-btn').toggle();
      $('#return-btn').toggle();
      $('#employee-list-text').html('<strong>Employee Details</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });

    $('#return-btn').click(function() 
    {
      $('#employee-details').hide();
      $('#modify-employee-form').hide();
      $('#add-employee-form').hide();
      $('#employee-list-table').show();
      $('#add-employee-btn').toggle();
      $('#return-btn').toggle();
      $('#employee-list-text').html('<strong>Employee Master List</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });

    $('#add-employee-btn').click(function()
    {
      $('#add-employee-form').show();
      $('#employee-list-table').hide();
      $('#add-employee-btn').toggle();
      $('#return-btn').toggle();
      $('#employee-list-text').html('<strong>Add New Employee</strong>');
      $('.dataTables_paginate, .dataTables_info, .dataTables_length, .dataTables_filter').toggle();
    });
</script>

<!-- Add necessary scripts for carousel functionality -->
<script>
  $(document).ready(function() {
    $('#form-carousel').carousel({
      interval: false
    });

    // Add custom validation for forms if needed
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var form = document.getElementById('add-employee-form');
        if (form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        }
      }, false);
    })();
  });
</script>
@stop