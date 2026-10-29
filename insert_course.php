<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $c_id = $_REQUEST['c_id'];
    $c_name = $_REQUEST['c_name'];
    $c_desc = $_REQUEST['c_desc'];
    $c_category = $_REQUEST['c_category'];
    $c_fees = $_REQUEST['c_fees'];
    $c_min_dur = $_REQUEST['c_min_dur'];
    $c_max_dur = $_REQUEST['c_max_dur'];
    $c_img = $_FILES['c_img']['name'];
    #echo $c_img;

    $tmp_loc = $_FILES['c_img']['tmp_name'];
    $c_size = $_FILES['c_img']['size'] / 1024;
    $c_type = $_FILES['c_img']['type'];

    $c_status = $_REQUEST['status'];
    $id_query = "select ifnull(max(c_id_auto),0) from tbl_register_course";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;

    $squery = "select * from tbl_register_course where course_id='$c_id' or course_name='$c_name'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>alert('Already Exists');location.href='add-course.php';</script>";
    } else {
        $location = "assets/course_images";
        $target_file = $c_id . "_" . $c_img;
        $filelocation = $location . "/" . $target_file;

        if (file_exists($filelocation)) {

            echo "<script>alert('Sorry, file already exists.');location.href='add-course.php';</script>";
        } else {

            if (move_uploaded_file($tmp_loc, $filelocation)) {

                $query = "insert into tbl_register_course(c_id_auto,course_id,course_name,course_description,course_category,course_price,min_duration,max_duration,course_image,delete_tab) values('$auto_id','$c_id','$c_name','$c_desc','$c_category','$c_fees','$c_min_dur','$c_max_dur','$target_file','$c_status')";
                $res = mysqli_query($con, $query);
                #$rcount=mysqli_num_rows($res);
                #mysqli_affected_rows($con);
                if ($res) {
                    #echo "registered succesfully";
                    echo "<script>alert('Registered Successfully');location.href='add-course.php';</script>";
                } else {
                    echo "<script>alert('Registration Error');location.href='add-course.php';</script>";
                }
            } else {
                #echo $query;
                echo "Sorry, there was an error uploading your file.";
                #echo "<script>alert('Sorry, there was an error uploading your file.');location.href='add-course.php';</script>";
            }

        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>