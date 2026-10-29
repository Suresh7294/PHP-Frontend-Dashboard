<?php
session_start();
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    include "includes/dbcon.php";
    $id = $_GET["q"];
    $select_query = "select * from tbl_register_employee where emp_id = '$id'";
    $result = mysqli_query($con, $select_query);
    $row = mysqli_fetch_array($result);
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
                <a class="logo" href="add-employee.php">
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
                    <a href="L-Employees.php" class="nav-link active">
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
                            <h1>Edit Employee</h1>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="L-Employees.php" class="btn btn-outline-primary">
                                <i class="fas fa-arrow-left"></i> Back to List
                            </a>
                        </div>
                    </div>
                </div>

                <form id="addNewcus" action="edit_employee_validation.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                            <!-- Personal Information -->
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h5 class="mb-2"><i class="fas fa-user me-2"></i>Employee Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Employee ID *</label>
                                            <input type="text" class="form-control" id="S_ID" required name="e_emp_id"
                                                value="<?= $row[1] ?>" readonly>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">First Name *</label>
                                            <input type="text" class="form-control" id="name" required name="e_first_name"
                                                value="<?= $row[2] ?>"
                                                oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Last Name *</label>
                                            <input type="text" class="form-control" id="name" required name="e_last_name"
                                                value="<?= $row[3] ?>"
                                                oninput="this.value = this.value.charAt(0).toUpperCase() + this.value.slice(1);">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-4">
                                            <label class="form-label">Qualification *</label>
                                            <input type="text" class="form-control" id="" required name="e_qualification"
                                                value="<?= $row[6] ?>" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Joining Date *</label>
                                            <input type="date" class="form-control" id="" required name="e_joining_date"
                                                value="<?= $row[7] ?>">
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Salary Package *</label>
                                            <input type="text" class="form-control" id="" required name="e_salary_package"
                                                value="<?= $row[11] ?>" maxlength="5">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Designation *</label>
                                            <select class="form-select" id="gender" required name="e_designation">
                                                <option value="Admin_Executive" <?= $row[4] == 'Admin_Executive' ? 'selected' : '' ?>>Admin_Executive</option>
                                                <option value="HR _Counseler" <?= $row[4] == 'HR _Counseler' ? 'selected' : '' ?>>HR _Counseler</option>
                                                <option value="Internship_Trainer" <?= $row[4] == 'Internship_Trainer' ? 'selected' : '' ?>>Internship_Trainer</option>
                                                <option value="Course_Trainer" <?= $row[4] == 'Course_Trainer' ? 'selected' : '' ?>>Course_Trainer</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Gender *</label>
                                            <select class="form-select" id="gender" required name="e_gender">
                                                <option value="Male" <?= $row[5] == 'Male' ? 'selected' : '' ?>>Male</option>
                                                <option value="Female" <?= $row[5] == 'Female' ? 'selected' : '' ?>>Female
                                                </option>
                                                <option value="Others" <?= $row[5] == 'Others' ? 'selected' : '' ?>>Others
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Email Address *</label>
                                            <input type="email" class="form-control" id="email" required="" name="e_email"
                                                value="<?= $row[9] ?>">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label class="form-label">Phone Number *</label>
                                            <input type="text" class="form-control" id="phone" required="" name="e_phone"
                                                value="<?= $row[8] ?>"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-2 col-6">
                                            <label class="form-label">Address *</label>
                                            <input type="text" class="form-control" id="address" required=""
                                                name="e_address" value="<?= $row[10] ?>">
                                        </div>
                                        <div class="mb-1 col-6">
                                            <label class="form-label">Account Status</label>
                                            <select class="form-select" id="accountStatus" name="e_status">
                                                <option value="Active" <?= $row[14] == 'Active' ? 'selected' : '' ?>>Active
                                                </option>
                                                <option value="Inactive" <?= $row[14] == 'Inactive' ? 'selected' : '' ?>>
                                                    Inactive</option>
                                                <option value="Suspended" <?= $row[14] == 'Suspended' ? 'selected' : '' ?>>
                                                    Suspended</option>
                                                <option value="Blocked" <?= $row[14] == 'Blocked' ? 'selected' : '' ?>>Blocked
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                            <!-- Profile Photo -->
                            <div class="card mb-2">
                                <div class="card-header">
                                    <h5><i class="fas fa-image"></i> Employee Image</h5>
                                </div>
                                <div class="card-body">
                                    <div class="image-upload-container">
                                        <div class="image-preview mt-1" id="imagePreview">
                                            <?php
                                            if (!$row[13] == "") {
                                                ?>
                                                <img src="./assets/employee_images/<?= $row[13] ?>" alt="not found"
                                                    style="height:100%;width: 100%;overflow: hidden;object-fit: cover;">
                                                <?php
                                            } else {
                                                ?>
                                                <img src="./assets/images/profile.png" alt="not found"
                                                    style="height: 100%;width:100%;object-fit: cover;overflow: hidden;">

                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>Click or drag image here</p>
                                                <small>Recommended: 800x600px</small>
                                            <?php } ?>
                                        </div>
                                        <input type="file" id="Images" accept="image/*" style="display: none;"
                                            name="e_emp_img">
                                        <button type="button" class="btn btn-primary w-100 mt-1"
                                            onclick="document.getElementById('Images').click()">
                                            <i class="fas fa-upload"></i> Choose Image
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-header">
                                    <h5><i class="fas fa-file-pdf"></i> Upload Resume</h5>
                                </div>
                                <div class="card-body">
                                    <div class="image-upload-container">
                                        <div class="image-preview mt-1" id="imagePreview1">
                                            <?php
                                            $resume = $row[12];

                                            if (!empty($resume)) {

                                                $extension = strtolower(pathinfo($resume, PATHINFO_EXTENSION));
                                                $resumePath = "./assets/employee_resume/" . htmlspecialchars($resume);

                                                if ($extension === "pdf") {
                                                    ?>

                                                    <iframe src="<?= $resumePath ?>" width="100%" height="100%"
                                                        style="border:none;">
                                                    </iframe>

                                                    <?php
                                                } elseif ($extension === "doc" || $extension === "docx") {
                                                    ?>

                                                    <div
                                                        style="display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center; height: 80%;overflow: hidden;width: 100%;object-fit: cover;">



                                                        <p class="mt-3 mb-2">
                                                            <?= htmlspecialchars($resume) ?>
                                                        </p>
                                                        <a href="<?= $resumePath ?>" target="_blank"
                                                            style="height: 50px;width: 100px;display:flex;align-items:center;justify-content:center;">
                                                            <i class="fas fa-download me-2"></i>
                                                        </a>
                                                    </div>

                                                    <?php
                                                }

                                            } else {
                                                ?>

                                                <i class="fas fa-file-pdf"></i>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <input type="file" id="EmpResume" accept=".pdf,.doc,.docx" style="display: none;"
                                            name="e_emp_resume">
                                        <button type="button" class="btn btn-primary w-100 mt-1"
                                            onclick="document.getElementById('EmpResume').click()">
                                            <i class="fas fa-upload"></i> Choose File
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="col-12">
                            <div class="card w-100">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary w-100 mb-2">
                                        <i class="fas fa-check me-2"></i>Add Employee
                                    </button>
                                    <a href="L-Employees.php" class="btn btn-outline-primary w-100">
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
        <!-- your HTML above -->

        <script>
            document.getElementById('EmpResume').addEventListener('change', function () {
                const file = this.files[0];
                const preview = document.getElementById('imagePreview1');

                if (file) {
                    preview.innerHTML = `
            <i class="fas fa-file-alt"></i>
            <p style="margin:5px 0;">${file.name}</p>
            <small>${(file.size / 1024).toFixed(1)} KB</small>
        `;
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