<?php
session_start();
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    require "includes/dbcon.php";
    $query = "select * from tbl_new_enquiry where delete_tab='0' order by enquiry_id desc";
    $result = mysqli_query($con, $query);

    $enquirycount = "select count(*) from tbl_new_enquiry";
    $e_result = mysqli_query($con, $enquirycount);
    list($totalenquiries) = mysqli_fetch_array($e_result);

    $webenquirycount = "select count(*) from tbl_new_enquiry where enquiry_type='Web Enquiry'";
    $web_result = mysqli_query($con, $webenquirycount);
    list($totalwebenquiries) = mysqli_fetch_array($web_result);

    $jobseekercount = "select count(*) from tbl_new_enquiry where enquiry_type='Job Seeker'";
    $job_result = mysqli_query($con, $jobseekercount);
    list($totaljobseekers) = mysqli_fetch_array($job_result);

    $passstdcount = "select COUNT(pg_passedout_year),count(ug_passedout_year) from tbl_new_enquiry where pg_passedout_year is not null or ug_passedout_year is not null";
    $p_result = mysqli_query($con, $passstdcount);
    list($totalpassstd) = mysqli_fetch_array($p_result);
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

            #EnqTable tbody tr:nth-child(even) {
                background-color: #252f3c;
            }

            #EnqTable tbody tr:hover {
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

            #EnqTable {
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

            #modalpgclg {
                overflow: hidden;
                white-space: nowrap;
                scrollbar-width: none;
                /* Firefox */
                -ms-overflow-style: none;
                /* Older Edge/IE */
            }

            #modalpgclg::-webkit-scrollbar {
                display: none;
                /* Chrome, Safari, newer Edge */
            }

            .pg-college-marquee {
                display: inline-block;
            }

            .pg-college-marquee.is-overflowing {
                animation: pg-college-scroll 5s linear infinite;
            }

            @keyframes pg-college-scroll {
                from {
                    transform: translateX(100%);
                }

                to {
                    transform: translateX(-100%);
                }
            }
        </style>
    </head>

    <body>
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a class="logo" href="L-enquiry.php">
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
                    <a href="L-enquiry.php" class="nav-link active">
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
                    <a href="L-event.php" class="nav-link ">
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
                            <h1>All Enquiries
                                <i class="fas fa-info-circle"></i>
                            </h1>

                        </div>
                        <div class="d-flex gap-2">
                            <a href="add-enquiry.php" class="btn btn-primary">
                                <i class="fas fa-plus"></i> New Enquiry
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="bi bi-question-circle-fill"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id=""><?= $totalenquiries ?></h3>
                                <p>Total Enquiry</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <a href="webEnquiryList.php" style="text-decoration: none; color: inherit;">
                            <div class="filter-card">
                                <div class="filter-icon"
                                    style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                    <i class="bi bi-browser-chrome"></i>
                                </div>
                                <div class="filter-info">
                                    <h3 id="activeCustomers"><?= $totalwebenquiries ?></h3>
                                    <p>Total Web Enquiries</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <a href="JobSeekersList.php" style="text-decoration: none; color: inherit;">
                            <div class="filter-card">
                                <div class="filter-icon"
                                    style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                    <i class="bi bi-person-badge-fill"></i>
                                </div>
                                <div class="filter-info">
                                    <h3 id="vipCustomers"><?= $totaljobseekers ?></h3>
                                    <p>Job Seekers List</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <a href="PassStdList.php" style="text-decoration: none; color: inherit;">
                            <div class="filter-card">
                                <div class="filter-icon"
                                    style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                    <i class="bi bi-award"></i>
                                </div>
                                <div class="filter-info">
                                    <h3 id="avgSpend"><?= $totalpassstd ?></h3>
                                    <p>Pass-out Students</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-header">
                        <h2 style="margin:0px 35% 0px 35%;">Total Enquiry List</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="custom-table" id="EnqTable">
                            <thead style="white-space:nowrap; padding: 10px 0px 20px 0px; background-color: #051b3b;">
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Email ID</th>
                                    <th>Phone Number</th>
                                    <th>Degree</th>
                                    <th>College Name</th>
                                    <th>Course</th>
                                    <th>Enquiry Type</th>
                                    <th>Counselor</th>
                                    <th>Feedback</th>
                                    <th>Enquiry Date</th>
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
                                            <td><?= $row[2] ?></td>
                                            <td><?= $row[4] ?></td>
                                            <td><?= $row[6] ?></td>
                                            <td><?= $row[10] ?> & <?= $row[13] ?> </td>
                                            <td><?= $row[12] ?></td>
                                            <td><?= $row[29] ?></td>
                                            <td><?= $row[28] ?></td>
                                            <td><?= $row[30] ?></td>
                                            <td><?= $row[31] ?></td>
                                            <td><?= $row[32] ?></td>
                                            <td>
                                                <select class="form-select"
                                                    style="border: none;height: auto;color: #94a3b8;width: auto;">
                                                    <option value="Pending"><span class="badge bg-warning">WARM</span></option>
                                                    <option value="Selected"><span class="badge bg-success">COLD</span></option>
                                                    <option value="Rejected"><span class="badge bg-danger">HOT</span></option>
                                                </select>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="action-icon-btn" data-bs-toggle="modal"
                                                        data-bs-target="#enquiryModal" data-enquiry-id="<?= $row[1] ?>"
                                                        data-enquiry-name="<?= $row[2] ?>" data-enquiry-fathername="<?= $row[3] ?>"
                                                        data-enquiry-email="<?= $row[4] ?>" data-enquiry-address="<?= $row[5] ?>"
                                                        data-enquiry-phone="<?= $row[6] ?>" data-enquiry-altphone="<?= $row[7] ?>"
                                                        data-enquiry-dob="<?= $row[8] ?>" data-enquiry-ugdegree="<?= $row[10] ?>"
                                                        data-enquiry-gender="<?= $row[9] ?>" data-enquiry-ugyr="<?= $row[11] ?>"
                                                        data-enquiry-ugclg="<?= $row[12] ?>" data-enquiry-pgdegree="<?= $row[13] ?>"
                                                        data-enquiry-pgyr="<?= $row[14] ?>" data-enquiry-pgclg="<?= $row[15] ?>"
                                                        data-enquiry-otherdegree="<?= $row[16] ?>"
                                                        data-enquiry-background="<?= $row[17] ?>"
                                                        data-enquiry-designation="<?= $row[18] ?>"
                                                        data-enquiry-experience="<?= $row[19] ?>"
                                                        data-enquiry-company="<?= $row[20] ?>"
                                                        data-enquiry-earlycourse="<?= $row[21] ?>"
                                                        data-enquiry-earlycourseloc="<?= $row[22] ?>"
                                                        data-enquiry-reason="<?= $row[23] ?>"
                                                        data-enquiry-otherreason="<?= $row[24] ?>"
                                                        data-enquiry-course="<?= $row[25] ?>" data-enquiry-message="<?= $row[26] ?>"
                                                        data-enquiry-othercourse="<?= $row[27] ?>"
                                                        data-enquiry-enquirytype="<?= $row[28] ?>"
                                                        data-enquiry-recmcourse="<?= $row[29] ?>"
                                                        data-enquiry-counselor="<?= $row[30] ?>"
                                                        data-enquiry-feedback="<?= $row[31] ?>"
                                                        data-enquiry-enquirydate="<?= $row[32] ?>"
                                                        data-enquiry-course_duration="<?= $row[33] ?>"
                                                        data-enquiry-admin_notes="<?= $row[34] ?>"
                                                        data-enquiry-img="<?= $row[35] ?>" data-enquiry-status="<?= $row[36] ?>"><i
                                                            class="bi bi-eye"></i></button>
                                                    <a href="edit_enquiry_form.php?q=<?= $row[1] ?>"> <button
                                                            class="action-icon-btn"><i class="bi bi-pencil"></i></button></a>
                                                    <a href="delete_enquiry.php?q=<?= $row[1] ?>"> <button
                                                            class="action-icon-btn"><i class="bi bi-trash"></i></button></a>
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

                <div id="enquiryModal" class="modal fade" tabindex="-1">

                    <div class="modal-dialog modal-lg">

                        <div class="modal-content">

                            <!-- HEADER -->
                            <div class="modal-header">

                                <h5 class="mb-0">
                                    <i class="fas fa-user-circle me-2"></i>
                                    Enquiry Details
                                </h5>

                                <div class="ms-auto d-flex">
                                    <button type="button" class="btn-close mt-1" data-bs-dismiss="modal">
                                    </button>
                                </div>

                            </div>


                            <!-- BODY -->
                            <div class="modal-body">

                                <div id="invoiceArea">

                                    <!-- Enquiry INFORMATION -->
                                    <div class="card mb-3">

                                        <div class="card-body">

                                            <div class="row g-3">
                                                <div class="col-md-8">

                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Enquiry ID
                                                            </label>

                                                            <div class="form-control" id="modalenquiryId">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Full Name
                                                            </label>

                                                            <div class="form-control" id="modalname">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Father's Name
                                                            </label>

                                                            <div class="form-control" id="modalfname">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Email ID
                                                            </label>

                                                            <div class="form-control" id="modalemailid">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Mobile Number
                                                            </label>

                                                            <div class="form-control" id="modalphone">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Alternate Mobile
                                                            </label>

                                                            <div class="form-control" id="modalaltphone">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Date of Birth
                                                            </label>

                                                            <div class="form-control" id="modaldob">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Gender
                                                            </label>

                                                            <div class="form-control" id="modalgender">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Address
                                                            </label>

                                                            <div class="form-control" id="modaladdress">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                UG Graduate in
                                                            </label>

                                                            <div class="form-control" id="modalugdegree">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                UG - Passdout Year
                                                            </label>

                                                            <div class="form-control" id="modalugyr">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                UG - College Name
                                                            </label>

                                                            <div class="form-control" id="ugclg">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                PG Graduate in
                                                            </label>

                                                            <div class="form-control" id="modalpgdegree">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                PG - Passdout Year
                                                            </label>

                                                            <div class="form-control" id="modalpgyr">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                PG - College Name
                                                            </label>

                                                            <div class="form-control" id="modalpgclg">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Other Degree
                                                            </label>

                                                            <div class="form-control" id="modalother">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Background
                                                            </label>

                                                            <div class="form-control" id="modalbackground">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Designation
                                                            </label>

                                                            <div class="form-control" id="modaldesignation">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Experience
                                                            </label>

                                                            <div class="form-control" id="modalexperience">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Company/Location
                                                            </label>

                                                            <div class="form-control" id="modallocation">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Early Course
                                                            </label>

                                                            <div class="form-control" id="modalearlycourse">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Early Course Location
                                                            </label>

                                                            <div class="form-control" id="modalearcouloc">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Reason
                                                            </label>

                                                            <div class="form-control" id="modalreason">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Other Reason
                                                            </label>

                                                            <div class="form-control" id="modalothreason">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Course Duration
                                                            </label>

                                                            <div class="form-control" id="modaldur">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Other Course
                                                            </label>

                                                            <div class="form-control" id="modalothcourse">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4">

                                                            <label class="form-label">
                                                                Message
                                                            </label>

                                                            <div class="form-control" id="modalmessage">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row g-3">



                                                        <div class="col-md-12">

                                                            <label class="form-label">
                                                                Admin Notes
                                                            </label>

                                                            <div class="form-control" id="modalnotes">
                                                            </div>

                                                        </div>



                                                    </div>


                                                </div>
                                                <div class="col-md-4">

                                                    <!-- PROFILE PHOTO -->
                                                    <div class="card col-md-12" style="height: 315px;">
                                                        <div class="card-header">
                                                            <h6 class="mb-0">
                                                                <i class="fas fa-image me-2"></i>
                                                                Candidate Image
                                                            </h6>
                                                        </div>

                                                        <div class="card-body text-center" style="height: 75%;">
                                                            <img id="modalImage" src="" alt="Profile"
                                                                style=" width:100%;height:100%;object-fit:cover;">
                                                        </div>

                                                    </div>


                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Enquiry Mode
                                                        </label>

                                                        <div class="form-control" id="modalmode">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Recommended Course
                                                        </label>

                                                        <div class="form-control" id="modalreccourse">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Recommended By
                                                        </label>

                                                        <div class="form-control" id="modalrecby">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Feedback
                                                        </label>

                                                        <div class="form-control" id="modalfeedback">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Enquiry Date
                                                        </label>

                                                        <div class="form-control" id="modalenqdate">
                                                        </div>

                                                    </div>


                                                    <div class="col-md-12">

                                                        <label class="form-label">
                                                            Course Status
                                                        </label>

                                                        <div class="form-control" id="modalstatus">
                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-12">

                                                    <label class="form-label">
                                                        Course Interested
                                                    </label>

                                                    <div class="form-control" id="modalcourse">
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
                $('#EnqTable').DataTable({
                    scrollX: true,
                    autoWidth: false,
                    dom:
                        "<'row align-items-center mb-3'\<'col-md-6 d-flex align-items-center gap-3'lB>\<'col-md-6 d-flex justify-content-md-end justify-content-start mt-2 mt-md-0'f>\>" + "<'row'<'col-12'tr>>" + "<'row mt-3'\ <'col-md-6'i>\<'col-md-6 d-flex justify-content-end'p>\>",

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

            const enquiryModal = document.getElementById('enquiryModal');

            enquiryModal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                document.getElementById('modalenquiryId').textContent =
                    button.getAttribute('data-enquiry-id');

                document.getElementById('modalname').textContent =
                    button.getAttribute('data-enquiry-name');

                document.getElementById('modalfname').textContent =
                    button.getAttribute('data-enquiry-fathername');

                document.getElementById('modalemailid').textContent =
                    button.getAttribute('data-enquiry-email');

                document.getElementById('modaladdress').textContent =
                    button.getAttribute('data-enquiry-address');

                document.getElementById('modalphone').textContent =
                    button.getAttribute('data-enquiry-phone');

                document.getElementById('modalaltphone').textContent =
                    button.getAttribute('data-enquiry-altphone');

                document.getElementById('modaldob').textContent =
                    button.getAttribute('data-enquiry-dob');

                document.getElementById('modalgender').textContent =
                    button.getAttribute('data-enquiry-gender');

                document.getElementById('modalugdegree').textContent =
                    button.getAttribute('data-enquiry-ugdegree');

                document.getElementById('modalugyr').textContent =
                    button.getAttribute('data-enquiry-ugyr');

                document.getElementById('ugclg').textContent =
                    button.getAttribute('data-enquiry-ugclg');

                document.getElementById('modalpgdegree').textContent =
                    button.getAttribute('data-enquiry-pgdegree');

                document.getElementById('modalpgyr').textContent =
                    button.getAttribute('data-enquiry-pgyr');

                const pgCollege = document.getElementById('modalpgclg');
                const pgCollegeText = document.createElement('span');
                pgCollegeText.className = 'pg-college-marquee';
                pgCollegeText.textContent = button.getAttribute('data-enquiry-pgclg') || '';
                pgCollege.replaceChildren(pgCollegeText);


                document.getElementById('modalother').textContent =
                    button.getAttribute('data-enquiry-otherdegree');

                document.getElementById('modalbackground').textContent =
                    button.getAttribute('data-enquiry-background');

                document.getElementById('modaldesignation').textContent =
                    button.getAttribute('data-enquiry-designation');

                document.getElementById('modalexperience').textContent =
                    button.getAttribute('data-enquiry-experience');

                document.getElementById('modallocation').textContent =
                    button.getAttribute('data-enquiry-company');

                document.getElementById('modalearlycourse').textContent =
                    button.getAttribute('data-enquiry-earlycourse');

                document.getElementById('modalearcouloc').textContent =
                    button.getAttribute('data-enquiry-earlycourseloc');

                document.getElementById('modalreason').textContent =
                    button.getAttribute('data-enquiry-reason');

                document.getElementById('modalothreason').textContent =
                    button.getAttribute('data-enquiry-otherreason');

                document.getElementById('modalcourse').textContent =
                    button.getAttribute('data-enquiry-course');

                document.getElementById('modalmessage').textContent =
                    button.getAttribute('data-enquiry-message');

                document.getElementById('modalothcourse').textContent =
                    button.getAttribute('data-enquiry-othercourse');

                document.getElementById('modalmode').textContent =
                    button.getAttribute('data-enquiry-enquirytype');

                document.getElementById('modalreccourse').textContent =
                    button.getAttribute('data-enquiry-recmcourse');

                document.getElementById('modalrecby').textContent =
                    button.getAttribute('data-enquiry-counselor');

                document.getElementById('modalfeedback').textContent =
                    button.getAttribute('data-enquiry-feedback');

                document.getElementById('modalenqdate').textContent =
                    button.getAttribute('data-enquiry-enquirydate');

                document.getElementById('modaldur').textContent =
                    button.getAttribute('data-enquiry-course_duration');

                document.getElementById('modalnotes').textContent =
                    button.getAttribute('data-enquiry-admin_notes');

                document.getElementById('modalstatus').textContent =
                    button.getAttribute('data-enquiry-status');



                const image = button.getAttribute('data-enquiry-img');

                if (image) {

                    document.getElementById('modalImage').src =
                        './assets/enquiry_images/' + image;

                } else {

                    document.getElementById('modalImage').src =
                        './assets/images/profile.png';

                }

                const resume = button.getAttribute('data-enquiry-resume');
                const resumeLink = document.getElementById('modalenquiryResume');

                if (resume) {
                    resumeLink.href = './assets/enquiry_resume/' + encodeURIComponent(resume);
                    resumeLink.hidden = false;
                    resumeLink.textContent = 'View Resume';
                } else {
                    resumeLink.removeAttribute('href');
                    resumeLink.hidden = false;
                    resumeLink.textContent = 'No resume available';
                }
            });

            enquiryModal.addEventListener('shown.bs.modal', function () {
                const pgCollege = document.getElementById('modalpgclg');
                const pgCollegeText = pgCollege.querySelector('.pg-college-marquee');
                const styles = getComputedStyle(pgCollege);
                const availableWidth = pgCollege.clientWidth -
                    parseFloat(styles.paddingLeft) - parseFloat(styles.paddingRight);

                pgCollegeText.classList.toggle('is-overflowing', pgCollegeText.scrollWidth > availableWidth);
            });

        </script>

    </body>

    </html>
    <?php
} else {
    ?>
    <script>alert('No Sessions Found'); location.href = 'index.php';</script>
    <?php
}
?>