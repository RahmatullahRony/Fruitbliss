<?php

        session_start();
        include("connect.php");
        
        $database = new connectDatabase();
        $totalPrice = 0;
        $userID = $_SESSION['user']; 
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

        $delivery = 0;
        $net = 0;

        if ($totalPrice > 0) {
            $delivery = 100;
            $net = $totalPrice + $delivery;
        }




        $orderId = "TRX".rand(1000,9999).time();
        $temp = $orderId;

        $orderQuery = "INSERT INTO orders (trx_id, user_id, total_price, shipping, net_total) 
                       VALUES ('$temp', '$userID', $totalPrice, $delivery, $net)";

        $database->write($orderQuery);

        

        $itemQuery = "SELECT c.product_id, c.quantity, p.unit_price FROM carts c JOIN products p ON c.product_id = p.product_id  WHERE userID = '$userID'";
        $itemResult = $database->read($itemQuery);
        
        if ($itemResult) {
            foreach ($itemResult as $item) {
                $productId = $item['product_id'];
                $quantity = $item['quantity'];
                $price = $item['unit_price'];
                
                $itemInsertQuery = "INSERT INTO items (trx_id, product_id, quantity, price) 
                                    VALUES ('$temp', '$productId', $quantity, $price)";
                $database->write($itemInsertQuery);
            }
        }


        $clearCartQuery = "DELETE FROM carts WHERE userID = '$userID'";
        $database->write($clearCartQuery);

        header("Location: success.php?order_id=$temp");
        exit();
        



