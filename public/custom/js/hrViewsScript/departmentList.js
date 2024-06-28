$(document).ready(function () {
    // Get the tbody element
    $("#department-table").show();
    var tbody = $("#department-table tbody");

    // Clear existing rows
    tbody.empty();

    // Simulate data retrieval from database
    var departmentName = "Mayor's Office";
    var totalPersonnel = 20;
    var regularPersonnel = 10;
    var jobOrderPersonnel = 10;
    var departmentId = 1;

    // Create a new row
    var row =
        "<tr>" +
        "<td><strong>" +
        departmentName +
        "</strong></td>" +
        "<td>" +
        totalPersonnel +
        "</td>" +
        "<td>" +
        regularPersonnel +
        "</td>" +
        "<td>" +
        jobOrderPersonnel +
        "</td>" +
        "<td>" +
        '<button type="button" class="btn btn-info btn-sm" id="view-department-details-btn" data-department-id="' +
        departmentId +
        '">' +
        '<i class="fas fa-eye mr-2"></i> View Details' +
        "</button>" +
        "</td>" +
        "</tr>";

    // Append the new row to the table
    tbody.append(row);

    $("#department-table").DataTable({
        paging: true,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
    });

    var employeeListBody = $("#department-employee-table tbody");

    // Clear existing rows
    employeeListBody.empty();

    // Simulate data retrieval from database
    var employeeName = "John Doe";
    var dateHired = "May 22, 2024";
    var jobDescription = "Software Developer";
    var employeeId = 1;

    // Create a new row
    var row =
        "<tr>" +
        "<td><strong>" +
        employeeName +
        "</strong></td>" +
        "<td>" +
        dateHired +
        "</td>" +
        "<td>" +
        jobDescription +
        "</td>" +
        "<td>" +
        '<button type="button" class="btn btn-info btn-sm" id="view-service-btn" data-employee-id="' +
        employeeId +
        '">' +
        '<i class="fas fa-briefcase mr-2"></i> Service Record' +
        "</button>" +
        "</td>" +
        "</tr>";

    // Append the new row to the table
    employeeListBody.append(row);

    $("#department-employee-table").DataTable({
        paging: true,
        lengthChange: false,
        searching: false,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
    });

    var dateHiredHistory = "May 22, 2024";
    var positionName = "Department Head";
    var employmentStatus = "Regular";
    var departmentAssigned = "Department of Affairs";
    var jobDescriptionHistory = "Software Developer";
    var salaryValue = "$45,000";

    var timelineItem =
        '<div class="time-label">' +
        '<span class="bg-red">' +
        dateHiredHistory +
        "</span>" + // Include from_date in the time-label
        "</div>" +
        "<div>" +
        '<i class="fas fa-briefcase bg-primary"></i>' + // Assuming a default icon
        '<div class="timeline-item">' +
        '<h3 class="timeline-header"><a href="#">Position:</a> ' +
        positionName +
        "</h3>" + // Using position_name from your JSON
        '<div class="timeline-body">' +
        '<ul class="list-group">' +
        '<li class="list-group-item"><strong>Employment Status: </strong> ' +
        employmentStatus +
        "</li>" +
        '<li class="list-group-item"><strong>Department: </strong> ' +
        departmentAssigned +
        "</li>" + // Adding department_name
        '<li class="list-group-item"><strong>Job Description:</strong> ' +
        jobDescriptionHistory +
        "</li>" + // Adding emp_status
        '<li class="list-group-item"><strong>Salary Value:</strong> ' +
        salaryValue +
        "</li>" + // Adding salary
        "</ul>" +
        "</div>" +
        "</div>" +
        "</div>";

    $("#service-record-history").append(timelineItem);
    $("#service-record-history").append(
        '<div><i class="far fa-clock bg-gray"></i></div>'
    );
});
