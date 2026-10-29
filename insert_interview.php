<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $int_id = $_REQUEST['int_id'];
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $clg_name = $_REQUEST['clg_name'];
    $dept = $_REQUEST['dept'];
    $year = $_REQUEST['year'];
    $looking_for = $_REQUEST['looking_for'];
    $applied_date = $_REQUEST['applied_date'];
    $gender = $_REQUEST['gender'];
    $email = $_REQUEST['email'];
    $place = $_REQUEST['place'];
    $status = $_REQUEST['status'];
    $remarks = $_REQUEST['remarks'];

    $resume = $_FILES['resume']['name'];
    $temp_resume_loc = $_FILES['resume']['tmp_name'];


    $int_img = $_FILES['int_img']['name'];
    $tmp_loc = $_FILES['int_img']['tmp_name'];
    $e_size = $_FILES['int_img']['size'] / 1024;
    $e_type = $_FILES['int_img']['type'];


    $id_query = "select ifnull(max(interview_auto_id),0) from tbl_new_interview";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;

    $squery = "select * from tbl_new_interview where interview_id='$int_id' or email='$email' or phone='$phone'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>alert('Already Exists');location.href='add-interview.php';</script>";
    } else {
        $resume_location = "assets/interview_resume";
        $resume_target_file = $int_id . "_" . $resume;
        $resume_filelocation = $resume_location . "/" . $resume_target_file;

        $location = "assets/interview_images";
        $target_file = $int_id . "_" . $int_img;
        $filelocation = $location . "/" . $target_file;

        if (file_exists($filelocation) and file_exists($resume_filelocation)) {

            echo "<script>alert('Sorry, file already exists.');location.href='add-interview.php';</script>";
        } else {

            if ((move_uploaded_file($tmp_loc, $filelocation)) and (move_uploaded_file($temp_resume_loc, $resume_filelocation))) {

                $query = "insert into tbl_new_interview(interview_auto_id,interview_id ,name,phone,college_name,department,year,looking_for,applied_date,gender,email,address,remarks,image,resume,delete_tab) values ('$auto_id','$int_id','$name','$phone','$clg_name','$dept','$year','$looking_for','$applied_date','$gender','$email','$place','$remarks','$target_file','$resume_target_file','$status')";
                #echo $query;
                $res = mysqli_query($con, $query);
                #$rcount=mysqli_num_rows($res);
                if ($res) {
                    #echo "registered succesfully";
                    echo "<script>alert('Inserted Successfully');location.href='add-interview.php';</script>";
                } else {
                    echo "<script>alert('Insertion Error');location.href='add-interview.php';</script>";
                }
            } else {
                #echo $query;
                //echo "Sorry, there was an error uploading your file.";
                echo "<script>alert('Sorry, there was an error uploading your file.');location.href='add-interview.php';</script>";
            }

        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>