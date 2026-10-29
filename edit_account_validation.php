<?php
session_start();
include "includes/dbcon.php";
$userid = $_SESSION['sessid'];
$userrole = $_SESSION['sessrole'];
$username = $_SESSION['sessname'];
$useremail = $_SESSION['sessemail'];
if ($username != null && $useremail != null) {
    $aid = $_REQUEST['e_accountId'];
    $fullname = $_REQUEST['e_fullname'];
    $acemail = $_REQUEST['e_acemail'];
    $ac_role = $_REQUEST['e_ac_role'];
    $ac_pwd = $_REQUEST['e_ac_pwd'];
    $ac_status = $_REQUEST['e_ac_status'];
    $ac_pno = $_REQUEST['e_ac_pno'];

    $ac_img = $_FILES['e_ac_img']['name'];
    $tmploc = $_FILES['e_ac_img']['tmp_name'];
    $ac_size = $_FILES['e_ac_img']['size'] / 1024;
    $ac_type = $_FILES['e_ac_img']['type'];


    $select_query = "select * from tbl_user_accounts where account_id='$aid';";
    $result = mysqli_query($con, $select_query);
    $count = mysqli_num_rows($result);
    if ($count < 1) {
        echo "<script>alert('No account found with the provided ID');location.href='add-account.php';</script>";
    } else {
        $old_data = mysqli_fetch_array($result);
        $old_img = $old_data['user_img'];

        $location = "assets/accounts_img";
        $target_file = $aid . "_" . $ac_img;
        $filelocation = $location . "/" . $target_file;
    }

    if (!empty($ac_img)) {
        move_uploaded_file($tmploc, $filelocation);
    } else {
        $target_file = $old_img;
    }

    $update_query = "update tbl_user_accounts set user_name='$fullname',user_role='$ac_role',user_email='$acemail',user_password='$ac_pwd',phone='$ac_pno',user_img='$target_file',delete_tab='$ac_status' where account_id='$aid'";

    $res = mysqli_query($con, $update_query);
    if ($res) {
        echo "<script>alert('Account updated successfully');location.href='L-accounts.php';</script>";
    } else {
        echo "<script>alert('Error updating account');location.href='edit_account_form.php';</script>";
    }


} else {
    echo "<script>alert('No Sessions Found');location.href='index.php';</script>";

}

?>