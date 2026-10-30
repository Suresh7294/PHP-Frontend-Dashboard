<?php
session_start();
$userid=$_SESSION['sessid'];
 $userrole=$_SESSION['sessrole'];
 $username=$_SESSION['sessname'];
 $useremail=$_SESSION['sessemail'];
 if($username!=null && $useremail!=null)
    {
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Stream Technologies</title>
    <link rel="icon" type="image/png" href="./assets/images/Lst logo.png">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="./assets/icons/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="./assets/icons/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="./assets/icons/fontawesome/css/solid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

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

        #WebEnqTable tbody tr:nth-child(even) {
            background-color: #252f3c;
        }

        #WebEnqTable tbody tr:hover {
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

        #WebEnqTable {
            text-align: center;
            border-radius: 15px;
            width: 100% !important;
        }
        #WebEnqTable th{
            width: 100% !important;
        }

        .table-responsive {
            overflow-x: auto;
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
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="logo" href="mainpage.php">
                <img src="./assets/images/Lst logo.png" alt="not found" style="height: 50px;margin:auto;width: 50px;">
                
            </a>
            <button class="menu-toggle" id="menuToggle">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="mainpage.php" class="nav-link active">
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
                <a href="L-interview.php" class="nav-link">
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
               <!-- <img src="./assets/images/lst logo 3.png" alt="not found" width="200px" height="80px">-->
                <h3>LIVE STREAM TECHNOLOGIES</h3>
            </div>

            <div class="top-bar-actions">
                <div class="dropdown notify-dropdown">
                    <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                        data-bs-auto-close="outside" aria-expanded="false" role="button">
                        <button class="action-btn">
                            <i class="bi bi-bell-fill"></i>
                            <span class="badge-notification">1</span>
                        </button>
                    </div>

                    <div class="dropdown-menu dropdown-menu-end mt-2">
                        <div id="Notification" class="h-380 scroll-y p-3 custom-scrollbar">
                            <ul class="timeline p-0">
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2">
                                            DR
                                        </div>
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
                            <span class="badge-notification">1</span>
                        </button>
                    </div>

                    <div class="dropdown-menu dropdown-menu-end mt-2">
                        <div id="Notification" class="h-380 scroll-y p-3 custom-scrollbar">
                            <ul class="timeline p-0">
                                
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-primary">
                                            <i class="fa fa-calendar-alt"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Next Appointment Reminder</h6>
                                            <small class="d-block">10 Dec 2023 - 12:00 PM</small>
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
                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i> Profile Settings</a>
                        </li>
                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-bell"></i> Notifications</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-shield-halved"></i> Privacy &amp;
                                Security</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-credit-card"></i> Billing</a></li>
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
            <!-- Page Header -->
            <div class="page-header">
                <h1>Dashboard Overview</h1>
            </div>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="fa-notdog fa-solid fa-circle-user"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 12%
                        </div>
                    </div>
                    <div class="stat-value" id="totalOrders">1000</div>
                    <div class="stat-label">Total Users</div>
                    <div class="stat-footer">
                        <i class="bi bi-clock"></i>
                        <span>Updated 5 mins ago</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 12%
                        </div>
                    </div>
                    <div class="stat-value" id="totalOrders">1000</div>
                    <div class="stat-label">Total Employees</div>
                    <div class="stat-footer">
                        <i class="bi bi-clock"></i>
                        <span>Updated 5 mins ago</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 12%
                        </div>
                    </div>
                    <div class="stat-value" id="totalOrders">1000</div>
                    <div class="stat-label">Total Students</div>
                    <div class="stat-footer">
                        <i class="bi bi-clock"></i>
                        <span>Updated 5 mins ago</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 12%
                        </div>
                    </div>
                    <div class="stat-value" id="totalOrders">10</div>
                    <div class="stat-label">Total Enquiries</div>
                    <div class="stat-footer">
                        <i class="bi bi-clock"></i>
                        <span>Updated 5 mins ago</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon primary">
                            <i class="bi bi-receipt"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 12%
                        </div>
                    </div>
                    <div class="stat-value" id="totalOrders">1,547</div>
                    <div class="stat-label">Total Views Today</div>
                    <div class="stat-footer">
                        <i class="bi bi-clock"></i>
                        <span>Updated 5 mins ago</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon success">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 8.5%
                        </div>
                    </div>
                    <div class="stat-value" id="totalRevenue">$24,580</div>
                    <div class="stat-label">Revenue Today</div>
                    <div class="stat-footer">
                        <i class="bi bi-graph-up"></i>
                        <span>vs $22,650 yesterday</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon warning">
                            <i class="bi bi-bicycle"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 3.2%
                        </div>
                    </div>
                    <div class="stat-value" id="activeRiders">87</div>
                    <div class="stat-label">Active Courses</div>
                    <div class="stat-footer">
                        <i class="bi bi-geo-alt"></i>
                        <span>25 on Active</span>
                    </div>
                </div>

                <div class="stat-card">
                    <div class="stat-header">
                        <div class="stat-icon info">
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="stat-trend up">
                            <i class="bi bi-arrow-up"></i> 0.3
                        </div>
                    </div>
                    <div class="stat-value">4.8</div>
                    <div class="stat-label">Average Rating</div>
                    <div class="stat-footer">
                        <i class="bi bi-chat-left-dots"></i>
                        <span>From 2,341 reviews</span>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3>Website Analytics</h3>
                            <div class="chart-filters">
                                <button class="filter-btn active">Day</button>
                                <button class="filter-btn">Week</button>
                                <button class="filter-btn">Month</button>
                                <button class="filter-btn">Year</button>
                            </div>
                        </div>
                        <canvas id="revenueChart" height="80"></canvas>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="chart-card">
                        <div class="chart-header">
                            <h3> Status</h3>
                        </div>
                        <canvas id="orderStatusChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="table-card">
                <div class="table-header">
                    <h2 style="margin:0px 35% 0px 35%;">Recent Web Enquiries</h2>
                </div>
                <div class="table-card"></div>
                <div class="table-responsive">
                    <table class="custom-table" id="WebEnqTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Looking For</th>
                                <th>Registered Date</th>
                                <th>College Name</th>
                                <th>Department</th>
                                <th>Year</th>
                                <th>Remarks</th>
                                <th><i class="fas fa-ellipsis-h"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Sam</td>
                                <td>+1 2345678900</td>
                                <td>Internship Training</td>
                                <td>12 Jan 2024</td>
                                <td>ABC COllege</td>
                                <td>BCA</td>
                                <td>2nd year</td>
                                <td>Internship details</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-icon-btn"><i class="bi bi-eye"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-pencil"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sam</td>
                                <td>+1 2345678900</td>
                                <td>Internship Training</td>
                                <td>12 Jan 2024</td>
                                <td>ABC COllege</td>
                                <td>BCA</td>
                                <td>2nd year</td>
                                <td>Internship details</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-icon-btn"><i class="bi bi-eye"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-pencil"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sam</td>
                                <td>+1 2345678900</td>
                                <td>Internship Training</td>
                                <td>12 Jan 2024</td>
                                <td>ABC COllege</td>
                                <td>BCA</td>
                                <td>2nd year</td>
                                <td>Internship details</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-icon-btn"><i class="bi bi-eye"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-pencil"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sam</td>
                                <td>+1 2345678900</td>
                                <td>Internship Training</td>
                                <td>12 Jan 2024</td>
                                <td>ABC COllege</td>
                                <td>BCA</td>
                                <td>2nd year</td>
                                <td>Internship details</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-icon-btn"><i class="bi bi-eye"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-pencil"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sam</td>
                                <td>+1 2345678900</td>
                                <td>Internship Training</td>
                                <td>12 Jan 2024</td>
                                <td>ABC COllege</td>
                                <td>BCA</td>
                                <td>2nd year</td>
                                <td>Internship details</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-icon-btn"><i class="bi bi-eye"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-pencil"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Sam</td>
                                <td>+1 2345678900</td>
                                <td>Internship Training</td>
                                <td>12 Jan 2024</td>
                                <td>ABC COllege</td>
                                <td>BCA</td>
                                <td>2nd year</td>
                                <td>Internship details</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-icon-btn"><i class="bi bi-eye"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-pencil"></i></button>
                                        <button class="action-icon-btn"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
            $('#WebEnqTable').DataTable({
            scrollX: true,
autoWidth: false,
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
