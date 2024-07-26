<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_COOKIE['lkey']; 
$am=$_GET['amount'];
$key4=$_GET['key1'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	if(isset($_POST['name'])AND($_POST['name'])!=null)
	{
		if(isset($_POST['cardno'])AND($_POST['cardno'])!=null)
		{
			if(isset($_POST['month'])AND($_POST['month'])!=null)
			{
			     if(isset($_POST['year'])AND($_POST['year'])!=null)
				 {
		            if(isset($_POST['cvv'])AND($_POST['cvv'])!=null)
				    {
			                  $name=trim($_POST['name']);
			                  $cardno=trim($_POST['cardno']);
			                  $month=trim($_POST['month']);
			                  $year=trim($_POST['year']);
			                  $cvv=trim($_POST['cvv']);
			                  $obj->payment($name,$cardno,$month,$year,$cvv,$key,$am,$key4);
		                  }
		                  else
		                  echo "<script> alert('cvv is empty')</script>";	
	                    }
	                    else
	                    echo "<script> alert('year is empty')</script>";	
                      }
		              else
		              echo "<script> alert('month is empty')</script>";
		            }
		    		  else
		 		       echo "<script> alert('cardno is empty')</script>"; 
		 			 }
		            else
		            echo "<script> alert('name is empty')</script>";
		               
		      }
$smartyObj->display('subheader.tpl');
$smartyObj->display('payment.tpl');
$smartyObj->display('footer.tpl');
}
else
{
	header("location:login.php");
}
?>