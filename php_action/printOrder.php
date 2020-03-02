<?php

require_once 'core.php';
$USER = (int)$_SESSION['userId'];

$sql1 = "select * from users where user_id = $USER";
$UserResult= $connect->query($sql1);
$UserData = $UserResult->fetch_array();
$username = $UserData[1];
date_default_timezone_set('Africa/Nairobi');

$time = date("h:i:sa");
$orderId = $_POST['orderId'];

$sql = "SELECT order_id, order_date, client_name, client_contact, total_amount, discount, grand_total, paid, due FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);

$orderData = $orderResult->fetch_array();
$orderId = $orderData[0];
$orderDate = $orderData[1];
$clientName = $orderData[2];
$clientContact = $orderData[3];
$totalAmount = $orderData[4];
$discount = $orderData[5];
$grandTotal = $orderData[6];
$paid = $orderData[7];
$due = $orderData[8];

$change = $paid - $grandTotal;

$code = "STS640";
 
$ordernumber = "$code"."$orderId";


$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
				product.product_name FROM order_item INNER JOIN product ON order_item.product_id = product.product_id 
				WHERE order_item.order_id = $orderId";

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
			<th style="text-align:left; padding-left:30px;">Product</th>
			<th>Rate</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>';


		while($row = $orderItemResult->fetch_array()) {

			

			$table .= '<tr>
						<th style="text-align:left;  padding-left:30px;">'.$row[4].'</th>
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
				<th>'.$totalAmount.'</th>			
			</tr>
			<tr>
				<th>Paid Amount</th>
				<th>'.$paid.'</th>			
			</tr>

			<tr>
				<th>Change</th>
				<th>'.$change.'</th>			
			</tr>

		
		
		 <table  cellspacing="0" cellpadding="20" width="100%">
	        <thead>
	
	
			<tr >
				<br>	
				
					Served By : '.$username.'</br>
					Client Name : '.$clientName.'</br>
					Contact : '.$clientContact.'</br>
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
