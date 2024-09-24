<?php


include_once("admin/functions.php");
$objStudent = new Student();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo '<script language="javascript">';
    echo 'alert("You need to log in to view the thank you page.");';
    echo 'window.location.href = "login.php";';
    echo '</script>';
    exit();
}

$userId = $_SESSION['user_id'];

// Fetch cart items for the logged-in user to display on the thank you page
$thankyouItems = $objStudent->getCartItemsByUserId($userId);
$subtotal = 0;
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
                            <h2 class="breadcrumb-title">Thankyou</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <ul class="breadcrumb-list text-center text-sm-end">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Thankyou</li>
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
                    <form action="#">
                        <div class="table-content table-responsive cart-table-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th class="product-title">Product</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($thankyouItems as $product): 
                                    $totalPrice = $product["price"] * $product["quantity"];
                                    $subtotal += $totalPrice;
                                ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo htmlspecialchars($product["product_title"]) ?> x <?php echo htmlspecialchars($product["quantity"]); ?></td>
                                        <td><?php echo htmlspecialchars($product["name"]); ?></td>
                                        <td><?php echo htmlspecialchars($product["email"]); ?></td>
                                        <td><?php echo htmlspecialchars($product["address"]); ?></td>
                                        <td>$<?php echo htmlspecialchars($totalPrice); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="cart-totals-container">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Totals payment</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                        <td><a href="account.php">Subtotal</a></td>
                                            <td>$<?php echo htmlspecialchars($subtotal); ?></td>
                                      
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
