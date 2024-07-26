<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined'])&& $_COOKIE['logined']==1)
{
	$nm=$_COOKIE['ukey'];
	$ob=$obj->checkuser($nm);
	$ob1=$obj->count_display($nm);
	$smartyObj->assign("c",$ob1);
	$smartyObj->assign("result",$ob);
$smartyObj->display("header4.tpl");
$smartyObj->display("stationadmin.tpl");
$smartyObj->display("footer.tpl");
}
else
{	
	Header("location:login.php");
}
 
?>