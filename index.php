<?php
{
  ?><!DOCTYPE html>
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
    body{
      background: linear-gradient(90deg,#9ef1b0, #21e6e2);
      
    }
    .login-container input,
    .form-select {
      background: linear-gradient(90deg,
          rgba(16, 76, 79, 0.15),
          rgba(8, 55, 27, 0.15));
      border:none;
      border-radius: 8px;
      box-shadow:  1px 1px rgb(255, 255, 255);

    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="l-inner-container">
      <img src="./assets/images/login-lst-removebg.png" alt="Not Found" />
    </div>
    <div class="R-inner-container">
      <div class="logo">
        <img src="./assets/images/Lst logo.png" alt="not found" />
      </div>
      <form action="checklogin.php" name="" method="post">
        <div class="form-floating mb-3">
          <input type="text" name="user_name" class="form-control" id="floatingInput" placeholder="name@example.com" required/>
          <label for="floatingInput">Email or Username</label>
        </div>

        <div class="form-floating mb-3">
          <input type="password" name="user_password" class="form-control" id="floatingPassword" placeholder="Password" required />
          <label for="floatingPassword">Password</label>
        </div>

        <select  name="user_role" class="form-select form-select-sm mb-3 opt" aria-label=".form-select-sm example" required>
          <option value="0">--Select Account--</option>
          <option value="Admin">Admin</option>
          <option value="HR">HR</option>
          <option value="Employee">Employee</option>
        </select>
        <div class="d-grid gap-2 mb-3">
          
          <button class="btn-login btn" type="submit">LOGIN</button>
        </div>
      </form>
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
?>
