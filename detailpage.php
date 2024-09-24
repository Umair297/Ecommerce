<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Helendo &#8211; Minimalis Furniture eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="user/images/favicon.ico">
    

    <!-- CSS
            ============================================ -->

    <link rel="stylesheet" href="user/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="user/css/plugins/plugins.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="user/css/style.min.css">


</head>

<body>



<?php
include("admin/functions.php");

$objStudent = new Student();
$objStudent->checkSession();
$productId = $_GET['id'];
$product = $objStudent->getProductById($productId);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $quantity = $_POST['quantity'];
    
    if (isset($_SESSION['user_id'])) {
        // Logged-in user logic
        $userId = $_SESSION['user_id'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "helendo";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $image = $product["image"];
        $stmt = $conn->prepare("INSERT INTO cart (image, user_id, product_id, quantity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siid", $image, $userId, $productId, $quantity);

        if ($stmt->execute()) {
            echo '<script language="javascript">';
            echo 'if(confirm("Added to cart!")){ window.location = "http://localhost/helendo/cart.php"; }';
            echo '</script>';
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
        mysqli_close($conn);

    } else {
        // Guest logic
        if (!isset($_SESSION['guest'])) {
            $_SESSION['guest'] = true;
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Add product to guest 
        $_SESSION['cart'][] = [
            'product_id' => $productId,
            'image' => $product["image"],
            'quantity' => $quantity,
            'price' => $product["price"],
            'title' => $product["title"]

        ];
        echo '<script language="javascript">';
        echo 'if(confirm("Guest product Added to cart!")){ window.location = "http://localhost/helendo/cart.php"; }';
        echo '</script>';
    }
}

$std = $objStudent->ProductdisplayData();
?>
    <?php include('header.php'); ?>

        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row breadcrumb_box align-items-center">
                            <div class="col-lg-6 col-md-6 col-sm-6 text-center text-sm-start">
                                <h2 class="breadcrumb-title"><?php echo $product["title"] ?></h2>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul class="breadcrumb-list text-center text-sm-end">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active">Furniture</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="main-wrapper">
            <div class="site-wrapper-reveal">
                <div class="single-product-wrap section-space--pt_90 border-bottom">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-detail-gallery">
                                    <div class="product-large-slider" style="height: 400px;">
                                        <div class="pro-large-img img-zoom mb-3">
                                            <img style="width:40vw; height:60vh; border-radius: 15px;"
                                                src="<?php echo 'admin/' . $product["image"] ?>" class="img-fluid"
                                                alt="Product Image">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="single-product-content">
                                    <h2 class="title" style="font-size: 40px;"><?php echo $product["title"] ?></h2>


                                    <div class="product-desc">
                                        <p><?php echo $product["description"] ?></p>
                                    </div>
                                    <div class="product-additional-info">
                                        <div class="product-social-sharing">
                                            <h4 class="title">Share this product</h4>

                                        </div>
                                    </div>
                                    <div class="product-color-wrapper mt-20" style="margin-bottom:20px;">
                                        <div class="tab-content d-flex">
                                            <label class="mr-2">Color </label>
                                            <div class="tab-pane fade show active" id="tab_list_black">

                                            </div>
                                            <div class="tab-pane fade" id="tab_list_white">
                                                White
                                            </div>
                                        </div>

                                        <ul class="nav product-color-menu" role="tablist">
                                            <li class="tab__item nav-item active">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#tab_list_black"
                                                    role="tab"></a>
                                            </li>
                                            <li class="tab__item nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#tab_list_white"
                                                    role="tab"></a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="quickview-action-wrap mt-30">
                                        <div class="quickview-cart-box">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                <div class="quickview-quality"
                                                    style="margin-bottom: 1rem; text-align: center;">
                                                    <div class="cart-plus-minus">
                                                        <input class="cart-plus-minus-box" type="number" name="quantity"
                                                            value="1" min="1">
                                                    </div>
                                                </div>
                                                <div class="quickview-button">
                                                    <div class="quickview-cart button">
                                                        <button type="submit" name="add_to_cart"
                                                            class="btn--lg btn--black font-weight--reguler text-white">Add to cart</button>
                                                    </div>
                                                    <div class="quickview-wishlist button">
                                                        <a title="Add to wishlist" href="#"><i
                                                                class="icon-heart"></i></a>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12">
                    <div class="product-details-tab section-space--pt_90">
                        <ul role="tablist" class=" nav">
                            <li class="active" role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#description" class="active">Description</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#sheet">Additional information</a>
                            </li>
                            <li role="presentation">
                                <a data-bs-toggle="tab" role="tab" href="#reviews">Reviews</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                    <div class="product_details_tab_content tab-content mt-30">
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                            <div class="product_description_wrap">
                                <div class="product-details-wrap">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7 order-md-1 order-2">
                                            <div class="details mt-30">
                                                <h5 class="mb-10">Detail</h5>
                                                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil
                                                    impedit quo minus id quod maxime placeat facere possimus, omnis
                                                    voluptas assumenda est, omnis dolor repellendus. Temporibus autem
                                                    quibusdam et aut officiis debitis aut rerum omnis voluptas
                                                    assumenda.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 order-md-2 order-1">
                                            <div class="images">
                                                <img style="width:25vw; height:500px; border-radius: 15px;"
                                                    src="<?php echo 'admin/' . $product["image"] ?>" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details-wrap">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7 order-md-1 order-2">
                                            <div class="details mt-30">
                                                <div class="pro_feature">
                                                    <h5 class="title_3 mb-10">Features</h5>
                                                    <ul class="feature_list">
                                                        <li><a href="#"><i class="arrow_triangle-right"></i>Fully padded
                                                                back panel, web hauded handle</a></li>
                                                        <li><a href="#"><i class="arrow_triangle-right"></i>Internal
                                                                padded sleeve fits 15″ laptop</a></li>
                                                        <li><a href="#"><i class="arrow_triangle-right"></i>Internal
                                                                tricot lined tablet sleeve</a></li>
                                                        <li><a href="#"><i class="arrow_triangle-right"></i>One large
                                                                main compartment and zippered</a></li>
                                                        <li><a href="#"><i class="arrow_triangle-right"></i>Premium
                                                                cotton canvas fabric</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 order-md-2 order-1">
                                            <div class="images">
                                                <img style="width:25vw; height:500px; border-radius: 15px;"
                                                    src="<?php echo 'admin/' . $product["image"] ?>" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div class="product_tab_content tab-pane" id="sheet" role="tabpanel">
                            <div class="pro_feature">
                                <table class="shop_attributes">
                                    <tbody>
                                        <tr>
                                            <th>Weight</th>
                                            <td>1.2 kg</td>
                                        </tr>
                                        <tr>
                                            <th>Dimensions</th>
                                            <td>12 × 2 × 1.5 cm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="product_tab_content tab-pane" id="reviews" role="tabpanel">

                            <!-- Start RAting Area -->
                            <div class="rating_wrap mb-30">
                                <h4 class="rating-title-2">Be the first to review “Wooden chair”</h4>
                                <p>Your rating</p>
                                <div class="rating_list">
                                    <div class="product-rating d-flex">
                                        <i class="yellow icon_star"></i>
                                        <i class="yellow icon_star"></i>
                                        <i class="yellow icon_star"></i>
                                        <i class="yellow icon_star"></i>
                                        <i class="yellow icon_star"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- End RAting Area -->

                        </div>
                    </div>

                </div>
            </div>
            <?php
            include ('footer.php');
            ?>
            <script src="assets/js/vendor/vendor.min.js"></script>
            <script src="assets/js/plugins/plugins.min.js"></script>
            <script src="assets/js/main.js"></script>
        </div>
</body>

</html>
