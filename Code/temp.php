<?php

$name = $_POST['payee'];
	
			$in_sql = "SELECT * FROM accounts WHERE id = '$id'";
			$ru_sql = mysqli_query($con, $in_sql);

			$rows = mysqli_fetch_array($ru_sql);
				$from_acc = $rows['accno'];

			$balance = $rows['accbalance'];
			$accno = $rows['accno'];
			$amount = $_POST['amount'];
			$total = $amount + $balance;
			
			$ins_sql = "UPDATE accounts
						SET accbalance = $total
						WHERE accno = '$accno'";

			$run_sql = mysqli_query($con, $ins_sql);
			$date = date('y-m-d');

			$i_sql = "INSERT INTO transactions(payee_name, amount, from_acc, trans_date) VALUES('".$name."', '".$amount."','".$from_acc."', '".$date."')";
			$r_sql = mysqli_query($con, $i_sql);
			?>