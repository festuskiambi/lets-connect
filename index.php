<?php
require_once 'database_connection.php';

if($user->is_loggedin()!="")
{
 $user->redirect('home.html');
}

if(isset($_POST['btn-login']))
{
 $nickname = $_POST['nickname'];
 
 $password = $_POST['password'];
  
 if($user->login($nickname,$password))
 {
  $user->redirect('home.html');
 }
 else
 {
  $error = "Wrong Details !";
 } 
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LetsConnect</title>
       <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <!-- lets-connect  -->
    <link href="css/lets-connect.css" rel="stylesheet">
    
  </head>
<body>

 
<div class="container_wapper">
    <div id="letsConnect_banner_menu">
        <div class="container-fluid">
            <div class="col-xs-4 letsconnect_logo">
            	<a href="home.html">
                	<img src="images/letsconnect_logo.jpg" id="logo_img" alt="letsconnect" title="letsconnect" />
                	<!--<h1 id="logo_text"><span>letsconnect</span></h1>-->
                </a>
            </div>
            <div class="col-sm-8 hidden-xs">
                <nav>
                <ul class="nav nav-justified">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="connect.php">Connect</a></li>
                     </ul>
                </nav>
            </div>
            <div class="col-xs-8 visible-xs">
                <a href="#" id="mobile_menu"><span class="glyphicon glyphicon-th-list"></span></a>
            </div>
        </div>
    </div>
</div>

<div id="let_connect_register" class="container_wapper">
    <div class="container-fluid" >
        
        <div class="col-sm-12 col-md-6 " id="login_form" >
            <form class="form-horizontal" method="post">
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nickname">Nickname</label>  
  <div class="col-md-4">
  <input id="nickname" name="nickname" type="text" placeholder="your nickname" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordinput">Password </label>
  <div class="col-md-4">
    <input id="passwordinput" name="passwordinput" type="password" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-6">
    <button type="submit" name="btn-login" class="btn btn-primary">login</button>
  </div>
</div>

</fieldset>
</form>


            
        </div>
        <div class="col-sm-12 col-md-6  "id="registration_form">
            <form class="form-horizontal" action='register.php' method='post' >
<fieldset>

<!-- Form Name -->
<legend>register</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="name">Name</label>  
  <div class="col-md-6">
  <input id="name" name="name" type="text" placeholder="eg Jonh Mark" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="nickname">Contact</label>  
  <div class="col-md-6">
  <input id="nickname" name="nickname" type="text" class="form-control input-md" placeholder="eg +44 755 665 652" required="">
    
  </div>
</div>




<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="address">Address</label>  
  <div class="col-md-6">
  <input id="address" name="address" type="text" placeholder="eg.  445 Mount Eden Road" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="contact"> Nickname</label>  
  <div class="col-md-6">
  <input id="contact" name="contact" type="text"  placeholder="eg johnmark"  class="form-control input-md">
    
  </div>
</div>
<!-- Password input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="password">Password </label>
  <div class="col-md-6">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
    
    
    <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button type="submit" name="btn-signup" class="btn btn-primary">register</button>
  </div>
</div>

</fieldset>
</form>

            
        </div>
        
    </div>
</div>



<div id="letsconnect_footer">
    <div>
        <p id="footer">Copyright &copy; 2016 letsconnect pty LTD</p>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.singlePageNav.min.js"></script>
<script src="js/unslider.min.js"></script>

<script src="js/letsConnect_script.js"></script>
</body>
</html>