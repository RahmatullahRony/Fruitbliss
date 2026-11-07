<?php
session_start();
class Orders
{
    private $conn;

    public function __construct()
    {
        include_once("Database.php");
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getOrders()
    {
        $query = "SELECT p.product_image, p.product_name, c.quantity, c.price, c.trx_id FROM items c JOIN products p ON c.product_id = p.product_id";
        $result = $this->conn->query($query);
        $orders = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $orders[] = $row;
            }
        }

        return $orders;
    }

    public function deleteOrder($trx_id)
    {
        $query = "DELETE FROM items WHERE trx_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $trx_id);

        $stmt->execute();
        
        $query = "DELETE FROM orders WHERE trx_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $trx_id);

        if ($stmt->execute()) {
            return array('status' => 202, 'message' => 'Order deleted successfully');
        } else {
            return array('status' => 303, 'message' => 'Failed to delete order: ' . $stmt->error);
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

if (isset($_POST['GET_ORDERS'])) {
    $orders = new Orders();
    echo json_encode(array('status' => 202, 'message' => array('orders' => $orders->getOrders())));
}

if (isset($_POST['DELETE_ORDER'])) {
    $orders = new Orders();
    echo json_encode($orders->deleteOrder($_POST['trx_id']));
}
?>
