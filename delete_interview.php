<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $in_id = $_REQUEST['q'];
    $squery = "update tbl_new_interview set delete_tab='1' where interview_id='$in_id'";
    $result = mysqli_query($con, $squery);
    if ($result > 0) {
        echo "<script>alert('Deleted Successfully');location.href='L-interview.php';</script>";
    } else {
        echo "<script>alert('Error  in Deleting');location.href='L-interview.php';</script>";
    }


} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>