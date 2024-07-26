n<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();


$key=$_GET['key'];
$obj->jobvacancydelete($jobcategory,$jobname,$jobdescription,$salary,$lastdateforapply,$qualification,$key);


?>