<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BET6COIN Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/boostrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.js"></script>
</head>
<body>
    <form class="form" method="post" action="login-backend.php" style="margin: 50px auto; width: 50%;">
     
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" id="inputEmail" name="login" class="form-control text-primary" placeholder="Login" required autofocus>      
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="col-md-12">
         <a href="#" class='password-remember text-warning' style="float: left;">Recover password</a>
         <a href="register.php" class='password-remember' style="float: right;">Register</a>
      </div>
    
      <!--<div class="checkbox mb-3" style="clear:both;">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>-->
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      <div class="section-re-passwd col-md-6">
        <h3>Recover password </h3>
          <form name="recover-password" action="recover-password" method="post">
            <div class="form-group">
              <input type="text" name="loginRecover" class="recoverLogin form-control text-primary" placeholder="Login" onkeyup="
              check()">
            </div>
            <div class="form-group">
              <input type="email" name="emailRecover" class="recoverEmail form-control text-primary" placeholder="Email" onkeyup="check()">
            </div>
            <div class="form-group">
              <input type="password" name="passwdRecover1" class="pwre1 passwdRecover form-control text-primary" placeholder="Password min 6 caracteres">
            </div>
            <div class="form-group">
              <input type="password" name="passwdRecover2" class="pwre2 passwdRecover form-control text-primary" placeholder="Confirm password">
            </div>
            <div class="return_conformpw small">
              
            </div>
             <div class="form-group">
             <button class="btn btn-sm btn-success btn-re" type="button">Recover now</button>
            </div>
            <div class="return_recover">
              
            </div>
          </form>
      </div>
      <p class="mt-5 mb-3 text-muted">6Betcoin &copy; 2017-2018</p>
 
<script type="text/javascript" src="assets/js/loginjs.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html> 