<?php
	require_once getcwd()."/Smarty/libs/Smarty.class.php";
	require_once getcwd()."/functions/functions.php";
	require_once getcwd()."/settings/config.php";
	mysql_connect($dbpath,$dbusername,$dbpassword);
	mysql_select_db($dbname);
	$smartyObj	=	new Smarty();
	$smartyObj	->	template_dir	=	"designs/templates"	;
	$smartyObj	->	compile_dir	=	"designs/compile";
	
?>