<?php
 $connection = mysql_connect("localhost","root", "");
 $db = mysql_select_db("i9781008_mansur");
  
if(!$connection || !$db){
 exit(mysql_error());
}

     
mysql_query("set character_set_client='cp1251'");  
mysql_query("set character_set_results='cp1251'"); 
mysql_query("set collation_connection='cp1251_general_ci'"); 
mysql_query("SET NAMES UTF8");
mysql_query("SET CHARACTER SET UTF8");
mysql_query("SET collation_connection='utf8_general_ci'");
mysql_query("SET collation_database='utf8_general_ci'");
mysql_query("SET collation_server='utf8_general_ci'");
mysql_query("SET character_set_client='utf8'");
mysql_query("SET character_set_connection='utf8'");
mysql_query("SET character_set_database='utf8'");
mysql_query("SET character_set_results='utf8'");
mysql_query("SET character_set_server='utf8'");


function query($sql){
	$result=mysql_query($sql);
	return $result?$result:false;	
}

function select_all($sql){
	$i=1;
	$data = array();
	$result=mysql_query($sql);
	if($result){
		while($row=mysql_fetch_assoc($result)){
			$data[$i]=$row;
			$i++;		
		}
		
		$data = array_reverse($data);
		
            return $data?$data:false;			
	}
}
?>