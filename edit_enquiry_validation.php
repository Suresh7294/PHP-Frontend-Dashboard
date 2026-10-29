<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $e_id = $_REQUEST['e_e_id'];
    $e_name = $_REQUEST['e_full_name'];
    $f_name = $_REQUEST['e_father_name'];
    $e_email = $_REQUEST['e_email'];
    $e_phone = $_REQUEST['e_mobile'];
    $e_alt_phone = $_REQUEST['e_alt_mobile'];
    $dob = $_REQUEST['e_dob'];
    $gender = $_REQUEST['e_gender'];
    $e_address = $_REQUEST['e_address'];
    $ug_degree = $_REQUEST['e_ug_degree'];
    $ug_passing_year = $_REQUEST['e_ug_year'];
    $ug_college = $_REQUEST['e_ug_college'];
    $pg_degree = $_REQUEST['e_pg_degree'];
    $pg_passing_year = $_REQUEST['e_pg_year'];
    $pg_college = $_REQUEST['e_pg_college'];
    $other_degree = $_REQUEST['e_others_qualification'];
    $background = $_REQUEST['e_background'];
    $designation = $_REQUEST['e_designation'];
    $experience = $_REQUEST['e_experience'];
    $exp_location = $_REQUEST['e_company_location'];
    $early_course = $_REQUEST['e_early_course'];
    $early_course_loc = $_REQUEST['e_early_course_loc'];
    $reason = $_REQUEST['e_reason'];
    $other_reason = $_REQUEST['e_other_reason'];
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
    $other_course = $_REQUEST['e_other_course'];
    $message = $_REQUEST['e_message'];
    $enquiry_type = $_REQUEST['e_enquiry_type'];
    $recommendated_course = $_REQUEST['e_recommendated_course'];
    $couselor_name = $_REQUEST['e_counselor_name'];
    $feedback = $_REQUEST['e_feedback'];
    $enquiry_date = $_REQUEST['e_enquiry_date'];
    $course_duration = $_REQUEST['e_course_duration'];
    $admin_notes = $_REQUEST['e_admin_notes'];


    $e_img = $_FILES['e_e_img']['name'];
    #echo $e_img;

    $tmp_loc = $_FILES['e_e_img']['tmp_name'];
    $e_size = $_FILES['e_e_img']['size'] / 1024;
    $e_type = $_FILES['e_e_img']['type'];





    $squery = "select * from tbl_new_enquiry where enquiry_id='$e_id'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert('Enquiry not found');location.href='L-enquiry.php';</script>";
    } else {

        $old_data = mysqli_fetch_assoc($result);
        $old_img = $old_data['candidate_image'];

        $location = "assets/enquiry_images";
        $target_file = $e_id . "_" . $e_img;
        $filelocation = $location . "/" . $target_file;

        if ($e_img == '') {

            $target_file = $old_img;
        } else {

            move_uploaded_file($tmp_loc, $filelocation);
        }



        $query = "update tbl_new_enquiry set enquiry_id='$e_id', name='$e_name', father_name='$f_name', email_id='$e_email', address='$e_address', phone='$e_phone', alt_phone='$e_alt_phone', dob='$dob', gender='$gender', ug_degree='$ug_degree', ug_passedout_year='$ug_passing_year', ug_clg='$ug_college', pg_degree='$pg_degree', pg_passedout_year='$pg_passing_year', pg_clg='$pg_college', other_degree='$other_degree', background='$background', designation='$designation', experience='$experience', company='$exp_location', early_course='$early_course', early_course_loc='$early_course_loc', reason='$reason', other_reason='$other_reason', course='$selectedcourse', message='$message', other_course='$other_course', enquiry_type='$enquiry_type', recommended_course='$recommendated_course', counselor='$couselor_name', feedback='$feedback', enquiry_date='$enquiry_date', course_duration='$course_duration', admin_notes='$admin_notes', candidate_image='$target_file' where enquiry_id='$e_id'";
        #echo $query;
        $res = mysqli_query($con, $query);
        #$rcount=mysqli_num_rows($res);
        if ($res) {
            #echo "registered succesfully";
            echo "<script>alert('Updated Successfully');location.href='L-enquiry.php';</script>";
        } else {
            echo "<script>alert('Update Error');location.href='edit_enquiry_form.php';</script>";

        }

    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>