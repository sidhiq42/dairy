<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
// $key=$_COOKIE['lkey'];
$key=$_GET['key'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	if(isset($_POST['reply'])AND($_POST['reply'])!=null)
	{
		$reply=trim($_POST['reply']);
		$obj->reply($reply,$key);
	}
	else
     echo "<script> alert('reply is empty')</script>";
}
$smartyObj->display('subheader.tpl');
$smartyObj->display('reply.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}   
?>	