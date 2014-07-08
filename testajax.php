<?php
require_once("classes/users.php");
$like = false;
if (isset($_GET['action'])) {
		
		switch ($_GET['action']) {
			case 'checklogin':
				if($_POST['login']!=''){
					$users=new User(0,0,0,"","",$_POST['login'],"","","");
					
					$userList=$users->findByValue();
					if(count($userList)){
						$like = true;
					}
				}
				 echo json_encode($like);
			     break;
		}
		
		}else {
			exit('No direct access allowed.');
		}
?>