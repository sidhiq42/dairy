<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$lid=$_COOKIE['lkey'];
$key=$_GET['key'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
$obj->userjobapply($_FILES['fileupload'],$lid,$key);
}
 $smartyObj->display('usersubheader.tpl');
$smartyObj->display('userjobapply.tpl');
$smartyObj->display('footer.tpl');
}
else
{
    header("location:login.php");
}
?> 