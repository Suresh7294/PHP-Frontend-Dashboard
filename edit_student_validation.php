<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $std_id = $_REQUEST['e_std_id'];
    $std_name = $_REQUEST['e_std_name'];
    $std_email = $_REQUEST['e_std_email'];
    $std_phone = $_REQUEST['e_std_phone'];
    $course_name = $_REQUEST['e_std_course'];
    $category = $_REQUEST['e_std_category'];
    $joining_date = $_REQUEST['e_joining_date'];
    $course_fees = $_REQUEST['e_course_fees'];
    $duration = $_REQUEST['e_duration'];
    $status = $_REQUEST['e_status'];


    $std_img = $_FILES['e_std_img']['name'];
    $tmp_loc = $_FILES['e_std_img']['tmp_name'];
    $e_size = $_FILES['e_std_img']['size'] / 1024;
    $e_type = $_FILES['e_std_img']['type'];


    $query = "select * from tbl_register_student where admission_id='$std_id'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

    if ($count == 0) {
        echo "<script>alert('Student not found');location.href='add-student.php';</script>";
    } else {

        $old__data = mysqli_fetch_array($result);
        $old_img = $old__data['student_img'];

        $location = "assets/student_images";
        $target_file = $std_id . "_" . $std_img;
        $filelocation = $location . "/" . $target_file;
    }

    if (!empty($std_img)) {
        move_uploaded_file($tmp_loc, $filelocation);
    } else {
        $target_file = $old_img;
    }


    $update_query = "update tbl_register_student set student_name='$std_name', student_email='$std_email', student_phone='$std_phone', course_name='$course_name', course_category='$category', course_fees='$course_fees', duration='$duration', joining_date='$joining_date', student_img='$target_file', delete_tab='$status' where admission_id='$std_id'";
    #echo $query;
    $res = mysqli_query($con, $update_query);
    #$rcount=mysqli_num_rows($res);
    if ($res) {
        #echo "update succesfully";
        echo "<script>alert('Updated Successfully');location.href='L-students.php';</script>";
    } else {
        echo "<script>alert('Update Error');location.href='edit_student_form.php';</script>";
    }




} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>