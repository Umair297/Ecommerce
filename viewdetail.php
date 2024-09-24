<?php
include_once("admin/functions.php");
$objStudent = new Student();
$objStudent->checkSession();


if(isset ($_GET ['user_id']))
if (isset($_GET['user_id'])) { 
    $userId = intval($_GET['user_id']);
    $cartItems = $objStudent->getCartItemsByUserrId($userId);
} else {
// Guest user logic
if (isset($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart']; // Cart for guests
} else {
    $cartItems = [];
}
}

$subtotal = 0;
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
   

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Order Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="user/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="user/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="user/css/style.min.css">

    <style>
        .cart-main-area {
            display: flex;
            flex-direction: column;
        }

        .cart-table-container {
            width: 100%;
        }

        .cart-totals-container {
            width: 30vw;
            float: right;
            margin: 20px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-body {
            padding: 16px;
        }

        .card-title {
            margin-bottom: 16px;
        }

        .table-responsive {
            margin-bottom: 16px;
        }

        .btn-primary {
            display: block;
            width: 35%;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            background-color: black;
        }
    </style>
</head>

<body>
    <div class="site-wrapper-reveal border-bottom">
        <div class="cart-main-area section-space--ptb_90">
            <div class="container">
                <div class="cart-table-container">
                    <form action="cart.php" method="POST">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th class="product-name">Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                        
                                    <?php foreach ($cartItems as $product): ?>
                                    <?php $totalPrice = $product["price"] * $product["quantity"]; ?>
                                    
                                    <tr>
                                        <td><img src="<?php echo 'admin/' . $product["image"]; ?>" alt="Product Image" style="width: 100px; height: auto;"></td>
                                        <td><?php echo htmlspecialchars($product["title"]); ?></td>
                                        <td>$<?php echo htmlspecialchars($product["price"]); ?></td>
                                        <td><?php echo htmlspecialchars($product["quantity"]); ?></td>
                                        <td>$<?php echo htmlspecialchars($totalPrice); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                      
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>
