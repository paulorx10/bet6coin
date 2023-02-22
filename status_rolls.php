<?php

	$con = new mysqli("localhost","root","","6bet");

		$select_rolls = mysqli_query($con,"SELECT * FROM statusrolls WHERE id_user = '1' ORDER BY id DESC limit 15");

		if($r_select = mysqli_affected_rows($con) >= 1){
			echo "<h3 class='text-primary text-center'>Bets status</h3>";


			echo "<table class='table-rolls table table-striped text-center' style='width: 90%; margin: 0px auto; height: 500px; overflow: auto !important; '>
			<th>#</th>
			<th>Amount</th>
			<th>Profit</th>
			<th>Status</th>";

			while($return_status = mysqli_fetch_array($select_rolls)){

				$status_rolls = $return_status['status'];

				echo "<tr>
				<td>".$return_status['id']."</td>
				<td class='text-primary'>".$return_status['amount']." BTC</td>
				<td class='text-warning'>".$return_status['profit']." BTC</td>";
				
				if($status_rolls == "WIN"){
				echo	$status_rolls_out1 = "<td class='text-success'>".$return_status['status']."</td>";
				}else{
				echo	$status_rolls_out2= "<td class='text-danger'>".$return_status['status']."</td>";
				}
				echo "</tr>";
			}

			echo "</table>";

		}else{

			echo "<table class='table table-striped'>";
			echo "<tr><td class='text-center'>No rolls found.</td></tr>";
			echo "</table>";

		}

?>