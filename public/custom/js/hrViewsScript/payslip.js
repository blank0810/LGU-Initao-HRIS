var tbody = $("#employee-list-table tbody");
// Clear existing rows
tbody.empty();

// Simulate data retrieval from database
var employeeName = "John Doe";
var departmentName = "Corporate Affairs Department";
var employeeId = 11111;
var employmentStatus = "Regular";

// Create a new row
var row =
    "<tr>" +
    "<td><strong>" +
    employeeName +
    "</strong></td>" +
    "<td>" +
    departmentName +
    "</td>" +
    "<td>" +
    employmentStatus +
    "</td>" +
    "<td>" +
    '<button type="button" class="btn btn-success btn-sm" id="generate-btn" data-employee-id="' +
    employeeId +
    '">' +
    '<i class="fas fa-edit mr-2"></i> Generate Payslip' +
    "</button>" +
    "</td>" +
    "</tr>";

// Append the new row to the table
tbody.append(row);

$("#employee-list-table").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    pageLength: 10,
    lengthMenu: [5, 10, 15, 20],
});

var tbody1 = $("#job-order-payslip-table tbody");
// Clear existing rows
tbody1.empty();

// Simulate data retrieval from database
var employeeName = "John Doe";
var employeeId = 1001;
var occupation = "Corporate Affairs Department";
var rate = 11111;
var deductions = 11111;
var total = 11111;

// Create a new row
var row =
    "<tr>" +
    "<td><strong>" +
    employeeName +
    "</strong></td>" +
    "<td>" +
    occupation +
    "</td>" +
    "<td>" +
    rate +
    "</td>" +
    "<td>" +
    deductions +
    "</td>" +
    "<td>" +
    total +
    "</td>" +
    "</tr>";

// Append the new row to the table
tbody1.append(row);

$("#job-order-payslip-table").DataTable({
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: true,
    info: true,
    autoWidth: false,
    responsive: true,
    pageLength: 10,
    lengthMenu: [5, 10, 15, 20],
});
