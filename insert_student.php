<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $std_id = $_REQUEST['std_id'];
    $std_name = $_REQUEST['std_name'];
    $std_email = $_REQUEST['std_email'];
    $std_phone = $_REQUEST['std_phone'];
    $course_name = $_REQUEST['std_course'];
    $category = $_REQUEST['std_category'];
    $joining_date = $_REQUEST['joining_date'];
    $course_fees = $_REQUEST['course_fees'];
    $duration = $_REQUEST['duration'];
    $status = $_REQUEST['status'];


    $std_img = $_FILES['std_img']['name'];
    $tmp_loc = $_FILES['std_img']['tmp_name'];
    $e_size = $_FILES['std_img']['size'] / 1024;
    $e_type = $_FILES['std_img']['type'];


    $id_query = "select ifnull(max(std_auto_id),0) from tbl_register_student";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;

    $squery = "select * from tbl_register_student where admission_id='$std_id' or student_email='$std_email' or student_phone='$std_phone'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>alert('Already Exists');location.href='add-student.php';</script>";
    } else {

        $location = "assets/student_images";
        $target_file = $std_id . "_" . $std_img;
        $filelocation = $location . "/" . $target_file;

        if (file_exists($filelocation)) {

            echo "<script>alert('Sorry, file already exists.');location.href='add-student.php';</script>";
        } else {

            if ((move_uploaded_file($tmp_loc, $filelocation))) {

                $query = "insert into tbl_register_student(std_auto_id,admission_id,student_name,student_email,student_phone,course_name,course_category,course_fees,duration,joining_date,student_img,delete_tab) values ('$auto_id','$std_id','$std_name','$std_email','$std_phone','$course_name','$category','$course_fees','$duration','$joining_date','$target_file','$status')";
                #echo $query;
                $res = mysqli_query($con, $query);
                #$rcount=mysqli_num_rows($res);
                if ($res) {
                    #echo "registered succesfully";
                    echo "<script>alert('Inserted Successfully');location.href='add-student.php';</script>";
                } else {
                    echo "<script>alert('Insertion Error');location.href='add-student.php';</script>";
                }
            } else {
                #echo $query;
                //echo "Sorry, there was an error uploading your file.";
                echo "<script>alert('Sorry, there was an error uploading your file.');location.href='add-student.php';</script>";
            }

        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>