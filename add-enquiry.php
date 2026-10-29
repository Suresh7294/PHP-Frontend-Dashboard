<?php
session_start();
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    include "includes/dbcon.php";
    $id_query = "select ifnull(max(e_id_auto),0) from tbl_new_enquiry";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;
    $pre = "ENQ ";
    $enquiry_id = $pre . "_" . $auto_id;
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
    </head>

    <body>
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a class="logo" href="add-enquiry.php">
                    <img src="./assets/images/Lst logo.png" alt="not found" style="height: 50px;margin:auto;width: 50px;">
                    <span>Live Stream Technologies</span>
                </a>
                <button class="menu-toggle" id="menuToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="mainpage.php" class="nav-link">
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
                            <a class="all-notification" href="logout.php">See all notifications <i
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
                                    <a class="dropdown-item text-danger" href="#"><i
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
                            <h1>Add New Enquiry</h1>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="L-enquiry.php" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>

                <form id="addnewEnquiryForm" action="insert_newenquiry.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Main Form -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <!-- Personal Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-user me-2"></i>Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Enquiry ID *</label>
                                            <input type="text" class="form-control" id="" name="e_id"
                                                value="<?= $enquiry_id ?>" readonly required="">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Full Name *</label>
                                            <input type="text" class="form-control" name="full_name" id="firstName" required
                                                oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Father's / Guardian's Name *</label>
                                            <input type="text" class="form-control" name="father_name" id="lastName"
                                                required
                                                oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" name="email" id="email" required=""
                                                oninput="this.value = this.value.toLowerCase();">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Mobile Number *</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" required=""
                                                maxlength="10">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Alternate Mobile Number *</label>
                                            <input type="text" class="form-control" name="alt_mobile" id="phone" required=""
                                                maxlength="10">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Date of Birth *</label>
                                            <input type="date" class="form-control" name="dob" id="dob" required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Gender *</label>
                                            <select class="form-select" name="gender" id="gender" required="">
                                                <option value="">-- Select Gender --</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Address *</label>
                                        <input type="text" class="form-control" name="address" id="address" placeholder=""
                                            required>
                                    </div>

                                </div>
                            </div>

                            <!-- Qualification -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-motorcycle me-2"></i>Qualification</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">UG Graduate in *</label>
                                            <input type="text" class="form-control" id="ug_degree" name="ug_degree" required
                                                oninput="this.value = this.value.toUpperCase();">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">UG - Passdout Year</label>
                                            <input type="text" class="form-control" id="ug_year" name="ug_year" min="2015"
                                                max="2100" step="1" value="2015" pattern="[0-9]{4}" maxlength="4"
                                                placeholder="YYYY">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">UG - College Name</label>
                                        <input type="text" class="form-control" id="ug_college" name="ug_college"
                                            oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">PG Graduate in *</label>
                                            <input type="text" class="form-control" id="pg_degree" name="pg_degree" required
                                                oninput="this.value = this.value.toUpperCase();">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">PG - Passdout Year</label>
                                            <input type="text" class="form-control" id="pg_year" name="pg_year"
                                                pattern="[0-9]{4}" maxlength="4" placeholder="YYYY" min="2015" max="2100"
                                                step="1" value="2015">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">PG - College Name</label>
                                        <input type="text" class="form-control" id="pg_college" name="pg_college"
                                            oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Others</label>
                                        <input type="text" class="form-control" id="others-degree"
                                            name="others_qualification" placeholder="Currently Pursuing Course"
                                            oninput="this.value = this.value.toUpperCase();">
                                    </div>
                                </div>
                            </div>

                            <!-- backgorund  -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-university me-2"></i>Background</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-1 ms-3 ">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" id="student"
                                                        name="background" value="Student">
                                                    <label class="form-check-label" for="student">Student</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="employee"
                                                        name="background" value="Employee">
                                                    <label class="form-check-label" for="employee">Employee</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="jobseeker"
                                                        name="background" value="Job Seeker">
                                                    <label class="form-check-label" for="jobseeker">Job Seeker</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="background"
                                                        id="other_background" value="Others">
                                                    <label class="form-check-label" for="others">Others</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Employee Details -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-phone-alt me-2"></i>Employee Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Designation *</label>
                                            <input type="text" class="form-control" id="designation" name="designation"
                                                required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Experience *</label>
                                            <input type="text" class="form-control" id="experience" name="experience"
                                                required="">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Company / Location *</label>
                                            <input type="text" class="form-control" id="company_location" name="location"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Computer Course Details -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-university me-2"></i>Have you done a Computer Course
                                        earlier?</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="early_course"
                                                        id="course_yes" value="yes">
                                                    <label class="form-check-label" for="course_yes">Yes</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="early_course"
                                                        id="course_no" value="no">
                                                    <label class="form-check-label" for="course_no">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3" style="display: none;" id="courseDetails">
                                        <label class="form-label">If Yes, From Where? *</label>
                                        <input type="text" class="form-control" id="courseFrom" name="early_course_loc"
                                            required="">
                                    </div>
                                </div>
                            </div>

                            <!-- objective -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-phone-alt me-2"></i>What is your objective in taking
                                        up a computer course?</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="reason"
                                                        id="course_study" value="For a career in computer">
                                                    <label class="form-check-label" for="course_study">For a carrer in
                                                        computer</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="reason"
                                                        id="for_work" value="For applying in work area">
                                                    <label class="form-check-label" for="for_work">For applying in work
                                                        area</label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="reason" id="others"
                                                        value="Others">
                                                    <label class="form-check-label" for="others">Others</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3" style="display: none;" id="showOthersExplain">
                                        <label class="form-label">If Others, Explain why? *</label>
                                        <input type="text" class="form-control" id="others_explain" name="other_reason"
                                            placeholder="Explain why you want to take up a computer course">
                                    </div>

                                </div>
                            </div>


                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <!-- Profile Photo -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5><i class="fas fa-image"></i> Profile Photo</h5>
                                </div>
                                <div class="card-body">
                                    <div class="image-upload-container">
                                        <div class="image-preview" id="imagePreview">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Click or drag image here</p>
                                            <small>Recommended: 800x600px</small>
                                        </div>
                                        <input type="file" id="Images" accept="image/*" style="display: none;" name="e_img">
                                        <button type="button" class="btn btn-primary w-100 mt-3"
                                            onclick="document.getElementById('Images').click()">
                                            <i class="fas fa-upload"></i> Choose Image
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0"><i class="fas fa-university me-2"></i>Interested in:</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Android + PHP + MySQL">

                                                    <label class="form-check-label" for="student">Android + PHP +
                                                        MySQL</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="PHP + MySQL + MongoDB">

                                                    <label class="form-check-label" for="employee">PHP + MySQL +
                                                        MongoDB</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Python + MySQL + MongoDB">

                                                    <label class="form-check-label" for="student">Python + MySQL +
                                                        MongoDB</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="J2EE / JSEE">
                                                    <label class="form-check-label" for="student">J2EE / JSEE</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Jquery">
                                                    <label class="form-check-label" for="employee">Jquery</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="NodeJS + MySQL + MongoDB">

                                                    <label class="form-check-label" for="student">NodeJS + MySQL +
                                                        MongoDB</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Laravel framework">
                                                    <label class="form-check-label" for="employee">Laravel framework</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Django framework">
                                                    <label class="form-check-label" for="student">Django framework</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Python">
                                                    <label class="form-check-label" for="student">Python</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="AIML">
                                                    <label class="form-check-label" for="student">AIML</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="AIDS">
                                                    <label class="form-check-label" for="student">AIDS</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Artificial Intelligence with Python">
                                                    <label class="form-check-label" for="student">Artificial Intelligence
                                                        with Python</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Machine Learning with Python">
                                                    <label class="form-check-label" for="employee">Machine Learning with
                                                        Python</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Java">
                                                    <label class="form-check-label" for="employee">Java</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="course[]"
                                                        value="Cyber Security">
                                                    <label class="form-check-label" for="employee">Cyber Security</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Other Course *</label>
                                        <input type="text" class="form-control"
                                            placeholder="Enter Other Interested Course Name" required name="other_course"
                                            oninput="this.value = this.value.toUpperCase();">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Message *</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Message" required
                                            name="message">
                                    </div>
                                </div>
                            </div>

                            <!-- Office Usage -->

                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4 class="mb-0"><i class="fas fa-building   me-2"></i>For office use only</h4>
                                    <hr>
                                    <h6 class="mb-0"><i class="fas fa-type  me-2"></i>Mode Of Enquiry</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row ms-2">
                                        <div class="col-md-12 mb-4">
                                            <div class="d-flex gap-5 flex-wrap mt-2">
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="enquiry_type"
                                                        id="student" value="Direct Walk-in">
                                                    <label class="form-check-label" for="student">Direct Walk-in</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input " type="radio" name="enquiry_type"
                                                        id="student" value="Telephone Enquiry">
                                                    <label class="form-check-label" for="student">Telephone Enquiry</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Course recommended: *</label>
                                            <input type="text" class="form-control" id=" " name="recommendated_course"
                                                required oninput="this.value = this.value.toUpperCase();">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Recommended by *</label>
                                            <input type="text" class="form-control" id=" " name="counselor_name"
                                                placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Feedback *</label>
                                        <input type="text" class="form-control" id=" " name="feedback" placeholder=""
                                            required="">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 mb-3">
                                            <label class="form-label">Enquiry Date *</label>
                                            <input type="date" class="form-control" id=" " name="enquiry_date" required="">
                                        </div>
                                        <div class="col-md-7 mb-3">
                                            <label class="form-label">Course Duration *</label>
                                            <input type="text" class="form-control" placeholder="eg: 3 months / 90 days"
                                                name="course_duration" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- Notes -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5 class="mb-1"><i class="fas fa-sticky-note me-2"></i>Admin Notes</h5>
                                </div>
                                <div class="card-body mb-1">
                                    <textarea class="form-control" id="adminNotes" rows="1"
                                        placeholder="Add any internal notes about this Enquiry..."
                                        name="admin_notes"></textarea>
                                </div>
                            </div>


                        </div>
                        <!-- Action Buttons -->
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary w-100 mb-2">
                                    <i class="fas fa-check me-2"></i>Add Enquiry
                                </button>
                                <button type="button" class="btn btn-outline-danger w-100"
                                    onclick="window.location.href='L-enquiry.php'">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </form>



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
            const yesRadio = document.getElementById("course_yes");
            const noRadio = document.getElementById("course_no");
            const courseDetails = document.getElementById("courseDetails");
            const courseFrom = document.getElementById("courseFrom");

            yesRadio.addEventListener("change", function () {
                if (this.checked) {
                    courseDetails.style.display = "block";
                    courseFrom.required = true;
                }
            });

            noRadio.addEventListener("change", function () {
                if (this.checked) {
                    courseDetails.style.display = "none";
                    courseFrom.required = false;
                    courseFrom.value = "";
                }
            });
        </script>

        <script>
            console.log("SCRIPT IS RUNNING");

            const others_1radio = document.getElementById("others");
            const course_1radio = document.getElementById("course_study");
            const job_1radio = document.getElementById("for_work");
            const yes_1explain = document.getElementById("showOthersExplain");
            const others_1explain = document.getElementById("others_explain");

            others_1radio.addEventListener("change", function () {

                if (this.checked) {
                    yes_1explain.style.display = "block";
                    others_1explain.required = true;

                }
            });

            course_1radio.addEventListener("change", function () {
                if (this.checked) {
                    yes_1explain.style.display = "none";
                    others_1explain.required = false;
                    others_1explain.value = "";
                }
            });

            job_1radio.addEventListener("change", function () {
                if (this.checked) {
                    yes_1explain.style.display = "none";
                    others_1explain.required = false;
                    others_1explain.value = "";
                }
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