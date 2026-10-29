<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $id = $_REQUEST['e_eve_id'];
    $eve_name = $_REQUEST['e_eve_name'];
    $eve_category = $_REQUEST['e_eve_category'];
    $eve_date = $_REQUEST['e_eve_date'];
    $eve_time = $_REQUEST['e_eve_time'];
    $eve_venue = $_REQUEST['e_eve_venue'];
    $eve_incharge = $_REQUEST['e_eve_incharge'];
    $eve_booked_by = $_REQUEST['e_eve_booked_by'];
    $phone = $_REQUEST['e_phone'];
    $description = $_REQUEST['e_description'];
    $eve_type = $_REQUEST['e_eve_type'];
    $status = $_REQUEST['e_status'];


    $eve_img = $_FILES['e_eve_img']['name'];
    $tmp_loc = $_FILES['e_eve_img']['tmp_name'];
    $e_size = $_FILES['e_eve_img']['size'] / 1024;
    $e_type = $_FILES['e_eve_img']['type'];

    $squery = "select * from tbl_register_event where event_auto_id='$id'";
    $result = mysqli_query($con, $squery);
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        echo "<script>alert('No Events Found');location.href='add-event.php';</script>";
    } else {
        $old_data = mysqli_fetch_assoc($result);
        $old_img = $old_data['event_venue_photo'];

        $location = "assets/event_images";
        $target_file = $auto_id . "_" . $eve_img;
        $filelocation = $location . "/" . $target_file;
    }

    if (!empty($eve_img)) {

        move_uploaded_file($tmp_loc, $filelocation);
    } else {
        $target_file = $old_img;
    }



    $query = "update tbl_register_event set event_name='$eve_name', category='$eve_category', event_date='$eve_date', event_time='$eve_time', event_venue='$eve_venue', event_incharge='$eve_incharge', booked_by='$eve_booked_by', phone='$phone', description='$description', event_mode='$eve_type', event_venue_photo='$target_file', delete_tab='$status' where event_auto_id='$id'";
    #echo $query;
    $res = mysqli_query($con, $query);
    #$rcount=mysqli_num_rows($res);
    if ($res) {
        #echo "registered succesfully";
        echo "<script>alert('Updated Successfully');location.href='L-event.php';</script>";
    } else {
        echo "<script>alert('Update Error');location.href='edit_event_form.php';</script>";
    }

} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>