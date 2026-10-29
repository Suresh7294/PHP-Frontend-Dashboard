<?php
session_start();
$userid=$_SESSION['sessid'];
 $userrole=$_SESSION['sessrole'];
 $username=$_SESSION['sessname'];
 $useremail=$_SESSION['sessemail'];
 if($username!=null && $useremail!=null)
    {
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Live Stream Technologies</title>
    <link rel="icon" type="image/png" href="./assets/images/Lst logo.png">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <link href="./assets/icons/fontawesome/css/fontawesome.min.css" rel="stylesheet" />
    <link href="./assets/icons/fontawesome/css/brands.min.css" rel="stylesheet" />
    <link href="./assets/icons/fontawesome/css/solid.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>



    <style>
        .dataTables_wrapper {
            padding: 0px;
            border-radius: 10px;
        }

        #InterviewTable tbody tr:nth-child(even) {
            background-color: #252f3c;
        }

        #InterviewTable tbody tr:hover {
            transition: 0.3s;
        }

        .dataTables_filter input {
            border-radius: 8px;
            border: none;
            height: 40px;
            margin-top: 15px;
            margin-bottom: 0px;
            margin-right: 20px;
        }

        .dataTables_filter input:focus {
            border: 1px groove #566e94 !important;
            box-shadow: none !important;
        }

        .dataTables_wrapper .dt-buttons .btn {
            background-color: #273449 !important;
            color: #94a3b8 !important;
            border: none !important;
            font-size: 14px;
            padding: 14px 16px;
            margin: 10px -15px 0px 10px;
        }

        .dataTables_wrapper .dt-buttons .btn:hover {
            background: linear-gradient(#18c2c0, #00c853) !important;
            color: #273449 !important;
            border: none !important;
            font-size: 14px;
            padding: 14px 16px;
            margin: 10px -15px 0px 10px;
            transform: none !important;
            transition: none !important;
            translate: none !important;


        }

        .dt-buttons {
            float: left;
            margin-bottom: 0px;
        }

        #InterviewTable {
            text-align: center;
            border-radius: 15px;
            overflow-y: scroll;
        }

        /* Pagination container */
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 15px;

        }

        /* Number buttons */
        .dataTables_wrapper .dataTables_paginate .pagination .page-link {
            background-color: #273449 !important;
            color: #d1d5db !important;
            border: 1px solid #374151 !important;
            margin: 5px 0px 5px 0px;
            min-width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: none !important;
        }

        /* Hover */
        .dataTables_wrapper .dataTables_paginate .pagination .page-link:hover {
            background: linear-gradient(135deg, #18c2c0, #00c853) !important;
            color: #fff !important;
            border-radius: 5px !important;
        }

        /* Active page */
        .dataTables_wrapper .dataTables_paginate .pagination .active .page-link {
            background-color: #385d9a !important;
            border-radius: 5px !important;
            color: #fff !important;
        }

        /* Disable focus glow */
        .page-link:focus {
            box-shadow: none !important;
        }

        .dataTables_length {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Show entries text */
        .dataTables_length label {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 10px 0px 0px 10px;
            color: #d1d5db;
        }

        /* Dropdown */
        .dataTables_length select {
            text-align: center;
            background: #1f2937 !important;
            color: #fff !important;
            border: 1px solid #374151 !important;
            border-radius: 6px !important;
            padding: 8px !important;
            box-shadow: none !important;
        }

        /* Focus */
        .dataTables_length select:focus {
            border-color: #566e94 !important;
            box-shadow: none !important;
        }

        .card-header {
            padding: 6px 10px;
        }

        .form-control,
        .form-select {
            padding: 6px 8px;
            font-size: 12px;
        }

        .table th,
        .table td {
            padding: 4px;
            font-size: 12px;
        }

        .custom-table th,
        .custom-table td {
            padding: 5px;
        }

        /* Fit everything inside modal */
        .invoice-fit {
            font-size: 18px;
        }

        /* Reduce spacing globally */
        .invoice-fit .form-control,
        .invoice-fit .form-select {
            padding: 4px 6px;
            height: 32px;
        }

        /* Compact table */
        .invoice-fit table th,
        .invoice-fit table td {
            padding: 4px;
        }

        /* Remove extra spacing */
        .invoice-fit .form-label {
            margin-bottom: 2px;
            font-size: 12px;
        }

        /* Inline underline input */
        .input-line {
            border: none;
            outline: none;
            border-bottom: 1px solid #1e1717;
            background: transparent;
            width: 450px;
            color: #fff;
            display: inline-block;
        }

        .input-line:focus {
            border-bottom-color: #ffffff;
        }

        /* Prevent modal scroll */
        .modal-body {
            overflow: hidden !important;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="logo" href="interviewSchedule.php">
                <img src="./assets/images/Lst logo.png" alt="not found" style="height: 50px;margin:auto;width: 50px;">
                <span>Live Stream Technologies</span>
            </a>
            <button class="menu-toggle" id="menuToggle">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="mainpage.php" class="nav-link ">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-accounts.php" class="nav-link">
                    <i class="bi bi-person-circle"></i>
                    <span>Accounts</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-students.php" class="nav-link">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-Employees.php" class="nav-link">
                    <i class="bi bi-person-workspace"></i>
                    <span>Employees</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-attendance.php" class="nav-link">
                    <i class="bi bi-person-check-fill"></i>
                    <span>Attendance</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-enquiry.php" class="nav-link">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Enquiry</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-course.php" class="nav-link">
                    <i class="bi bi-journals"></i>
                    <span>Course</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-event.php" class="nav-link">
                    <i class="bi bi-calendar-heart"></i>
                    <span>Events</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-finance.php" class="nav-link">
                    <i class="bi bi-bank"></i>
                    <span>Finance & Payments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="L-interview.php" class="nav-link active">
                    <i class="bi bi-clipboard-check-fill"></i>
                    <span>Interview</span>
                </a>
            </li>


            <li class="nav-item">
                <a href="404.php" class="nav-link">
                    <i class="bi bi-x-circle"></i>
                    <span>404</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="500.php" class="nav-link">
                    <i class="bi bi-x-circle"></i>
                    <span>500</span>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <button class="menu-toggle-mobile" id="MenuToggleMobile">
                <i class="bi bi-list"></i>
            </button>

            <div>
                <!--<img src="./assets/images/lst logo 3.png" alt="not found" width="200px" height="80px">-->
                <h3>LIVE STREAM TECHNOLOGIES</h3>
            </div>

            <div class="top-bar-actions">
                <div class="dropdown notify-dropdown">
                    <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false" role="button">
                        <button class="action-btn">
                            <i class="bi bi-bell-fill"></i>
                            <span class="badge-notification">12</span>
                        </button>
                    </div>

                    <div class="dropdown-menu dropdown-menu-end mt-2">
                        <div id="Notification" class="h-380 scroll-y p-3 custom-scrollbar">
                            <ul class="timeline p-0">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2">DR</div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Dr Smith uploaded a new report</h6>
                                            <small class="d-block">10 Dec 2023 - 08:15 AM</small>
                                        </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        <a class="all-notification" href="#">See all notifications <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="dropdown notify-dropdown">
                    <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false" role="button">
                        <button class="action-btn">
                            <i class="bi bi-envelope-fill"></i>
                            <span class="badge-notification">5</span>
                        </button>
                    </div>

                    <div class="dropdown-menu dropdown-menu-end mt-2">
                        <div id="Notification" class="h-380 scroll-y p-3 custom-scrollbar">
                            <ul class="timeline p-0">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2">DR</div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Dr Smith uploaded a new report</h6>
                                            <small class="d-block">10 Dec 2023 - 08:15 AM</small>
                                        </div>
                                    </div>
                                </li>
                              
                            </ul>
                        </div>
                        <a class="all-notification" href="#">See all notifications <i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="dropdown profile-dropdown">
                    <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false" role="button">
                        <div class="user-profile">
                            <div class="user-avatar"><img src="assets/images/profile_icon.png" width=50 height=50></div>
                            <div class="user-info">
                                <h6><?=$username?></h6>
                                <p><?=$userrole?></p>
                            </div>
                        </div>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end mt-2">
                        <li>
                            <h6 class="dropdown-header">Settings</h6>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i> Profile Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="fa-regular fa-bell"></i> Notifications</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="fa-solid fa-shield-halved"></i> Privacy &amp;
                                Security</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="fa-regular fa-credit-card"></i> Billing</a>
                        </li>
                        <li>
                            <div class="sign-out">
                                <a class="dropdown-item text-danger" href="logout.php"><i
                                        class="fa-solid fa-right-from-bracket"></i> Sign out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="row mb-4">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                    <a href="L-interview.php" style="text-decoration: none; color: inherit">
                        <div class="filter-card ">
                            <div class="filter-icon" style="
                  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                ">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="">10</h3>
                                <p>Total Interviews</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">

                    <div class="filter-card active">
                        <div class="filter-icon" style="
                    background: linear-gradient(
                      135deg,
                      #43e97b 0%,
                      #38f9d7 100%
                    );
                  ">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <div class="filter-info">
                            <h3 id="activeCustomers">6</h3>
                            <p>Interviews Scheduled</p>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3 t-card-active">
                    <a href="JobInterviews.php" style="text-decoration: none; color: inherit">
                        <div class="filter-card">
                            <div class="filter-icon" style="
                    background: linear-gradient(
                      135deg,
                      #fa709a 0%,
                      #fee140 100%
                    );
                  ">
                                <i class="fas fa-crown"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="vipCustomers">4</h3>
                                <p>Interview for JOB</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                    <a href="internshipInterviews.php" style="text-decoration: none; color: inherit">
                        <div class="filter-card">
                            <div class="filter-icon" style="
                    background: linear-gradient(
                      135deg,
                      #4facfe 0%,
                      #00f2fe 100%
                    );
                  ">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="avgSpend">5</h3>
                                <p>Interview for Internship</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="table-card">
                <div class="table-header">
                    <h2 style="margin:0px 35% 0px 35%;">Interview Schedule List</h2>
                </div>
                <div class="table-responsive">
                    <table class="custom-table" id="InterviewTable">
                        <thead>
                            <tr>
                                <th>Interview ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Category</th>
                                <th>Resume</th>
                                <th>Location</th>
                                <th>schdule date</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th><i class="fas fa-save"></i>&nbsp;save</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>TXN-10235</strong></td>
                                <td>Sarah Johnson</td>
                                <td><strong>sam@gmail.com</strong></td>
                                <td>9848948994</td>
                                <td>Intern</td>
                                <td><input type="file" style="display: none;">resume</td>
                                <td>CBE</td>
                                <td>2024-12-20 14:15</td>
                                <td>
                                    <select class="form-select"
                                        style="border: none;height: 40px;color: #94a3b8;width: auto;">
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Selected</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </td>
                                <td>Have good experience</td>
                                <td><button class="btn btn-secondary"><i class="fas fa-save"></i></button></td>
                            </tr>

                            <tr>
                                <td><strong>TXN-10235</strong></td>
                                <td>Sarah Johnson</td>
                                <td><strong>sam@gmail.com</strong></td>
                                <td>9848948994</td>
                                <td>Job Seeker</td>
                                <td><input type="file" style="display: none;">resume</td>
                                <td>CBE</td>
                                <td>2024-12-20 14:15</td>
                                <td>
                                    <select class="form-select"
                                        style="border: none;height: 40px;color: #94a3b8;width: auto;">
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Selected</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </td>
                                <td>Have good experience</td>
                                <td><button class="btn btn-secondary"><i class="fas fa-save"></i></button></td>
                            </tr>


                            <tr>
                                <td><strong>TXN-10235</strong></td>
                                <td>Sarah Johnson</td>
                                <td><strong>sam@gmail.com</strong></td>
                                <td>9848948994</td>
                                <td>Intern</td>
                                <td><input type="file" style="display: none;">resume</td>
                                <td>CBE</td>
                                <td>2024-12-20 14:15</td>
                                <td>
                                    <select class="form-select"
                                        style="border: none;height: 40px;color: #94a3b8;width: auto;">
                                        <option value="Pending">Pending</option>
                                        <option value="Completed">Selected</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </td>
                                <td>Have good experience</td>
                                <td><button class="btn btn-secondary"><i class="fas fa-save"></i></button></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>



            <!-- interview Modal -->
            <div id="InvoiceModal" class="modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- HEADER -->
                        <div class="modal-header">
                            <h5 class="mb-0">
                                <i class="fas fa-file-invoice me-2"></i>Interview Details
                            </h5>

                            <div class="ms-auto d-flex gap-2">
                                <button class="btn btn-warning btn-sm" onclick="printInvoice()">
                                    <i class="fas fa-print"></i> Print
                                </button>
                                <button class="btn-close mt-1" data-bs-dismiss="modal"></button>
                            </div>
                        </div>

                        <!-- BODY -->
                        <div class="modal-body">
                            <div id="invoiceArea">
                                <div class="row">
                                    <!-- LEFT SIDE -->
                                    <div class="col-md-12">
                                        <div class="row mb-2 ">
                                            <div class="row g-2 mb-2 mt-1">
                                                <div class="col-md-4">
                                                    <label class="form-label">Interview No</label>
                                                    <input class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select form-select-sm">
                                                        <option>Select Category</option>
                                                        <option>Student</option>
                                                        <option>Job Seeker</option>
                                                        <option>Intern</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Position</label>
                                                    <select class="form-select form-select-sm">
                                                        <option>Select Position</option>
                                                        <option>Software Engineer</option>
                                                        <option>Web Developer</option>
                                                        <option>Data Analyst</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control form-control-sm" />
                                                </div>
                                            </div>
                                        </div>
                                        <!--Student Details-->
                                        <div class="card-header">
                                            <h6 class="mb-0">
                                                <i class="fas fa-user-graduate me-2"></i>Student Details
                                            </h6>
                                        </div>

                                        <div class="table-card mb-3">
                                            <div class="table-responsive">
                                                <table class="custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>student ID</th>
                                                            <th>Student Name</th>
                                                            <th>Particulars</th>
                                                            <th>Actuall Amount</th>
                                                            <th>Paid Amount</th>
                                                            <th>Tax %</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody style="color: white">
                                                        <tr>
                                                            <td>
                                                                <input class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input class="form-control form-control-sm" />
                                                            </td>
                                                            <td>
                                                                <input class="form-control form-control-sm" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-text">
                <span>© 2026 LST — All Rights Reserved</span>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $(document).ready(function () {
            $('#InterviewTable').DataTable({
                dom:
                    "<'row align-items-center mb-3'\
                    <'col-md-6 d-flex align-items-center gap-3'lB>\
                    <'col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0'f>\
                >" +
                    "<'row'<'col-12'tr>>" +
                    "<'row mt-3'\
                    <'col-md-6'i>\
                    <'col-md-6 d-flex justify-content-end'p>\
                >",

                buttons: [
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'pdf', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ],

                pageLength: 5,

                lengthMenu: [
                    [5, 10, 25, 50, 100],
                    [5, 10, 25, 50, 100]
                ],
                language: {
                    lengthMenu: "Show <br> Entries _MENU_"
                }
            });
        });
    </script>
</body>

</html>
<?php
    }
    else{
?>
<script>alert('No Sessions Found');location.href='index.php';</script>
   <?php 
   }
    ?>