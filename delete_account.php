<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $aid = $_GET['q'];
    $squery = "update tbl_user_accounts set delete_tab='InActive' where user_id=$aid";
    $result = mysqli_query($con, $squery);
    if ($result > 0) {
        #echo "$squery";
        echo "<script>alert('Deleted Successfully');location.href='L-accounts.php';</script>";
    } else {
        echo "<script>alert('Error  in Deleting');location.href='L-accounts.php';</script>";
    }


} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>