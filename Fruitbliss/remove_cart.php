<?php
session_start();
include("connect.php");

$response = array('status' => 'error');

if (isset($_GET['product_id']) && isset($_GET['userID'])) {
    $product_id = $_GET['product_id'];
    $uid = $_GET['userID'];

    $quer = "DELETE FROM carts WHERE product_id = $product_id AND userID = '$uid'";

    $database = new connectDatabase();
    $res = $database->write($quer);

    if ($res) {
        $response['status'] = 'success';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
exit();
