<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$k=$obj->adminuserview();
$smartyObj->assign("data",$k);
$smartyObj->display('adminuserview.tpl');
}
else
{
	header("location:login.php");
}
?>