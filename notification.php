<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
//$key=$_COOKIE['nkey'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	if(isset($_POST['notification'])AND($_POST['notification'])!=null)
	{
		$notification=trim($_POST['notification']);
		$obj->notification($notification);
	}
	else
     echo "<script> alert('notification is empty')</script>";
}
$smartyObj->display('subheader.tpl');
$smartyObj->display('notification.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>	