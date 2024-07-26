<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_GET['k'];
$id1=$_COOKIE['lkey'];
$k=$obj->farm_feedback_view($key,$id1);
$smartyObj->assign("data",$k);
$smartyObj->display('farmsubheader.tpl');
$smartyObj->display('farm_feedback_view.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>