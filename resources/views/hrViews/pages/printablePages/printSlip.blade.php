<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LGU-Initao HRIS | Pass Slip Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <style>
    .position-relative {
    position: relative;
    }
    .note-signature-image {
        width: 100px; /* Adjust the width as needed */
        height: auto;
        position: absolute;
        top: -30px; /* Adjust the top position as needed */
        left: 20%; /* Center horizontally */
        transform: translateX(-50%);
        z-index: 10; /* Ensure the signature is on top */
    }
    .approve-signature-image {
        width: 100px; /* Adjust the width as needed */
        height: auto;
        position: absolute;
        top: -30px; /* Adjust the top position as needed */
        left: 10%; /* Center horizontally */
        transform: translateX(-50%);
        z-index: 10; /* Ensure the signature is on top */
    }
    .signature-text {
      text-decoration: overline;
    }

    .name-text {
      text-decoration: underline;
    }

    .invoice:before
    {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      background-image: url('{{ asset('images/resize-logo.png') }}');
      background-size: 500;
      background-position: center;
      background-repeat: no-repeat;
      width: 100%;
      height: 100%;
      opacity: .1;
      z-index: 0.1;
    }

    .invoice .invoice-page
    {
      position: relative;
      z-index: 5;
    }

    /* Landscape orientation for printing */
    @media print {
      @page {
        size: landscape;
        margin: 20mm;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <div class="invoice-page container">
        <div class="invoice-column">
          <!-- Title row -->
          <div class="row">
            <div class="col">
              
            </div>
            <div class="col text-center">
              <h5 class="mt-0">Republic of the Philippines 
                <br>Province of Misamis Oriental
                <br><strong>MUNICIPALITY OF INITAO</strong>
              </h5>
            </div>
            <div class="col form-group d-flex justify-content-end text-muted small">
              <span class="mr-2"><strong>Control #: 1123345645</strong></span>
              <span id="view-control-number"></span>
              <span class="ml-3 mr-2"><strong>Date Filed: December 22, 2024</strong></span>
              <span id="view-date-filed" name="view_date_filed"></span>
            </div>
          </div>
          <br>

          <!-- Info row -->
          <div class="row">
            <div class="col invoice-col">
              <h3 class="text-center">
                <strong>PASS SLIP</strong>
              </h3>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <hr>

          <div class="row">
            <div class="col">
              <h6>Name of employee: <span id="employee-name" class="name-text"> {{$gatePassDetails->employee_name ?? 'N/A'}} </span></h6>
            </div>
            <div class="col">
              <h6>Department: <span id="department-name" class="name-text"> {{$gatePassDetails->department_name ?? 'N/A'}} </span></h6>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col">
              <h6>Pass Slip Date: <span id="date-departure" class="name-text"> {{$gatePassDetails->department_name ?? 'N/A'}} </span></h6>
            </div>
            <div class="col">
              <h6>Departure Time: <span id="departure-time" class="name-text"> {{$gatePassDetails->department_name ?? 'N/A'}} </span></h6>
              <h6>Expected time of return: <span id="return-time" class="name-text"> {{$gatePassDetails->department_name ?? 'N/A'}} </span></h6>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col">
              <h6>Destination: <span id="destination" class="name-text"> {{$gatePassDetails->emp_id ?? 'N/A'}} </span></h6>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col">
              <h6 class="text-danger">Date Noted: 
                <span id="control-number">
                  <strong>
                    @if (isset($gatePassDetails->gate_pass_date))
                      @if ($gatePassDetails && $gatePassDetails->gate_pass_date)
                      {{ \Carbon\Carbon::parse($gatePassDetails->gate_pass_date)->format('F j, Y') }}
                      @else
                        N/A
                      @endif
                    @else
                      N/A
                    @endif
                  </strong>
                </span>
              </h6>
            </div>
            <div class="col">
              <h6 class="text-danger">Date Approved: 
                <span id="control-number">
                  <strong>
                    @if (isset($gatePassDetails->gate_pass_date))
                      @if ($gatePassDetails && $gatePassDetails->gate_pass_date)
                      {{ \Carbon\Carbon::parse($gatePassDetails->gate_pass_date)->format('F j, Y') }}
                      @else
                        N/A
                      @endif
                    @else
                      N/A
                    @endif
                  </strong>
                </span>
              </h6>
            </div>
          </div>
          <hr>

          <div class="row">
            <div class="col-1 text-right">
              Noted by:
            </div>
            <div class="col-11">
              
            </div>
          </div>

          <div class="row">
            <div class="col-1">
            </div>
            <div class="col-3">
              <img src="{{ asset('images/sample-signature.png')}}" alt="Signature" class="note-signature-image">
              <br>
              <span id="department-head"> {{$gatePassDetails->department_name ?? 'Leonides Baluran'}} </span>
              <h6 class="signature-text"><strong>Department Head</strong></h6>
            </div>
            <div class="col-8">
            </div>
          </div>

          <div class="row">
            <div class="col-2">
            </div>
            <div class="col-2">
              
            </div>
            <div class="col-8">
              Approved by:
            </div>
          </div>

          <div class="row">
            <div class="col-5">
            </div>
            <div class="col-7">
              <img src="{{ asset('images/sample-signature.png')}}" alt="Signature" class="approve-signature-image">
              <br>
              <span id="department-head"> {{$gatePassDetails->department_name ?? 'Mercy Grace J. Acain'}} </span>
              <h6 class="signature-text"><strong>Municipal Mayor</strong></h6>
            </div>
          </div>
          
        </div>
        <!-- /.invoice-column -->
      </div>
      <!-- /.invoice-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    // Print function
    window.addEventListener("load", window.print());
  </script>
</body>

</html>
