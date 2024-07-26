<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_GET['k'];
$amount=$_GET['amount'];
$contact=$_GET['contact'];
$obj->refund($key,$amount,$contact);
}
else
{
	header("location:login.php");
}
?>