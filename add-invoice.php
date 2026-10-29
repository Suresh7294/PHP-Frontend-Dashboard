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
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="logo" href="add-invoice.php">
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
                <a href="L-finance.php" class="nav-link active">
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

            <div class="search-bar">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Search" />
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
                            <div class="user-avatar">AD</div>
                            <div class="user-info">
                                <h6>Admin User</h6>
                                <p>Super Admin</p>
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
                        <h1>
                            Invoice & Payments
                            <i class="fas fa-info-circle"></i>
                        </h1>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="L-finance.php" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>

            <div id="InvoiceModal" class="modal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- HEADER -->
                        <div class="modal-header">
                            <h5 class="mb-0">
                                <i class="fas fa-file-invoice me-2"></i>Invoice Details
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
                                            <div class="card-body border-bottom" style="color:white;">
                                                <div class="row align-items-center">

                                                    <div class="col-md-5">
                                                        <img src="./assets/images/lst logo 3.png" style="height:100px; width:85%; margin-left:5px;" />
                                                        <p class="small mb-0 ms-4">
                                                            &nbsp;&nbsp;AN ISO 9001:2015 CERTIFIED COMPANY <br>
                                                            GSTIN: 33AATPE7188G1ZC
                                                        </p>
                                                    </div>

                                                     <div class="col-md-2 mt-0">
                                                        <h4 class="mb-0">INVOICE</h4>
                                                    </div>

                                                    <div class="col-md-5 text-start" style="font-size:14px">
                                                        No.207, AK Complex, 6th Street, Crosscut Road<br>
                                                        Gandhipuram, Coimbatore-12, Tamil Nadu<br>
                                                        Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                                        info@livestreamtechnologies.co.in<br>
                                                        Phone&nbsp;&nbsp;&nbsp;: 422-4952001<br>
                                                        Website&nbsp;: www.livestreamtechnologies.co.in
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row g-2 mb-2 mt-1">
                                                <div class="col-md-4">
                                                    <label class="form-label">Invoice No</label>
                                                    <input class="form-control form-control-sm" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Course</label>
                                                    <select class="form-select form-select-sm">
                                                        <option>Select Course</option>
                                                        <option>Python Programming</option>
                                                        <option>Web Development</option>
                                                        <option>Data Science</option>
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

                                        <!-- INSTALLMENT -->

                                        <div>
                                            <div class="card-header">
                                                <h6 class="mb-0">
                                                    <i class="fas fa-user-graduate me-2"></i>Installment Details
                                                </h6>
                                            </div>

                                            <div class="table-card">
                                                <div class="table-responsive">
                                                    <table class="custom-table" id="installment">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Installment</th>
                                                                <th>Installment Date</th>
                                                                <th>Installment Amount</th>
                                                                <th>Balance Amount</th>
                                                                <th>Action</th>
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
                                                                    <input type="date"
                                                                        class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <input class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <input class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-danger btn-sm"
                                                                        onclick="this.closest('tr').remove()">X</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end gap-2 mt-2">
                                                <button onclick="addInstallment()" class="btn btn-success btn-sm ">
                                                    + Add Installment
                                                </button>
                                            </div>
                                            <div class="row">
                                                <div class="mb-1 col-md-12">
                                                    <label class="form-label">Amount in Words</label>
                                                    <input class="form-control form-control-sm" />
                                                </div>
                                                <div class="mb-1 col-md-4 offset-md-8">
                                                    <label class="form-label tw-bolder">Total</label>
                                                    <input class="form-control form-control-sm" />
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
function addInstallment() {

  let tbody = document.querySelector("#installment tbody");

  

  let newRow = `
    <tr>
      <td><input class="form-control form-control-sm"></td>
      <td><input class="form-control form-control-sm"></td>
      <td><input type="date" class="form-control form-control-sm"></td>
      <td><input class="form-control form-control-sm"></td>
      <td><input class="form-control form-control-sm"></td>
      <td>
  <button class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">X</button>
</td>
    </tr>
  `;

  tbody.insertAdjacentHTML("beforeend", newRow);
}
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