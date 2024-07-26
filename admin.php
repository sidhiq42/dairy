<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
	$k=$obj->countcomplaint();
	$smartyObj->assign("complaint",$k);
	$l=$obj->countjob();
	$smartyObj->assign("job",$l);
	$m=$obj->countuserreg();
	$smartyObj->assign("userreg",$m);
	$n=$obj->countfarmreg();
	$smartyObj->assign("farmreg",$n);
$smartyObj->display('ADMIN.tpl');
}
else
{
	header("location:login.php");
}
?>