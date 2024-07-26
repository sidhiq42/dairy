<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_destroy();
header("location:index.php");
?>