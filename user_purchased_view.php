<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_COOKIE['lkey'];
$k=$obj->user_purchased_view($key);
$smartyObj->assign("data",$k);
$smartyObj->display('usersubheader.tpl');
$smartyObj->display('user_purchased_view.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>