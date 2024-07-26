<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{

$key=$_GET['key'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	//echo "hai";exit;

			$obj->imageedit($_FILES['image'],$key);
	    
	
}
 $smartyObj->display('usersubheader.tpl');
$smartyObj->display('imageedit.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>