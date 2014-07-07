<?php

$user="root";
$pass="";
$database="conf_tdsi";
$server="127.0.0.1:3306"; 
if(mysql_connect($server,$user,$pass)){
 if(mysql_select_db($database)){
 
   
 
 }else{
	die("db doesn't exist");
	}
   

}else{
	die("server not found");
	}



?>