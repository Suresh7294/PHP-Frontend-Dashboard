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
    <style>
        #addNewcus .receipt-fit {
            max-width: 70vw;
            /* 100 - 15 - 15 = 70% width */
            height: 40vh;
            /* 100 - 15 - 15 = 70% height */
            margin: 1vh auto;
        }

        /* CONTENT FULL HEIGHT */
        #addNewcus .dashboard-content {
            height: 50%;
            display: flex;
            flex-direction: column;
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
            border-bottom: 2px solid #ffff;
            background: transparent;
            width: 450px;
            color: #fff;
            display: inline-block;
        }

        .input-line:focus {
            border-bottom-color: #1e1717;
        }

        /* Prevent modal scroll */
        .modal-body {
            overflow: hidden !important;
        }

        label {
            color: #fff;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a class="logo" href="add-expense.php">
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
        
        <!-- Dashboard Content -->

        <form id="addNewcus">
            <div class="dashboard-content receipt-fit">

                <!-- HEADER -->
                <div class="page-header mb-2 mt-0 d-flex justify-content-between">
                    <h1>New Voucher</h1>

                    <a href="OtherExpensesList.php" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

                <!-- MAIN RECEIPT CARD -->
                <div class="card">

                    <!-- TOP HEADER (LOGO + TITLE) -->
                    <div class="card-body border-bottom" style="color:white;">
                        <div class="row align-items-center">

                            <div class="col-md-5">
                                <img src="./assets/images/lst logo 3.png" style="height:70px;">
                                <p class="small mb-0 mt-1">
                                    AN ISO 9001:2015 CERTIFIED COMPANY <br>
                                    GSTIN: 33AATPE7188G1ZC
                                </p>
                            </div>

                            <div class="col-md-2 ms-0">
                                <h2 class="mb-0">Voucher</h2>
                            </div>

                            <div class="col-md-4 text-start small offset-md-1">
                                No.207, AK Complex, 6th Street, Crosscut Road<br>
                                Gandhipuram, Coimbatore-12, Tamil Nadu<br>
                                Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: info@livestreamtechnologies.co.in<br>
                                Phone&nbsp;&nbsp;&nbsp;: 422-4952001<br>
                                Website&nbsp;: www.livestreamtechnologies.co.in
                            </div>

                        </div>
                    </div>

                    <!-- FORM BODY -->
                    <div class="card-body">

                        <div class="modal-body">
                            <div id="invoiceArea">
                                <div class="row">
                                    <div class="col-md-12">
                                        <!--PAY SLIP DETAILS-->
                                        <div class="container invoice-fit">

                                                <!-- TOP ROW -->
                                                <div class="row g-2 mb-2">
                                                    <!-- left sid -->
                                                    <div class="col-md-6">

                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <label class="form-label">Voucher ID</label>
                                                                <input class="form-control form-control-sm" />
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="form-label">Paid To</label>
                                                                <input class="form-control form-control-sm"
                                                                    placeholder="Enter Name" />
                                                            </div>
                                                             <div class="col-md-12">
                                                                <label class="form-label">Payment Type</label>
                                                                <select name="paymentType" id="paymentType"
                                                                    class="form-control form-control-sm">
                                                                    <option value="">Select Payment Type</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="cheque">Cheque</option>
                                                                    <option value="bank_transfer">Bank Transfer</option>
                                                                </select>
                                                            </div>                                                           
                                                        </div>

                                                    </div>
                                                    <!-- right side-->
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                             <div class="col-md-12">
                                                                <label class="form-label">Date of Voucher</label>
                                                                <input type="date" class="form-control">
                                                            </div>
                                                           
                                                            <div class="col-md-12">
                                                                <label class="form-label">Paid For</label>
                                                                <input class="form-control form-control-sm"
                                                                    placeholder="Enter Detail" />
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label class="form-label">Paid Amount</label>
                                                                <input class="form-control form-control-sm" placeholder=" ₹ 25000" />
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
                    <div class="card-body border-top">
                        <button class="btn btn-primary w-100 mb-2">
                           Add Voucher
                        </button>

                        <a href="OtherExpensesList.php" class="btn btn-outline-primary w-100">
                            Cancel
                        </a>
                    </div>
                </div>

            </div>
        </form>

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
    }
    else{
?>
<script>alert('No Sessions Found');location.href='index.php';</script>
   <?php 
   }
    ?>