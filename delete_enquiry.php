<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $enq_id = $_REQUEST['q'];
    $squery = "update tbl_new_enquiry set delete_tab='1' where enquiry_id='$enq_id'";
    $result = mysqli_query($con, $squery);
    if ($result > 0) {
        echo "<script>alert('Deleted Successfully');location.href='L-enquiry.php';</script>";
    } else {
        echo "<script>alert('Error  in Deleting');location.href='L-enquiry.php';</script>";
    }


} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>