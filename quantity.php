<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_GET['k'];
$ckey=$_COOKIE['lkey'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	if(isset($_POST['quantity'])AND($_POST['quantity'])!=null)
	{
		$quantity=trim($_POST['quantity']);
		$obj->quantity($quantity,$key,$ckey);
	}
	else
     echo "<script> alert('quantity is empty')</script>";
}
$smartyObj->display('subheader.tpl');
$smartyObj->display('quantity.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>	