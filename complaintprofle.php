n<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_GET['k'];
 // $key1=$_COOKIE['lkey'];
$k=$obj->complaintselect($key);
$smartyObj->assign("data",$k);
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
    if(isset($_POST['complaint'])AND($_POST['complaint'])!=null)
    {
        $complaint=trim($_POST['complaint']);
        $obj->complaintupdate($complaint,$key);
    }
    else
     echo "<script> alert('complaint is empty')</script>";
}
$smartyObj->display('usersubheader.tpl');
$smartyObj->display('complaintprofile.tpl');
$smartyObj->display('footer.tpl');
}
else
{
    header("location:login.php");
}
?>  