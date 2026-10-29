<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $e_id = $_REQUEST['e_id'];
    $e_name = $_REQUEST['full_name'];
    $f_name = $_REQUEST['father_name'];
    $e_email = $_REQUEST['email'];
    $e_phone = $_REQUEST['mobile'];
    $e_alt_phone = $_REQUEST['alt_mobile'];
    $dob = $_REQUEST['dob'];
    $gender = $_REQUEST['gender'];
    $e_address = $_REQUEST['address'];
    $ug_degree = $_REQUEST['ug_degree'];
    $ug_passing_year = $_REQUEST['ug_year'];
    $ug_college = $_REQUEST['ug_college'];
    $pg_degree = $_REQUEST['pg_degree'];
    $pg_passing_year = $_REQUEST['pg_year'];
    $pg_college = $_REQUEST['pg_college'];
    $other_degree = $_REQUEST['others_qualification'];
    $background = $_REQUEST['background'];
    $designation = $_REQUEST['designation'];
    $experience = $_REQUEST['experience'];
    $location = $_REQUEST['location'];
    $early_course = $_REQUEST['early_course'];
    $early_course_loc = $_REQUEST['early_course_loc'];
    $reason = $_REQUEST['reason'];
    $other_reason = $_REQUEST['other_reason'];
    $course = $_REQUEST['course'];
    $selectedcourse = "";
    if (count($course) > 0) {
        for ($i = 0; $i < count($course); $i++) {
            $selectedcourse .= $course[$i] . ", ";
        }
    } else {
        $selectedcourse = "";
    }

    echo $selectedcourse;
    $other_course = $_REQUEST['other_course'];
    $message = $_REQUEST['message'];
    $enquiry_type = $_REQUEST['enquiry_type'];
    $recommendated_course = $_REQUEST['recommendated_course'];
    $couselor_name = $_REQUEST['counselor_name'];
    $feedback = $_REQUEST['feedback'];
    $enquiry_date = $_REQUEST['enquiry_date'];
    $course_duration = $_REQUEST['course_duration'];
    $admin_notes = $_REQUEST['admin_notes'];


    $e_img = $_FILES['e_img']['name'];
    #echo $e_img;

    $tmp_loc = $_FILES['e_img']['tmp_name'];
    $e_size = $_FILES['e_img']['size'] / 1024;
    $e_type = $_FILES['e_img']['type'];


    $id_query = "select ifnull(max(e_id_auto),0) from tbl_new_enquiry";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;

    $squery = "select * from tbl_new_enquiry where enquiry_id='$e_id' or email_id='$e_email' or phone='$e_phone'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>alert('Already Exists');location.href='add-enquiry.php';</script>";
    } else {
        $location = "assets/enquiry_images";
        $target_file = $e_id . "_" . $e_img;
        $filelocation = $location . "/" . $target_file;

        if (file_exists($filelocation)) {

            echo "<script>alert('Sorry, file already exists.');location.href='add-enquiry.php';</script>";
        } else {

            if (move_uploaded_file($tmp_loc, $filelocation)) {

                $query = "insert into tbl_new_enquiry(e_id_auto,enquiry_id,name,father_name,email_id,address,phone,alt_phone,dob,gender,ug_degree,ug_passedout_year,ug_clg,pg_degree,pg_passedout_year,pg_clg,other_degree,background,designation,experience,company,early_course,early_course_loc,reason,other_reason,course,message,other_course,enquiry_type,recommended_course,counselor,feedback,enquiry_date,course_duration,admin_notes,candidate_image,delete_tab) values ('$auto_id','$e_id','$e_name','$f_name','$e_email','$e_address','$e_phone','$e_alt_phone','$dob','$gender','$ug_degree','$ug_passing_year','$ug_college','$pg_degree','$pg_passing_year','$pg_college','$other_degree','$background','$designation','$experience','$location','$early_course','$early_course_loc','$reason','$other_reason','$selectedcourse','$message','$other_course','$enquiry_type','$recommendated_course','$couselor_name','$feedback','$enquiry_date','$course_duration','$admin_notes','$target_file','0')";
                #echo $query;
                $res = mysqli_query($con, $query);
                #$rcount=mysqli_num_rows($res);
                if ($res) {
                    #echo "registered succesfully";
                    echo "<script>alert('Inserted Successfully');location.href='add-enquiry.php';</script>";
                } else {
                    echo "<script>alert('Insertion Error');location.href='add-enquiry.php';</script>";
                }
            } else {
                #echo $query;
                //echo "Sorry, there was an error uploading your file.";
                echo "<script>alert('Sorry, there was an error uploading your file.');location.href='add-enquiry.php';</script>";
            }

        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>