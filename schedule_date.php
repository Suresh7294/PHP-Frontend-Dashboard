<?php
session_start();
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {

    require "includes/dbcon.php";

    $in_id = $_GET['row_value'];

    $date = $_GET['schedule_date'];

    $sql = "update tbl_new_interview set scheduled_date='$date' where interview_id='$in_id'";

    $result = mysqli_query($con, $sql);

    if (($result) > 0) {
        echo "<script>location.href='L-interview.php';</script>";

    }
}
?>