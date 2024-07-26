<?php
include_once "settings/settings.php";
include_once "classes/userclass.php";
$obj=new userclass();
session_start();
if(isset($_COOKIE['logined']) && $_COOKIE['logined']==1)
{
$key=$_GET['k'];
 // $key1=$_COOKIE['lkey'];
$k=$obj->productselect($key);
$smartyObj->assign("data",$k);
if (isset($_POST['hide'])AND($_POST['hide'])=='h') 
{
    if(isset($_POST['category'])AND($_POST['category'])!=null)
    {
        if(isset($_POST['name'])AND($_POST['name'])!=null)
        {
            if(isset($_POST['amount'])AND($_POST['amount'])!=null)
            {
                if(isset($_POST['quantity'])AND($_POST['quantity'])!=null)
                {
                    if(isset($_POST['details'])AND($_POST['details'])!=null)
                    {
                       
                         $category=trim($_POST['category']);
                         $name=trim($_POST['name']);
                         $amount=trim($_POST['amount']);
                         $quantity=trim($_POST['quantity']);
                         $details=trim($_POST['details']);
                         
                         $obj->productedit($category,$name,$amount,$quantity,$details,$key);
                       }
                      
                        else
                        echo "<script> alert('details is empty')</script>"; 
                      }
                      else
                      echo "<script> alert('quantity is empty')</script>";
                    }
                      else
                       echo "<script> alert('amount is empty')</script>"; 
                     }
                    else
                    echo "<script> alert('name is empty')</script>";
                    }
                 else
                 echo "<script> alert('category is empty')</script>"; 
                }
$smartyObj->display('usersubheader.tpl');
$smartyObj->display('productedit.tpl');
$smartyObj->display('footer.tpl');
}
else
{
    header("location:login.php");
}
?>