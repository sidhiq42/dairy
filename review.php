<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{

$key=$_GET['k'];
// $key=$_COOKIE['lkey'];
$k=$obj->review($key);
$smartyObj->assign("data",$k);
$smartyObj->display('usersubheader.tpl');
$smartyObj->display('review.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>