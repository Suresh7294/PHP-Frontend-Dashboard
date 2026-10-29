<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Stream Technologies</title>
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
                <a href="reviews.php" class="nav-link">
                    <i class="bi bi-chat-left-dots-fill"></i>
                    <span>Reviews</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="settings.php" class="nav-link active">
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
                <h1>Settings</h1>
                <p>Manage your platform preferences and configurations</p>
            </div>

            <div class="settings-container">
            <!-- Settings Sidebar -->
            <div class="settings-sidebar">
                <ul class="settings-nav">
                    <li class="settings-nav-item">
                        <a href="#profile" class="settings-nav-link active" data-section="profile">
                            <i class="bi bi-person"></i> Profile
                        </a>
                    </li>
                    <li class="settings-nav-item">
                        <a href="#account" class="settings-nav-link" data-section="account">
                            <i class="bi bi-shield-check"></i> Account
                        </a>
                    </li>
                    <li class="settings-nav-item">
                        <a href="#notifications" class="settings-nav-link" data-section="notifications">
                            <i class="bi bi-bell"></i> Notifications
                        </a>
                    </li>
                    <li class="settings-nav-item">
                        <a href="#appearance" class="settings-nav-link" data-section="appearance">
                            <i class="bi bi-palette"></i> Appearance
                        </a>
                    </li>
                    <li class="settings-nav-item">
                        <a href="#preferences" class="settings-nav-link" data-section="preferences">
                            <i class="bi bi-sliders"></i> Preferences
                        </a>
                    </li>
                    <li class="settings-nav-item">
                        <a href="#security" class="settings-nav-link" data-section="security">
                            <i class="bi bi-lock"></i> Security
                        </a>
                    </li>
                    <li class="settings-nav-item">
                        <a href="#billing" class="settings-nav-link" data-section="billing">
                            <i class="bi bi-credit-card"></i> Billing
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Settings Content -->
            <div class="settings-content">
                <!-- Profile Section -->
                <div id="profile" class="settings-section active">
                    <div class="section-header">
                        <h2 class="section-title"><i class="bi bi-person"></i> Profile Settings</h2>
                    </div>
                    <p class="section-description">Update your personal information and how others see you on the platform.</p>

                    <div class="avatar-upload">
                        <div class="avatar-preview" id="avatarPreview">
                            <span>JD</span>
                        </div>
                        <div class="avatar-upload-controls">
                            <label for="avatarInput" class="avatar-upload-btn">
                                <i class="bi bi-camera"></i> Upload Photo
                            </label>
                            <input type="file" id="avatarInput" accept="image/*" style="display: none;">
                            <div class="avatar-hint">Recommended: Square image, 500x500px, max 2MB</div>
                        </div>
                    </div>

                     <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label class="form-label" for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" value="Miller" placeholder="Enter your first name">
                        </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" value="Islam" placeholder="Enter your last name">
                        </div>
                        </div>
                     </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" value="Miller@template.com" placeholder="Enter your email">
                        <p class="form-text">This will be used for login and notifications</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="bio">Bio</label>
                        <textarea class="form-control" id="bio" rows="4" placeholder="Tell us about yourself">Senior UI/UX Designer at Panelry with 5+ years of experience in creating beautiful and functional interfaces. Passionate about design systems and user-centered design.</textarea>
                        <p class="form-text">Brief description for your profile. URLs are hyperlinked.</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="location">Location</label>
                        <input type="text" class="form-control" id="location" value="San Francisco, CA" placeholder="Enter your location">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" value="+1 (555) 123-4567" placeholder="Enter your phone number">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="website">Website</label>
                                <input type="url" class="form-control" id="website" value="https://Miller.dev" placeholder="https://example.com">
                            </div>
                        </div>
                     </div>
                </div>

                <!-- Account Section -->
                <div id="account" class="settings-section">
                    <div class="section-header">
                        <h2 class="section-title"><i class="bi bi-shield-check"></i> Account Settings</h2>
                    </div>
                    <p class="section-description">Manage your account preferences and data.</p>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Email Notifications</div>
                            <div class="toggle-description">Receive email updates about your account activity</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Two-Factor Authentication</div>
                            <div class="toggle-description">Add an extra layer of security to your account</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Auto-save Drafts</div>
                            <div class="toggle-description">Automatically save drafts as you work</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Show Online Status</div>
                            <div class="toggle-description">Allow others to see when you're online</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Account Visibility</label>
                        <div class="radio-cards">
                            <label class="radio-card selected">
                                <input type="radio" name="visibility" checked="">
                                <div class="radio-icon">
                                    <i class="bi bi-globe"></i>
                                </div>
                                <div class="radio-title">Public</div>
                                <div class="radio-description">Anyone can see your profile</div>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="visibility">
                                <div class="radio-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="radio-title">Team Only</div>
                                <div class="radio-description">Only team members can see</div>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="visibility">
                                <div class="radio-icon">
                                    <i class="bi bi-lock"></i>
                                </div>
                                <div class="radio-title">Private</div>
                                <div class="radio-description">Only you can see your profile</div>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="language">Language</label>
                        <select class="form-control" id="language">
                            <option selected="">English (US)</option>
                            <option>English (UK)</option>
                            <option>Spanish</option>
                            <option>French</option>
                            <option>German</option>
                            <option>Japanese</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="timezone">Timezone</label>
                        <select class="form-control" id="timezone">
                            <option selected="">(UTC-08:00) Pacific Time</option>
                            <option>(UTC-07:00) Mountain Time</option>
                            <option>(UTC-06:00) Central Time</option>
                            <option>(UTC-05:00) Eastern Time</option>
                            <option>(UTC+00:00) London</option>
                            <option>(UTC+01:00) Berlin</option>
                            <option>(UTC+05:30) India</option>
                        </select>
                    </div>
                </div>

                <!-- Notifications Section -->
                <div id="notifications" class="settings-section">
                    <div class="section-header">
                        <h2 class="section-title"><i class="bi bi-bell"></i> Notification Settings</h2>
                    </div>
                    <p class="section-description">Configure how you receive notifications and alerts.</p>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Push Notifications</div>
                            <div class="toggle-description">Receive notifications in your browser</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Email Notifications</div>
                            <div class="toggle-description">Receive notifications via email</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Desktop Notifications</div>
                            <div class="toggle-description">Show notifications on your desktop</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="section-header mt-4">
                        <h3 class="fs-14 fw-600 mb-0">Notification Types</h3>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">New Messages</div>
                            <div class="toggle-description">When someone sends you a message</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Task Assignments</div>
                            <div class="toggle-description">When you're assigned a new task</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Project Updates</div>
                            <div class="toggle-description">When projects you're in are updated</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Team Activity</div>
                            <div class="toggle-description">When team members complete tasks</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">System Alerts</div>
                            <div class="toggle-description">Important system notifications</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="notificationSound">Notification Sound</label>
                        <select class="form-control" id="notificationSound">
                            <option selected="">Default</option>
                            <option>Chime</option>
                            <option>Bell</option>
                            <option>Beep</option>
                            <option>None</option>
                        </select>
                    </div>
                </div>

                <!-- Appearance Section -->
                <div id="appearance" class="settings-section">
                    <div class="section-header">
                        <h2 class="section-title"><i class="bi bi-palette"></i> Appearance Settings</h2>
                    </div>
                    <p class="section-description">Customize the look and feel of the application.</p>

                    <div class="form-group">
                        <label class="form-label" for="fontSize">Font Size</label>
                        <select class="form-control" id="fontSize">
                            <option>Small</option>
                            <option selected="">Medium</option>
                            <option>Large</option>
                            <option>Extra Large</option>
                        </select>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Compact Mode</div>
                            <div class="toggle-description">Reduce spacing for more content</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Reduced Motion</div>
                            <div class="toggle-description">Minimize animations and transitions</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">High Contrast Mode</div>
                            <div class="toggle-description">Increase contrast for better visibility</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- Preferences Section -->
                <div id="preferences" class="settings-section">
                    <div class="section-header">
                        <h2 class="section-title"><i class="bi bi-sliders"></i> Preferences</h2>
                    </div>
                    <p class="section-description">Configure your workflow and application behavior.</p>

                    <div class="form-group">
                        <label class="form-label" for="defaultView">Default Dashboard View</label>
                        <select class="form-control" id="defaultView">
                            <option selected="">Overview</option>
                            <option>Analytics</option>
                            <option>Projects</option>
                            <option>Tasks</option>
                            <option>Team</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="dateFormat">Date Format</label>
                        <select class="form-control" id="dateFormat">
                            <option selected="">MM/DD/YYYY</option>
                            <option>DD/MM/YYYY</option>
                            <option>YYYY-MM-DD</option>
                            <option>Month D, YYYY</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="timeFormat">Time Format</label>
                        <select class="form-control" id="timeFormat">
                            <option selected="">12-hour</option>
                            <option>24-hour</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="weekStart">Week Starts On</label>
                        <select class="form-control" id="weekStart">
                            <option selected="">Sunday</option>
                            <option>Monday</option>
                        </select>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Auto-refresh Data</div>
                            <div class="toggle-description">Automatically refresh data every 5 minutes</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Show Confirmation Dialogs</div>
                            <div class="toggle-description">Ask for confirmation before destructive actions</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Enable Keyboard Shortcuts</div>
                            <div class="toggle-description">Use keyboard shortcuts for faster navigation</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Show Tooltips</div>
                            <div class="toggle-description">Display helpful tooltips for icons and buttons</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- Security Section -->
                <div id="security" class="settings-section">
                    <div class="section-header">
                        <h2 class="section-title"><i class="bi bi-lock"></i> Security Settings</h2>
                    </div>
                    <p class="section-description">Manage your account security and privacy settings.</p>

                    <div class="form-group">
                        <label class="form-label" for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label" for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
                            </div>
                        </div>
                        <div class="col">
                             <div class="form-group">
                                <label class="form-label" for="confirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                            </div>
                        </div>
                     </div>

                    <p class="form-text">Use at least 8 characters with a mix of letters, numbers &amp; symbols</p>

                    <button class="btn btn-primary">
                        <i class="bi bi-key"></i> Change Password
                    </button>

                    <div class="section-header mt-4">
                        <h3 class="fs-14 fw-600 mb-0">Active Sessions</h3>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">San Francisco, CA</div>
                            <div class="toggle-description">Chrome on macOS • Just now</div>
                        </div>
                        <button class="btn-outline" >
                            <i class="bi bi-x-lg"></i> Revoke
                        </button>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">New York, NY</div>
                            <div class="toggle-description">Firefox on Windows • 2 hours ago</div>
                        </div>
                        <button class="btn-outline" >
                            <i class="bi bi-x-lg"></i> Revoke
                        </button>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">London, UK</div>
                            <div class="toggle-description">Safari on iPhone • 3 days ago</div>
                        </div>
                        <button class="btn-outline" >
                            <i class="bi bi-x-lg"></i> Revoke
                        </button>
                    </div>

                    <div class="danger-zone mt-4">
                        <h3 class="danger-title"><i class="bi bi-exclamation-triangle"></i> Danger Zone</h3>
                        <p class="danger-description">Once you delete your account, there is no going back. Please be certain.</p>
                        <button class="btn-danger">
                            <i class="bi bi-trash"></i> Delete Account
                        </button>
                    </div>
                </div>


                <!-- Billing Section -->
                <div id="billing" class="settings-section">
                    <div class="section-header">
                        <h2 class="section-title"><i class="bi bi-credit-card"></i> Billing &amp; Subscription</h2>
                    </div>
                    <p class="section-description">Manage your subscription and billing information.</p>

                    <div class="form-group">
                        <div class="radio-cards">
                            <label class="radio-card selected">
                                <input type="radio" name="plan" checked="">
                                <div class="radio-icon">
                                    <i class="bi bi-star"></i>
                                </div>
                                <div class="radio-title">Pro Plan</div>
                                <div class="radio-description">$29/month • 10 team members</div>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="plan">
                                <div class="radio-icon">
                                    <i class="bi bi-rocket-takeoff"></i>
                                </div>
                                <div class="radio-title">Business Plan</div>
                                <div class="radio-description">$99/month • Unlimited members</div>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="plan">
                                <div class="radio-icon">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="radio-title">Enterprise</div>
                                <div class="radio-description">Custom pricing • Advanced features</div>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Payment Method</label>
                        <div class="toggle-item">
                            <div class="toggle-info">
                                <div class="toggle-title">Visa ending in 4242</div>
                                <div class="toggle-description">Expires 12/2025</div>
                            </div>
                            <button class="btn-outline">
                                <i class="bi bi-pencil"></i> Edit
                            </button>
                        </div>
                        <button class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i> Add Payment Method
                        </button>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="billingEmail">Billing Email</label>
                        <input type="email" class="form-control" id="billingEmail" value="billing@template.com" placeholder="Enter billing email">
                        <p class="form-text">Receipts and invoices will be sent to this email</p>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Auto-renew Subscription</div>
                            <div class="toggle-description">Automatically renew your subscription</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="toggle-item">
                        <div class="toggle-info">
                            <div class="toggle-title">Send Invoice Receipts</div>
                            <div class="toggle-description">Email receipts after each payment</div>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked="">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="danger-zone mt-4">
                        <h3 class="danger-title"><i class="bi bi-x-circle"></i> Cancel Subscription</h3>
                        <p class="danger-description">Your subscription will remain active until the end of the current billing period.</p>
                        <button class="btn-danger" onclick="cancelSubscription()">
                            <i class="bi bi-x-lg"></i> Cancel Subscription
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
    <div class="modal fade" id="riderDetailsModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <h5 class="modal-title mb-0">Rider Details</h5>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-plus"></i> Assign Order
                        </button>
                        <button class="btn btn-outline-success">
                            <i class="fas fa-history"></i> History
                        </button>
                    </div>
                    <button type="button" class="btn-close ms-2" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body position-relative">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name=Alex%20Johnson&amp;background=random&amp;size=128" alt="Alex Johnson" class="rounded-circle" width="128" height="128">
                        <h4 class="mt-3">Alex Johnson</h4>
                        <span class="badge bg-secondary">OFFLINE</span>
                    </div>

                    <div class="alert alert-info py-2 px-3 mt-3 mb-3 position-absolute top-0 end-0 me-3 mt-5">
                        <small><i class="fas fa-shipping-fast"></i> Currently delivering ORD-1007</small>
                    </div>

                    <div class="info-table-wrapper">
                        <table class="info-table">
                            <tbody>
                            <tr class="section">
                                <td colspan="2">Personal Information</td>
                            </tr>
                            <tr>
                                <th>Rider ID</th>
                                <td>RIDER-001</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>alex.j@fooddash.com</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>+1 555-1001</td>
                            </tr>

                            <tr class="section">
                                <td colspan="2">Vehicle Information</td>
                            </tr>
                            <tr>
                                <th>Vehicle Type</th>
                                <td>Motorcycle</td>
                            </tr>
                            <tr>
                                <th>License</th>
                                <td>DL-12345</td>
                            </tr>
                            <tr>
                                <th>Joined</th>
                                <td>Jan 10, 2023</td>
                            </tr>

                            <tr class="section">
                                <td colspan="2">Performance Metrics</td>
                            </tr>
                            <tr>
                                <th>Rating</th>
                                <td>⭐ 4.9 (234 reviews)</td>
                            </tr>
                            <tr>
                                <th>Total Deliveries</th>
                                <td>1543</td>
                            </tr>

                            <tr class="section">
                                <td colspan="2">Earnings & Status</td>
                            </tr>
                            <tr>
                                <th>Total Earnings</th>
                                <td class="success">$12,450</td>
                            </tr>
                            <tr>
                                <th>Current Location</th>
                                <td>Downtown Area</td>
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
    <script>
        // Settings Navigation Functionality
function setupSettingsNavigation() {
  const settingsNavLinks = document.querySelectorAll(".settings-nav-link");
  const settingsSections = document.querySelectorAll(".settings-section");

  settingsNavLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      // Get the target section from data-section attribute
      const targetSectionId = this.getAttribute("data-section");

      // Remove active class from all nav links
      settingsNavLinks.forEach((l) => {
        l.classList.remove("active");
      });

      // Add active class to clicked link
      this.classList.add("active");

      // Hide all sections
      settingsSections.forEach((section) => {
        section.classList.remove("active");
      });

      // Show target section
      const targetSection = document.getElementById(`${targetSectionId}`);
      if (targetSection) {
        targetSection.classList.add("active");
      } else {
      }
    });
  });

  // Initialize with first section active
  if (settingsNavLinks.length > 0 && settingsSections.length > 0) {
    settingsNavLinks[0].classList.add("active");
    settingsSections[0].classList.add("active");
  }
}

setupSettingsNavigation();

document.querySelectorAll(".radio-card").forEach((card) => {
  card.addEventListener("click", function () {
    document.querySelectorAll(".radio-card").forEach((c) => {
      c.classList.remove("selected");
    });
    this.classList.add("selected");
  });
});
    </script>
</body>
</html>
