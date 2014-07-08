<?php
require_once("db_connect.php");
$login=$_POST['login'];
$password=$_POST['password'];
//echo $login;
$sql="SELECT * FROM `users` WHERE `LOGIN`='".$login."' and `PASSWORD`='".$password."'";
//"SELECT * FROM `users` WHERE `LOGIN`='".$login."' and `PASSWORD`='".$password."'"
echo $sql;
$valid=false;
	if($res=mysql_query($sql)){
	 
	if(mysql_num_rows($res)){
		//echo "bonjour user".$ligne["LOGIN"];
		session_start(); // Création de la session
              $_SESSION['login'] = $login; 
		header('Location:index1.php');
			
	}else {
		header('Location:login.php?e=erreur');
		}
	}
//header('Location:text.php');