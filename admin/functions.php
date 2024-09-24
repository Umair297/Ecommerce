<?php
session_start();

class Student {
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

    public function register() {
        if (isset($_POST["password"]) && isset($_POST["confirm_password"])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm = $_POST["confirm_password"];

            if ($password == $confirm) {
                $role = strpos($email, 'admin') !== false ? 1 : 0;
                $result = $this->conn->prepare("INSERT INTO user(name, email, password, confirm_password, role) VALUES(?,?,?,?,?)");
                $result->bind_param("ssssi", $name, $email, $password, $confirm, $role);

                if ($result->execute()) {
                    echo '<script language="javascript">';
                    echo 'if(confirm("Register form has been submitted")){ window.location = "http://localhost/helendo/admin/dashboard.php"; }';
                    echo '</script>';
                } else {
                    echo "Error in the query";
                }
                $result->close();
            } else {
                echo '<script language="javascript">';
                echo 'if(confirm("Password and Confirm Password do not match")){ window.location = "http://localhost/helendo/index.php"; }';
                echo '</script>';
            }
            $this->conn->close();
        } else {
            echo "";
        }
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $this->conn->real_escape_string($_POST['email']);
                $password = $this->conn->real_escape_string($_POST['password']);    

                $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
                $result = $this->conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        $_SESSION['email'] = $email;
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['name'] = $user['name'];

                        if ($user['role'] == 1) {
                            echo '<script language="javascript">';
                            echo 'if(confirm("This is admin site")){ window.location = "http://localhost/helendo/admin/dashboard.php"; }';
                            echo '</script>';
                        } else {
                            echo '<script language="javascript">';
                            echo 'if(confirm("This is a user site")){ window.location = "http://localhost/helendo/index.php"; }';
                            echo '</script>';
                        }
                    } else {
                        echo "Invalid username or password";
                    }
                } else {
                    echo "Error: " . $this->conn->error;
                }
            } else {
                echo "";
            }
        }
    }
    

    function checkSession() {
        if (!isset($_SESSION['user_id']) && !isset($_SESSION['guest'])) {
            echo '<script language="javascript">';
            echo 'alert("You need to log in or continue as guest.");';
            echo 'window.location.href = "http://localhost/helendo/";';
            echo '</script>';
            exit();
        }
        } 
        public function guestCheckout() {
            if (!isset($_SESSION['guest'])) {
                $_SESSION['guest'] = true;
                $_SESSION['cart'] = []; // Initialize an empty cart for guests
                $_SESSION['order']= [];
            }
            echo '<script language="javascript">';
            echo 'window.location.href = "http://localhost/helendo/index.php";';
            echo '</script>';
        }
        
    public function getCartCount($userId) {
        $sql = "SELECT COUNT(*) as count FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'];
    }
    public function clearCart($userId) {
        $stmt = $this->conn->prepare("DELETE FROM cart WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->close();
    }

        

        public function getUserIdByEmail($email) {
            $sql = "SELECT id FROM user WHERE email = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $stmt->close();

            return $user['id'];
        }

        public function getCartItemsByUserId($userId) {
            $stmt = $this->conn->prepare("
                SELECT 
                    cart.product_id, 
                    cart.quantity,
                    product.title AS product_title, 
                    product.price, 
                    `order`.name, 
                    `order`.email,
                    `order`.address
                FROM cart 
                JOIN product ON cart.product_id = product.id 
                JOIN `order` ON `order`.user_id = cart.user_id 
                WHERE cart.user_id = ?
                GROUP BY cart.product_id, `order`.name, `order`.email, `order`.address
            ");
            
            $stmt->bind_param("i", $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            $cartItems = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $cartItems;
        }
        
        
      
    public function getCartItemsByUserrId($userId) {
        $stmt = $this->conn->prepare("SELECT cart.*, product.title, product.price, product.image FROM cart JOIN product ON cart.product_id = product.id WHERE cart.user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $cartItems = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $cartItems;
    }  

    public function Add() {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'png', 'jpeg', 'webp', 'avif'];
    
        if (isset($_POST["submit"])) {
            // check type
            if (!in_array($imageFileType, $allowedTypes)) {
                $msg = "Type is not allowed";
            } elseif (file_exists($target_file)) {
                $msg = "Sorry, file already exists.";
            } elseif ($_FILES["fileToUpload"]["size"] > 5000000) {
                $msg = "Sorry, your file is too large.";
            } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            }
        }
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $description = $_POST["description"];
    
            $sql = "INSERT INTO `categories`(`image`, `name`, `description`)
                    VALUES ('$target_file', '$name', '$description');";
            
            // Only execute the query once
            if ($this->conn->query($sql) === TRUE) {
                // Successfully inserted
                echo "Record added successfully";
            } else {
                echo "Error uploading record: " . $this->conn->error;
            }
        }
    }
    

        public function displayData() {
            $query = "SELECT * FROM `categories`";
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        public function deleteData($id) {
            $query = "DELETE FROM categories WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) { 
                return true;
            } else {
                return false;
            }
        }

        public function editData() {
            if (isset($_POST["submit"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'png', 'jpeg', 'webp', 'avif'];
                if (!in_array($imageFileType, $allowedTypes)) {
                    $msg = "Type is not allowed";
                } elseif (file_exists($target_file)) {
                    $msg = "Sorry, file already exists.";
                } elseif ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $msg = "Sorry, your file is too large.";
                } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                }
            }

            $sql = "SELECT * FROM categories";
            $result = $this->conn->query($sql);

            $data = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }

            return $data;
        }

        public function UpdateData() {
            if (isset($_POST["updat"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'png', 'jpeg', 'webp', 'avif'];
                if (!in_array($imageFileType, $allowedTypes)) {
                    $msg = "Type is not allowed";
                } elseif (file_exists($target_file)) {
                    $msg = "Sorry, file already exists.";
                } elseif ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $msg = "Sorry, your file is too large.";
                } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST['id'];
                $name = $_POST["name"];
                $description = $_POST['description'];

                $sql = "UPDATE `categories` SET `image`= '$target_file',`name`= '$name',`description`= '$description' WHERE id='$id'";
                if ($this->conn->query($sql) === TRUE) {
                    echo '<script language="javascript">';
                    echo 'if(confirm){ window.location = "http://localhost/helendo/admin/category.php"; }';
                    echo '</script>';
                    exit();
                } else {
                    echo "Error edit form: " . $this->conn->error;
                }
                mysqli_query($this->conn, $sql);
            }
        }

        public function Addproduct() {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'png', 'jpeg', 'webp', 'avif'];
        
            if (isset($_POST["submit"])) {
                // check file type
                if (!in_array($imageFileType, $allowedTypes)) {
                    $msg = "Type is not allowed";
                } elseif (file_exists($target_file)) {
                    $msg = "Sorry, file already exists.";
                } elseif ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $msg = "Sorry, your file is too large.";
                } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                }
            }
        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = $_POST["title"];
                $description = $_POST["description"];
                $price = $_POST["price"];
                $category = $_POST["category_id"];
        
                $sql = "INSERT INTO `product`(`image`, `title`, `description`, `price`, `category_id`)
                        VALUES ('$target_file', '$title', '$description', '$price', '$category');";
                
                // Execute the query only once
                if ($this->conn->query($sql) === TRUE) {
                    // Successfully inserted
                    echo "Product added successfully";
                } else {
                    echo "Error uploading record: " . $this->conn->error;
                }
            }
        }
        

        public function ProductdisplayData() {
            $query = "SELECT * FROM `product`";
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            }
        }

        public function ProductdeleteData($id) {
            $query = "DELETE FROM product WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function ProducteditData() {
            if (isset($_POST["submit"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'png', 'jpeg', 'webp', 'avif'];
                if (!in_array($imageFileType, $allowedTypes)) {
                    $msg = "Type is not allowed";
                } elseif (file_exists($target_file)) {
                    $msg = "Sorry, file already exists.";
                } elseif ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $msg = "Sorry, your file is too large.";
                } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                }
            }

            $sql = "SELECT * FROM product";
            $result = $this->conn->query($sql);

            $data = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }

            return $data;
        }

        public function ProductUpdateData() {
            if (isset($_POST["submit"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'png', 'jpeg', 'webp', 'avif'];
                if (!in_array($imageFileType, $allowedTypes)) {
                    $msg = "Type is not allowed";
                } elseif (file_exists($target_file)) {
                    $msg = "Sorry, file already exists.";
                } elseif ($_FILES["fileToUpload"]["size"] > 5000000) {
                    $msg = "Sorry, your file is too large.";
                } elseif (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $msg = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST["id"];
                $title = $_POST["title"];
                $description = $_POST["description"];
                $price = $_POST["price"];
                $category = $_POST["category_id"];

                $sql = "UPDATE `product` SET `image`= '$target_file',`title`= '$title',`description`= '$description',`price`= '$price',`category_id`= '$category' WHERE id='$id'";
                if ($this->conn->query($sql) === TRUE) {
                    header("location:viewproduct.php");
                    exit();
                } else {
                    echo "Error edit form: " . $this->conn->error;
                }
                mysqli_query($this->conn, $sql);
            }
        }

        public function getProductById($id) {
            $stmt = $this->conn->prepare("SELECT * FROM product WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product = $result->fetch_assoc();
            $stmt->close();
            return $product;
        }
  
    public function getCartItems() {
        $sql = "SELECT cart.id, cart.user_id, product.title, product.price, cart.quantity, product.image 
                FROM cart 
                INNER JOIN product ON cart.product_id = product.id";
        
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            $cartItems = [];
            while($row = $result->fetch_assoc()) {
                $cartItems[] = $row;
            }
            return $cartItems;
        } else {
            return [];
        }
    }
    public function Productdel($productId) {
    $sql = "DELETE FROM cart WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $productId);

    if ($stmt->execute()) {
        return true; // Deletion successful
    } else {
        // Output error message
        echo "Error: " . $this->conn->error;
        return false; // Deletion failed
    }
}

public function updateQuantity($productId, $updatedQuantity) {
    $sql = "UPDATE cart SET quantity = ? WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ii", $updatedQuantity, $productId);

    if ($stmt->execute()) {
        return true; // Update successful
    } else {
        // Output error message
        echo "Error: " . $this->conn->error;
        return false; // Update failed
    }
}

 


public function insertOrder($product_id, $quantity, $name, $email, $address, $city, $country, $price, $user_id) {
    $stmt = $this->conn->prepare("INSERT INTO `order` (product_id, quantity, name, email, address, city, country, price, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iisssssdi", $product_id, $quantity, $name, $email, $address, $city, $country, $price, $user_id);
    $stmt->execute();
    $order_id = $stmt->insert_id;
    $stmt->close();
    return $order_id;
}

public function insertOrderDetails($order_id, $product_id, $price, $user_id) {
    $stmt = $this->conn->prepare("INSERT INTO order_details (order_id, product_id, price, user_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iidi", $order_id, $product_id, $price, $user_id);
    $stmt->execute();
    $stmt->close();
}




// Other methods...




public function getOrders() {
    $query = "SELECT * FROM `order` WHERE 1";
    $result = $this->conn->query($query);
    if ($result->num_rows > 0) {
        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    } else {
        return [];
    }
}
public function getOrder($user_id) {
    $query = "SELECT user.id AS user_id, user.name, user.email, SUM(`order`.price * `order`.quantity) as total_price 
              FROM `order`
              JOIN user ON `order`.user_id = user.id
              WHERE user.id = ?
              GROUP BY user.id, user.name, user.email";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $orders = [];
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
        return $orders;
    } else {
        return [];
    }
}



}

?>

