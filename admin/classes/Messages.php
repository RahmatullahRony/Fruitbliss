<?php
session_start();
class Messages
{
    private $conn;

    public function __construct()
    {
        include_once("Database.php");
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getMessages()
    {
        $query = "SELECT * FROM messages";
        $result = $this->conn->query($query);
        $messages = array();

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $messages[] = $row;
            }
        }

        return $messages;
    }

    public function deleteMessage($mid)
    {
        $query = "DELETE FROM messages WHERE mid=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $mid);

        if ($stmt->execute()) {
            return array('status' => 202, 'message' => 'Message deleted successfully');
        } else {
            return array('status' => 303, 'message' => 'Failed to delete message: ' . $stmt->error);
        }
    }

    public function __destruct()
    {
        $this->conn->close();
    }
}

if (isset($_POST['GET_MESSAGES'])) {
    $messages = new Messages();
    echo json_encode(array('status' => 202, 'message' => array('messages' => $messages->getMessages())));
}

if (isset($_POST['DELETE_MESSAGE'])) {
    $messages = new Messages();
    echo json_encode($messages->deleteMessage($_POST['mid']));
}
?>
