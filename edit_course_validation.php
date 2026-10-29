<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $c_id = $_REQUEST['e_c_id'];
    $c_name = $_REQUEST['e_c_name'];
    $c_desc = $_REQUEST['e_c_desc'];
    $c_category = $_REQUEST['e_c_category'];
    $c_fees = $_REQUEST['e_c_fees'];
    $c_min_dur = $_REQUEST['e_c_min_dur'];
    $c_max_dur = $_REQUEST['e_c_max_dur'];
    $c_img = $_FILES['e_c_img']['name'];
    #echo $c_img;

    $tmp_loc = $_FILES['e_c_img']['tmp_name'];
    $c_size = $_FILES['e_c_img']['size'] / 1024;
    $c_type = $_FILES['e_c_img']['type'];

    $c_status = $_REQUEST['e_status'];

    $select_query = "select * from tbl_register_course where course_id='$c_id'";
    $result = mysqli_query($con, $select_query);
    $count = mysqli_num_rows($result);
    if ($count < 1) {
        echo "<script>alert('No Records Found');location.href='edit_course_form.php';</script>";
    } else {
        $old_data = mysqli_fetch_array($result);
        $old_img = $old_data['course_image'];

        $location = "assets/course_images";
        $target_file = $c_id . "_" . $c_img;
        $filelocation = $location . "/" . $target_file;

        if (!empty($c_img)) {
            move_uploaded_file($tmp_loc, $filelocation);
        } else {
            $target_file = $old_img;
        }

        $query = "update tbl_register_course set course_name='$c_name',course_description='$c_desc',course_category='$c_category',course_price='$c_fees',min_duration='$c_min_dur',max_duration='$c_max_dur',course_image='$target_file',delete_tab='$c_status' where course_id='$c_id'";
        $res = mysqli_query($con, $query);
        #$rcount=mysqli_num_rows($res);
        #mysqli_affected_rows($con);
        
        if ($res) {
            #echo "registered succesfully";
            echo "<script>alert('Course updated successfully');location.href='L-course.php';</script>";
        } else {
            echo "<script>alert('Error updating course');location.href='edit_course_form.php';</script>";
        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>