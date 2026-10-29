<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];

if ($username != null && $useremail != null) {

    $e_id = $_REQUEST['e_emp_id'];
    $f_name = $_REQUEST['e_first_name'];
    $l_name = $_REQUEST['e_last_name'];
    $qualification = $_REQUEST['e_qualification'];
    $joining_date = $_REQUEST['e_joining_date'];
    $salary_package = $_REQUEST['e_salary_package'];
    $designation = $_REQUEST['e_designation'];
    $gender = $_REQUEST['e_gender'];
    $email = $_REQUEST['e_email'];
    $phone = $_REQUEST['e_phone'];
    $address = $_REQUEST['e_address'];
    $status = $_REQUEST['e_status'];

    $emp_resume = $_FILES['e_emp_resume']['name'];
    $temp_resume_loc = $_FILES['e_emp_resume']['tmp_name'];

    $emp_img = $_FILES['e_emp_img']['name'];
    $tmp_loc = $_FILES['e_emp_img']['tmp_name'];
    $e_size = $_FILES['e_emp_img']['size'] / 1024;
    $e_type = $_FILES['e_emp_img']['type'];

    $squery = "select * from tbl_register_employee where emp_id='$e_id' ";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);

    if ($count == 0) {

        echo "<script>alert('No Records Found');location.href='add-employee.php';</script>";

    } else {

        /* GET OLD IMAGE AND RESUME NAME */
        $old_data = mysqli_fetch_assoc($result);
        $old_img = $old_data['emp_img'];
        $old_resume = $old_data['emp_resume'];

        $resume_location = "assets/employee_resume";
        $resume_target_file = $e_id . "_" . $emp_resume;
        $resume_filelocation = $resume_location . "/" . $resume_target_file;

        $location = "assets/employee_images";
        $target_file = $e_id . "_" . $emp_img;
        $filelocation = $location . "/" . $target_file;


        /* IMAGE */
        if (!empty($emp_img)) {

            move_uploaded_file($tmp_loc, $filelocation);

        } else {

            $target_file = $old_img;

        }


        /* RESUME */
        if (!empty($emp_resume)) {

            move_uploaded_file($temp_resume_loc, $resume_filelocation);

        } else {

            $resume_target_file = $old_resume;

        }


        $query = "update tbl_register_employee set emp_fname='$f_name',emp_lname='$l_name',emp_designation='$designation',emp_gender='$gender',emp_qualification='$qualification',join_date='$joining_date',emp_phone='$phone',emp_email='$email',address='$address',emp_salary='$salary_package',emp_resume='$resume_target_file',emp_img='$target_file',delete_tab='$status' where emp_id='$e_id'";
        
        #echo $query;

        $res = mysqli_query($con, $query);

        #$rcount=mysqli_num_rows($res);

        if ($res) {

            #echo "registered succesfully";

            echo "<script>alert('Employee Updated Successfully');location.href='L-Employees.php';</script>";

        } else {

            echo "<script>alert('Error updating employee record');location.href='edit-employee_form.php';</script>";

        }
    }

} else {

    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>