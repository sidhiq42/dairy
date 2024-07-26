<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();

$key=$_GET['k'];
$obj->productdelete($key);

?>