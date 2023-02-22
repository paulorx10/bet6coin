<?php

	//$con = new mysqli("localhost","root","","6bet");
	include_once "php/conn.php";
	include_once "php/user.php";

	if(isset($_SESSION['login'])){
		
		/*if(!isset($user_login)){

			$user_login = "null";
		}
		if(!isset($user_id)){

			$user_id = "null";
		}*/
		
		$select = mysqli_query($con, "SELECT * FROM bets WHERE user='$user_login' AND amount > 0");
        if($sm=mysqli_affected_rows($con)){
		$select_rolls = mysqli_query($con, "SELECT * FROM statusrolls WHERE id_user = '$user_id' ORDER BY id DESC LIMIT 1");
		while ($return_bets= mysqli_fetch_array($select_rolls)) {
			$status_rolls = $return_bets['status'];
		}

		$get_winlose = mysqli_query($con, "SELECT * FROM winlose_amount WHERE id_user = '$user_id'");

		while ($return_winlose = mysqli_fetch_array($get_winlose)) {

			$bets_win = number_format($return_winlose['bets_win'], 8, '.', '');
			$bets_lose = number_format($return_winlose['bets_lose'], 8, '.', '');
			$rate_bets = $return_winlose['rate'];
		
		}

		while ($totalacc=mysqli_fetch_array($select)) {
			$profit_init=$totalacc['amount_init'];

			echo "Amount: <a href='#' class='amountb'>".$totalacc['amount']."</a> BTC";

			$profit = number_format($totalacc['amount'] - $profit_init, 8, '.', '');

			if($profit_init <= "0"){
				$profit_att = "<a href='#' class='text-success'> 0.00000000 BTC</a>";
				exit();
			}

			//$r_amount = number_format($totalacc['amount'] + $totalacc['amount'] * $totalacc['amount_init'] / 100);

			/*if($totalacc['amount'] < $totalacc['amount_init']){
				
				$most = "<a class='text-danger '>- ".$r_amount."</a>";

			}else{

				$most = "<a href='#' class='text-primary'>+ ".$r_amount."</a>";
			}*/

			if($profit > "0"  /*$status_rolls == "WIN"*/){

				$profit_att = "<a href='#' class='text-success'>+ ".$profit. " BTC</a>";

			}else{

				$profit_att = "<a href='#' class='text-danger'> ".$profit." BTC</a>";
			}

			$get_total_wl = mysqli_query($con, "SELECT * FROM total_win_lose  WHERE user='$user_login'");
			
			if($r_wl = mysqli_affected_rows($con) >= 1){
				
				while ($get_wl = mysqli_fetch_array($get_total_wl)) {
				
					$t_win = number_format($get_wl['total_win_rolls'], 8, '.', '');
					$t_lose = number_format($get_wl['total_lose_rolls'], 8, '.', '');
				
				}

			}else{

				$t_win = "0.00000000 BTC";
				$t_lose = "0.00000000 BTC";
			}


			echo "<div class='container profit text-color' ><center>profit: ".$profit_att."</center>
			<p class='float-left'>Total win: <a href='#' class='text-success'>".$bets_win."</a> <p class='float-right'>Total lose: <a href='#' class='text-danger'>".$bets_lose."</a><br><p class='float-left'>Rolls win: <a href='#' class='text-success'>".$totalacc['roll_w']."</a></p><p class='float-right'>Rolls lose: <a href='#' class='text-danger'>".$totalacc['roll_l']."</a></p></div>";
		}
        }
	}else{

		//echo "logout on...";
	}

		

?>