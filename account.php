<?php
include_once("admin/functions.php");
$objStudent = new Student();
$objStudent->checkSession();

// Initialize orders and cart arrays


if (isset($_SESSION['user_id'])) {
    // If the user is logged in, get orders from the database
    $userId = $_SESSION['user_id'];
    $orders = $objStudent->getOrder($userId);
} else {

}

$subtotal = 0;
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Helendo &#8211; Minimalis Furniture eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="user/images/favicon.ico">
    <!-- CSS ============================================ -->
    <link rel="stylesheet" href="user/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="user/css/plugins/plugins.min.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="user/css/style.min.css">
</head>
<body>
    <?php include ('header.php'); ?>

    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row breadcrumb_box align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-start">
                            <h2 class="breadcrumb-title">My Account</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <ul class="breadcrumb-list text-center text-sm-end">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="site-wrapper-reveal border-bottom">
            <div class="my-account-page-warpper section-space--ptb_120">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="myaccount-page-wrapper">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i> Dashboard</a>
                                            <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                            <a href="#download" data-bs-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>
                                            <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment Method</a>
                                            <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> Address</a>
                                            <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                            <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3 class="title">Dashboard</h3>
                                                    <div class="welcome">
                                                        <p>Hello, <strong>Alex Aya</strong> (If Not <strong>Aya!</strong><a href="login.html" class="logout"> Logout</a>)</p>
                                                    </div>
                                                    <p class="mb-0">From your account dashboard, you can easily check & view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3 class="title">Orders</h3>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Total Price</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- Display orders from database or session -->
                                                                <?php if (!empty($orders)) : ?>
                    <?php foreach ($orders as $order) : ?>
                        <tr>
                          
                            <td><?php echo htmlspecialchars($order['name']); ?></td>
                            <td><?php echo htmlspecialchars($order['email']); ?></td>
                            <td>$<?php echo htmlspecialchars($order['total_price']); ?></td>
                            <td><a href="viewdetail.php?user_id=<?php echo $order['user_id']; ?>" class="btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No orders found</td>
                    </tr>
                <?php endif; ?>
                                                              
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3 class="title">Payment Method</h3>
                                                    <p class="saved-message">You Can't Save Your Payment Method yet.</p>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3 class="title">Billing Address</h3>
                                                    <address>
                                                        <p><strong>Alex Aya</strong></p>
                                                        <p>1234 Market ##, Suite 900 <br>Lorem Ipsum, ## 12345</p>
                                                        <p>Mobile: (123) 123-456789</p>
                                                    </address>
                                                    <a href="#" class="btn btn btn-dark btn-hover-primary rounded-0"><i class="fa fa-edit me-2"></i>Edit Address</a>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3 class="title">Account Details</h3>
                                                    <div class="account-details-form">
                                                        <form action="#">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item mb-3">
                                                                        <label for="first-name" class="required mb-1">First Name</label>
                                                                        <input type="text" id="first-name" placeholder="First Name" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item mb-3">
                                                                        <label for="last-name" class="required mb-1">Last Name</label>
                                                                        <input type="text" id="last-name" placeholder="Last Name" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-input-item mb-3">
                                                                <label for="display-name" class="required mb-1">Display Name</label>
                                                                <input type="text" id="display-name" placeholder="Display Name" />
                                                            </div>
                                                            <div class="single-input-item mb-3">
                                                                <label for="email" class="required mb-1">Email Address</label>
                                                                <input type="email" id="email" placeholder="Email Address" />
                                                            </div>
                                                            <fieldset>
                                                                <legend>Password change</legend>
                                                                <div class="single-input-item mb-3">
                                                                    <label for="current-pwd" class="required mb-1">Current Password</label>
                                                                    <input type="password" id="current-pwd" placeholder="Current Password" />
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item mb-3">
                                                                            <label for="new-pwd" class="required mb-1">New Password</label>
                                                                            <input type="password" id="new-pwd" placeholder="New Password" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item mb-3">
                                                                            <label for="confirm-pwd" class="required mb-1">Confirm Password</label>
                                                                            <input type="password" id="confirm-pwd" placeholder="Confirm Password" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <div class="single-input-item single-item-button mt-2">
                                                                <button class="btn btn btn-dark btn-hover-primary rounded-0">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div> 
                                </div> 
                            </div>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
    </div>


    <?php include ('footer.php'); ?>

    <script src="user/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- jQuery JS -->
    <script src="user/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="user/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="user/js/vendor/bootstrap.min.js"></script>
    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from above) -->
    <script src="user/js/plugins/plugins.js"></script>
    <script src="user/js/main.js"></script>
</body>
</html>
