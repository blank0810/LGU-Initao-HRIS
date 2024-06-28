<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log-In</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
<style>
  /* CSS for dark mode */
  .dark-mode .navbar {
      background-color: #343a40; /* Example background color for dark mode */
      color: #fff; /* Example text color for dark mode */
  }
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/dashboard">
        <img src="{{ asset('images/initao-logo.jpg')}}" alt="Logo" style="vertical-align: middle; width: 50px;"> <!-- Adjust the width as needed -->
        <b>LGU-INITAO </b>HRIS
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/login-user" method="post" id="loginForm">
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
                  <button type="button" id="signinBtn" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
          </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#signinBtn').click(function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Serialize form data
            var formData = $("#loginForm").serialize();
            
            // Perform AJAX POST request
            $.ajax({
                url: 'login-user',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    console.log('Response' + response);
                    if (response.success) {
                        Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true
                            }).then((result)=>{
                                window.location.href = 'profile';
                            });
                    } 
                    else
                    {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Log - in Warning',
                            text: response.message,
                        })
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error occurred during AJAX request:", error);
                    console.log(xhr);
                        // Check if the response is JSON
                        if (xhr.getResponseHeader('Content-Type').indexOf('application/json') !== -1) {
                            // Parse the JSON response
                            var response = JSON.parse(xhr.responseText);
                            // Display validation error using SweetAlert
                            displayValidationError(response.errors);
                        } else {
                            // Display generic error notification using SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred. Please try again later.',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000,
                                timerProgressBar: true
                            });
                        }
                    }
            });
        });

        function displayValidationError(errors) 
    {
        // Initialize an empty error message
        var errorMessage = '';

        // Loop through the errors object and concatenate error messages
        $.each(errors, function(key, value) {
            errorMessage += value[0] + '<br>';
        });

        // Display validation error using SweetAlert
        Swal.fire({
            icon: 'error',
            title: 'Required Fields',
            html: errorMessage,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        });
    }
    });
</script>

<script>
    /*
    $(document).ready(function() {
        // Execute POST action when the page is loaded
        $.ajax({
            url: '/save-login-activity',
            type: 'POST',
            data: {
                // Your data if needed
                page: 'Log-In Page',
                activity: 'Successful Log-in'
            },
            success: function(response) {
                // Handle success
                if (response.success) {
                    // Display success notification using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });
                } else {
                    // Display error notification using SweetAlert
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true
                    });
                }
            },
            error: function(xhr, status, error) {
              // Handle error
              Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: 'An error occurred while saving the action log',
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 5000,
                  timerProgressBar: true
              });
          }
        });
    });
    */
</script>
</body>
</html>
