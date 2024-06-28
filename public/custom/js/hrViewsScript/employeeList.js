$(document).ready(function () {
    console.log("Inside");
    var tbody = $("#employee-list-table tbody");

    // Clear existing rows
    tbody.empty();

    // Simulate data retrieval from database
    var employeeName = "John Doe";
    var employmentStatus = "Regular";
    var departmentAssigned = "Department of Corporation";
    var jobDescription = "Software Developer";
    var employeeId = 1;

    // Create a new row
    var row =
        "<tr>" +
        "<td><strong>" +
        employeeName +
        "</strong></td>" +
        "<td>" +
        employmentStatus +
        "</td>" +
        "<td>" +
        departmentAssigned +
        "</td>" +
        "<td>" +
        jobDescription +
        "</td>" +
        "<td>" +
        '<button type="button" class="btn btn-primary btn-sm" id="view-details-btn" data-employee-id="' +
        employeeId +
        '">' +
        '<i class="fas fa-eye mr-2"></i> View Details' +
        "</button>" +
        "&nbsp;" + // Add a space between buttons
        '<button type="button" class="btn btn-secondary btn-sm" id="modify-btn" data-employee-id="' +
        employeeId +
        '">' +
        '<i class="fas fa-edit mr-2"></i> Modify' +
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

    var dateHiredHistory = "May 22, 2024";
    var positionName = "Department Head";
    var employmentStatus = "Regular";
    var departmentAssigned = "Department of Affairs";
    var jobDescriptionHistory = "Software Developer";
    var salaryValue = "$45,000";
    var danger = "bg-danger";

    var timelineItem =
        '<div class="time-label">' +
        "<span class=" +
        danger +
        ">" +
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

    $("#service-record-details").append(timelineItem);
    $("#service-record-details").append(
        '<div><i class="far fa-clock bg-gray"></i></div>'
    );

    var employmentStatusOptions = ["Full-time", "Part-time", "Contract"];
    var accessLevelOptions = ["Admin", "User", "Guest"];
    var salaryRateOptions = ["Grade 1", "Grade 2", "Grade 3"];
    var payrollScheduleOptions = ["Monthly", "Bi-weekly", "Weekly"];
    var departmentOptions = [
        "Department of Social Corporate",
        "Corporate Affairs",
        "Mayor's Office",
    ];

    var departmentSelect = $("#department-assigned");
    departmentOptions.forEach(function (department) {
        departmentSelect.append(new Option(department, department));
    });

    // Populate Employment Status options
    var employmentStatusSelect = $("#employment-status-form");
    employmentStatusOptions.forEach(function (status) {
        employmentStatusSelect.append(new Option(status, status));
    });

    // Populate Access Level options
    var accessLevelSelect = $("#access-level");
    accessLevelOptions.forEach(function (level) {
        accessLevelSelect.append(new Option(level, level));
    });

    // Populate Salary Rate options
    var salaryRateSelect = $("#salary-rate-form");
    salaryRateOptions.forEach(function (rate) {
        salaryRateSelect.append(new Option(rate, rate));
    });

    // Populate Payroll Schedule options
    var payrollScheduleSelect = $("#payroll-schedule");
    payrollScheduleOptions.forEach(function (schedule) {
        payrollScheduleSelect.append(new Option(schedule, schedule));
    });

    // Populate the benefit list dynamically (you should replace this with actual data retrieval from your database)
    var benefits = [
        { id: 1, name: "Health Insurance" },
        { id: 2, name: "Retirement Plan" },
        // Add more benefits as needed
    ];

    var benefitList = $("#benefit-list");
    benefits.forEach((benefit) => {
        benefitList.append(new Option(benefit.name, benefit.id));
    });

    // Initialize DataTable
    const benefitsTable = $("#benefits-table").DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        autoWidth: false,
        responsive: true,
    });

    // Handle the addition of benefits to the table
    $("#add-benefit-btn").click(function () {
        var benefitId = $("#benefit-list").val();
        var benefitName = $("#benefit-list option:selected").text();
        var personalShare = $("#personal-share").val();
        var employerShare = $("#employer-share").val();

        console.log(personalShare);
        console.log(employerShare);

        if (!benefitId || !personalShare || !employerShare) {
            alert("Please fill all the fields.");
            return;
        }

        // Add the new benefit to the table
        $("#benefits-table tbody").append(`
        <tr>
            <td data-benefit-id="${benefitId}">
                ${benefitName}
            </td>
            <td>${personalShare}</td>
            <td>${employerShare}</td>
        </tr>
    `);

        // Clear the input fields
        $("#benefit-list").val("");
        $("#personal-share").val("");
        $("#employer-share").val("");
    });

    var updateDepartmentSelect = $("#update-department-assigned");
    departmentOptions.forEach(function (department) {
        updateDepartmentSelect.append(new Option(department, department));
    });

    // Populate Employment Status options
    var updateEmploymentStatusSelect = $("#update-employment-status-form");
    employmentStatusOptions.forEach(function (status) {
        updateEmploymentStatusSelect.append(new Option(status, status));
    });

    // Populate Access Level options
    var updateAccessLevelSelect = $("#update-access-level");
    accessLevelOptions.forEach(function (level) {
        updateAccessLevelSelect.append(new Option(level, level));
    });

    // Populate Salary Rate options
    var updateSalaryRateSelect = $("#update-salary-rate-form");
    salaryRateOptions.forEach(function (rate) {
        updateSalaryRateSelect.append(new Option(rate, rate));
    });

    // Populate Payroll Schedule options
    var updatePayrollScheduleSelect = $("#update-payroll-schedule");
    payrollScheduleOptions.forEach(function (schedule) {
        updatePayrollScheduleSelect.append(new Option(schedule, schedule));
    });

    var updateBenefitList = $("#update-benefit-list");
    benefits.forEach((benefit) => {
        updateBenefitList.append(new Option(benefit.name, benefit.id));
    });

    // Initialize DataTable
    const updateBenefitsTable = $("#update-benefits-table").DataTable({
        paging: false,
        searching: false,
        info: false,
        ordering: false,
        autoWidth: false,
        responsive: true,
    });

    // Handle the addition of benefits to the table
    $("#update-add-benefit-btn").click(function () {
        var updateBenefitId = $("#update-benefit-list").val();
        var updateBenefitName = $(
            "#update-benefit-list option:selected"
        ).text();
        var updatePersonalShare = $("#update-personal-share").val();
        var updateEmployerShare = $("#update-employer-share").val();

        if (
            !updateBenefitIdenefitId ||
            !updatePersonalShare ||
            !updateEmployerShare
        ) {
            alert("Please fill all the fields.");
            return;
        }

        // Add the new benefit to the table
        $("#update-benefits-table tbody").append(`
        <tr>
            <td data-update-benefit-id="${benefitId}">
                ${benefitName}
            </td>
            <td>${personalShare}</td>
            <td>${employerShare}</td>
        </tr>
    `);

        // Clear the input fields
        $("#update-benefit-list").val("");
        $("#update-personal-share").val("");
        $("#update-employer-share").val("");
    });
    /*
    $("#employee-list-table")
        .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
        })
        .buttons()
        .container()
        .appendTo("#employee-list-table_wrapper .col-md-6:eq(0)");*/
});
