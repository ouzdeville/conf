<?php
require_once("classes/users.php");
function clean1($str) {
  return strip_tags(htmlspecialchars($str));
}
if(isset($_GET['sup'])){
   $id=clean1($_GET['sup']);
   $user=User::findBykey($id);
   
   $user->delete(); 
		header('Location:index1.php');
		exit;
   
}

 ?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Language" content="FR">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Bootstrap Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://getbootstrap.com/examples/theme/#">DMC LABO</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://getbootstrap.com/examples/theme/#">Home</a></li>
            <li><a href="http://getbootstrap.com/examples/theme/#about">About</a></li>
            <li><a href="http://getbootstrap.com/examples/theme/#contact">Contact</a></li>
            <li class="dropdown">
              <a href="http://getbootstrap.com/examples/theme/#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="http://getbootstrap.com/examples/theme/#">Action</a></li>
                <li><a href="http://getbootstrap.com/examples/theme/#">Another action</a></li>
                <li><a href="http://getbootstrap.com/examples/theme/#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="http://getbootstrap.com/examples/theme/#">Separated link</a></li>
                <li><a href="http://getbootstrap.com/examples/theme/#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
   <div class="container">
  		<div class="jumbotron">
            <h1>LABO DMC!</h1>
            <p>Chaque année, nous organisons une conférence sur les TICs au Sénégal et dans la sous-région.</p>
           <p><a href="http://getbootstrap.com/examples/theme/#" class="btn btn-primary btn-lg" role="button">Inscription</a></p>
      </div>
       <div class="row">
        <div class="col-lg-3">3 colonnes</div>
        <div class="col-lg-6">6 colonnes</div>
        <div class="col-lg-3">3 colonnes</div>
      </div>
      <div class="row">
        <div class="col-lg-3">3 colonnes</div>
<div class="col-lg-offset-6 col-lg-3">3 colonnes</div>
      </div>
		<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><b>Liste des utilisateurs <span class="glyphicon glyphicon-search"></span></b></div>
			  <div class="panel-body">
				<p>Exemple d'affichage d'une liste d'objets à partir d'une table </p>
			  </div>

			  <!-- Table -->
			  <table class="table">
			  <thead>
         
        
			    <tr><td>PRENOM</td><td>NOM</td><td>LOGIN</td><td>EMAIL</td><td>TEL</td><td>Societe</td><td>Profil</td><td>Action</td></tr>
				</thead>
				<tbody>
				<?php 
				$i=0;
				while($i<count($users)) { 
				?>
				<tr>
				<td><?php echo $users[$i]->PRENOM; ?></td>
				<td><?php echo $users[$i]->NOM; ?></td>
				<td><?php echo $users[$i]->LOGIN; ?></td>
				<td><?php echo $users[$i]->EMAIL; ?></td>
				<td><?php echo $users[$i]->TEL; ?></td>
				<td><?php echo $users[$i]->IDSOCIETE; ?></td>
				<td><?php echo $users[$i]->IDPROFIL; ?></td>
				<td><a href="?mod=<?php echo $users[$i]->IDUSERS; ?>"><img src="images/icone_modifier.gif" title="modifier"></a>
				<a href="?sup=<?php echo $users[$i]->IDUSERS; ?>"><img src="images/icone_supprimer.jpg" title="supprimer"></a>
				</td>
				</tr>

				
				<?php
				$i++;
				}
				?>
				
        </tbody>
			  </table>
			</div>
	  
	</div>
    
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>