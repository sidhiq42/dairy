n<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_COOKIE['lkey'];
$k=$obj->complaintview($key);
$smartyObj->assign("data",$k);
$smartyObj->display('usersubheader.tpl');
$smartyObj->display('usercomplaintview.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>