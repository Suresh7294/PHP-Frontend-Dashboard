<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $eve_name = $_REQUEST['eve_name'];
    $eve_category = $_REQUEST['eve_category'];
    $eve_date = $_REQUEST['eve_date'];
    $eve_time = $_REQUEST['eve_time'];
    $eve_venue = $_REQUEST['eve_venue'];
    $eve_incharge = $_REQUEST['eve_incharge'];
    $eve_booked_by = $_REQUEST['eve_booked_by'];
    $phone = $_REQUEST['phone'];
    $description = $_REQUEST['description'];
    $eve_type = $_REQUEST['eve_type'];
    $status = $_REQUEST['status'];


    $eve_img = $_FILES['eve_img']['name'];
    $tmp_loc = $_FILES['eve_img']['tmp_name'];
    $e_size = $_FILES['eve_img']['size'] / 1024;
    $e_type = $_FILES['eve_img']['type'];


    $id_query = "select ifnull(max(event_auto_id),0) from tbl_register_event";
    $i_result = mysqli_query($con, $id_query);
    list($auid) = mysqli_fetch_array($i_result);
    $auto_id = $auid + 1;

    $squery = "select * from tbl_register_event where event_name='$eve_name' and 	event_date='$eve_date'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        echo "<script>alert('Already Exists');location.href='add-event.php';</script>";
    } else {
        $location = "assets/event_images";
        $target_file = $auto_id . "_" . $eve_img;
        $filelocation = $location . "/" . $target_file;

        if (file_exists($filelocation)) {

            echo "<script>alert('Sorry, file already exists.');location.href='add-event.php';</script>";
        } else {

            if (move_uploaded_file($tmp_loc, $filelocation)) {

                $query = "insert into tbl_register_event(event_auto_id,event_name,category,event_date,event_time,event_venue,event_incharge,booked_by,phone,description,event_mode,event_venue_photo,delete_tab) values ('$auto_id','$eve_name','$eve_category','$eve_date','$eve_time','$eve_venue','$eve_incharge','$eve_booked_by','$phone','$description','$eve_type','$target_file','$status')";
                #echo $query;
                $res = mysqli_query($con, $query);
                #$rcount=mysqli_num_rows($res);
                if ($res) {
                    #echo "registered succesfully";
                    echo "<script>alert('Inserted Successfully');location.href='add-event.php';</script>";
                } else {
                    echo "<script>alert('Insertion Error');location.href='add-event.php';</script>";
                }
            } else {
                #echo $query;
                //echo "Sorry, there was an error uploading your file.";
                echo "<script>alert('Sorry, there was an error uploading your file.');location.href='add-event.php';</script>";
            }

        }
    }
} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>