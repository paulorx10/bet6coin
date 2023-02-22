
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="../../../../favicon.ico"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>BET6COIN - Login page</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/chat.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

<?php

	include "php/conn.php";

	$login = addslashes($_POST['login']);
	$email = addslashes($_POST['email']);

	$passwd1 = addslashes($_POST['passwd1']);
	$passwd2 = addslashes($_POST['passwd2']);

	if($passwd1 != $passwd2){
		//senhas invalidas / não corresponde
		echo "<center><a href='#' class='text-warning'>Ops, invalid passwords try again...</a><br><img src='https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif' width='250' height='200' alt='loading gif error passwd'><center><script>setTimeout(function(){ location.href='register.php'; }, 3000);</script>";
		exit();
	}else{
		//senhas validas

		if(strlen($passwd1) < 6){
			//senha deve conter pelo menos 6 digitos;
			echo "<center><a href='#' class='text-warning'>password min 6 caracteres</a><br><img src='https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif' width='250' height='200' alt='loading gif error passwd'><center>";
			exit();
		
		}else{

			//create account
			$newpw = md5($passwd1);
			$log = "1"; // log == 1 -> (online) || log == 0 -> (offline)
			$insert_account = mysqli_query($con, "INSERT INTO login (login,email,passwd1,passwd2,log) VALUES ('$login','$email','$newpw','$newpw','$log')");

			if($r_insert_account = mysqli_affected_rows($con) >= 1){
				
				session_start();
				
				$_SESSION['login'] = $login;
				$_SESSION['login_md5'] = md5($login);
				$user_session = $_SESSION['login'];

				$update_session = mysqli_query($con, "UPDATE login SET session_log ='$user_session' WHERE login = '$login'");

				echo "<center><a href='#' class='text-success'>Account created.</a><br><img src='https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif' width='250' height='200' alt='loading gif success'></center><script>setTimeout(function(){ location.href='index.php' }, 3000);</script>";
			
			}else{

				echo "<center><a href='#' class='text-danger'>Error, try again :(</a><br><img src='https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif' width='250' height='200' alt='loading gif error'><center>";
			}
		}
	}
?>
<script type="text/javascript" src="assets/js/scripts.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>