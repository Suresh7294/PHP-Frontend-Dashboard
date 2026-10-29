<?php
session_start();
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {

    require "includes/dbcon.php";

    $student_id = $_GET['id'];

    $sql = "SELECT student_name
        FROM tbl_register_student
        WHERE admission_id = '$student_id'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);

        echo json_encode([
            "success" => true,
            "name" => $row['student_name']
        ]);

    } else {

        echo json_encode([
            "success" => false
        ]);
    }
}
?>