<?php
session_start();
class Products
{
    private $conn;

    public function __construct()
    {
        include_once("Database.php");
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getProducts()
    {
        $query = "SELECT * FROM products";
        $result = $this->conn->query($query);
        $products = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;
    }

    public function addProduct($data, $file)
    {
        $product_name = $data['product_name'];
        $product_image = $this->uploadImage($file['product_image']);
        $product_cat = isset($data['product_cat']) ? $data['product_cat'] : '';
        $product_sec = isset($data['product_sec']) ? $data['product_sec'] : '';
        $unit_price = $data['unit_price'];
        $description = isset($data['description']) ? $data['description'] : '';
        $weight = isset($data['weight']) ? $data['weight'] : 0;
        $origin = isset($data['origin']) ? $data['origin'] : '';
        $quality = isset($data['quality']) ? $data['quality'] : '';
        $chek = isset($data['chek']) ? $data['chek'] : '';
        $stock = $data['stock'];

        $query = "INSERT INTO products (product_name, product_image, product_cat, product_sec, unit_price, description, weight, origin, quality, chek, stock)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssdsdssss", $product_name, $product_image, $product_cat, $product_sec, $unit_price, $description, $weight, $origin, $quality, $chek, $stock);

        if ($stmt->execute()) {
            return array('status' => 202, 'message' => 'Product added successfully');
        } else {
            return array('status' => 303, 'message' => 'Failed to add product: ' . $stmt->error);
        }
    }

    public function editProduct($data, $file)
    {
        $product_id = $data['pid'];
        $product_name = $data['product_name'];
        $product_image = $this->uploadImage($file['product_image']);
        $product_cat = isset($data['product_cat']) ? $data['product_cat'] : '';
        $product_sec = isset($data['product_sec']) ? $data['product_sec'] : '';
        $unit_price = $data['unit_price'];
        $description = isset($data['description']) ? $data['description'] : '';
        $weight = isset($data['weight']) ? $data['weight'] : 0;
        $origin = isset($data['origin']) ? $data['origin'] : '';
        $quality = isset($data['quality']) ? $data['quality'] : '';
        $chek = isset($data['chek']) ? $data['chek'] : '';
        $stock = $data['stock'];

        $query = "UPDATE products SET product_name=?, product_image=?, product_cat=?, product_sec=?, unit_price=?, description=?, weight=?, origin=?, quality=?, chek=?, stock=? WHERE product_id=?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssdsdssssi", $product_name, $product_image, $product_cat, $product_sec, $unit_price, $description, $weight, $origin, $quality, $chek, $stock, $product_id);

        if ($stmt->execute()) {
            return array('status' => 202, 'message' => 'Product updated successfully');
        } else {
            return array('status' => 303, 'message' => 'Failed to update product: ' . $stmt->error);
        }
    }

    public function deleteProduct($product_id)
    {
        $query = "DELETE FROM products WHERE product_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $product_id);

        if ($stmt->execute()) {
            return array('status' => 202, 'message' => 'Product deleted successfully');
        } else {
            return array('status' => 303, 'message' => 'Failed to delete product: ' . $stmt->error);
        }
    }

	private function uploadImage($file)
	{
		$target_dir = "../../img/";
		if (!is_dir($target_dir)) {
			mkdir($target_dir, 0777, true); 
		}
		$target_file = $target_dir . basename($file["name"]);
		if (move_uploaded_file($file["tmp_name"], $target_file)) {
			return "img/" . $file["name"];
		} else {
			return "img/default.jpg";
		}
	}

    public function __destruct()
    {
        $this->conn->close();
    }
}

if (isset($_POST['GET_PRODUCT'])) {
    $products = new Products();
    echo json_encode(array('status' => 202, 'message' => array('products' => $products->getProducts())));
}

if (isset($_POST['ADD_PRODUCT'])) {
    $products = new Products();
    echo json_encode($products->addProduct($_POST, $_FILES));
}

if (isset($_POST['EDIT_PRODUCT'])) {
    $products = new Products();
    echo json_encode($products->editProduct($_POST, $_FILES));
}

if (isset($_POST['DELETE_PRODUCT'])) {
    $products = new Products();
    echo json_encode($products->deleteProduct($_POST['pid']));
}
?>
