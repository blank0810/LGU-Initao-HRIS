var tbody = $("#travel-list-table tbody");

// Clear existing rows
tbody.empty();

// Simulate data retrieval from database
var employeeName = "John Doe";
var departmentName = "Corporate Affairs Department";
var controlNumber = 11111;
var dateFiled = "June 4, 2024";
var leaveType = "Vacation Leave";
var travelStatus = "Approved";

var travelStatusClass = "";
if (travelStatus === "Approved") {
    travelStatusClass = "success";
} else if (travelStatus === "Pending") {
    travelStatusClass = "secondary";
} else if (travelStatus === "Rejected") {
    travelStatusClass = "danger";
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
    "<td class='text-" +
    travelStatusClass +
    "'>" +
    travelStatus +
    "</td>" +
    "<td>" +
    '<button type="button" class="btn btn-success btn-sm" id="certify-btn" data-application-number="' +
    controlNumber +
    '">' +
    '<i class="fas fa-clipboard-check mr-2"></i> Certify' +
    "</button>" +
    "&nbsp;" + // Add a space between buttons
    '<button type="button" class="btn btn-primary btn-sm" id="view-details-btn" data-application-number="' +
    controlNumber +
    '">' +
    '<i class="fas fa-eye mr-2"></i> View Details' +
    "</button>" +
    "&nbsp;" + // Add a space between buttons
    '<button type="button" class="btn btn-secondary btn-sm" id="modify-btn" data-application-number="' +
    controlNumber +
    '">' +
    '<i class="fas fa-edit mr-2"></i> Modify' +
    "</button>" +
    "&nbsp;" + // Add a space between buttons
    '<button type="button" class="btn btn-info btn-sm" id="print-btn" data-application-number="' +
    controlNumber +
    '">' +
    '<i class="fas fa-print mr-2"></i> Print' +
    "</button>" +
    "</td>" +
    "</tr>";

// Append the new row to the table
tbody.append(row);

$("#travel-list-table").DataTable({
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
