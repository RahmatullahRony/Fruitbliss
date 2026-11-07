<?php
session_start();
include("connect.php");

	function calculateTotalPrice($userID) {
			$totalPrice = 0;
			$database = new connectDatabase();

			$quer =   "SELECT p.unit_price, c.quantity  FROM products p 
						JOIN carts c ON p.product_id = c.product_id 
						WHERE c.userID = '$userID'";
			
			$result = $database->read($quer);
			
			$totalPrice = 0;

			if ($result) {
				foreach ($result as $row) {
					$totalPrice += $row['unit_price'] * $row['quantity'];
				}
			}
			return $totalPrice;
	}

	if (isset($_POST["update_quantity"])) {
		$product_id = $_POST["proId"];
		$newQuantity = $_POST["newQuantity"];
		$uid = $_SESSION['user'];

		$quer = "UPDATE carts SET quantity = $newQuantity WHERE product_id = $product_id AND userID = '$uid'";

		$database = new connectDatabase();
		$res = $database->write($quer);

		if ($res) {
			// Calculate new total price for the product
			$quer = "SELECT unit_price FROM products WHERE product_id = $product_id";
			$productRes = $database->read($quer);
			$unitPrice = $productRes[0]['unit_price'];
			$newTotalPrice = $unitPrice * $newQuantity;

			$totalPrice = calculateTotalPrice($uid);

			$delivery = 0;
			$net = 0;
			if ($totalPrice > 0) {
				$delivery = 100;
				$net = $totalPrice + $delivery;
			}


			$response = array(
				'status' 		=> 'success',
				'newTotalPrice' => $newTotalPrice,
				'totalPrice' 	=> $totalPrice,
				'delivery' 		=> $delivery,
				'net'			=> $net
			);

			echo json_encode($response);
		} else {
			echo json_encode(['status' => 'error']);
		}
	}

	if (isset($_POST["remove_cart"])) {
		$product_id = $_POST["proId"];
		$uid = $_SESSION['user'];
	
		$quer = "DELETE FROM carts WHERE product_id = $product_id AND userID = '$uid'";
	
		$database = new connectDatabase();
		$res = $database->write($quer);
	
		if ($res) {
			$totalPrice = calculateTotalPrice($uid);
			$delivery = 0;
			$net = 0;
			if ($totalPrice > 0) {
				$delivery = 100;
				$net = $totalPrice + $delivery;
			}
	
			$response = array(
				'status' 		=> 'success',
				'totalPrice' 	=> $totalPrice,
				'delivery' 		=> $delivery,
				'net'			=> $net
			);
	
			echo json_encode($response);

		} else {
			echo json_encode(['status' => 'error']);
		}
		exit();
	}

    if(isset($_POST["addToCart"])) {
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION['user'])){

			$user_id = $_SESSION['user'];

			$quer = "SELECT * FROM carts WHERE product_id = '$p_id' AND userID = '$user_id'";

			$database = new connectDatabase();

			$rest = $database->read($quer);
   

			if($rest){

				$quer = "UPDATE carts SET quantity = quantity + 1 WHERE  product_id = '$p_id' AND userID = '$user_id'";
				$database->write($quer);
				
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product Quantity Updated!!</b>
					</div>
				";

			} else {
				
				$quer = "INSERT INTO carts (product_id, userID, quantity) 
				VALUES ('$p_id', '$user_id', 1)";
				$database->write($quer);	
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added!!</b>
					</div>
				";
			}

		}else{
				echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Login To Add Product To Your Cart!!</b>
				</div>
			";
		}	
	}

	if (isset($_POST["count_item"])) {
		$cnt = 0;
		if (isset($_SESSION["user"])) {
			$uid = $_SESSION["user"];
			$quer = "SELECT COUNT(product_id) AS count_item FROM carts WHERE userID = '$uid'";
			$database = new connectDatabase();
			$result = $database->read($quer);
			if ($result) {
				$cnt = $result[0]["count_item"];
			}
		}

		echo $cnt;

		exit();
	}


	