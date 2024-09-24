<?php

include_once("admin/functions.php");
$objStudent = new Student();
$objStudent->checkSession();
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $user_id = $_SESSION['user_id']; 

    $cartItems = $objStudent->getCartItemsByUserrId($user_id); 
    foreach ($cartItems as $product) {
        $product_id = $product['id'];
        $price = $product['price'];
        $quantity = $product['quantity'];

        $order_id = $objStudent->insertOrder($product_id, $quantity, $name, $email, $address, $city, $country, $price, $user_id);

        $objStudent->insertOrderDetails($order_id, $product_id, $price, $user_id);
    }
    header('Location: thankyou.php');
    exit();
}

$user_id = $_SESSION['user_id']; 
$cartItems = $objStudent->getCartItemsByUserrId($user_id); 
$subtotal = 0;
foreach ($cartItems as $product) {
    $totalPrice = $product["price"] * $product["quantity"];
    $subtotal += $totalPrice;
}
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Helendo &#8211; Minimalis Furniture eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="user/images/favicon.icon">
    <!-- CSS ============================================ -->
    <link rel="stylesheet" href="user/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="user/css/plugins/plugins.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="user/css/style.min.css">
    <style>
        .card {
            margin-top: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        footer {
            width: 100%;
            clear: both;
            position: relative;
            bottom: 0;
        }
        .footer-container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .btn {
            width: 8vw;
            background-color: black;
            color: white;
            margin-top: 10px;
        }
      
    </style>
</head>
<body>
    <!--====================  header area ====================-->
    <?php include('header.php'); ?>

    <!--====================  End of header area  ====================-->

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-start">
                            <h2 class="breadcrumb-title">Checkout</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list text-center text-sm-end">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Checkout</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <div id="main-wrapper">
        <div class="site-wrapper-reveal border-bottom">
            <!-- checkout start -->
            <div class="checkout-main-area section-space--ptb_90">
                <div class="container">
                    <div class="checkout-wrap">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="billing-info-wrap mr-100">
                                    <h6 class="mb-20">Billing Details</h6>
                                    <form method="POST" action="checkout.php">
                                        <input type="hidden" name="id" value="">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-25">
                                                    <label for="name">Name <span class="required" title="required">*</span></label>
                                                    <input type="text" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-25">
                                                    <label for="email">Email address <span class="required" title="required">*</span></label>
                                                    <input type="email" name="email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-25">
                                                    <label for="address">Address <span class="required" title="required">*</span></label>
                                                    <textarea name="address" rows="6" style="width: calc(100% - 30px);" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-25">
                                                    <label for="city">City <span class="required" title="required">*</span></label>
                                                    <input type="text" name="city" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="billing-info mb-25">
                                                    <label for="country">Country <span class="required" title="required">*</span></label>
                                                    <input type="text" name="country" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="submit" name="submit" class="btn--full btn--black btn--lg text-center">Place Order</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Rest of the code for order summary -->
                            <div class="col-lg-5">
                                <div class="your-order-wrappwer tablet-mt__60 small-mt__60">
                                    <h6 class="mb-20">Your order</h6>
                                    <div class="your-order-area">
                                        <div class="your-order-wrap gray-bg-4">
                                            <div class="your-order-info-wrap">
                                                <div class="your-order-info">
                                                    <ul>
                                                        <li>Product <span>Total</span></li>
                                                    </ul>
                                                </div>
                                                <div class="your-order-middle">
                                                    <ul>
                                                        <?php
                                                        foreach ($cartItems as $product) {
                                                            $totalPrice = $product["price"] * $product["quantity"];
                                                            ?>
                                                            <li><?php echo $product["title"]; ?> x <?php echo $product["quantity"]; ?>
                                                                <span>$<?php echo $totalPrice; ?></span>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <div class="your-order-info order-subtotal">
                                                    <ul>
                                                        <li><strong>Subtotal</strong> <span>$<?php echo $subtotal; ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="your-order-info order-total">
                                                    <ul>
                                                        <li><strong>Total</strong> <span>$<?php echo $subtotal; ?></span></li>
                                                    </ul>
                                                </div>
                                                <div class="payment-methods mt-30">
                                                    <input type="radio" id="paymentCard" name="paymentMethod" value="card" checked>
                                                    <label for="paymentCard">Payment Card</label>
                                                    <input type="radio" id="cashOnDelivery" name="paymentMethod" value="cash">
                                                    <label for="cashOnDelivery">Cash on Delivery</label>
                                                </div>

                                                <div class="payment-area mt-30">
                                                    <div class="single-payment" id="cardPaymentForm">
                                                        <h6 class="mb-10" style="font-size: 30px;">Check payments</h6>
                                                        <form>
                                                            <div class="form-group">
                                                                <label for="cardNumber">Card Number</label>
                                                                <input type="text" class="form-control" id="cardNumber" placeholder="Enter card number" required>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="cardExpMonth">Expiration Month</label>
                                                                    <input type="text" class="form-control" id="cardExpMonth" placeholder="MM" required>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="cardExpYear">Expiration Year</label>
                                                                    <input type="text" class="form-control" id="cardExpYear" placeholder="YY" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="cardCVC">CVC</label>
                                                                <input type="text" class="form-control" id="cardCVC" placeholder="CVC" required>
                                                            </div>
                                                    
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Place-order mt-30">
                                                <a href="thankyou.php" type="submit" name="submit" class="btn btn-primary">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of order summary -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout end -->
    </div>

    <!--====================  End of footer area  ====================-->
    <?php include('footer.php'); ?>

    <!--====================  End of footer area  ====================-->
</body>
</html>
