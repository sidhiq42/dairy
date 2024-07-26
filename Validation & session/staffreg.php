<?php
	include_once "settings/settings.php";
	include_once "classes/userclass.php";
	$obj=new userclass();
	$nm=$_COOKIE['ukey'];
	if(isset($_POST['staffregister']) AND $_POST['staffregister']='regr')
	{
	if(isset($_POST['id']) AND $_POST['id']!=NULL)
		{
		if(isset($_POST['first']) AND $_POST['first']!=NULL)
			{
			if(isset($_POST['last']) AND $_POST['last']!=NULL)
				{
				if (preg_match('/^[A-Z a-z]*$/', $_POST['last']))
				{
					if(isset($_POST['addr1']) AND $_POST['addr1']!=NULL)
					{
						if(isset($_POST['addr2']) AND $_POST['addr2']!=NULL)
						{
							if(isset($_POST['addr3']) AND $_POST['addr3']!=NULL)
		 					{
								if(isset($_POST['dis']) AND $_POST['dis']!=NULL)
								{
								if(isset($_POST['dob']) AND $_POST['dob']!=NULL)
								{
									if(isset($_POST['gender']) AND $_POST['gender']!=NULL)
									{
										if(isset($_POST['des']) AND $_POST['des']!=NULL)
										{
											if(isset($_POST['sal']) AND $_POST['sal']!=NULL)
											{
											if (preg_match('/^[0-9]*$/', $_POST['sal']))	
											{
												if(isset($_POST['phno']) AND $_POST['phno']!=NULL)
												{
												if (preg_match('/^[0-9]*$/', $_POST['phno']))	
												{
												$nm1=strlen($_POST['phno']);
												if($nm1>=10 and $nm1<=12)
												{
													if(isset($_POST['pin']) AND $_POST['pin']!=NULL)
													{
													if (preg_match('/^[0-9]*$/', $_POST['pin']))
													{
													$no=strlen($_POST['pin']);
													if($no==6)
													{
														if(isset($_POST['email']) AND $_POST['email']!=NULL)
														{
															if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
															{
																echo "<script> alert ('Email id is not valid')</script>";
															}
																	$a=trim($_POST['id']);
																	$b=trim($_POST['first']);
																	$c=trim($_POST['last']);
																	$d=trim($_POST['addr1']);
																	$e=trim($_POST['addr2']);
																	$f=trim($_POST['addr3']);
																	$l=trim($_POST['dis']);
																	$m=trim($_POST['dob']);
																	$n=trim($_POST['gender']);
																	$g=trim($_POST['des']);
																	$h=trim($_POST['sal']);
																	$i=trim($_POST['phno']);
																	$j=trim($_POST['pin']);
																	$k=trim($_POST['email']);
																	
																	$result=$obj->staffregister($a,$b,$c,$d,$e,$f,$l,$m,$n,$g,$h,$i,$j,$k);
														}
																
														else
				
															echo "<script> alert('Email-ID is empty!')</script>";
				
													}
													else
															echo "<script> alert('pin number must contain 6 characters')</script>";
													}
													else
														echo "<script> alert('Please enter numbers for pincode')</script>";
												}
													else
											
														echo "<script> alert('Pincode is empty!')</script>";
												}	
												else
												echo "<script> alert('Phone number should be 10 digit or 12 digit')</script>";	
										}
										else
											echo "<script> alert('Please enter numbers for phone number')</script>";	
									}
												else
											
													echo "<script> alert('Please enter phone number!')</script>";
											
											}
											else
											echo "<script> alert('Please enter numbers for salary')</script>";	
									}
											else
										
												echo "<script> alert('Enter the salary!')</script>";
										
										}
										else
									
											echo "<script> alert('Designation is empty!')</script>";
									
									}
									
									else
											
										echo "<script> alert('Please select gender!')</script>";
											
								}
								else
											
									echo "<script> alert('Please enter date of birth!')</script>";
											
							}		
							else
									echo "<script> alert('Please select your district!')</script>";
							}
							else
								
								echo "<script> alert('Address line 3 is empty!')</script>";
								
						}
						else
							
							echo "<script> alert('Address line 2 is empty!')</script>";
							
					}
					else
						
						echo "<script> alert('Address line 1 is empty!')</script>";
						
				}
				else
					echo "<script> alert('Please enter alphabets for last name') </script>";	
				}
				else
					
					echo "<script> alert('Last name is empty!')</script>";
					
			}
			else
				echo "<script> alert('Please enter alphabets for firstname')</script>";	
			}
			else
				
				echo "<script> alert('First name is empty!')</script>";
				
		}
		else
			
			echo "<script> alert('Staff ID is empty!')</script>";
			
}
$ob=$obj->selectdesignation($nm);
$smartyObj->assign("des",$ob);
$ob1=$obj->count_display($nm);
$smartyObj->assign("c",$ob1);
$smartyObj->display("header4.tpl");
$smartyObj->display("staffreg.tpl");
$smartyObj->display("footer.tpl");
?>