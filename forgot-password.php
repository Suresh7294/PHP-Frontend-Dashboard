<?php
session_start();
$userid=$_SESSION['sessid'];
 $userrole=$_SESSION['sessrole'];
 $username=$_SESSION['sessname'];
 $useremail=$_SESSION['sessemail'];
 if($username!=null && $useremail!=null)
    {
?><!DOCTYPE html>
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
    <div class="login-container">
        <div class="login-card mt-5">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="bi bi-key-fill"></i>
                </div>
                <h2>Forgot Password?</h2>
                <p>No worries! Enter your email address and we'll send you instructions to reset your password.</p>
            </div>

            <form id="forgotForm">
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div style="position: relative;">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" class="form-control" placeholder="Enter your registered email" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-login">Send Reset Link</button>
            </form>

            <div class="login-link mt-4">
                <a href="login.php">
                    <i class="bi bi-arrow-left"></i>
                    Back to Login
                </a>
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
    else{
?>
<script>alert('No Sessions Found');location.href='index.php';</script>
   <?php 
   }
    ?>