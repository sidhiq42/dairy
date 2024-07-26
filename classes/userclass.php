<?php
class userclass
{
	function subadminreg($name,$address,$pincode,$contact,$district,$city,$regid,$email,$password)
	{
		$enc=md5($password);
		$key=uniquekey("login","lkey");
		$qry="insert into login(lkey,email,password,type)values('".$key."','".$email."','".$enc."','2')";
		$exe=mysql_query($qry);
		$key1=uniquekey("farmreg","fkey");
		$loginid=keytoid("login","lkey",$key);
		$qry1="insert into farmreg(fkey,name,address,pincode,contact,district,city,regid,loginid)values('".$key1."','".$name."','".$address."','".$pincode."','".$contact."','".$district."','".$city."','".$regid."','".$loginid."')";
		$exe1=mysql_query($qry1);
		if($exe&&$exe1)
		 {
			echo "<script>alert('Registration successful')</script>";
		 }
		else
		{
			echo "<script>alert('Registration unsuccessful')</script>";
		}
	}	

	function userreg($name,$address,$pincode,$contact,$district,$city,$email,$password,$gender)
	{
		$enc=md5($password);
		$key=uniquekey("login","lkey");
		$qry="insert into login(lkey,email,password,type)values('".$key."','".$email."','".$enc."','1')";
		$exe=mysql_query($qry);
		$key1=uniquekey("userreg","ukey");
		$id=keytoid("login","lkey",$key);
		$qry1="insert into userreg(ukey,name,address,pincode,district,city,gender,contact,loginid)values('".$key1."','".$name."','".$address."','".$pincode."','".$district."','".$city."','".$gender."','".$contact."','".$id."')";
		// echo $qry1;exit;
		$exe1=mysql_query($qry1);
		if($exe&&$exe1)
		 {
			echo "<script>alert('Registration successful')</script>";
		 }
		else
		{
			echo "<script>alert('Registration unsuccessful')</script>";
		}
	}
	function adminuserview()
	{
		$qry="select * from userreg inner join login on login.id=userreg.loginid";
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function adminfarmview()
	{
		$qry="select * from farmreg inner join login on login.id=farmreg.loginid";
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}	
	function userselect($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="select * from userreg inner join login on login.id=userreg.loginid where loginid='".$id."'";
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function userprofile($name,$address,$pincode,$contact,$district,$city,$email,$gender,$key)	
	{
		$id=keytoid("login","lkey",$key);
		$qry="update userreg set name='".$name."',address='".$address."',pincode='".$pincode."',contact='".$contact."',district='".$district."',city='".$city."',gender='".$gender."' where loginid='".$id."'";
		$exe=mysql_query($qry);
		$qry1="update login set email='".$email."' where id='".$id."'";
		$exe1=mysql_query($qry1);
		if($exe && $exe1)
		{
		echo "<script>alert('Updation successful')</script>";	
		}
		else
		{
			echo "<script>alert('Updation Unsuccessful')</script>";
		}

	}
	function subadminselect($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="select * from farmreg inner join login on login.id=farmreg.loginid where loginid='".$id."'";
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function subadminprofile($name,$address,$pincode,$contact,$district,$city,$regid,$email,$key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="update farmreg set name='".$name."',address='".$address."',pincode='".$pincode."',contact='".$contact."',district='".$district."',city='".$city."',regid='".$regid."' where loginid='".$id."'";
	    $exe=mysql_query($qry);
		$qry1="update login set email='".$email."' where id='".$id."'";
		$exe1=mysql_query($qry1);
		if($exe && $exe1)
		{
		echo "<script>alert('Updation successful')</script>";	
		}
		else
		{
			echo "<script>alert('Updation Unsuccessful')</script>";
		}

	}
	function login($email,$password)
	{
		$enc=md5($password);
		$qry="select * from login where email='".$email."' and password='".$enc."'";
		$exe=mysql_query($qry);
		$key=null;
		$c=0;
		while($rr=mysql_fetch_array($exe))
		{
			$key=$rr['lkey'];
			$type=$rr['type'];
			$c=$c+1;
		}
		if($c>0)
		{
			setcookie("lkey",$key);
			setcookie("logined",1);
			if($type==0)
			{
				header("location:admin.php");
			}
			else if($type==1)
			{
				header("location:userhome.php");
			}
			else
			{
				header("location:farmhome.php");
			}
		}
		else
		{
			echo"<script>alert('invalid username/password')</script>";
		}
	}
	function adminapproveuser($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="update login set status='1'  where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
		echo "<script>alert('Approved successfully');window.location.href='adminuserview.php';</script>";	
		}
		else
		{
			echo "<script>alert('Something went wrong!!!')</script>";
		}
	}	
	function adminrejectuser($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="update login set status='2'  where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
		echo "<script>alert('Rejected successfully');window.location.href='adminuserview.php';</script>";	
		}
		else
		{
			echo "<script>alert('Something went wrong!!!')</script>";
		}
	}	
	function adminapprovefarm($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="update login set status='1'  where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
		echo "<script>alert('Approved successfully');window.location.href='adminfarmview.php';</script>";	
		}
		else
		{
			echo "<script>alert('Something went wrong!!!')</script>";
		}
	}	
	function adminrejectfarm($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="update login set status='2'  where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
		echo "<script>alert('Rejected successfully');window.location.href='adminfarmview.php';</script>";	
		}
		else
		{
			echo "<script>alert('Something went wrong!!!')</script>";
		}
	}
	function complaint($complaint,$key)
	{
		$id=keytoid("login","lkey",$key);
		$key1=uniquekey("complaints","ckey");
		$date=date('Y-m-d');
		$qry="insert into complaints(ckey,complaint,login_id,currentdate)values('".$key1."','".$complaint."','".$id."',
		'".$date."')";
		// echo$qry;exit();
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Complainted successfully')</script>";
		}	
		else
		{
			echo "<script>alert('Complaint unsuccessful')</script>";
		}
	}
	
	function complaintview($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="select * from complaints inner join login on login.id=complaints.login_id where complaints.login_id='".$id."'";
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function complaintselect($key1)
	{
		$id=keytoid("complaints","ckey",$key1);
		// $qry="select * from complaints inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from complaints inner join login on login.id=complaints.login_id where complaints.id='".$id."'";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}	
	function complaintupdate($complaint,$key)
	{
		$id=keytoid("complaints","ckey",$key);
		$qry="update complaints set complaint='".$complaint."' where id='".$id."'";
		// echo$qry;exit;
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Updated successfully')</script>";
		}
		else
		{
			echo "<script>alert('Updation unsuccessfull')</script>";
		}
	}
	function complaintdelete($key)
	{
		$id=keytoid("complaints","ckey",$key);
		$qry="delete from complaints where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Deleted  successfully');window.location.href='usercomplaintview.php';</script>";
		}
		else
		{
			echo "<script>alert('Deletion unsuccessfull');window.location.href='usercomplaintview.php';</script>";
		}
	}
	function admincomplaintview()
	{
		// $id=keytoid("complaints","ckey",$key1);
		 $qry="select * from complaints inner join userreg on userreg.loginid=complaints.login_id order by currentdate desc";
		//$qry="select * from complaints order by currentdate desc";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe)) 
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function reply($reply,$key)
	{
		$id=keytoid("complaints","ckey",$key);

		$qry1="update complaints set reply='".$reply."' where id='".$id."'";
		$exe1=mysql_query($qry1);
		if($exe1)
		{
		echo "<script>alert('reply successful');window.location.href='admincomplaintview.php';</script>";
		}
		else
		{
			echo "<script>alert('reply Unsuccessful')</script>";
		}
	}	
		function notification($notification)
	{
		//$id=keytoid("login","lkey",$key);
		$key1=uniquekey("notification","nkey");
		$date=date('Y-m-d');
		$qry="insert into notification(nkey,notification,currentdate)values('".$key1."','".$notification."',
		'".$date."')";
		 //echo$qry;exit();
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Notification sent successfully')</script>";
		}	
		else
		{
			echo "<script>alert('Notification not sented')</script>";
		}
	}
	function jobvacancy($jobcategory,$jobname,$jobdescription,$salary,$lastdateforapply,$qualification,$key)
	{
		$id=keytoid("login","lkey",$key);
		$key1=uniquekey("jobvacancy","jkey");
		$date=date('Y-m-d');
		$qry="insert into jobvacancy(jkey,jobcategory,jobname,jobdescription,salary,lastdateforapply,qualification,currentdate)values('".$key1."','".$jobcategory."','".$jobname."','".$jobdescription."','".$salary."','".$lastdateforapply."','".$qualification."','".$date."')";
		// echo$qry;exit();
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('job vacancy added successfully')</script>";
		}	
		else
		{
			echo "<script>alert('job vacancy not add')</script>";
		}
	}
	function jobvacancyuserview()
	{
		// $id=keytoid("complaints","ckey",$key1);
		// $qry="select * from jobvacancy inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from jobvacancy";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr; 
		}
		return $arr;
	}
	function notificationselect($key1)
	{
		$id=keytoid("notification","nkey",$key1);
		// $qry="select * from complaints inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from notification  where notification.id='".$id."'";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}	
	function notificationupdate($notification,$key)
	{
		$id=keytoid("notification","nkey",$key);
		$qry="update notification set notification='".$notification."' where id='".$id."'";
		// echo$qry;exit;
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Updated successfully');window.location.href='adminnotificationview.php';</script>";
		}
		else
		{
			echo "<script>alert('Updation unsuccessfull')</script>";
		}
	}
	function notificationdelete($key)
	{
		$id=keytoid("notification","nkey",$key);
		$qry="delete from notification where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Deleted  successfully');window.location.href='adminnotificationview.php';</script>";
		}
		else
		{
			echo "<script>alert('Deletion unsuccessfull');window.location.href='adminnotificationview.php';</script>";
		}
	}
	function adminnotificationview()
	{
		// $id=keytoid("complaints","ckey",$key1);
		// $qry="select * from complaints inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from  notification  order by currentdate desc";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function usernotificationview($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="select * from notification order by currentdate desc";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}		
	function jobvacancyprofile($jobcategory,$jobname,$jobdescription,$salary,$lastdateforapply,$qualification,$key)
	{
		$id=keytoid("jobvacancy","jkey",$key);
		$key1=uniquekey("jobvacancy","jkey");
		$date=date('Y-m-d');
		$qry="update jobvacancy set jobcategory='".$jobcategory."',jobname='".$jobname."',jobdescription='".$jobdescription."',salary='".$salary."',lastdateforapply='".$lastdateforapply."',qualification='".$qualification."' where id='".$id."'";
		// echo$qry;exit();
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('job vacancy edited successfully')</script>";
		}	
		else
		{
			echo "<script>alert('job vacancy editing not successful')</script>";
		}
	}
	function jobvacancydelete($jobcategory,$jobname,$jobdescription,$salary,$lastdateforapply,$qualification,$key)
	{
		$id=keytoid("jobvacancy","jkey",$key);
		$qry="delete from jobvacancy where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Deleted  successfully');window.location.href='adminjobvacancyview.php';</script>";
		}
		else
		{
			echo "<script>alert('Deletion unsuccessfull');window.location.href='adminjobvacancyview.php';</script>";
		}
	}
	function adminjobvacancyview()
	{
		// $id=keytoid("complaints","ckey",$key1);
		// $qry="select * from complaints inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from jobvacancy  order by currentdate desc";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function jobvacancyselect($key)
	{
		$id=keytoid("jobvacancy","jkey",$key);
		$qry="select * from jobvacancy  where id='".$id."'";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function userjobapply($file=null,$lid,$key)
	{
		$id=keytoid("login","lkey",$lid);
		$key1=uniquekey("qualification","qkey");
		$jobid=keytoid("jobvacancy","jkey",$key);
		$date=date('Y-m-d');
		$qry="insert into qualification(qkey,fileupload,currentdate,jobid,loginid)
		values('".$key1."','".$file['name']."','".$date."','".$jobid."','".$id."')";
		//echo $qry;exit();
		$d="upload/".$key1;

		// echo$qry;exit();
		$enc=mysql_query($qry);
		if($enc)
		{
			mkdir($d);
			move_uploaded_file($file['tmp_name'],$d."/".$file['name']);
			echo "<script>alert('applied successfully');	
				window.location.href='userjobapply.php?key=$key'</script>";
		}	
		else
		{
			echo"<script>alert(' unsuccessful')</script>";
		}
	}
	function adminjobview()
	{

		$qry="select * from qualification inner join jobvacancy on jobvacancy.id=qualification.jobid  inner join userreg on userreg.loginid=qualification.loginid";
		// echo $qry;exit;
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function adminapprovejob($key)
	{
		$id=keytoid("qualification","qkey",$key);
		$qry="update qualification set status='1'  where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
		    echo "<script>alert('Approved successfully');window.location.href='adminjobview.php';</script>";
					}
	}
	function adminrejectjob($key)
	{
		$id=keytoid("qualification","qkey",$key);
		$qry="update qualification set status='2'  where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
		echo "<script>alert('Rejected successfully');window.location.href='adminjobview.php';</script>";	
		}
		else
		{
			echo "<script>alert('Something went wrong!!!')</script>";
		}
	}
	function jobstatusview()
	{

		$qry="select * from qualification inner join jobvacancy on jobvacancy.id=qualification.jobid  inner join userreg on userreg.loginid=qualification.loginid";
		// echo $qry;exit;
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function productadd($category,$name,$amount,$quantity,$details,$_file=NULL,$key)
	{
		$id=keytoid("login","lkey",$key);
		//echo$id;exit;
		$key1=uniquekey("product","pkey");
		$date=date('Y-m-d');
		$qry="insert into product(pkey,	productcat,productname,amount,details,quantity,image,loginid,currentdate)
			values('".$key1."','".$category."','".$name."','".$amount."','".$details."','".$quantity."','".$_file['name']."','".$id."','".$date."')";
		$d="upload/".$key1;

		// echo$qry;exit();
		$enc=mysql_query($qry);
		if($enc)
		{
			mkdir($d);
			move_uploaded_file($_file["tmp_name"],$d."/".$_file["name"]);
			echo "<script>alert('product added successfully')</script>";
		}	
		else
		{
			echo "<script>alert('Product not added ')</script>";
		}
	}
	function farmviewproduct()
	{

		$qry="select * from product order by currentdate desc";
		// echo $qry;exit;
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}	
	function productselect($key1)
	{
		$id=keytoid("product","pkey",$key1);
		// $qry="select * from complaints inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from product where id='".$id."'";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}	
	function productedit($category,$name,$amount,$quantity,$details,$key)
	{
		$id=keytoid("product","pkey",$key);
		$qry="update product set productcat='".$category."',productname='".$name."',details='".$details."',quantity='".$quantity."',amount='".$amount."' where id='".$id."'";
		//echo$qry;exit;
		

		// echo$qry;exit();
		$enc=mysql_query($qry);
		if($enc)
		{
			
			echo "<script>alert('Update successfully');window.location.href='farmviewproduct.php';</script>";
		}
		else
		{
			echo "<script>alert('Updation unsuccessfull');window.location.href='farmviewproduct.php';</script>";
		}
	}
	function productdelete($key)
	{
		$id=keytoid("product","pkey",$key);
		$qry="delete from product where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Deleted  successfully');window.location.href='farmviewproduct.php';</script>";
		}
		else
		{
			echo "<script>alert('Deletion unsuccessfull');window.location.href='farmviewproduct.php';</script>";
		}
	}
	function imageedit($file=null,$key)
	{
		$id=keytoid("product","pkey",$key);
		$qry="update  product set image='".$file['name']."' where id='".$id."'";
		//echo $qry;exit();
		$d="upload/".$key1;

		//// echo$qry;exit();
		$enc=mysql_query($qry);
		if($enc)
		{
			mkdir($d);
			move_uploaded_file($file['tmp_name'],$d."/".$file['name']);
			echo "<script>alert('successfully');	
				window.location.href='imageedit.php?key=$key'</script>";
		}	
		else
		{
			echo"<script>alert(' unsuccessful')</script>";
		}
	}
	function userviewproduct($key1)
	{
				// $id=keytoid("product","pkey",$key1);

		$id=keytoid("login","lkey",$key1);
		// $qry="select * from complaints inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from product ";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function productsearch($search,$key1)
	{
				// $id=keytoid("product","pkey",$key1);

		$id=keytoid("login","lkey",$key1);
		// $qry="select * from complaints inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from product where productcat='".$search."' or productname='".$search."' ";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function quantity($quantity,$key,$ckey)
	{
		$id=keytoid("product","pkey",$key);
		$lid=keytoid("login","lkey",$ckey);
		$key1=uniquekey("path","bkey");
		$date=date('Y-m-d');

$qry12="select amount from product where id='".$id."' ";
		// echo $qry;exit();
				$exe12=mysql_query($qry12);
		$arr=null;
		while($rr=mysql_fetch_array($exe12))
		{
			$arr=$rr['amount'];
		}
		$am=$arr*$quantity;



		$qry="insert into path(bkey,loginid,productid,quantity,amount,currentdate)values('".$key1."','".$lid."','".$id."','".$quantity."','".$am."','".$date."')";
		// echo$qry;exit();
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('quantity added successfully');window.location.href='payment.php?amount={$am}&&key1={$key1}';</script>";
		}	
		else
		{
			echo "<script>alert('quantity not add')</script>";
		}
	}
	function payment($name,$cardno,$month,$year,$cvv,$key,$am,$key4)
    {
    	$qry="select totalamount from bank where cvv='".$cvv."' and cardno='".$cardno."'";
    	$exe=mysql_query($qry);
    	$bt=null;
    	while($rr=mysql_fetch_array($exe))
    	{
    		$bt=$rr['totalamount'];
    	}
    	if($bt>=$am)
    	{
    		$bt1=$bt-$am;
    		$lid=keytoid("login","lkey",$key);
    		$key=uniquekey("payment","pakey");
    		$date=date('y-m-d');
    		$ins="insert into payment(pakey,name,cardno,cvv,expmonth,expyear,totalamount,loginid,currentdate)values('".$key."','".$name."','".$cardno."','".$cvv."','".$month."','".$year."','".$am."','".$lid."','".$date."')";
    		// echo $ins;exit();
    		$q1="update bank set totalamount='".$bt1."' where cardno='".$cardno."' and cvv='".$cvv."'";
    		$q2="update path set status='1' where bkey='".$key4."'";
    		//echo$q2;exit;
    		$exe2=mysql_query($q2);
    		$exe=mysql_query($ins);
    		$exe1=mysql_query($q1);
    		if($exe)
    		{
    			echo"<script> alert('payment successful');window.location.href='userviewproduct.php'</script>";
    		}
    		else
    		echo"<script> alert('payment unsuccessful')</script>";
        }
    		else
    		{
    		echo"<script>alert('insufficient balance')</script>";
    	    }

    }
function purchasedview()
{
	$qry="select path.productid,path.quantity,path.amount,product.id,product.productcat,product.productname,product.details,userreg.name,userreg.loginid,path.cancel_status,path.bkey,userreg.contact from path inner join product on product.id=path.productid inner join userreg on userreg.loginid=path.loginid";
			$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
}
function user_purchased_view($key)
{
	$id=keytoid("login","lkey",$key);
	$qry="select path.productid,path.quantity,path.amount,product.id,product.productcat,product.productname,product.details,product.pkey,path.bkey from path inner join product on product.id=path.productid where path.loginid='".$id."'";
	// echo $qry;exit();
			$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
}
function feedback($rating,$comment,$key,$pid)
	{
		$id=keytoid("login","lkey",$key);
		$key1=uniquekey("feedback","fekey");
		$pid1=keytoid("path","bkey",$pid);
		$qry1="select productid from path where id='".$pid1."'";
		 // echo$qry1;exit();
		$exe1=mysql_query($qry1);
		$arr=null;
		while($rr=mysql_fetch_array($exe1))
		{
			$arr=$rr['productid'];
		}
		$date=date('Y-m-d');
		$qry="insert into product_feedback(fekey,product_id,login_id,rating,comment,currentdate)
		values('".$key1."','".$arr."','".$id."','".$rating."','".$comment."','".$date."')";
		 // echo$qry;exit();
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Feedback sent successfully');window.location.href='user_purchased_view.php';</script>";
		}	
		else
		{
			echo "<script>alert('Feedback sending error ');window.location.href='user_purchased_view.php';</script>";
		}
	}
function user_feedbackview($key)
{
	$id=keytoid("login","lkey",$key);
	$qry="select * from product_feedback where login_id='".$id."'";
		// echo $qry;exit();
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
}
function user_feedbackselect($key)
{
	$id=keytoid("product_feedback","fekey",$key);
	$qry="select * from product_feedback where id='".$id."'";
		// echo $qry;exit();
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
}
function feedback_edit($rating,$comment,$key)
{
	$id=keytoid("product_feedback","fekey",$key);
	$qry="update product_feedback set rating='".$rating."',comment='".$comment."' where id='".$id."'";
		// echo$qry;exit();
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Feedback edited successfully')</script>";
		}	
		else
		{
			echo "<script>alert('Feedback editing not successful')</script>";
		}
}
function feedback_delete($key)
{
	$id=keytoid("product_feedback","fekey",$key);
	$qry="delete from product_feedback where id='".$id."'";
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('Deleted  successfully');window.location.href='user_feedbackview.php';</script>";
		}
		else
		{
			echo "<script>alert('Deletion unsuccessfull');window.location.href='user_feedbackview.php';</script>";
		}
}
function farm_feedback_view($key,$id1)
{
	$id=keytoid("product_feedback","fekey",$key);
	$lid=keytoid("login","lkey",$id1);
	$qry="select * from product_feedback inner join product on 
	product.id=product_feedback.product_id  inner join userreg on userreg.loginid=product_feedback.login_id and product.loginid='".$lid."'";
		// echo $qry;exit();
		$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
}
function review($key)
{
	$id=keytoid("product","pkey",$key);
	$qry1="select avg(rating) from product_feedback where product_id='".$id."'";
	// echo $qry1;exit();
		$exe1=mysql_query($qry1);
		$arr=null;
		while($rr=mysql_fetch_array($exe1))
		{
			$arr=$rr['avg(rating)'];
		}
		return $arr;
}
function product_cancel($key)
	{
		$id=keytoid("path","bkey",$key);
		$qry="update  path  set cancel_status='1' where id='".$id."' ";
		$exe=mysql_query($qry);
		if($exe)
		{
			echo "<script>alert('cancel successfully');window.location.href='user_purchased_view.php';</script>";
		}
		else
		{
			echo "<script>alert('cancel unsuccessfull');window.location.href='user_purchased_view.php';</script>";
		}
	}
	
	function refund($key,$amount,$contact)
	{
		$id=keytoid("path","bkey",$key);
		$qry="select totalamount from bank where contact='".$contact."'";
		// echo $qry;exit();
		$exe=mysql_query($qry);
		$arr=null;
		while($rr=mysql_fetch_array($exe))
		{
			$arr=$rr['totalamount'];
		}
		// echo $arr;exit();
		$am=$amount+$arr;
		$qry1="update bank set totalamount='".$am."' where contact='".$contact."'";
		// echo $qry1;exit();
		$exe1=mysql_query($qry1);
		if($exe1)
		{
			echo "<script>alert('Fund Transfer successfully');window.location.href='purchasedview.php';</script>";
		}
		else
		{
			echo "<script>alert('Unsuccessfull');window.location.href='purchasedview.php';</script>";
		}
	
	}

function jobvacancyfarmview()
	{
		// $id=keytoid("complaints","ckey",$key1);
		// $qry="select * from jobvacancy inner join login on login.id=.loginid where loginid='".$id."'";
		$qry="select * from jobvacancy";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr; 
		}
		return $arr;
	}
function farmnotificationview($key)
	{
		$id=keytoid("login","lkey",$key);
		$qry="select * from notification order by currentdate desc";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe))
		{
			$arr[]=$rr;
		}
		return $arr;
	}	
function farmcomplaintview()
	{
		// $id=keytoid("complaints","ckey",$key1);
		 $qry="select * from complaints inner join userreg on userreg.loginid=complaints.login_id order by currentdate desc";
		//$qry="select * from complaints order by currentdate desc";
		// echo $qry;exit();
				$exe=mysql_query($qry);
		$arr=array();
		while($rr=mysql_fetch_array($exe)) 
		{
			$arr[]=$rr;
		}
		return $arr;
	}
	function countuserreg()
	{
		$q="select count(id) from userreg";
		$exe=mysql_query($q);
		$bt=null;
		while($rr=mysql_fetch_array($exe))
		{
			$bt=$rr['count(id)'];
		}
		return $bt;
	}
	function countfarmreg()
	{
		$q="select count(id) from farmreg";
		$exe=mysql_query($q);
		$bt=null;
		while($rr=mysql_fetch_array($exe))
		{
			$bt=$rr['count(id)'];
		}
		return $bt;
	}
	function countjob()
	{
		$q="select count(id) from qualification";
		$exe=mysql_query($q);
		$bt=null;
		while($rr=mysql_fetch_array($exe))
		{
			$bt=$rr['count(id)'];
		}
		return $bt;
	}
	function countcomplaint()
	{
		$q="select count(id) from complaints";
		$exe=mysql_query($q);
		$bt=null;
		while($rr=mysql_fetch_array($exe))
		{
			$bt=$rr['count(id)'];
		}
		return $bt;
	}	
	}	
?>   
