<?php
session_start();
$userid=$_SESSION['sessid'];
$userrole=$_SESSION['sessrole'];
$username=$_SESSION['sessname'];
$useremail=$_SESSION['sessemail'];
if($useremail!=null && $username!=null)
    {
        ?>
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
                <a href="order.php" class="nav-link">
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
                <a href="analytics.php" class="nav-link">
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
                <a href="reviews.php" class="nav-link active">
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
                <h1>Reviews & Ratings</h1>
                <p>Welcome back! Here's what's happening with your food delivery platform today.</p>
            </div>

            <div class="row mb-4">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="totalReviews">10</h3>
                                <p>Total Reviews</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="avgRating">4.2</h3>
                                <p>Average Rating</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="positiveReviews">8</h3>
                                <p>Positive (4-5)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 mb-3">
                        <div class="filter-card">
                            <div class="filter-icon" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                <i class="fas fa-flag"></i>
                            </div>
                            <div class="filter-info">
                                <h3 id="flaggedReviews">1</h3>
                                <p>Flagged</p>
                            </div>
                        </div>
                    </div>
                </div>

          
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Rating Distribution</h5>
                            </div>
                            <div class="card-body">
                                <div class="rating-bars">
                                    <div class="rating-bar-item">
                                        <span class="rating-label">5 <i class="fas fa-star text-warning"></i></span>
                                        <div class="progress rating-progress">
                                            <div class="progress-bar" id="rating5Bar" role="progressbar" style="width: 50%;"></div>
                                        </div>
                                        <span class="rating-count" id="rating5Count">5</span>
                                    </div>
                                    <div class="rating-bar-item">
                                        <span class="rating-label">4 <i class="fas fa-star text-warning"></i></span>
                                        <div class="progress rating-progress">
                                            <div class="progress-bar" id="rating4Bar" role="progressbar" style="width: 30%;"></div>
                                        </div>
                                        <span class="rating-count" id="rating4Count">3</span>
                                    </div>
                                    <div class="rating-bar-item">
                                        <span class="rating-label">3 <i class="fas fa-star text-warning"></i></span>
                                        <div class="progress rating-progress">
                                            <div class="progress-bar" id="rating3Bar" role="progressbar" style="width: 10%;"></div>
                                        </div>
                                        <span class="rating-count" id="rating3Count">1</span>
                                    </div>
                                    <div class="rating-bar-item">
                                        <span class="rating-label">2 <i class="fas fa-star text-warning"></i></span>
                                        <div class="progress rating-progress">
                                            <div class="progress-bar" id="rating2Bar" role="progressbar" style="width: 10%;"></div>
                                        </div>
                                        <span class="rating-count" id="rating2Count">1</span>
                                    </div>
                                    <div class="rating-bar-item">
                                        <span class="rating-label">1 <i class="fas fa-star text-warning"></i></span>
                                        <div class="progress rating-progress">
                                            <div class="progress-bar" id="rating1Bar" role="progressbar" style="width: 0%;"></div>
                                        </div>
                                        <span class="rating-count" id="rating1Count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="row" id="reviewsList">
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=John%20Smith&amp;background=random" alt="John Smith" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">John Smith</h6>
                                        <small class="text-muted">2024-12-20 14:32</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                <span class="ms-2">5.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Pizza Palace
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1001
                            </div>
                            <p class="review-comment">Absolutely amazing! The pizza was fresh, hot, and delicious. Delivery was super fast and the driver was very friendly. Will definitely order again!</p>
                            
                             <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Sarah%20Johnson&amp;background=random" alt="Sarah Johnson" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Sarah Johnson</h6>
                                        <small class="text-muted">2024-12-20 14:15</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="far fa-star text-warning"></i>
                                <span class="ms-2">4.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Burger Haven
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1002
                            </div>
                            <p class="review-comment">Great burgers and fries! Only complaint is that the fries were a bit cold by the time they arrived.</p>
                           
                             <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                               
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Mike%20Wilson&amp;background=random" alt="Mike Wilson" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Mike Wilson</h6>
                                        <small class="text-muted">2024-12-20 14:05</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                <span class="ms-2">5.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Sushi World
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1003
                            </div>
                            <p class="review-comment">Best sushi I've had in a long time! Fresh ingredients, beautiful presentation, and arrived quickly.</p>
                            
                            <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Emily%20Davis&amp;background=random" alt="Emily Davis" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Emily Davis</h6>
                                        <small class="text-muted">2024-12-20 13:45</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="far fa-star text-warning"></i><i class="far fa-star text-warning"></i>
                                <span class="ms-2">3.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Taco Fiesta
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1004
                            </div>
                            <p class="review-comment">Food was okay, but the portions were smaller than expected for the price.</p>
                            
                             <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card flagged">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=David%20Brown&amp;background=random" alt="David Brown" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">David Brown</h6>
                                        <small class="text-muted">2024-12-20 13:30</small>
                                    </div>
                                </div>
                                <span class="badge bg-danger"><i class="fas fa-flag"></i> Flagged</span>
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="far fa-star text-warning"></i><i class="far fa-star text-warning"></i><i class="far fa-star text-warning"></i>
                                <span class="ms-2">2.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Chinese Garden
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1005
                            </div>
                            <p class="review-comment">Very disappointed. Food was cold and took over an hour to arrive. The fried rice was soggy and tasteless.</p>
                            
                             <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Lisa%20Anderson&amp;background=random" alt="Lisa Anderson" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Lisa Anderson</h6>
                                        <small class="text-muted">2024-12-20 13:15</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                <span class="ms-2">5.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Pasta Paradise
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1006
                            </div>
                            <p class="review-comment">Excellent pasta! Perfectly cooked and the sauce was incredible. Highly recommend!</p>
                            
                            <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Tom%20Martinez&amp;background=random" alt="Tom Martinez" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Tom Martinez</h6>
                                        <small class="text-muted">2024-12-20 13:00</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                <span class="ms-2">5.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> BBQ Pit
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1007
                            </div>
                            <p class="review-comment">Outstanding BBQ! The ribs were fall-off-the-bone tender and the sauce was perfect. Best BBQ delivery ever!</p>
                            
                             <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Jessica%20Lee&amp;background=random" alt="Jessica Lee" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Jessica Lee</h6>
                                        <small class="text-muted">2024-12-20 12:45</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="far fa-star text-warning"></i>
                                <span class="ms-2">4.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Salad Bar
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1008
                            </div>
                            <p class="review-comment">Fresh and healthy salad options. Good portion sizes. Would have given 5 stars but the dressing was a bit bland.</p>
                            
                             <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Chris%20Taylor&amp;background=random" alt="Chris Taylor" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Chris Taylor</h6>
                                        <small class="text-muted">2024-12-20 12:30</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i>
                                <span class="ms-2">5.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Steak House
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1009
                            </div>
                            <p class="review-comment">Premium quality steak cooked to perfection! Worth every penny. Will be ordering regularly!</p>
                            
                             <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-lg-6 mb-4">
                        <div class="review-card ">
                            <div class="review-header">
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name=Amanda%20White&amp;background=random" alt="Amanda White" class="review-avatar">
                                    <div class="ms-3">
                                        <h6 class="mb-0">Amanda White</h6>
                                        <small class="text-muted">2024-12-20 12:15</small>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="review-rating">
                                <i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="far fa-star text-warning"></i>
                                <span class="ms-2">4.0</span>
                            </div>
                            <div class="review-restaurant">
                                <i class="fas fa-store"></i> Dessert Heaven
                                <span class="mx-2">|</span>
                                <i class="fas fa-receipt"></i> ORD-1010
                            </div>
                            <p class="review-comment">Delicious desserts! The chocolate cake was heavenly. Slightly expensive but worth it for a treat.</p>
                            
                            <div class="review-actions">
                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#DetailsModal">
                                    <i class="fas fa-eye"></i> View Details
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-reply"></i> Respond
                                    </button>
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-flag"></i> Flag
                                </button>
                            </div>
                        </div>
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
                    <h5 class="modal-title mb-0">Review Details</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-success">
                                <i class="fas fa-reply"></i> Respond
                            </button>
                        <button class="btn btn-outline-danger">
                            <i class="fas fa-flag"></i> Flag
                        </button>
                    </div>
                    <button type="button" class="btn-close ms-2" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body position-relative">
                    <div class="info-table-wrapper">
                    <table class="info-table">
                        <tbody>
                        <!-- Order Information -->
                        <tr class="section">
                            <td colspan="2">Order Information</td>
                        </tr>
                        <tr>
                            <th>Order ID</th>
                            <td>ORD-1002</td>
                        </tr>
                        <tr>
                            <th>Restaurant</th>
                            <td>Burger Haven</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>2024-12-20 14:15</td>
                        </tr>

                        <!-- Review Status -->
                        <tr class="section">
                            <td colspan="2">Review Status</td>
                        </tr>
                        <tr>
                            <th>Review ID</th>
                            <td>REV-002</td>
                        </tr>
                        <tr>
                            <th>Flagged</th>
                            <td>
                            <span class="badge bg-success">No</span>
                            </td>
                        </tr>
                        <tr>
                            <th>Responded</th>
                            <td>
                            <span class="badge bg-success">Yes</span>
                            </td>
                        </tr>

                        <!-- Customer Feedback -->
                        <tr class="section">
                            <td colspan="2">Customer Feedback</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-block">
                            Great burgers and fries! Only complaint is that the fries were a bit
                            cold by the time they arrived.
                            </td>
                        </tr>

                        <!-- Restaurant Response -->
                        <tr class="section">
                            <td colspan="2">Restaurant Response</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-block">
                            Thank you for your feedback! We're working on improving our delivery
                            times.
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
<?php
    }
    else
        {
            ?>
    
         <script>alert('No Sessions Found');location.href='index.php';</script>
         <?php
        }
        ?>