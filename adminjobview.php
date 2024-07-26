<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$k=$obj->adminjobview();
$smartyObj->assign("data",$k);
$smartyObj->display('adminjobview.tpl');
}
else
{
	header("location:login.php");
}
?>