<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $e_id = $_REQUEST['emp_id'];
    $f_name = $_REQUEST['first_name'];
    $l_name = $_REQUEST['last_name'];
    $qualification = $_REQUEST['qualification'];
    $joining_date = $_REQUEST['joining_date'];
    $salary_package = $_REQUEST['salary_package'];
    $designation = $_REQUEST['designation'];
    $gender = $_REQUEST['gender'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    $address = $_REQUEST['address'];
    $status = $_REQUEST['status'];

    $emp_resume = $_FILES['emp_resume']['name'];
    $temp_resume_loc = $_FILES['emp_resume']['tmp_name'];


    $emp_img = $_FILES['emp_img']['name'];
    $tmp_loc = $_FILES['emp_img']['tmp_name'];
    $e_size = $_FILES['emp_img']['size'] / 1024;
    $e_type = $_FILES['emp_img']['type'];


    $id_query = "select ifnull(max(emp_auto_id),0) from tbl_register_employee";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;

    $squery = "select * from tbl_register_employee where emp_id='$e_id' or emp_email='$email' or emp_phone='$phone'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>alert('Already Exists');location.href='add-employee.php';</script>";
    } else {
        $resume_location = "assets/employee_resume";
        $resume_target_file = $e_id . "_" . $emp_resume;
        $resume_filelocation = $resume_location . "/" . $resume_target_file;

        $location = "assets/employee_images";
        $target_file = $e_id . "_" . $emp_img;
        $filelocation = $location . "/" . $target_file;

        if (file_exists($filelocation) and file_exists($resume_filelocation)) {

            echo "<script>alert('Sorry, file already exists.');location.href='add-employee.php';</script>";
        } else {

            if ((move_uploaded_file($tmp_loc, $filelocation)) and (move_uploaded_file($temp_resume_loc, $resume_filelocation))) {

                $query = "insert into tbl_register_employee(emp_auto_id,emp_id,emp_fname,emp_lname,emp_designation,emp_gender,emp_qualification,join_date,emp_phone,emp_email,address,emp_salary,emp_resume,emp_img,delete_tab) values ('$auto_id','$e_id','$f_name','$l_name','$designation','$gender','$qualification','$joining_date','$phone','$email','$address','$salary_package','$resume_target_file','$target_file','$status')";
                #echo $query;
                $res = mysqli_query($con, $query);
                #$rcount=mysqli_num_rows($res);
                if ($res) {
                    #echo "registered succesfully";
                    echo "<script>alert('Inserted Successfully');location.href='add-employee.php';</script>";
                } else {
                    echo "<script>alert('Insertion Error');location.href='add-employee.php';</script>";
                }
            } else {
                #echo $query;
                //echo "Sorry, there was an error uploading your file.";
                echo "<script>alert('Sorry, there was an error uploading your file.');location.href='add-employee.php';</script>";
            }

        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>