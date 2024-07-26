<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
	if(isset($_POST['name'])AND($_POST['name'])!=null)
	{
		if (preg_match('/^[A-Z a-z]*$/', $_POST['name']))
		{
		if(isset($_POST['address'])AND($_POST['address'])!=null)
		{
			if(isset($_POST['pincode'])AND($_POST['pincode'])!=null)
			{
				 if (preg_match('/^[0-9]*$/', $_POST['pincode']))
				{
				$no=strlen($_POST['pincode']);
				if($no==6)
					{
		       if(isset($_POST['contact'])AND($_POST['contact'])!=null)
			   { 
			   	if (preg_match('/^[0-9]*$/', $_POST['contact']))	
								{
								$nm1=strlen($_POST['contact']);
								if($nm1>=10 and $nm1<=12)
								{
			     if(isset($_POST['district'])AND($_POST['district'])!=null)
				 {
		            if(isset($_POST['city'])AND($_POST['city'])!=null)
				    {
			          if(isset($_POST['regid'])AND($_POST['regid'])!=null)
				      {
				      	if(isset($_POST['email'])AND($_POST['email'])!=null)
				        {
				      	  if(isset($_POST['password'])AND($_POST['password'])!=null)
				          {
			                  $name=trim($_POST['name']);
			                  $address=trim($_POST['address']);
			                  $pincode=trim($_POST['pincode']);
			                  $contact=trim($_POST['contact']);
			                  $district=trim($_POST['district']);
			                  $city=trim($_POST['city']);
			                  $regid=trim($_POST['regid']);
			                  $email=trim($_POST['email']);
			                  $password=trim($_POST['password']);
			                   $obj->subadminreg($name,$address,$pincode,$contact,$district,$city,$regid,$email,$password);
		                  }
		                  else
		                  echo "<script> alert('password is empty')</script>";	
	                    }
	                    else
	                    echo "<script> alert('email is empty')</script>";	
                      }
		              else
		              echo "<script> alert('regid is empty')</script>";
		            }
		            else
		            echo "<script> alert('city is empty')</script>";
		            }
		         else
		         echo "<script> alert('district is empty')</script>"; 
		         }
		          else
												echo "<script> alert('Phone number should be 10 digit or 12 digit')</script>";	
										}
										else
											echo "<script> alert('Please enter numbers for phone number')</script>";
                      }
		      else
		      echo "<script> alert('contact is empty')</script>"; 
		      }
		      else
															echo "<script> alert('pin number must contain 6 characters')</script>";
													}
													else
													echo "<script> alert('Please enter numbers for pincode')</script>";
		      }
		   else
		   echo "<script> alert('pincode is empty')</script>";	
		   }
		else
		echo "<script> alert('address is empty')</script>";
		}
		else
					echo "<script> alert('Please enter alphabets for last name') </script>";
		}
     else
     echo "<script> alert('name is empty')</script>";
     }
     $smartyObj->display('subheader.tpl');
$smartyObj->display('subadminreg.tpl');
$smartyObj->display('footer.tpl');
?>