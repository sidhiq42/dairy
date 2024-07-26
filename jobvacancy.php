<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{

$key=$_COOKIE['lkey'];
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	if(isset($_POST['jobcategory'])AND($_POST['jobcategory'])!=null)
	{
		if(isset($_POST['jobname'])AND($_POST['jobname'])!=null)
		{
			if(isset($_POST['jobdescription'])AND($_POST['jobdescription'])!=null)
			{
		       
			     if(isset($_POST['salary'])AND($_POST['salary'])!=null)
				 {
		            if(isset($_POST['lastdateforapply'])AND($_POST['lastdateforapply'])!=null)
				    {
			          if(isset($_POST['qualification'])AND($_POST['qualification'])!=null)
				      {
				      	 
			                  $jobcategory=trim($_POST['jobcategory']);
			                  $jobname=trim($_POST['jobname']);
			                  $jobdescription=trim($_POST['jobdescription']);
			                  $salary=trim($_POST['salary']);
			                  $lastdateforapply=trim($_POST['lastdateforapply']);
			                  $qualification=trim($_POST['qualification']);
			                  $obj->jobvacancy($jobcategory,$jobname,$jobdescription,$salary,$lastdateforapply,$qualification,$key);
		                  }
		                  else
		                  echo "<script> alert('qualifiaction is empty')</script>";	
	                    }
	                    else
	                    echo "<script> alert('date is empty')</script>";	
                      }
		              else
		              echo "<script> alert('salary is empty')</script>";
		            }
		    		  else
		 		       echo "<script> alert('job description is empty')</script>"; 
		 			 }
		            else
		            echo "<script> alert('job name is empty')</script>";
		            }
		         else
		         echo "<script> alert('job category is empty')</script>"; 
		        
		      }
		  
     $smartyObj->display('subheader.tpl');
$smartyObj->display('jobvacancy.tpl');
$smartyObj->display('footer.tpl');

}
else
{
	header("location:login.php");
}
?>