var tbody = $("#leave-list-table tbody");

// Clear existing rows
tbody.empty();

// Simulate data retrieval from database
var employeeName = "John Doe";
var departmentName = "Corporate Affairs Department";
var applicationNumber = 11111;
var dateFiled = "June 4, 2024";
var leaveType = "Vacation Leave";
var leaveStatus = "Approved";

var leaveStatusClass = "";
if (leaveStatus === "Approved") {
    leaveStatusClass = "success";
} else if (leaveStatus === "Pending") {
    leaveStatusClass = "secondary";
} else if (leaveStatus === "Rejected") {
    leaveStatusClass = "danger";
}

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
    dateFiled +
    "</td>" +
    "<td>" +
    leaveType +
    "</td>" +
    "<td class='text-" +
    leaveStatusClass +
    "'>" +
    leaveStatus +
    "</td>" +
    "<td>" +
    '<button type="button" class="btn btn-success btn-sm" id="certify-btn" data-application-number="' +
    applicationNumber +
    '">' +
    '<i class="fas fa-clipboard-check mr-2"></i> Certify' +
    "</button>" +
    "&nbsp;" + // Add a space between buttons
    '<button type="button" class="btn btn-primary btn-sm" id="view-details-btn" data-application-number="' +
    applicationNumber +
    '">' +
    '<i class="fas fa-eye mr-2"></i> View Details' +
    "</button>" +
    "&nbsp;" + // Add a space between buttons
    '<button type="button" class="btn btn-secondary btn-sm" id="modify-btn" data-application-number="' +
    applicationNumber +
    '">' +
    '<i class="fas fa-edit mr-2"></i> Modify' +
    "</button>" +
    "&nbsp;" + // Add a space between buttons
    '<button type="button" class="btn btn-info btn-sm" id="print-btn" data-application-number="' +
    applicationNumber +
    '">' +
    '<i class="fas fa-print mr-2"></i> Print' +
    "</button>" +
    "</td>" +
    "</tr>";

// Append the new row to the table
tbody.append(row);

$("#leave-list-table").DataTable({
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
