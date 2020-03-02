<?php

require_once 'core.php';
$USER = (int)$_SESSION['userId'];

$sql1 = "select * from users where user_id = $USER";
$UserResult= $connect->query($sql1);
$UserData = $UserResult->fetch_array();
$username = $UserData[1];
date_default_timezone_set('Africa/Nairobi');

$time = date("h:i:sa");
$orderId = $_POST['customId'];

$sql = "SELECT order_id, product_name, quantity, amount,pay_type FROM customorders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);

$orderData = $orderResult->fetch_array();
$orderId = $orderData[0];
$productname = $orderData[1];
$quantity = $orderData[2];
$amount = $orderData[3];
$pay_type = $orderData[4];


$code = "STSOM";
 
$ordernumber = "$code"."$orderId";


$orderItemSql = "SELECT order_id, product_name, quantity, amount,pay_type FROM customorders WHERE order_id = $orderId";

$orderItemResult = $connect->query($orderItemSql);

$table = '
 <table cellspacing="0" cellpadding="20" width="100%">
	<thead>
		
		<tr >
			
			<th colspan="5">
				<center>
				Samaria Traders Shop</br>
				Tel : 0791566123</br>
				Order No.:'.$ordernumber.'	
				</center>			
				</Order>				
		</tr>		
	</thead>	
</table>

<table border="0" width="100%;" cellpadding="5" 
style="border:1px solid black;
border-top-style:1px solid black;
border-bottom-style:1px solid black;

">

	<tbody>
		<tr>
			<th style="text-align:left; padding-left:30px;">Order</th>
			<th>Rate</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>';


		while($row = $orderItemResult->fetch_array()) {

			if($row[1] == 1) { 		
				$productname1 = "<label class='label label-success'>Milk</label>";
			} else { 		
				$productname1 = "<label class='label label-warning'>Oil</label>";
			} // /else

			$table .= '<tr>
						<th style="text-align:left;  padding-left:30px;">'.$productname1.'</th>
						<th>'.$row[1].'</th>
						<th>'.$row[2].'</th>
						<th>'.$row[3].'</th>
					</tr>
					';
				
		} // /while

		$table .= '
			<tr>
				<th></th>
			</tr>

			<tr>
				<th>Total Amount</th>
				<th>'.$amount.'</th>			
			</tr>
				
		 <table  cellspacing="0" cellpadding="20" width="100%">
	        <thead>
	
	
			<tr >
				<br>	
				
					Served By : '.$username.'</br>
					<center>Time: '.$time.'</center>
					</br>
					<center><b> Goods once Sold can not be returned! </b></center>
				</caption>
						
			</tr>		
		</thead>
			
	
</table>
		
		
	</tbody>
	
	
	
</table>
 ';


$connect->close();

echo $table;

?>

<img id="image" src="../assests/images/png/samaria500blackpng.png" alt="image">
