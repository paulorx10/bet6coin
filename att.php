<?php

	include "php/conn.php";
	include "php/user.php";
	
	$status;
	$add = addslashes($_POST['amount']);
	$rate = addslashes($_POST['rate']);
	$rate_mode = addslashes($_POST['mode']);
	
	$rate_reverse = 100 - $rate;
	$num_rate = rand(0, 100);
	$add_tot = $add;
	

	//start 
	if($rate_mode == 0){ // <= rate limit

		if($num_rate >= $rate){ // win

			$max = $rate;
			$status = 1;
			$max_percent = $add;
			$sum_calc_rate = $add * $rate / 100;
			$end_sum = number_format($sum_calc_rate, 8, '.', '');

			echo "<p class='text-success'>+ ".$end_sum." BTC</p> <a href='#' class='text-success'>".$num_rate." </a><br>>= ".$max;

		}else{ // lose

			$max = $rate; 
			$status = 2;
			$dec_rate = 100 - $rate;
			$sum_calc_rate = $add * $dec_rate / 100;
			$end_sum = number_format($sum_calc_rate, 8, '.', '');

			echo "<p class='text-danger'>- ". $end_sum ." BTC</p> <a href='#' class='text-danger'>". $num_rate ."</a><br>>= ". $max;
		}

		$add = $end_sum;

	}else{ // > rate limit

		if($rate_rand >= $rate_reverse){ // win

			$max = $rate;
			$status = 1;
			$max_percent = $add;
			$sum_calc_rate = $add * $rate / 100;
			$end_sum = number_format($sum_calc_rate, 8, '.', '');

			echo "<p class='text-success'>+ ".$end_sum." BTC</p> <a href='#' class='text-success'>".$num_rate." </a><br>>= ".$max;

		}else{ // lose

			$max = $rate; 
			$status = 2;
			$dec_rate = 100 - $rate;
			$sum_calc_rate = $add * $dec_rate / 100;
			$end_sum = number_format($sum_calc_rate, 8, '.', '');

			echo "<p class='text-danger'>- ". $end_sum ." BTC</p> <a href='#' class='text-danger'>". $num_rate ."</a><br>>= ". $max;
		}

		$add = $end_sum;
	}
	//end 

	//
	$get_lose = mysqli_query($con, "SELECT * FROM statusrolls WHERE id_user = '$user_id' AND status = 'LOSE' ORDER BY id DESC LIMIT 1");

	while($return_lose = mysqli_fetch_array($get_lose)){
		
		$u_lose = $return_lose['amount'];
	}

	$get_win = mysqli_query($con, "SELECT * FROM statusrolls WHERE id_user='$user_id' AND status ='WIN' ORDER BY id DESC LIMIT 1");

	while($return_win = mysqli_fetch_array($get_win)){

		$u_win = $return_win['amount'];
	
	}

	$select = mysqli_query($con, "SELECT * FROM bets WHERE user ='$user_login'");

	while ($rr = mysqli_fetch_array($select)) {

		$amount = number_format($rr['amount'], 8, '.', '');

		$updateinit = mysqli_query($con, "UPDATE bets SET amount_init = '$amount', status='1' WHERE user='$user_login' AND status ='0'");

		if ($rr['amount'] < "0.000000001") {

			echo "Sem saldo para jogar...<script>setTimeout(function(){
				alert('Sem saldo para jogar...'); location.reload();
			}, 3000);</script>";
			
			$updatea = mysqli_query($con, "UPDATE bets SET bets_l = '0' WHERE user='$user_login'");
			$updateb = mysqli_query($con, "UPDATE bets SET bets_w = '0' WHERE user='$user_login'");
		    $up = mysqli_query($con, "UPDATE bets SET amount = '0.00000000', cont_l='1' WHERE user='$user_login'");
		    $up_inc = mysqli_query($con, "UPDATE inclosewin SET inc_win = '0', inc_lose = '0' WHERE user ='$user_login'");
		    $update_rolls_lose = mysqli_query($con, "UPDATE rolls_lose SET mod_lose = '0', status='0', cont='0' WHERE user ='$user_login'");

		    $get_num_dep = mysqli_query($con, "SELECT * FROM deposits WHERE user_login ='$user_login' AND status = '1'");
         
         
            //
		    $get_status_seed = mysqli_query($con, "SELECT * FROM bets WHERE user='$user_login' AND status_seed = '1'");
		    if($r_status_seed = mysqli_affected_rows($con) >= 1){

		    	 $get_seed = mysqli_query($con, "SELECT * FROM seedrolls WHERE user='$user_login'");

			    while ($returnseed = mysqli_fetch_array($get_seed)) {
			    	$row_now = $returnseed['rolls_now'];
			    	$rand_roll = $returnseed['num_rolls'];
			    }
			    if($row_now >= $rand_roll){

		    		$rand_num_bets = rand(1,3000);
					$insert_rolls_valid2 = mysqli_query ($con, "UPDATE seedrolls  SET rate_seed='$rate', num_rolls='$rand_num_bets', rolls_now = '0' WHERE id_user='$user_id'");
					$insert_seed_bet = mysqli_query ($con, "UPDATE bets SET seed='$rand_num_bets' WHERE user='$user_login'");
			    }
		    }
		    //
		    
		    if($num_dep = mysqli_affected_rows($con) >= 1){

		    	$deposit_num = mysqli_num_rows($get_num_dep);
		    }else{

		    	$deposit_num = "0";
		    }

		    $get_num_transf = mysqli_query($con, "SELECT * FROM transf WHERE login_receive ='$user_login' AND status ='1'");

		    if($r_transf = mysqli_affected_rows($con) >= 1){

		    	$num_transf = mysqli_num_rows($get_num_transf);
		    
		    }else{

		    	$num_transf = "0";
		    }

		    $check_att_not = mysqli_query($con, "SELECT * FROM check_att_not WHERE user='$user_login'");

		    if($r_att_not = mysqli_affected_rows($con) >= 1){

		    	while($return_att_not = mysqli_fetch_array($check_att_not)){

		    		$att_num_dep = $return_att_not['num_dep'];
		    		$att_num_transf = $return_att_not['num_transf'];
		    	}

		    }else{

		    	$insert_check_att = mysqli_query($con, "INSERT INTO check_att_not (user,num_dep,num_transf,num_with) VALUES ('$user_login','0','0','0')");

		    	$get_att = mysqli_query($con, "SELECT * FROM check_att_not WHERE user = '$user_login'");
		    	while($return_check_att = mysqli_fetch_array($get_att)){

		    		$att_num_dep = $return_check_att['num_dep'];
		    		$att_num_transf = $return_check_att['num_transf'];
		    	
		    	}
		    }

		    $check_not1 = mysqli_query($con, "SELECT * FROM notifications WHERE id_user='$user_login' AND status = '0' AND status_onof = '0'");

		    $num_transf_att_check_transf = mysqli_num_rows($check_not1);
		    if($deposit_num == $att_num_dep){

		    	$num_transf_att = mysqli_num_rows($check_not1);

	   			if($num_transf_att < 1){

	   				$type = "Saldo";
		    		$title = "Seu saldo acabou";
		    		$description = "Saldo atual 0.00000000, ultima rodada win-> <b>".$u_win."</b>, ultima rodada lose -><b>".$u_lose."</b>.";

		    		$status = "0";
		   	 		$status_onof = "0";
		    		$insert_not = mysqli_query($con, "INSERT INTO notifications (id_user,type,status,status_onof,title,description) VALUES ('$user_login','$type','$status','$status_onof','$title','$description')");
	   			}
		    	

		    }else if($num_transf > "0"){

		    	if($num_transf == $att_num_transf && $num_transf_att_check_transf < 1){

			    	$type = "Saldo";
				    $title = "Seu saldo acabou";
				    $description = "Saldo atual 0.00000000, ultima rodada win-> <b>".$u_win."</b>, ultima rodada lose -><b>".$u_lose."</b>.";

				    $status = "0";
				    $status_onof = "0";
				    $insert_not = mysqli_query($con, "INSERT INTO notifications (id_user,type,status,status_onof,title,description) VALUES ('$user_login','$type','$status','$status_onof','$title','$description')");
					}
		    	}
		   
			exit();
			
		}else if($add > $rr['amount']){
			
			echo "Total acc: <a href='#' class='text-primary'>". $rr['amount']. "</a> -> bet roll: <a href='#' class='text-warning'>".$add."</a>";

			exit();
		}
	}


	//start force lose rate

	//end force lose rate 

	$verify_r = mysqli_query($con, "SELECT * FROM bets WHERE user='$user_login'");
	$get_seed = mysqli_query($con, "SELECT * FROM seedrolls WHERE id_user='$user_id'");

	if($r_getseed = mysqli_affected_rows($con) >= 1){

		while($return_rolls = mysqli_fetch_array($get_seed)){
		
			$check_now = $return_rolls['rolls_now'];
			$check_rolls = $return_rolls['num_rolls'];
		
		}
		
	
		while ($return_seed= mysqli_fetch_array($verify_r)) {
		
			$status_seed = $return_seed['seed_status'];
			$rollwin = $return_seed['roll_w'];
			$rolllose = $return_seed['roll_l'];
		}
	}     

	//check force lose 
	$check_lose = mysqli_query($con, "SELECT * FROM rolls_lose WHERE user='$user_login'");
	
	if($r_lose = mysqli_num_rows($check_lose) >= 1) {

		//start force win or loses

		//end force win or loses
	}
	//end force lose
			
	//seed status == 1 -> seed 100 % || seed status == 0 -> aguardando total de rolls
	
	//start seed valid rolls range
	$verify = mysqli_query($con, "SELECT * FROM bets WHERE user='$user_login' AND roll_w= '0' AND roll_l = '0'");

	if($r_verify = mysqli_affected_rows($con) >= 1){

		$get_seed = mysqli_query($con, "SELECT * FROM seedrolls WHERE id_user='$user_id'");

		if($r_getseed = mysqli_affected_rows($con) >= 1){

		

		}else{


		}

	}
	//end seed valid rolls range

	//end att rolls num + seed checked

	$check_inc = mysqli_query($con, "SELECT * FROM inclosewin WHERE user ='$user_login'");

		if($r_inc = mysqli_num_rows($check_inc) < 1){
			//insert line 
			$defaultlose = "0";
			$defaultwin = "0";
			$insert_inc = mysqli_query($con, "INSERT INTO inclosewin (user,inc_lose,inc_win) VALUES ('$user_login','$defaultlose','$defaultwin')");
		}


	
 	
	//start if rolls == win || lose
	if($status == 1){

		//start seed att
		$get_amount = mysqli_query($con, "SELECT * FROM bets WHERE user = '$user_login'");

		while ($return_amount = mysqli_fetch_array($get_amount)) {
			$amount_user_init = $return_amount['amount'];
		}

		$check_rest_rolls = mysqli_query($con, "SELECT * FROM seedrolls WHERE id_user='$user_id'");
	
		if($r_check_rest = mysqli_affected_rows($con) >= 1){

			while ($rest_rolls_now = mysqli_fetch_array($check_rest_rolls)) {

				$now_roll = $rest_rolls_now['rolls_now'];
				$num_roll_valid = $rest_rolls_now['num_rolls'];
				
			}

			$att_rolls = mysqli_query($con, "UPDATE seedrolls SET rolls_now=rolls_now+1 WHERE id_user='$user_id'");	
		}
	
		//end  seed att

		$get_low = mysqli_query($con, "SELECT * FROM bets WHERE user='$user_login'");

		while ($contw = mysqli_fetch_array($get_low)) {

			$contlw = $contw['cont_l']; 
			$contwin = $contw['cont_w'];
			$addw = number_format($contw['bets_w'], 8, '.','');
			$bets_add_lose = number_format($contw['bets_l'], 8, '.','');
			$get_inc_losel = number_format($contw['inc_porcent_l'], 8, '.', '');
			$get_inc_winl = number_format($contw['inc_porcent_w'], 8, '.', '');
		}

		$get_inc_losew = mysqli_query($con, "SELECT * FROM inclosewin WHERE user ='$user_login'");

		while ($get_losew = mysqli_fetch_array($get_inc_losew)) {
		 	$losew = $get_losew['inc_lose'];
		 	$losel = $get_losew['inc_win'];
		 } 


		$add_w = number_format($add, 8, '.', '');
		$bets_add_lose1 = "0.00000000";
		$bets_add_win1 = "0.00000000";

		$update = mysqli_query($con, "UPDATE bets SET bets_w = bets_w+$add_w, roll_w=roll_w+1, inc_porcent_w = inc_porcent_w + $bets_add_win1 WHERE user='$user_login'");

		//start level 
		if ($c = mysqli_affected_rows($con) >= 1) {

			$nvl1 = "10000";
			$nvl2 = "25000";
			$nvl3 = "40000";
			$nvl4 = "70000";
			$nvl5 = "100000";
			$nvl6 = "125000";

			$bonus2 = "0.00100000";
			$bonus3 = "0.00600000";
			$bonus4 = "0.01100000";
			$bonus5 = "0.02500000";
			$bonus6 = "0.03000000";

			$select_levels = mysqli_query($con, "SELECT * FROM levels WHERE user ='$user_login'");

			if($r_levels = mysqli_affected_rows($con) >= 1){

				$check_skill = mysqli_query($con, "SELECT * FROM skills WHERE user='$user_login' AND skill ='2x up'");

				if($r_skill = mysqli_affected_rows($con) >= 1){

					while ($return_skill = mysqli_fetch_array($check_skill)) {
						$skill = $return_skill['skill'];
						$action = $return_skill['action'];
					}
				
					if($skill == "2x up" && $action != "0"){
					
						$add_r_levels = mysqli_query($con, "UPDATE levels SET qtd_rolls=qtd_rolls+'2' WHERE user='$user_login'");
					}

				}else{

					$add_r_levels = mysqli_query($con, "UPDATE levels SET qtd_rolls=qtd_rolls+'1' WHERE user='$user_login'");
				}	
				
			}
			while ($return_levels = mysqli_fetch_array($select_levels)) {
				
				$user_nvl = $return_levels['nivel'];
				$rest_nvl = $return_levels['qtd_rolls'];
				$limite = $return_levels['limite'];
			}

			if($rest_nvl >= $nvl2 && $limite != 2 && $limite < 2){
			
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='2', qtd_rolls='0', stars= '2', limite='2' WHERE user='$user_login' AND limite ='$limite'");
				$bonus2 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus2' WHERE user='$user_login'");
			
				$type = "Nivel up";
				$title = "2° Nivel";
				$description = "Você está no 2° Nivel, e recebeu um bonus de 0.00100000 BTC";
				$status1 = "0";
				$status_onof = "0";
				$insert_con = mysqli_query($con, "INSERT INTO notifications (id_user,type,status,status_onof,title,description) VALUES ('$user_login','$type','$status_1','$status_onof','$title','$description')");

			}else if($rest_nvl >= $nvl3 && $limite != 3 && $limite < 3){
			
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='3', qtd_rolls='0', stars= '3', limite='3' WHERE user='$user_login' AND limite ='$limite'");
				$bonus3 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus3' WHERE user='$user_login'");

				$type = "Nivel up";
				$title = "3° Nivel";
				$description = "Você está no 3° Nivel, e recebeu um bonus de 0.00600000 BTC";
				$status2 = "0";
				$status_onof = "0";
				$insert_con = mysqli_query($con, "INSERT INTO notifications (id_user,type,status,status_onof,title,description) VALUES ('$user_login','$type','$status_2','$status_onof','$title','$description')");
			}else if($rest_nvl >= $nvl4 && $limite != 4 && $limite < 4){
			
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='4', qtd_rolls='0', stars= '4', limite='4' WHERE user='$user_login' AND limite ='$limite'");
				$bonus4 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus4' WHERE user='$user_login'");

				$type = "Nivel up";
				$title = "4° Nivel";
				$description = "Você está no 4° Nivel, e recebeu um bonus de 0.01100000 BTC";
				$status3 = "0";
				$status_onof = "0";
				$insert_con = mysqli_query($con, "INSERT INTO notifications (id_user,type,status,status_onof,title,description) VALUES ('$user_login','$type','$status_3','$status_onof','$title','$description')");

			}else if($rest_nvl >= $nvl5 && $limite != 5 && $limite < 5){
				
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='5', qtd_rolls='0', stars= '5', limite='5' WHERE user='$user_login' AND limite ='$limite'");
				$bonus5 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus5' WHERE user='$user_login'");

				$type = "Nivel up";
				$title = "5° Nivel";
				$description = "Você está no 5° Nivel, e recebeu um bonus de 0.02500000 BTC";
				$status4 = "0";
				$status_onof = "0";
				$insert_con = mysqli_query($con, "INSERT INTO notifications (id_user,type,status,status_onof,title,description) VALUES ('$user_login','$type','$status_4','$status_onof','$title','$description')");
			}
			if($rest_nvl >= $nvl6){

				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='6', qtd_rolls='0' WHERE user='$user_login'");
				$bonus6 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus6' WHERE user='$user_login'");
				
				$type = "Nivel up";
				$title = "6° Nivel";
				$description = "Você está no 6° Nivel, e recebeu um bonus de 0.03000000 BTC";
				$status5 = "0";
				$status_onof = "0";
				$insert_con = mysqli_query($con, "INSERT INTO notifications (id_user,type,status,status_onof,title,description) VALUES ('$user_login','$type','$status_5','$status_onof','$title','$description')");
			}

			if($user_nvl == 1){

				$rest_next_nvl = $nvl2 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl2 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 100, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'"); 

			}else if($user_nvl == 2){

				$rest_next_nvl = $nvl3 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl3 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 160, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");

			}else if($user_nvl == 3){

				$rest_next_nvl = $nvl4 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl4 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 490, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");

			}else if($user_nvl == 4){

				$rest_next_nvl = $nvl5 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl5 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 1000, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");

			}else if($user_nvl == 5){

				$rest_next_nvl = $nvl6 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl6 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 1562.5, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");


			}
			//end level
			
			//add_win rolls	
			$add_win = number_format($add_w, 8, '.', '');

			$check_win = mysqli_query($con, "SELECT * FROM total_win_lose WHERE user='$user_login'");
			
			if($r_win_rolls = mysqli_affected_rows($con) >= 1){

				$update_r_win = mysqli_query($con, "UPDATE total_win_lose SET total_win_rolls = total_win_rolls + $add_win WHERE user='$user_login'");

			}else{

				$insert_win = mysqli_query($con, "INSERT INTO total_win_lose (user,total_win_rolls) VALUES ('$user_login','$add_win')");
			}
			//end add win roll

			//start get inc win
			$get_inc_win = mysqli_query($con, "SELECT * FROM inclosewin WHERE user ='$user_login'");
			
			if($r_get_incwin = mysqli_affected_rows($con) >= 1){
				while($return_get = mysqli_fetch_array($get_inc_win)){
					$inc_win = $return_get['inc_win'];
				}
			}

			//end get inc win
			$a = mysqli_query($con, "SELECT * FROM bets WHERE user = '$user_login'");
			
			while ($r = mysqli_fetch_array($a)) {

				$losebets = $r['bets_l'];
				$loseatt = $r['bets_w'];
			    $cont = $r['cont_l'];
			    $contwin1 = $r['cont_w'];


			    $porcent_in_win = $r['inc_porcent_w'];
				$am_w = number_format($r['amount'], 8, '.', '');
				$rb = number_format($r['bets_w'], 8, '.', '');
		
				//echo $rb;
				$add_w = number_format($rb + $am_w, 8, '.', '');
				
				$up = mysqli_query($con, "UPDATE bets SET amount = $add_w WHERE user='$user_login'");
			
			}
			
		}

		//start status rolls added

		$status_rolls1 = "WIN";
		$aa = mysqli_query($con, "SELECT * FROM bets WHERE user = '$user_login'");
		
		while ($ra = mysqli_fetch_array($aa)) {
	
		    $conta = $ra['cont_l'];
			$r_win = $ra['bets_w'];
			$contw = $ra['cont_w'];
		}
	
	
		$add_add1 = number_format($r_win, 8, '.', '');
		
		
		//echo $add_add1;
		$time_roll = date("h:i:sa");
		$added_status = mysqli_query($con, "INSERT INTO statusrolls (id_user,amount,profit,status,rate,time_roll,num_rate) VALUES ('$user_id','$amount_user_init','$add_add1','$status_rolls1','$rate','$time_roll','$num_rate')");


		$up = mysqli_query($con, "UPDATE bets SET bets_w = '0', bets_l = '0', cont_w = '1', cont_l = '1', inc_porcent_l = '0.00000000' WHERE user='$user_login'");

		$select_winlose = mysqli_query($con, "SELECT * FROM winlose_amount WHERE id_user = '$user_id'");

		if($r_select_winlose = mysqli_affected_rows($con) >= 1){
			
			if($contwin1 == "2" && $cont > "2" && $porcent_inc_lose > "0.00000000"){

				$update_winlose = mysqli_query($con, "UPDATE winlose_amount SET bets_win = bets_win + $add_add1, rate = '$rate' WHERE id_user = '$user_id'");
			}

			if($losew > "0" && $porcent_inc_lose > "0.00000000"){

				$update_winlose = mysqli_query($con, "UPDATE winlose_amount SET bets_win = bets_win + $add_add1, rate = '$rate' WHERE id_user = '$user_id'");
			}

			if($losel > "0" && $porcent_in_win > "0.00000000"){

				$update_winlose = mysqli_query($con, "UPDATE winlose_amount SET bets_win = bets_win + $add_add1, rate = '$rate' WHERE id_user = '$user_id'");
			}
			
			else{

				$update_winlose = mysqli_query($con, "UPDATE winlose_amount SET bets_win = bets_win + $r_win, rate = '$rate' WHERE id_user = '$user_id'");
			}
			
		}else{

			$betsl = "0";
			$insert_winlose = mysqli_query($con, "INSERT INTO winlose_amount (id_user,bets_win,bets_lose,rate) VALUES ('$user_id','$r_win','$betsl','$rate')");
	
		}
		//end status rolls added
	
	//else if rolls == win 
  
  }else{
        
		//start seed att

		$get_amount = mysqli_query($con, "SELECT * FROM bets WHERE user = '$user_login'");

			while ($return_amount = mysqli_fetch_array($get_amount)) {
			$amount_user_init = $return_amount['amount'];
			$amount_start = $return_amount['amount_init'];
			$return_profit = $amount_user_init - $amount_start; 
			$cont_win = $return_amount['cont_w'];
		}


		  $check_rest_rolls = mysqli_query($con, "SELECT * FROM seedrolls WHERE id_user='$user_id'");
	
			if($r_check_rest = mysqli_affected_rows($con) >= 1){

				while ($rest_rolls_now = mysqli_fetch_array($check_rest_rolls)) {

					$now_roll = $rest_rolls_now['rolls_now'];
					$num_roll_valid = $rest_rolls_now['num_rolls'];
				}

				/*if($now_roll >= $num_roll_valid){

						//start reset amount user

						$reset_amount_user = mysqli_query($con, "UPDATE bets SET amount = '0.00000000' WHERE user='$user_login'");
						$up_reset_bets_l_w = mysqli_query($con, "UPDATE bets SET bets_l = '0', bets_w= '0', seed_status = '1' WHERE user='$user_login'");

						//end reset amount user 
						exit();
					
				}*/
				$att_rolls = mysqli_query($con, "UPDATE seedrolls SET rolls_now=rolls_now+1 WHERE id_user='$user_id'");
			}

			$check_skill = mysqli_query($con, "SELECT * FROM skills WHERE user='$user_login' AND skill ='2x up'");

			if($r_skill = mysqli_affected_rows($con) >= 1){

				while ($return_skill = mysqli_fetch_array($check_skill)) {
					$skill = $return_skill['skill'];
					$action = $return_skill['action'];
				}
			
				if($skill == "2x up" && $action != "0"){
				
					$add_r_levels = mysqli_query($con, "UPDATE levels SET qtd_rolls=qtd_rolls+'2' WHERE user='$user_login'");
				}
				
			}else{

				$add_r_levels = mysqli_query($con, "UPDATE levels SET qtd_rolls=qtd_rolls+'1' WHERE user='$user_login'");
			}	

			$select_total_lose = mysqli_query($con, "SELECT * FROM total_win_lose WHERE user ='$user_login'");

			$att_lose = number_format($add, 8, '.', '');

			if($r_total_lose = mysqli_affected_rows($con) >= 1){

				$update_lose_r = mysqli_query($con, "UPDATE total_win_lose SET total_lose_rolls = total_lose_rolls + '$att_lose' WHERE user='$user_login'");
			}else{
				
				$insert_lose_r = mysqli_query($con, "INSERT INTO total_win_lose (user,total_lose_rolls) VALUES ('$user_login','$att_lose')");
			}
		//start level 
		if ($c = mysqli_affected_rows($con) >= 1) {

			$nvl1 = "10000";
			$nvl2 = "25000";
			$nvl3 = "40000";
			$nvl4 = "70000";
			$nvl5 = "100000";
			$nvl6 = "125000";

			$bonus2 = "0.00100000";
			$bonus3 = "0.00600000";
			$bonus4 = "0.01100000";
			$bonus5 = "0.02500000";
			$bonus6 = "0.03000000";

			$select_levels = mysqli_query($con, "SELECT * FROM levels WHERE user ='$user_login'");

			if($r_levels = mysqli_affected_rows($con) >= 1){
				$add_r_levels = mysqli_query($con, "UPDATE levels SET qtd_rolls=qtd_rolls+'1' WHERE user='$user_login'");
			}

			while ($return_levels = mysqli_fetch_array($select_levels)) {
				
				$user_nvl = $return_levels['nivel'];
				$rest_nvl = $return_levels['qtd_rolls'];
				$limite = $return_levels['limite'];
			}

			if($rest_nvl >= $nvl2 && $limite != 2 && $limite < 2){
			
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='2', qtd_rolls='0', stars= '2', limite='2' WHERE user='$user_login' AND limite ='$limite'");
				$bonus2 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus2' WHERE user='$user_login'");
			
			}else if($rest_nvl >= $nvl3 && $limite != 3 && $limite < 3){
			
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='3', qtd_rolls='0', stars= '3', limite='3' WHERE user='$user_login' AND limite ='$limite'");
				$bonus3 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus3' WHERE user='$user_login'");

			}else if($rest_nvl >= $nvl4 && $limite != 4 && $limite < 4){
			
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='4', qtd_rolls='0', stars= '4', limite='4' WHERE user='$user_login' AND limite ='$limite'");
				$bonus4 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus4' WHERE user='$user_login'");

			}else if($rest_nvl >= $nvl5 && $limite != 5 && $limite < 5){
				
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='5', qtd_rolls='0', stars= '5', limite='5' WHERE user='$user_login' AND limite ='$limite'");
				$bonus5 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus5' WHERE user='$user_login'");

			}
			if($rest_nvl >= $nvl6){
				
				$add_r_levels = mysqli_query($con, "UPDATE levels SET nivel='6', qtd_rolls='0' WHERE user='$user_login'");
				$bonus6 = mysqli_query($con, "UPDATE bets amount=amount+'$bonus6' WHERE user='$user_login'");
			
			}

			if($user_nvl == 1){

				$rest_next_nvl = $nvl2 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl2 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 100, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'"); 

			}else if($user_nvl == 2){

				$rest_next_nvl = $nvl3 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl3 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 160, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");

			}else if($user_nvl == 3){

				$rest_next_nvl = $nvl4 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl4 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 490, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");

			}else if($user_nvl == 4){

				$rest_next_nvl = $nvl5 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl5 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 1000, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");

			}else if($user_nvl == 5){

				$rest_next_nvl = $nvl6 - $rest_nvl;
				$rest_porcent = ($rest_nvl * $nvl6 / 100) / 1000;
				$porcent_next_nvl = number_format($rest_porcent / 1562.5, 1, '.', '');
				$add_r_levels = mysqli_query($con, "UPDATE levels SET rest_next_nivel = '$rest_next_nvl', rest_porcent='$porcent_next_nvl' WHERE user='$user_login'");

			}

			//end level
		}
		//end  seed att

		$get_low = mysqli_query($con, "SELECT * FROM bets WHERE user='$user_login' AND bets_l > '0'");

		if($r_getlow = mysqli_affected_rows($con) >= 1){

			$up = mysqli_query($con, "UPDATE bets SET bets_l ='0' WHERE user='$user_login'");

		}

		$get_low1 = mysqli_query($con, "SELECT * FROM bets WHERE user='$user_login'");
		
		while ($rcontl=mysqli_fetch_array($get_low1)) {
		
			$cont_betsl = $rcontl['cont_l'];
			$get_betslose = $rcontl['bets_l'];
			$get_porcent_l = $rcontl['inc_porcent_l'];
			$get_porcent_w = $rcontl['inc_porcent_w'];

		}

		//start inc win
		
		$get_inc_lose = mysqli_query($con, "SELECT * FROM inclosewin WHERE user ='$user_login'");
			
		if($r_get_inclose = mysqli_affected_rows($con) >= 1){

			while($return_get = mysqli_fetch_array($get_inc_lose)){

				$inc_lose = $return_get['inc_lose'];
				$inc_win = $return_get['inc_win'];			
			}
		}
		$add_l = number_format($add, 8, '.', '');
		
		//$update = mysqli_query($con, "UPDATE bets SET bets_w = bets_w+$addd WHERE user='$user_login'");
		$up = mysqli_query($con, "UPDATE bets SET bets_l = '$add_l', roll_l=roll_l+1, cont_l=cont_l+1, inc_porcent_l= inc_porcent_l + '$get_porcent_l' WHERE user='$user_login'");
		
		
		//start inc dec percent	
		$select2 = mysqli_query($con, "SELECT * FROM bets WHERE user ='$user_login'");

		while ($rr = mysqli_fetch_array($select2)) {

			$contt = $rr['cont_l'];
			$rl = number_format($rr['bets_l'] , 8, '.', '') ;
			$am_l = number_format($rr['amount'], 8, '.', '');
			$get_inc_losel = number_format($rr['inc_porcent_l'], 8, '.', '');
			$get_inc_win = number_format($rr['inc_porcent_w'], 8, '.', '');

			
		}
		//end inc dec percent

		

		$update = mysqli_query($con, "UPDATE bets SET bets_w = '0' WHERE user='$user_login'");
		
		$up = mysqli_query($con, "UPDATE bets SET amount = amount - '$add_l' WHERE user='$user_login'");
		//start add status rolls
		$status_rolls2 = "LOSE";

		$aa = mysqli_query($con, "SELECT * FROM bets WHERE user = '$user_login'");
		
		while ($ra = mysqli_fetch_array($aa)) {
	
		    $conta = $ra['cont_l'];
			$r_bet = $ra['bets_l'];
			$porcent_in_win = $ra['inc_porcent_w'];
			$porcent_inc_lose = $ra['inc_porcent_l'];
		}
	
		$add22 = number_format($r_bet, 8, '.', '');
		
		//echo $add22;
		$time_roll = date("h:i:sa");
		$added_status = mysqli_query($con, "INSERT INTO statusrolls (id_user,amount,profit,status,rate,time_roll,num_rate) VALUES ('$user_id','$amount_user_init','$add22','$status_rolls2','$rate','$time_roll','$num_rate')");
		//end add status rolls
		$up_inc_win = mysqli_query($con,"UPDATE bets SET inc_porcent_w = '0' WHERE user = '$user_login'");

		$select_winlose = mysqli_query($con, "SELECT * FROM winlose_amount WHERE id_user = '$user_id'");

		$get_lose = mysqli_query($con, "SELECT * FROM rolls_lose WHERE user ='$user_login'");

		while ($return_lose = mysqli_fetch_array($get_lose)) {
		
			$block_win_att = $return_lose['block_lose'];
			$block_lw = $return_lose['blocklw'];
		}

		
		if($r_select_winlose = mysqli_affected_rows($con) >= 1){

			if($inc_lose != "0" || $inc_lose != "0"){

				$update_winlose = mysqli_query($con, "UPDATE winlose_amount SET bets_lose = bets_lose + $add22, rate = '$rate' WHERE id_user = '$user_id'");
			}
			else if($inc_lose == "0" && $inc_win == "0"){

				$update_winlose = mysqli_query($con, "UPDATE winlose_amount SET bets_lose = bets_lose + $r_bet, rate = '$rate' WHERE id_user = '$user_id'");
			}
		}else{

			$betsw = "0";
			$insert_winlose = mysqli_query($con, "INSERT INTO winlose_amount (id_user,bets_win,bets_lose,rate) VALUES ('$user_id','$betsw','$r_bet','$rate')");
		}
	}
?>