<?php
include_once("admin/functions.php");

$objStudent = new Student();

// Check if the user is logged in or a guest
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($objStudent->Productdel($id)) {
        echo '<script language="javascript">';
        echo 'if(confirm("Record deleted successfully!")){ window.location = "http://localhost/helendo/cart.php"; }';
        echo '</script>';
    } else {
        echo "Error deleting record";
    }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Helendo &#8211; Minimalis Furniture eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="user/images/favicon.ico">
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
    <?php include('header.php'); ?>

    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-start">
                            <h2 class="breadcrumb-title">Cart</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <ul class="breadcrumb-list text-center text-sm-end">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-wrapper-reveal border-bottom">
        <div class="cart-main-area section-space--ptb_90">
            <div class="container">
                <div class="cart-table-container">
                    <form action="cart.php" method="POST">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Product Image</th>
                                        <th class="product-name">Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($cartItems)): ?>
                                        <?php foreach ($cartItems as $product): ?>
                                            <?php $totalPrice = $product["price"] * $product["quantity"]; ?>
                                            <?php $subtotal += $totalPrice; ?>
                                            <tr>
                                                <td></td>
                                                <td><img src="<?php echo 'admin/' . $product["image"]; ?>" alt="Product Image" style="width: 100px; height: auto;"></td>
                                                <td><?php echo $product["title"]; ?></td>
                                                <td>$<?php echo $product["price"]; ?></td>
                                                <td><?php echo $product["quantity"]; ?></td>
                                                <td>$<?php echo $totalPrice; ?></td>
                                                <td>
                                                    <a href="cart.php?id=<?php echo $product['id']; ?>"><i class="fa fa-trash" style="font-size:30px"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7">Your cart is empty</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="cart-totals-container">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cart Totals</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>$<?php echo $subtotal; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            <?php else: ?>
                                <a href="login.php" class="btn btn-primary">Checkout</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
