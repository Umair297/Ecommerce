<?php
session_start();
header('Content-Type: application/json');

class Cart {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "helendo";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        if (mysqli_connect_error()) {
            trigger_error('Error in DB: ' . mysqli_connect_error());
        }
    }

    public function getCartCount() {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $query = "SELECT COUNT(*) AS count FROM cart WHERE user_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $stmt->close();
            return $data['count'];
        }
        return 0;
    }
}

$cart = new Cart();
echo json_encode(['count' => $cart->getCartCount()]);
?>
