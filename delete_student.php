<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $a_id = $_REQUEST['q'];
    $squery = "update tbl_register_student set delete_tab='InActive' where admission_id='$a_id'";
    $result = mysqli_query($con, $squery);
    if ($result > 0) {
        echo "<script>alert('Deleted Successfully');location.href='L-students.php';</script>";
    } else {
        echo "<script>alert('Error  in Deleting');location.href='L-students.php';</script>";
    }


} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>