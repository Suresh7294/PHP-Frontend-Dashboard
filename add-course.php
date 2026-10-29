<?php
session_start();
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    include "includes/dbcon.php";
    $id_query = "select ifnull(max(c_id_auto),0) from tbl_register_course";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;
    $pre = "COURSE";
    $course_id = $pre . "_" . $auto_id;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Live Stream Technologies</title>
        <link rel="icon" type="image/png" href="./assets/images/Lst logo.png">
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
        <link href="./assets/icons/fontawesome/css/fontawesome.min.css" rel="stylesheet">
        <link href="./assets/icons/fontawesome/css/brands.min.css" rel="stylesheet">
        <link href="./assets/icons/fontawesome/css/solid.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <script>
            function onlyNumber(event) {
                let charCode = event.which || event.keyCode;

                // Allow only digits (0-9)
                if (charCode >= 48 && charCode <= 57) {
                    return true;
                }
                return false;
            }
        </script>
    </head>

    <body>
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <a class="logo" href="add-course.php">
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
                        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 gap-3">
                        <div>
                            <h1>Add New Course</h1>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="L-course.php" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>

                <form id="addNewcus" action="insert_course.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <!-- Personal Information -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-2"><i class="fas fa-user me-2"></i>Course Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">course ID *</label>
                                            <input type="text" class="form-control" id="" name="c_id"
                                                value="<?= $course_id ?>" readonly required>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Course Name *</label>
                                            <input type="text" class="form-control" id="" name="c_name" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea class="form-control" id="" rows="3" name="c_desc" required></textarea>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Category *</label>
                                            <select class="form-select" id="" name="c_category" required>
                                                <option value="">--Select Category--</option>
                                                <option value="Course Training">Course Training</option>
                                                <option value="Internship Training">Internship Training</option>
                                                <option value="Inplan Training">Inplan Training</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Course Fees *</label>
                                            <input type="text" class="form-control" name="c_fees" required maxlength="10"
                                                onkeypress="return onlyNumber(event);">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Minimum Duration*</label>
                                            <input type="text" class="form-control" placeholder="in days" name="c_min_dur"
                                                required>
                                        </div>

                                        <div class="mb-4 col-md-6">
                                            <label class="form-label">Maximum Duration *</label>
                                            <input type="text" class="form-control" placeholder="in months" name="c_max_dur"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <!-- Profile Photo -->
                            <div class="card mb-4 ">
                                <div class="card-header">
                                    <h5><i class="fas fa-image"></i> Course Image</h5>
                                </div>
                                <div class="card-body">
                                    <div class="image-upload-container">
                                        <div class="image-preview" id="imagePreview" style="height: 215px;">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Click or drag image here</p>
                                            <small>Recommended: 800x600px</small>
                                        </div>
                                        <input type="file" name="c_img" id="Images" accept="image/png"
                                            style="display: none;">
                                        <button type="button" class="btn btn-primary w-100 mt-2"
                                            onclick="document.getElementById('Images').click()">
                                            <i class="fas fa-upload"></i> Choose Image
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Status -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-1"><i class="fas fa-toggle-on me-2"></i>Course Status</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-1">
                                        <label class="form-label">Course Status</label>
                                        <select class="form-select" id="accountStatus" name="status" required>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Suspended">Suspended</option>
                                            <option value="Blocked">Blocked</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="col-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary w-100 mb-2">
                                        <i class="fas fa-check me-2"></i>Add Course
                                    </button>
                                    <a href="L-course.php" class="btn btn-outline-danger w-100">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                </div>
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
    </body>

    </html>
    <?php
} else {
    ?>
    <script>alert("No Sessions Found"); location.href = 'index.php';</script>
    <?php
}
?>