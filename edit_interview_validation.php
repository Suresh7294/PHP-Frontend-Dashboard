<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $int_id = $_REQUEST['e_int_id'];
    $name = $_REQUEST['e_name'];
    $phone = $_REQUEST['e_phone'];
    $clg_name = $_REQUEST['e_clg_name'];
    $dept = $_REQUEST['e_dept'];
    $year = $_REQUEST['e_year'];
    $looking_for = $_REQUEST['e_looking_for'];
    $applied_date = $_REQUEST['e_applied_date'];
    $address = $_REQUEST['e_address'];
    $gender = $_REQUEST['e_gender'];
    $email = $_REQUEST['e_email'];
    $status = $_REQUEST['e_status'];
    $remarks = $_REQUEST['e_remarks'];

    $resume = $_FILES['e_resume']['name'];
    $temp_resume_loc = $_FILES['e_resume']['tmp_name'];

    $int_img = $_FILES['e_int_img']['name'];
    $tmp_loc = $_FILES['e_int_img']['tmp_name'];
    $e_size = $_FILES['e_int_img']['size'] / 1024;
    $e_type = $_FILES['e_int_img']['type'];

    $select_query = "select * from tbl_new_interview where interview_id='$int_id'";
    $result = mysqli_query($con, $select_query);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert('Interview ID not found');location.href='add-interview.php';</script>";
    } else {
        /* GET OLD IMAGE AND RESUME NAME */
        $old_data = mysqli_fetch_assoc($result);
        $old_img = $old_data['image'];
        $old_resume = $old_data['resume'];

        $resume_location = "assets/interview_resume";
        $resume_target_file = $int_id . "_" . $resume;
        $resume_filelocation = $resume_location . "/" . $resume_target_file;

        $location = "assets/interview_images";
        $target_file = $int_id . "_" . $int_img;
        $filelocation = $location . "/" . $target_file;

        if (!empty($int_img)) {
            move_uploaded_file($tmp_loc, $filelocation);
        } else {
            $target_file = $old_img;
        }


        if (!empty($resume)) {
            move_uploaded_file($temp_resume_loc, $resume_filelocation);
        } else {

            $resume_target_file = $old_resume;
        }



        $update_query = "update tbl_new_interview set  name='$name', phone='$phone', college_name='$clg_name', department='$dept', year='$year', looking_for='$looking_for', applied_date='$applied_date', gender='$gender', email='$email', address='$address', remarks='$remarks', image='$target_file', resume='$resume_target_file', delete_tab='$status' where interview_id='$int_id'";
        #echo $update_query;
        $res = mysqli_query($con, $update_query);
        #$rcount=mysqli_num_rows($res);
        if ($res) {
            #echo "registered succesfully";
            echo "<script>alert('Updated Successfully');location.href='L-interview.php';</script>";
        } else {
            echo "<script>alert('Update Error');location.href='edit_interview_form.php';</script>";

        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>