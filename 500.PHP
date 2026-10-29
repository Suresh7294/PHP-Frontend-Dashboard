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
    <title>Foodlytix - Admin Dashboard</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="./assets/icons/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="./assets/icons/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="./assets/icons/fontawesome/css/solid.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div class="error-code">500</div>
        <h1>Internal Server Error</h1>
        <p>Whoops! Our kitchen is having some technical difficulties. Our team has been notified and is working to fix the issue as quickly as possible.</p>

        <div class="btn-group">
            <a href="mainpage.php" class="btn-primary-custom">
                <i class="bi bi-house-door"></i>
                Back to Dashboard
            </a>
            <a href="javascript:location.reload()" class="btn-secondary-custom">
                <i class="bi bi-arrow-clockwise"></i>
                Try Again
            </a>
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
   <?php }
    ?>