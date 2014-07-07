<!DOCTYPE html>
<html>

  <head>
    <title>Bootstrap Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" >
	.centered-box {
  position: fixed; /* or absolute if you want it to scroll with the page */
  top: 50%;
  left: 50%;
  width: 600px;
  height: 300px;
  /* this is where it all comes into play:
     Set the margins so that:
     margin-top is -(height/2)
     margin-left is -(width/2)
  */
  margin-top: -150px;
  margin-left: -300px;
}
	</style>
	<script type='text/javascript' src='bootstrap/js/jquery.js'></script>
		<script type="text/javascript">
// <![CDATA[
$(document).ready(function() {
			//alert("tester les truc koi");
(function($){
	check_login = function(id) {
		var data = 'login='+$(id).val();
		var lien="testajax.php?action=checklogin";		
	    $.ajax({
				type: "POST",
				url: lien,
				data: data,
				dataType: "json",
				success: function(json) {
				if(json){
					$('.msg').fadeTo(200, 0.1, function() { 
						
						$(this).html('').addClass('success').fadeTo(900, 1);
						
					});
					}else{
					$('.msg').html('this login is not availlable').addClass('success').fadeTo(900, 1);
						
						}
				}
				  
			});
			};
})(jQuery)
});
// ]]>
</script>


  </head>
  
  <body>
  <div id="centered_box" class="centered-box">
  <div class="row-fluid">
    <div class="offset1 span10">
      <form method="post" id="my_form" action="connect.php" class="form-horizontal">
        <div class="page-header">
          <h1>Login:</h1>
       </div>
       <div class="control-group">
         <label class="control-label" for="inputEmail">Login</label>
         <div class="controls">
           <input onChange="check_login(this);" type="text" id="inputEmail" placeholder="Email" name="login">
         </div>
		 <span class="msg" style="display:none">&nbsp;</span>
       </div>
       <div class="control-group">
         <label class="control-label" for="inputEmail">Password</label>
         <div class="controls">
           <input type="password" id="inputPassword" placeholder="Password" name="password">
         </div>
       </div>
       <div class="control-group">
         <div class="controls">
           <label class="checkbox"><input type="checkbox"> Remember me</label>
           <button type="submit" class="btn">Sign in</button>
         </div>
       </div>
     </form>
   </div>
  </div>
</div>
    
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
  </html>