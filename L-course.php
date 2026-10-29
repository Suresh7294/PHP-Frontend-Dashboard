<?php
session_start();
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    require "includes/dbcon.php";
    $query = "select * from tbl_register_course where delete_tab not like('%InActive%') order by course_id desc";
    $result = mysqli_query($con, $query);

    $coursecount = "select count(*) from tbl_register_course";
    $c_result = mysqli_query($con, $coursecount);
    list($totalcourse) = mysqli_fetch_array($c_result);

    $activecount = "select count(*) from tbl_register_course where delete_tab='Active'";
    $a_result = mysqli_query($con, $activecount);
    list($totalactivecourses) = mysqli_fetch_array($a_result);

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

            #CourseTable tbody tr:nth-child(even) {
                background-color: #252f3c;
            }

            #CourseTable tbody tr:hover {
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

            #CourseTable {
                text-align: center;
                border-radius: 15px;
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
                <a class="logo" href="L-course.php">
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
                    <a href="L-course.php" class="nav-link active">
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
                    <!--<img src="./assets/images/lst logo 3.png" alt="not found" width="200px" height="80px">-->
                    <h3>LIVE STREAM TECHNOLOGIES</H3>
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
                                <span class="badge-notification">5</span>
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
                    <div class="dropdown profile-dropdown">
                        <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" aria-expanded="false" role="button">
                            <div class="user-profile">
                                <div class="user-avatar"><img src="assets/images/profile_icon.png" width=50 height=50></div>
                                <div class="user-info">
                                    <h6><?= $username ?></h6>
                                    <p><?= $userrole ?></p>
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
                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
                        <div>
                            <h1>Course Management</h1>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="add-course.php" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i> Add New Course
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="bi bi-journal-bookmark-fill"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="totalCustomers"><?= $totalcourse ?></h3>
                                <p>Total Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                <i class="bi bi-play-circle"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="activeCustomers"><?= $totalactivecourses ?></h3>
                                <p>Active Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                <i class="bi bi-trophy-fill"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="vipCustomers">4</h3>
                                <p>VIP Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="avgSpend">5</h3>
                                <p>Highly Rated Courses</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-card">
                    <div class="table-header">
                        <h2 style="margin:0px 35% 0px 35%;">All Course List</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table" id="CourseTable">
                            <thead style="white-space: nowrap;">
                                <tr>
                                    <th>S.No</th>
                                    <th>Course ID</th>
                                    <th>Course Name</th>
                                    <th>Course Image</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Course Fees</th>
                                    <th style="white-space: wrap;">Minimum Duration <br><span
                                            style="white-space: nowrap;">(in days)</span></th>
                                    <th style="white-space: wrap;">Maximum Duration<br><span
                                            style="white-space: nowrap;">(in months)</span></th>
                                    <th>Status</th>
                                    <th><i class="fas fa-ellipsis-h"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_array($result)) {


                                        ?>
                                        <tr>
                                            <td><?= $row[0] ?></td>
                                            <td><?= $row[1] ?></td>
                                            <td><?= $row[2] ?></td>
                                            <?php
                                            if ($row[8] == "") {
                                                ?>
                                                <td><img src="./assets/images/book.png" alt="not found"
                                                        style="height: 50px;width: 50px;border-radius: 50px;"></td>
                                                <?php
                                            } else {
                                                ?>
                                                <td><a href="./assets/course_images/<?= $row[8] ?>"><img
                                                            src="./assets/course_images/<?= $row[8] ?>" alt="not found"
                                                            style="height: 50px;width: 50px;border-radius: 50px;"></a></td>
                                            <?php } ?>

                                            <td><?= $row[3] ?></td>
                                            <td><?= $row[4] ?></td>
                                            <td><?= $row[5] ?></td>
                                            <td><?= $row[6] ?></td>
                                            <td><?= $row[7] ?></td>

                                            <?php
                                            if ($row[9] == "Active") {
                                                ?>

                                                <td><span class="badge bg-success">Active</span></td>

                                                <?php
                                            } elseif ($row[9] == "Inactive") {
                                                ?>
                                                <td><span class="badge bg-primary">Inactive</span></td>

                                                <?php
                                            } elseif ($row[9] == "Suspended") {
                                                ?>
                                                <td><span class="badge bg-warning">Suspended</span></td>

                                                <?php
                                            } else {
                                                ?>
                                                <td><span class="badge bg-danger">Blocked</span></td>
                                                <?php
                                            }
                                            ?>


                                            <td>
                                                <div class="action-buttons">
                                                    <button class="action-icon-btn" data-bs-toggle="modal"
                                                        data-bs-target="#courseModal" data-course-id="<?= $row[1] ?>"
                                                        data-course-name="<?= $row[2] ?>" data-course-description="<?= $row[3] ?>"
                                                        data-course-category="<?= $row[4] ?>" data-course-price="<?= $row[5] ?>"
                                                        data-course-mindur="<?= $row[6] ?>" data-course-maxdur="<?= $row[7] ?>"
                                                        data-course-img="<?= $row[8] ?>" data-course-status="<?= $row[9] ?>">
                                                        <i class="bi bi-eye"></i></button>
                                                    <a href="edit_course_form.php?q=<?= $row[1] ?>"> <button
                                                            class="action-icon-btn"><i class="bi bi-pencil"></i></button></a>
                                                    <a href="delete_course.php?q=<?= $row[1] ?>"> <button class="action-icon-btn"><i
                                                                class="bi bi-trash"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Course Modal -->
                <div id="courseModal" class="modal fade" tabindex="-1">

                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                            <!-- HEADER -->
                            <div class="modal-header">

                                <h5 class="mb-0">
                                    <i class="fas fa-user-circle me-2"></i>
                                    Course Details
                                </h5>

                                <div class="ms-auto d-flex">
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="modal">
                                    </button>
                                </div>

                            </div>


                            <!-- BODY -->
                            <div class="modal-body">

                                <div id="invoiceArea">

                                    <!-- COURSE INFORMATION -->
                                    <div class="card mb-3">

                                        <div class="card-body">

                                            <div class="row g-3">
                                                <div class="col-md-6">

                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Course ID
                                                        </label>

                                                        <div class="form-control" id="modalcourseId">
                                                        </div>

                                                    </div>


                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Course Name
                                                        </label>

                                                        <div class="form-control" id="modalName">
                                                        </div>

                                                    </div>


                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Course Description
                                                        </label>

                                                        <div class="form-control" id="modalDescription">
                                                        </div>

                                                    </div>


                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Course Category
                                                        </label>

                                                        <div class="form-control" id="modalCategory">
                                                        </div>

                                                    </div>


                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Course Price
                                                        </label>

                                                        <div class="form-control" id="modalPrice">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Course Status
                                                        </label>

                                                        <div class="form-control" id="modalStatus">
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <!-- PROFILE PHOTO -->
                                                    <div class="card col-md-12" style="height: 315px;">
                                                        <div class="card-header">
                                                            <h6 class="mb-0">
                                                                <i class="fas fa-image me-2"></i>
                                                                Course Image
                                                            </h6>
                                                        </div>

                                                        <div class="card-body text-center" style="height: 75%;">
                                                            <img id="modalImage" src="" alt="Profile"
                                                                style=" width:100%;height:100%;object-fit:cover;">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Minimum Duration
                                                        </label>

                                                        <div class="form-control" id="modalMinimumDuration">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Maximum Duration
                                                        </label>

                                                        <div class="form-control" id="modalMaximumDuration">
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
                $('#CourseTable').DataTable({
                    scrollX: true,
                    autoWidth: false,
                    dom:
                        "<'row align-items-center mb-3'\<'col-md-6 d-flex align-items-center gap-3'lB>\<'col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0'f>\>" +
                        "<'row'<'col-12'tr>>" +
                        "<'row mt-3'\ <'col-md-6'i>\<'col-md-6 d-flex justify-content-end'p>\>",
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

        <!-- view-model script-->
        <script>

            const courseModal = document.getElementById('courseModal');

            courseModal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                document.getElementById('modalcourseId').textContent =
                    button.getAttribute('data-course-id');

                document.getElementById('modalName').textContent =
                    button.getAttribute('data-course-name');

                document.getElementById('modalDescription').textContent =
                    button.getAttribute('data-course-description');

                document.getElementById('modalCategory').textContent =
                    button.getAttribute('data-course-category');

                document.getElementById('modalPrice').textContent =
                    button.getAttribute('data-course-price');

                document.getElementById('modalMinimumDuration').textContent =
                    button.getAttribute('data-course-mindur');

                document.getElementById('modalMaximumDuration').textContent =
                    button.getAttribute('data-course-maxdur');



                document.getElementById('modalStatus').textContent =
                    button.getAttribute('data-course-status');


                const image = button.getAttribute('data-course-img');

                if (image) {

                    document.getElementById('modalImage').src =
                        './assets/course_images/' + image;

                } else {

                    document.getElementById('modalImage').src =
                        './assets/images/profile.png';

                }

            });

        </script>
        <!--model view  on-page-loader
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const modalElement = document.getElementById('AccountModal');

                const accountModal = new bootstrap.Modal(modalElement);
                accountModal.show();
            });
        </script>
         -->
    </body>

    </html>
    <?php
} else {
    #echo "session not found";
    ?>

    <script>alert('No Sessions Found'); location.href = 'index.php';</script>
    <?php
}
?>