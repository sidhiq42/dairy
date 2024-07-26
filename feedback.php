<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_COOKIE['lkey'];
$pid=$_GET['k'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	if(isset($_POST['rating'])AND($_POST['rating'])!=null)
	{
		if(isset($_POST['comment'])AND($_POST['comment'])!=null)
		{
		$rating=trim($_POST['rating']);
		$comment=trim($_POST['comment']);
		$obj->feedback($rating,$comment,$key,$pid);
		}
		else
   	 	echo "<script> alert('rating is empty')</script>";
   	}
   	else
    echo "<script> alert('comment is empty')</script>";
}
$smartyObj->display('usersubheader.tpl');
$smartyObj->display('feedback.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>	