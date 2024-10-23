<!DOCTYPE html>
<html lang="en">
    @include('generalLayouts.header')
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                            <i class="fas fa-bars fa-lg"></i>
                        </a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-file-alt fa-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">Recent Actions</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <span class="d-inline-block text-truncate" style="max-width: 200px; font-size: smaller;"> 
                                    Logged In Successfully
                                </span>
                            </a>
                            <!-- Example of a longer log description -->
                            <a href="#" class="dropdown-item">
                                <span class="d-inline-block text-truncate" style="max-width: 200px; font-size: smaller;">
                                    This is a longer log description that will be truncated with an ellipsis if it exceeds the maximum width
                                </span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/logs" class="dropdown-item dropdown-footer"><strong>See All Action Logs</strong></a>
                        </div>
                    </li>
                    <!-- Dark Mode Toggle Switch -->
                    <!--
                    <li class="nav-item">
                        <div class="custom-control custom-switch ml-2">
                            <input type="checkbox" class="custom-control-input" id="dark-mode-switch">
                            <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                        </div>
                    </li>
                    -->
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/dashboard" class="brand-link">
                <img src="{{ asset('images/initao-logo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">LGU - INITAO HRIS</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-header">HRIS MANAGEMENT</li>
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employees" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Employees
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="nav-icon far fa-file-alt"></i>
                            <p>
                                Application
                                <i class="right fas fa-angle-left"></i>
                            </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/leave" class="nav-link">
                                        <i class="nav-icon far fa-calendar-check"></i>
                                        <p>Leave Application</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/travel" class="nav-link">
                                        <i class="nav-icon fas fa-plane-departure"></i>
                                        <p>Travel Order</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/slip" class="nav-link">
                                        <i class="nav-icon far fa-id-badge"></i>
                                        <p>Pass Slip</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="/payroll" class="nav-link">
                            <i class="nav-icon fas fas fa-dollar-sign"></i>
                            <p>
                                Payroll
                            </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->

                <div class="sidebar-custom">
                <a href="/logout" button type="button" id="signoutBtn" class="btn btn-danger btn-block"><i class="fas fa-sign-out-alt mr-2"></i> Sign Out</a>
                </div>
                <!-- /.sidebar-custom -->
            </aside>

            @yield('content')
            @include('generalLayouts.footer')
        </div>
        
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <!-- Select2 -->
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        <!-- Bootstrap4 Duallistbox -->
        <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
        <!-- InputMask -->
        <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
        <!-- date-range-picker -->
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <!-- dropzonejs -->
        <script src="{{ asset('plugins/dropzone/min/dropzone.min.js') }}"></script>
        <!-- SweetAlert2 -->
        <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- Script responsible for putting and opening up the sub menu of buttons or putting up active class to the buttons -->
        <script>
            $(document).ready(function() {
                // Function to set the active class to the navigation link corresponding to the current URL
                var currentUrl = window.location.href;
                
                // Find the button assigned for the displayed page
                $('.nav-item').each(function() {
                    var navLink = $(this).find('a').attr('href');
                    if (currentUrl.includes(navLink)) {
                        // Add 'menu-open' class to all parent buttons up to the top level
                        $(this).parents('.nav-item').addClass('menu-open');
                        // Add 'active' class to the parent button's anchor tag
                        $(this).parents('.nav-item').find('a.nav-link').first().addClass('active');
                        // Find the child button responsible for the displayed page
                        $(this).find('.nav-item').each(function() {
                            var childNavLink = $(this).find('a').attr('href');
                            if (currentUrl.includes(childNavLink)) {
                                // Add 'active' class to the child button's anchor tag
                                $(this).find('.nav-link').addClass('active');
                                return false; // Exit the loop once the responsible child button is found
                            }
                        });
                        return false; // Exit the loop once the buttons are found
                    }
                });

                // If no parent button found, search for the button directly based on the URL
                if ($('.nav-item.active').length === 0) {
                    $('.nav-item').each(function() {
                        var navLink = $(this).find('a').attr('href');
                        if (currentUrl.includes(navLink)) {
                            $(this).addClass('active');
                            $(this).find('.nav-link').addClass('active');
                            return false; // Exit the loop once the button is found
                        }
                    });
                }
            });
        </script>

        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                })

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'L'
                });

                //Date and time picker
                $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

                //Date range picker
                $('#leave_date').daterangepicker({
                locale: {
                    format: 'MMM DD, yyyy'
                }
                });
                $('#leave_date_update').daterangepicker({
                locale: {
                    format: 'MMM DD, yyyy'
                }
                });
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
                })
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                {
                    ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
                )

                //Timepicker
                $('#timepicker').datetimepicker({
                format: 'LT'
                })

                //Bootstrap Duallistbox
                //$('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                //$('.my-colorpicker1').colorpicker()
                //color picker with addon
            // $('.my-colorpicker2').colorpicker()

                /*$('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                })*/

                $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })

            })
            // BS-Stepper Init
            /*document.addEventListener('DOMContentLoaded', function () {
                window.stepper = new Stepper(document.querySelector('.bs-stepper'))
            })*/

            // DropzoneJS Demo Code Start
            Dropzone.autoDiscover = false

            // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
            var previewNode = document.querySelector("#template")
            previewNode.id = ""
            var previewTemplate = previewNode.parentNode.innerHTML
            previewNode.parentNode.removeChild(previewNode)

            var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                url: "/target-url", // Set the url
                thumbnailWidth: 80,
                thumbnailHeight: 80,
                parallelUploads: 20,
                previewTemplate: previewTemplate,
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
            })

            myDropzone.on("addedfile", function(file) {
                // Hookup the start button
                file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
            })

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function(progress) {
                document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
            })

            myDropzone.on("sending", function(file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1"
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
            })

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function(progress) {
                document.querySelector("#total-progress").style.opacity = "0"
            })

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function() {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
            }
            document.querySelector("#actions .cancel").onclick = function() {
                myDropzone.removeAllFiles(true)
            }
            // DropzoneJS Demo Code End
            </script>
        @yield('pagespecificscript')
    </body>
</html>