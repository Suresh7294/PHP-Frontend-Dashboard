<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodlytix - Admin Dashboard</title>
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
            <a class="logo" href="index.php">
                <i class="bi bi-basket2-fill"></i>
                <span class="logo-text">Foodlytix</span>
            </a>
            <button class="menu-toggle" id="menuToggle">
                <i class="bi bi-list"></i>
            </button>
        </div>
        
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="index.php" class="nav-link">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="account.php" class="nav-link">
                    <i class="bi bi-receipt"></i>
                    <span>Orders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="restaurants.php" class="nav-link">
                    <i class="bi bi-shop"></i>
                    <span>Restaurants</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="customer.php" class="nav-link">
                    <i class="bi bi-people-fill"></i>
                    <span>Customers</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="riders.php" class="nav-link">
                    <i class="bi bi-bicycle"></i>
                    <span>Delivery Riders</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="analytics.php" class="nav-link active">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Analytics</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="payments.php" class="nav-link">
                    <i class="bi bi-credit-card-fill"></i>
                    <span>Payments</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="reviews.php" class="nav-link">
                    <i class="bi bi-chat-left-dots-fill"></i>
                    <span>Reviews</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="settings.php" class="nav-link">
                    <i class="bi bi-gear-fill"></i>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="signup.php" class="nav-link">
                    <i class="bi bi-person-add"></i>
                    <span>Signup</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="forgot-password.php" class="nav-link">
                    <i class="bi bi-eye-fill"></i>
                    <span>Forgot password</span>
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
                <input type="text" placeholder="Search orders, customers, restaurants...">
            </div>
            
            <div class="top-bar-actions">
                 <div class="dropdown notify-dropdown">
                      <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="button">
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
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-info">
                                            AP
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">New Appointment Scheduled</h6>
                                            <small class="d-block">10 Dec 2023 - 09:45 AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-success">
                                            <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Patient checked in at reception</h6>
                                            <small class="d-block">10 Dec 2023 - 10:20 AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2">
                                            AS
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Dr Alice shared a prescription</h6>
                                            <small class="d-block">10 Dec 2023 - 11:00 AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-danger">
                                            EM
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Emergency Alert: Critical Patient</h6>
                                            <small class="d-block">10 Dec 2023 - 11:30 AM</small>
                                        </div>
                                    </div>
                                </li>
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
                        <a class="all-notification" href="#">See all notifications <i class="fas fa-arrow-right"></i></a>
                    </div>
                 </div>

                
                <div class="dropdown notify-dropdown">
                      <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="button">
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
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-info">
                                            AP
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">New Appointment Scheduled</h6>
                                            <small class="d-block">10 Dec 2023 - 09:45 AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-success">
                                            <i class="fa fa-check-circle"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Patient checked in at reception</h6>
                                            <small class="d-block">10 Dec 2023 - 10:20 AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2">
                                            AS
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Dr Alice shared a prescription</h6>
                                            <small class="d-block">10 Dec 2023 - 11:00 AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-2 media-danger">
                                            EM
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1">Emergency Alert: Critical Patient</h6>
                                            <small class="d-block">10 Dec 2023 - 11:30 AM</small>
                                        </div>
                                    </div>
                                </li>
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
                        <a class="all-notification" href="#">See all notifications <i class="fas fa-arrow-right"></i></a>
                    </div>
                 </div>
                <div class="dropdown profile-dropdown">
                     <div class="dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" role="button">
                         <div class="user-profile">
                            <div class="user-avatar">AD</div>
                            <div class="user-info">
                                <h6>Admin User</h6>
                                <p>Super Admin</p>
                            </div>
                        </div>
                     </div>
                     <ul class="dropdown-menu dropdown-menu-end mt-2">
                         <li><h6 class="dropdown-header">Settings</h6></li>
                         <li><a class="dropdown-item" href="#"><i class="fa-regular fa-user"></i> Profile Settings</a></li>
                         <li><a class="dropdown-item" href="#"><i class="fa-regular fa-bell"></i> Notifications</a></li>
                         <li><a class="dropdown-item" href="#"><i class="fa-solid fa-shield-halved"></i> Privacy &amp; Security</a></li>
                         <li><a class="dropdown-item" href="#"><i class="fa-regular fa-credit-card"></i> Billing</a></li>
                         <li>
                             <div class="sign-out">
                             <a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-right-from-bracket"></i> Sign out</a>
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
                <h1>Analytics Dashboard</h1>
                <p>Welcome back! Here's what's happening with your food delivery platform today.</p>
            </div>

            
            <div class="row mb-4">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="metric-card">
                            <div class="metric-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="metric-info">
                                <h3 id="totalRevenue">$137,492</h3>
                                <p>Total Revenue</p>
                                <span class="metric-change positive"><i class="fas fa-arrow-up"></i> 12.5%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="metric-card">
                            <div class="metric-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <div class="metric-info">
                                <h3 id="totalOrders">2,543</h3>
                                <p>Total Orders</p>
                                <span class="metric-change positive"><i class="fas fa-arrow-up"></i> 8.3%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="metric-card">
                            <div class="metric-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="metric-info">
                                <h3 id="newCustomers">234</h3>
                                <p>New Customers</p>
                                <span class="metric-change positive"><i class="fas fa-arrow-up"></i> 15.2%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="metric-card">
                            <div class="metric-icon" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="metric-info">
                                <h3 id="avgOrderValue">$57.35</h3>
                                <p>Avg Order Value</p>
                                <span class="metric-change negative"><i class="fas fa-arrow-down"></i> 3.1%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row 1 -->
                <div class="row mb-4">
                    <div class="col-lg-8 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Revenue Overview</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="revenueChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Order Status</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="orderStatusChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Charts Row 2 -->
                <div class="row mb-4">
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Top Restaurants</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="topRestaurantsChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Peak Hours</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="peakHoursChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Table -->

                <div class="table-card">
                    <div class="table-header">
                        <h3>Performance by Region</h3>
                        <div class="table-actions">
                            <button class="filter-btn">
                                <i class="bi bi-funnel"></i> Filter
                            </button>
                            <button class="filter-btn">
                                <i class="bi bi-download"></i> Export
                            </button>
                        </div>
                    </div>
                     <div class="table-responsive">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>Region</th>
                                    <th>Orders</th>
                                    <th>Revenue</th>
                                    <th>Avg Delivery Time</th>
                                    <th>Customer Rating</th>
                                    <th>Growth</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Downtown</strong></td>
                                    <td>876</td>
                                    <td><strong>$52,340</strong></td>
                                    <td>28 min</td>
                                    <td><i class="fas fa-star text-warning"></i> 4.8</td>
                                    <td>
                                        <span class="metric-change positive">
                                            <i class="fas fa-arrow-up"></i> 12.5%
                                        </span>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td><strong>Midtown</strong></td>
                                    <td>654</td>
                                    <td><strong>$38,920</strong></td>
                                    <td>32 min</td>
                                    <td><i class="fas fa-star text-warning"></i> 4.6</td>
                                    <td>
                                        <span class="metric-change positive">
                                            <i class="fas fa-arrow-up"></i> 8.3%
                                        </span>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td><strong>Uptown</strong></td>
                                    <td>543</td>
                                    <td><strong>$31,560</strong></td>
                                    <td>25 min</td>
                                    <td><i class="fas fa-star text-warning"></i> 4.9</td>
                                    <td>
                                        <span class="metric-change positive">
                                            <i class="fas fa-arrow-up"></i> 15.7%
                                        </span>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td><strong>Westside</strong></td>
                                    <td>432</td>
                                    <td><strong>$25,780</strong></td>
                                    <td>35 min</td>
                                    <td><i class="fas fa-star text-warning"></i> 4.5</td>
                                    <td>
                                        <span class="metric-change negative">
                                            <i class="fas fa-arrow-down"></i> 3.2%
                                        </span>
                                    </td>
                                </tr>
                            
                                <tr>
                                    <td><strong>Eastside</strong></td>
                                    <td>398</td>
                                    <td><strong>$23,690</strong></td>
                                    <td>30 min</td>
                                    <td><i class="fas fa-star text-warning"></i> 4.7</td>
                                    <td>
                                        <span class="metric-change positive">
                                            <i class="fas fa-arrow-up"></i> 6.8%
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-text">
                <span>© 2025 Foodlytix — All Rights Reserved</span>
                <span class="footer-divider">|</span>
                <span>Themes By TemplateRise</span>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="DetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <h5 class="modal-title mb-0">Transaction Details</h5>
                    <div class="text-end mt-3">
                        <button class="btn btn-outline-warning">
                            <i class="fas fa-print"></i> Print Receipt
                        </button>
                    </div>
                    <button type="button" class="btn-close ms-2" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body position-relative">
                    <div class="info-table-wrapper">
                    <table class="info-table">
                        <tbody>
                        <!-- Transaction Information -->
                        <tr class="section">
                            <td colspan="2">Transaction Information</td>
                        </tr>
                        <tr>
                            <th>Transaction ID</th>
                            <td>TXN-10234</td>
                        </tr>
                        <tr>
                            <th>Order ID</th>
                            <td>ORD-1001</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                            <span class="badge bg-success">COMPLETED</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Date &amp; Time</th>
                            <td>2024-12-20 14:32</td>
                        </tr>

                        <!-- Customer Information -->
                        <tr class="section">
                            <td colspan="2">Customer Information</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>John Smith</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td class="amount">$45.99</td>
                        </tr>

                        <!-- Payment Method -->
                        <tr class="section">
                            <td colspan="2">Payment Method</td>
                        </tr>
                        <tr>
                            <th>Method</th>
                            <td>
                            <span class="badge bg-info">Card</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Card Type</th>
                            <td>Visa</td>
                        </tr>
                        <tr>
                            <th>Card Number</th>
                            <td>**** **** **** 4242</td>
                        </tr>

                        <!-- Transaction Status -->
                        <tr class="section">
                            <td colspan="2">Transaction Status</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                            <div class="status-box success">
                                Transaction completed successfully.
                            </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
