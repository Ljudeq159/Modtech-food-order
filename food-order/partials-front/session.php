<?php
 include('../food-order/config/constants.php');
$user_check=$_SESSION['user'];
$ses_sql=mysqli_query($conn,"SELECT id,user,contact FROM tbl_user where user='$user_check'");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$loggedin_session=$row['user'];
$loggedin_id=$row['id'];
$loggedin_contact=$row['contact'];
if(!isset($loggedin_session) || $loggedin_session==NULL) {
 echo "Go back";
 header('location:'.SITEURL.'../food-order/index.php');
}
?>