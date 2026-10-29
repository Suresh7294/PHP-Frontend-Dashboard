<?php
session_start();
include "includes/dbcon.php";
$userid=$_SESSION['sessid'];
$userrole=$_SESSION['sessrole'];
$username=$_SESSION['sessname'];
$useremail=$_SESSION['sessemail'];
if($username!=null && $useremail!=null)
{
   $aid=$_REQUEST['accountId'];
   $fullname=$_REQUEST['fullname'];
   $acemail=$_REQUEST['acemail'];
   $ac_role=$_REQUEST['ac_role'];
        $ac_pwd=$_REQUEST['ac_pwd'];
        $ac_status=$_REQUEST['ac_status'];
        $ac_pno=$_REQUEST['ac_pno'];
        $ac_img=$_FILES['ac_img']['name'];
        $tmploc=$_FILES['ac_img']['tmp_name'];
        $ac_size=$_FILES['ac_img']['size']/1024;
        $ac_type=$_FILES['ac_img']['type'];
        $id_query="select ifnull(max(user_id),0) from tbl_user_accounts";
        $i_result=mysqli_query($con,$id_query);
        list($auid)=mysqli_fetch_array($i_result);
        $auto_id=$auid+1;

        $squery="select * from tbl_user_accounts where account_id='$aid'  or user_email='$acemail' or phone='$ac_pno' and user_role='$ac_role'";
        $result=mysqli_query($con,$squery);
        $count=mysqli_num_rows($result);
        if($count>0)
        {
        echo "<script>alert('Already Exists');location.href='add-account.php';</script>";
        }
        else
        {  
        $location="assets/accounts_img";
        $target_file=$aid."_".$ac_img;
      
        if(file_exists($location."/".$target_file)) 
        {
        echo "<script>alert('Sorry, file already exists.');location.href='add-account.php';</script>";
        }
        else
        {   
   
        if(move_uploaded_file($tmploc,$location."/".$target_file)) 
        {
    
        //echo "The file ". htmlspecialchars(basename( $_FILES["ac_img"]["name"])). " has been uploaded.";
        $query="insert into tbl_user_accounts(user_id,account_id,user_name,user_role,user_email,user_password,phone,user_img,delete_tab) values('$auto_id','$aid','$fullname','$ac_role','$acemail','$ac_pwd','$ac_pno','$target_file','$ac_status')";       

        $res=mysqli_query($con,$query);
    if($res)
    {
     echo "<script>alert('Registered Successfully');location.href='add-account.php';</script>"; 
    }
    else
    {
    echo "<script>alert('Registration Error');location.href='add-account.php';</script>"; 
    }
        } 
        else 
        {
        
        echo "<script>alert('Sorry, there was an error uploading your file.');location.href='add-account.php';</script>";
        }         
    
    }
}
    }
else
    {
echo "<script>alert('No Sessions Found');location.href='index.php';</script>";
 
   }

    ?>