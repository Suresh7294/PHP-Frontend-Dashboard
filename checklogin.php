<?php 
session_start();
include "includes/dbcon.php";
$username=$_POST['user_name'];
$password=$_POST['user_password'];
$role=$_POST['user_role'];
$sql="select user_id,user_role,user_name,user_email from  tbl_user_accounts where (user_name='$username' or user_email='$username') and user_password='$password' ";

if($role=='Admin')
    {
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0)
            {
            list($userid,$userrole,$username,$useremail)=mysqli_fetch_array($result);
            $_SESSION['sessid']=$userid;
            $_SESSION['sessrole']=$userrole;
            $_SESSION['sessname']=$username;
            $_SESSION['sessemail']=$useremail;
            ?>
            <script>alert("Login Is Success");location.href='mainpage.php';</script>
            <?php
            }

            else
                {         
                ?>
            <script>alert("Login Is Failed");location.href='index.php';</script>
            <?php
            }
    }

?>