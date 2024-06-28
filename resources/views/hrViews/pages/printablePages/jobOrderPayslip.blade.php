<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LGU-Initao HRIS | Print Payslip</title>

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

    .invoice:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      background-image: url('{{ asset('images/resize-logo.png') }}');
      background-size: 500px;
      background-position: center;
      background-repeat: no-repeat;
      width: 100%;
      height: 100%;
      opacity: .1;
      z-index: 0;
    }

    .invoice .invoice-page {
      position: relative;
      z-index: 5;
    }

    .card {
      background-color: transparent !important;
    }

    /* Landscape orientation for printing */
    @media print {
      @page {
        size: landscape;
        margin: 20mm;
      }
      .table,
      .table th,
      .table td {
        background-color: transparent !important;
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
            <div class="col"></div>
            <div class="col text-center">
              <h5 class="mt-0">Republic of the Philippines
                <br>Province of Misamis Oriental
                <br><strong>MUNICIPALITY OF INITAO</strong>
              </h5>
            </div>
            <div class="col form-group d-flex justify-content-end text-muted small">
            </div>
          </div>
          <br>

          <!-- Info row -->
          <div class="row">
            <div class="col invoice-col">
              <h3 class="text-center">
                <strong>TIME BOOK AND PAYROLL</strong>
              </h3>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header text-center">
                  <div class="card-title text-muted">
                    <strong>Payslip List</strong>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-hover" id="job-order-payslip">
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
                      <tr>
                        <td>John Doe</td>
                        <td>Administrative Assistance</td>
                        <td>$400 / Day</td>
                        <td>$800</td>
                        <td>$9,600</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <p><strong>1. I HEREBY CERTIFY</strong> that each person whose name appears on this roll 
              rendered service as indicated for the time period:</p>
            </div>
            <div class="col">
              <p><strong>2. Approved for payment:</strong></p>
            </div>
            <div class="col">
              <p><strong>I HEREBY CERTIFY </strong> on my official oath that each employee 
              whose name appears on the above roll has been in cash or in check, and in no other mode, the amount shown, opposite his/her name.
              The total payment made by means of this payroll amounts to 
              <span class="name-text" id="payroll-amount">Eighty thousand pesos ($80,000)</span> 
              <span class="name-text" id="payroll-date">June 22, 2024</span></p>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <span id="department-head"> {{$gatePassDetails->department_name ?? 'LEONIDES B. BALURAN'}} </span>
              <h6 class="signature-text"><strong>Municipal Administrator</strong></h6>
            </div>
            <div class="col">
              <span id="department-head"> {{$gatePassDetails->department_name ?? 'MERCY GRACE J. ACAIN'}} </span>
              <h6 class="signature-text"><strong>Municipal Mayor</strong></h6>
            </div>
            <div class="col">
              <span id="department-head"> {{$gatePassDetails->department_name ?? 'BENJIE N. BAGARES'}} </span>
              <h6 class="signature-text"><strong>Municipal Treasurer</strong></h6>
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
