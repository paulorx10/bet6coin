<?php

	include "php/conn.php";

	$login = addslashes($_POST['login']);

	$pw = addslashes($_POST['password']);

	if(strlen($pw) < 6){

		echo "<a href='#' class='text-warning text-center'>Senha deve conter pelo menos 6 digitos</a>";
	
	}else{

		$new_pw = md5($pw);
		//check and validation login
		$check_login = mysqli_query($con, "SELECT * FROM login WHERE login = '$login'");

		if($rLogin = mysqli_affected_rows($con) >= 1){

			//login encontrado -> check end validation passwd
			$check_passwd = mysqli_query($con, "SELECT * FROM login WHERE login = '$login' AND passwd1 = '$new_pw'");


			if($r_passwd = mysqli_affected_rows($con) >= 1){

				while ($get_user_array = mysqli_fetch_array($check_passwd)) {
					$status_log = $get_user_array['log'];
					$get_ip = $get_user_array['ip'];
				}

				if($status_log == "1" && $_SERVER['REMOTE_ADDR'] != $get_ip){

					echo "<p class='text-warning text-center'>Usuario, já esta logado, aguarde... <script>setTimeout(function(){ location.href='login.php'; }, 4500);</script></p>";
					
					$ad = $_SERVER['REMOTE_ADDR'];

					$up_ad = mysqli_query($con, "UPDATE login SET ip = '$ad' WHERE login='$login'");

				}else if($status_log == "0"){

					$ad = $_SERVER['REMOTE_ADDR'];

					$up_ad = mysqli_query($con, "UPDATE login SET ip = '$ad' WHERE login='$login'");
				
				}
				//log == 1 -> user online || log == 0 -> user offline	
				$update_log = mysqli_query($con, "UPDATE login SET log='1' WHERE login = '$login'");
				
				$nvl = "1";
				$rest_rolls = "10000";
				$roll_now = "1";
				$porcent = "0";
				$stars = "1";
				$limite = "1";

				$check_level = mysqli_query($con, "SELECT * FROM levels WHERE user = '$login'");
				if($r_levels = mysqli_affected_rows($con) >= 1){
					//level row added
				}else{

					$insert_nvl = mysqli_query($con, "INSERT INTO levels (user,qtd_rolls,rest_next_nivel,rest_porcent,stars, limite) VALUES ('$login', '$roll_now', '$rest_rolls', '$porcent', '$stars', '$limite')");
				}
				
				session_start();

				$_SESSION['login'] = $login;
				$_SESSION['login_md5'] = md5($login);
				$user_session = $_SESSION['login_md5'];

				$update_session = mysqli_query($con, "UPDATE login SET session_log ='$user_session' WHERE login = '$login'");

				echo "<center><a href='#' class='text-primary text-center'>".$login.", logado com sucesso...</a><br><img src='https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif' width='250' height='200' alt='loading gif success'></center><script>setTimeout(function(){ location.href='index.php' }, 3000);</script>";
				
			}else{

				echo "<center><a href='#' class='text-danger text-center'>Senha invalida.</a><br><img src='https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif' width='250' height='200' alt='loading gif error'><center><script>setTimeout(function(){ location.href='login.php' }, 3000);</script>";
		
			}

		}else{

			echo "Login ou senha invalido";
		}
	}
?>
<script type="text/javascript" src="assets/js/scripts.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/holder.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>