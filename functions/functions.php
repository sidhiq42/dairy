<?php
	
	function checkdup($t,$f,$e)
	{
		$qry="select id from ".$t." where ".$f."='".$e."'";
		$res=mysql_query($qry);
		$c=0;
		while($re=mysql_fetch_array($res))
		{
			$c=$c+1;
		}
		if($c>0)
			return true;
		else
			return false;
		
	}
	function uniquekey($t,$f)
	{
		$k2=null;
		do
		{
			$k1=md5(microtime());
			$k2=substr($k1,0,8);
			
		}while(checkdup($t,$f,$k2));
		return $k2;
	}
	function keytoid($t,$f,$k)
	{
		$qry="SELECT id FROM ".$t." WHERE ".$f."='".$k."'";
		$rs=mysql_query($qry);
		$id=array();
		while($res=mysql_fetch_array($rs))
		{
			$id=$res['id'];
		}
		return($id);	
	}
?>