<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_GET['key'];
 // $key1=$_COOKIE['lkey'];
$k=$obj->notificationselect($key);
$smartyObj->assign("data",$k);
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
    if(isset($_POST['notification'])AND($_POST['notification'])!=null)
    {
        $notification=trim($_POST['notification']);
        $obj->notificationupdate($notification,$key);
    }
    else
     echo "<script> alert('notification is empty')</script>";
}
// $smartyObj->display('usersubheader.tpl');
$smartyObj->display('notificationprofile.tpl');
// $smartyObj->display('footer.tpl');
}
else
{
    header("location:login.php");
}
?>  