<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/boostrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
    <form class="" method="post" action="register-backend.php" style="margin: 50px auto; width: 50%;">
     
      <h1 class="h3 mb-3 font-weight-normal">Create your account</h1>
      <div class="form-group">
         <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" id="inputLogin" name="login" class="form-control text-primary" placeholder="Login" required autofocus>
      </div>
      <div class="form-group">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="text" id="inputEmail" name="email" class="form-control text-primary" placeholder="Email" required autofocus>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword1" name="passwd1" class="form-control text-primary" placeholder="Password" required>
      </div>
      <div>
        <label for="inputPassword" class="sr-only">Confirm password</label>
        <input type="password" id="inputPassword2" name="passwd2" class="form-control text-primary" placeholder="Re password" required>   
      </div>
     
      <div class="col-md-12">
         <a href="login.php" class='password-remember' style="float: right;">Sign in</a>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Create</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html> 