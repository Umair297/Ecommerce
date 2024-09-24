<!DOCTYPE html>
<html class="no-js" lang="zxx">


<!-- Mirrored from htmldemo.net/helendo/helendo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2024 14:13:26 GMT -->

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

<body class="">
<!-- $query = "SELECT * FROM `categories` LEFT JOIN product  ON product = product.category_id"; -->
    <!--====================  header area ====================-->
    <?php
   
    include("admin/functions.php");
   $objStudent = new Student(); 

   $std = $objStudent->ProductdisplayData();
    ?>

    <?php 
     include ('header.php')
    ?>
    <!--====================  End of header area  ====================-->




    <div id="main-wrapper">
        <div class="site-wrapper-reveal">

            <div class="hero-box-area mt-md-0 mt-lg-3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 ps-0 ps-lg-3 pe-0 pe-lg-3">

                            <!-- Hero Slider Area Start -->
                            <div class="hero-area hero-slider-one">
                                <div class="single-hero-slider-one bg-img"
                                    data-bg="user/images/hero/home-default-1.webp">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="hero-text-one">
                                                    <h6 class="text-color-primary mb-10">
                                                        CHAIR <br> COLLECTION <br> 2022
                                                    </h6>
                                                    <h1 class="hero-title">
                                                        Welcome To <br> Helendo Store
                                                    </h1>
                                                    <p class="mt-30"> Many desktop publishing packages and web page
                                                        editors now use <br>
                                                        Lorem Ipsum as their default model text
                                                    </p>
                                                    <div class="button-box mt-30">
                                                        <a href="shop.php" class="hero-btn-one btn">Shop now <i
                                                                class="icon-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-hero-slider-one bg-img"
                                    data-bg="user/images/hero/home-default-2.webp">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="hero-text-one">
                                                    <h6 class="text-color-primary mb-10">
                                                        CHAIR <br> COLLECTION <br> 2022
                                                    </h6>
                                                    <h1 class="hero-title">
                                                        Welcome To <br> Helendo Store
                                                    </h1>
                                                    <p class="mt-30"> Many desktop publishing packages and web page
                                                        editors now use <br>
                                                        Lorem Ipsum as their default model text
                                                    </p>
                                                    <div class="button-box mt-30">
                                                        <a href="shop.php" class="hero-btn-one btn">Shop now
                                                            <i class="icon-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-hero-slider-one bg-img"
                                    data-bg="user/images/hero/home-default-3.webp">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="hero-text-one">
                                                    <h6 class="text-color-primary mb-10">
                                                        CHAIR <br> COLLECTION <br> 2022
                                                    </h6>
                                                    <h1 class="hero-title">
                                                        Welcome To <br> Helendo Store
                                                    </h1>
                                                    <p class="mt-30"> Many desktop publishing packages and web page
                                                        editors now use <br>
                                                        Lorem Ipsum as their default model text
                                                    </p>
                                                    <div class="button-box mt-30">
                                                        <a href="shop.php" class="hero-btn-one btn">Shop now
                                                            <i class="icon-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hero Slider Area End -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="featuted-product-wrap section-space--pt_120">
                <div class="container">
                <?php foreach ($std as $product): ?>
                    <div class="row align-items-center featuted-product-one">
                        <div class="col-lg-6 col-md-6 order-md-1 order-1">
                       
                            <div class="product-thumbnail">
                                <a href="#"><img src="<?php echo 'admin/'.$product["image"] ?>" alt="" class="img-fluid"
                                        alt="Featured Image" height="451" width="350"/></a>
                            </div>
                           
                        </div>
                        <div class="col-lg-6 col-md-6 order-md-2 order-2">
                            <div class="featured-product-contect">
                                <h6 class="sub-heading mb-2">FEATURED PRODUCT</h6>
                                <h2 class="section-title--one"><a href="#"><?php echo $product["title"] ?></a></h2>
                                <p class="mt-30"><?php echo $product["description"] ?>
                                 </p>
                                <div class="button-box section-space--mt_60">
                                    <a href="product-details.html" class="btn btn--md btn--border_1">Only <?php echo $product["price"] ?> <i
                                            class="icon-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="images-text-bg text-end">
                    <img src="user/images/text-bg/bg-df-1-300x49.webp" class="img-fluid" width="300" height="49"
                        alt="Wood Coth">
                </div>
            </div>

            <div class="product-wrapper section-space--ptb_120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-20">
                                <h2 class="section-title--one section-title--center">Best Selling</h2>
                            </div>
                        </div>
                    </div>

                    <div class="product-slider-active">

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="<?php echo 'admin/'.$product["image"] ?>" class="img-fluid"
                                        alt="Product Images" width="300" height="300" width="300" height="300">

                                    <span class="ribbon out-of-stock">
                                        Out Of Stock
                                    </span>
                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html"><?php echo $product["title"] ?></a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">$<?php echo $product["price"] ?></span>
                                </div>
                            </div>
                        </div><!-- Single Product Item End -->

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="<?php echo 'admin/'.$product["image"] ?>" class="img-fluid"
                                        alt="Product Images" width="300" height="300">

                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html">Simple Chair</a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">£70.00</span> - <span class="old-price"> £95.00</span>
                                </div>
                            </div>
                        </div><!-- Single Product Item End -->

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="user/images/product/1_3-300x300.webp" class="img-fluid"
                                        alt="Product Images" width="300" height="300">

                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html">Smooth Disk</a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">£46.00</span>
                                </div>
                            </div>
                        </div><!-- Single Product Item End -->

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="<?php echo 'admin/'.$product["image"] ?>" class="img-fluid"
                                        alt="Product Images" width="300" height="300">

                                    <span class="ribbon onsale">
                                        -14%
                                    </span>
                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html">Wooden Flowerpot</a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">£40.00</span> - <span class="old-price"> £635.00</span>
                                </div>
                            </div>
                        </div><!-- Single Product Item End -->

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="user/images/product/1_5-300x300.webp" class="img-fluid"
                                        alt="Product Images" width="300" height="300">

                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html">Living room & Bedroom
                                        lights</a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">£60.00</span> - <span class="old-price"> £69.00</span>
                                </div>
                            </div>
                        </div><!-- Single Product Item End -->

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="user/images/product/1_6-300x300.webp" class="img-fluid"
                                        alt="Product Images" width="300" height="300">

                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html">Gray lamp</a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">£80.00</span>
                                </div>
                            </div>
                        </div><!-- Single Product Item End -->

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="user/images/product/1_7-300x300.webp" class="img-fluid"
                                        alt="Product Images" width="300" height="300">

                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html">Decoration wood</a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">£50.00</span>
                                </div>
                            </div>
                        </div><!-- Single Product Item End -->

                        <!-- Single Product Item Start -->
                        <div class="single-product-item text-center">
                            <div class="products-images">
                                <a href="product-details.html" class="product-thumbnail">
                                    <img src="user/images/product/1_8-300x300.webp" class="img-fluid"
                                        alt="Product Images" width="300" height="300">

                                </a>
                                <div class="product-actions">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#prodect-modal"><i
                                            class="p-icon icon-plus"></i><span class="tool-tip">Quick View</span></a>
                                    <a href="product-details.html"><i class="p-icon icon-bag2"></i> <span
                                            class="tool-tip">Add to cart</span></a>
                                    <a href="wishlist.html"><i class="p-icon icon-heart"></i> <span
                                            class="tool-tip">Browse Wishlist</span></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h6 class="prodect-title"><a href="product-details.html">Teapot with black tea</a></h6>
                                <div class="prodect-price">
                                    <span class="new-price">£20.00</span> - <span class="old-price"> £135.00</span>
                                </div>
                            </div>
                        </div>Single Product Item End
                    </div>
                </div>
            </div>


            <div class="offer-colection-area container-fluid">
                <div class="section-space--ptb_120 bg-img" data-bg="user/images/bg/h1-countdown.webp">
                    <div class="row">
                        <div class="container">
                            <div class="row ps-md-1 ps-3 pe-md-1 pe-3">
                                <div class="col-lg-7 col-md-7">
                                    <div class="colection-info-wrap">
                                        <div class="section-title mb-30">
                                            <h2 class="section-title--one ">Deco Collection <span class="text-red">50%
                                                    OFF</span></h2>
                                        </div>

                                        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced for
                                            those. Sections 1.10.32 and 1.10.33 from “de Finibus Bonorum et Malorum</p>

                                        <div class="timer text-center section-space--mt_60">
                                            <!-- countdown start -->
                                            <div class="countdown-deals counter-style--one" data-countdown="2024/12/12">
                                            </div>
                                            <!-- countdown end -->
                                        </div>

                                        <div class="button-box section-space--mt_60">
                                            <a href="shop-4-column.html" class="btn--md btn--black btn">Shop now <i
                                                    class="icon-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="our-blog-area section-space--ptb_90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb-20">
                                <h2 class="section-title--one section-title--center">Our Blog</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <!-- Single Blog Item Start -->
                            <div class="single-blog-item mt-30">
                                <div class="blog-thumbnail-box">
                                    <a href="#" class="thumbnail">
                                        <img src="user/images/blog/8-570x370.webp" class="img-fluid" alt="Blog Images"
                                            height="238" width="366">
                                    </a>
                                    <a href="#" class="btn-blog"> Read more </a>
                                </div>
                                <div class="blog-contents">
                                    <h6 class="blog-title"><a href="#">Interior design is the art, the interior designer
                                            is the artist.</a></h6>
                                    <div class="meta-tag-box">
                                        <div class="meta date"><span>October 15, 2022</span></div>
                                        <div class="meta author"><span><a href="#">Hastheme</a></span></div>
                                        <div class="meta cat"><span>in <a href="#">Chair</a></span></div>
                                    </div>
                                </div>
                            </div><!-- Single Blog Item End -->
                        </div>
                        <div class="col-lg-4 col-md-6  col-sm-6 col-12">
                            <!-- Single Blog Item Start -->
                            <div class="single-blog-item mt-30">
                                <div class="blog-thumbnail-box">
                                    <a href="#" class="thumbnail">
                                        <img src="user/images/blog/9-570x370.webp" class="img-fluid" alt="Blog Images"
                                            height="238" width="366">
                                    </a>
                                    <a href="#" class="btn-blog"> Read more </a>
                                </div>
                                <div class="blog-contents">
                                    <h6 class="blog-title"><a href="#">Decorate your home with the most modern
                                            furnishings.</a></h6>
                                    <div class="meta-tag-box">
                                        <div class="meta date"><span>October 02, 2022</span></div>
                                        <div class="meta author"><span><a href="#">Hastheme</a></span></div>
                                        <div class="meta cat"><span>in <a href="#">Chair</a></span></div>
                                    </div>
                                </div>
                            </div><!-- Single Blog Item End -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <!-- Single Blog Item Start -->
                            <div class="single-blog-item mt-30">
                                <div class="blog-thumbnail-box">
                                    <a href="#" class="thumbnail">
                                        <img src="user/images/blog/10-570x370.webp" class="img-fluid" alt="Blog Images"
                                            height="238" width="366">
                                    </a>
                                    <a href="#" class="btn-blog"> Read more </a>
                                </div>
                                <div class="blog-contents">
                                    <h6 class="blog-title"><a href="#">Spatialize with the decorations of the Helendo
                                            store.</a></h6>
                                    <div class="meta-tag-box">
                                        <div class="meta date"><span>October 18, 2022</span></div>
                                        <div class="meta author"><span><a href="#">Hastheme</a></span></div>
                                        <div class="meta cat"><span>in <a href="#">Chair</a></span></div>
                                    </div>
                                </div>
                            </div><!-- Single Blog Item End -->
                        </div>
                    </div>

                </div>
            </div>

            <div class="our-newsletter-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-4">
                            <div class="section-title small-mb__40 tablet-mb__40">
                                <h2 class="section-title--one">Our Newsletter</h2>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-8">
                            <div class="newsletter-wrap">
                                <form action="#" class="newsletter--one">
                                    <input class="input-box" name="rememberme" type="text"
                                        placeholder="Your email address">
                                    <button class="submit-btn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!--====================  footer area ====================-->
        <?php
        include ('footer.php');
        ?>
        <!--====================  End of footer area  ====================-->


    </div>

    <!-- Modal -->
    <div class="product-modal-box modal fade" id="prodect-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                            class="icon-cross" aria-hidden="true"></span></button>
                </div>
                <div class="modal-body container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="quickview-product-active mr-lg-5">
                                <a href="#" class="images">
                                    <img src="user/images/product/2-570x570.webp" class="img-fluid" alt="">
                                </a>
                                <a href="#" class="images">
                                    <img src="user/images/product/3-600x600.webp" class="img-fluid" alt="">
                                </a>
                                <a href="#" class="images">
                                    <img src="user/images/product/4-768x768.webp" class="img-fluid" alt="">
                                </a>
                            </div>
                            <!-- Thumbnail Large Image End -->
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content-wrap ">

                                <h5 class="font-weight--reguler mb-10">Teapot with black tea</h5>
                                <div class="quickview-ratting-review mb-10">
                                    <div class="quickview-ratting-wrap">
                                        <div class="quickview-ratting">
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                            <i class="yellow icon_star"></i>
                                        </div>
                                        <a href="#"> 2 customer review</a>
                                    </div>
                                </div>
                                <h3 class="price">£59.99</h3>

                                <div class="stock in-stock mt-10">
                                    <p>Available: <span>In stock</span></p>
                                </div>

                                <div class="quickview-peragraph mt-10">
                                    <p>At vero accusamus et iusto odio dignissimos blanditiis praesentiums dolores
                                        molest.</p>
                                </div>


                                <div class="quickview-action-wrap mt-30">
                                    <div class="quickview-cart-box">
                                        <div class="quickview-quality">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton"
                                                    value="0">
                                            </div>
                                        </div>

                                        <div class="quickview-button">
                                            <div class="quickview-cart button">
                                                <a href="product-details.html"
                                                    class="btn--lg btn--black font-weight--reguler text-white">Add to
                                                    cart</a>
                                            </div>
                                            <div class="quickview-wishlist button">
                                                <a title="Add to wishlist" href="#"><i class="icon-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="product_meta mt-30">
                                    <div class="sku_wrapper item_meta">
                                        <span class="label"> SKU: </span>
                                        <span class="sku"> 502 </span>
                                    </div>
                                    <div class="posted_in item_meta">
                                        <span class="label">Categories: </span><a href="#">Furniture</a>, <a
                                            href="#">Table</a>
                                    </div>
                                    <div class="tagged_as item_meta">
                                        <span class="label">Tag: </span><a href="#">Pottery</a>
                                    </div>
                                </div>

                                <div class="product_socials section-space--mt_60">
                                    <span class="label">Share this items :</span>
                                    <ul class="helendo-social-share socials-inline">
                                        <li>
                                            <a class="share-twitter helendo-twitter" href="#" target="_blank"><i
                                                    class="social_twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="share-facebook helendo-facebook" href="#" target="_blank"><i
                                                    class="social_facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="share-google-plus helendo-google-plus" href="#" target="_blank"><i
                                                    class="social_googleplus"></i></a>
                                        </li>
                                        <li>
                                            <a class="share-pinterest helendo-pinterest" href="#" target="_blank"><i
                                                    class="social_pinterest"></i></a>
                                        </li>
                                        <li>
                                            <a class="share-linkedin helendo-linkedin" href="#" target="_blank"><i
                                                    class="social_linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal -->




    <!--====================  mobile menu overlay ====================-->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-menu-overlay__inner">
            <div class="mobile-menu-close-box text-start">
                <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"> <i
                        class="icon-cross2"></i></span>
            </div>
            <div class="mobile-menu-overlay__body">
                <div class="offcanvas-menu-header d-md-block d-none">
                    <div class="helendo-language-currency row-flex row section-space--mb_60 ">
                        <div class="widget-language col-md-6">
                            <h6> Language</h6>
                            <ul>
                                <li class="actived"> <a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">Arabric</a></li>
                            </ul>
                        </div>
                        <div class="widget-currency col-md-6">
                            <h6> Currencies</h6>
                            <ul>
                                <li class="actived"><a href="#">USD - US Dollar</a></li>
                                <li><a href="#">Euro</a></li>
                                <li><a href="#">Pround</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <nav class="offcanvas-navigation">
                    <ul>
                        <li class="has-children">
                            <a href="#">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html"><span>Home V1 – Default</span></a></li>
                                <li><a href="index-7.html"><span>Home V2 – Boxed</span></a></li>
                                <li><a href="index-8.html"><span>Home V3 – Carousel</span></a></li>
                                <li><a href="index-11.html"><span>Home V4 – Categories</span></a></li>
                                <li><a href="index-10.html"><span>Home V5 – Collection</span></a></li>
                                <li><a href="index-5.html"><span>Home V6 – Full Width</span></a></li>
                                <li><a href="index-4.html"><span>Home V7 – Left Sidebar</span></a></li>
                                <li><a href="index-3.html"><span>Home V8 – Metro</span></a></li>
                                <li><a href="index-2.html"><span>Home V9 – Minimal</span></a></li>
                                <li><a href="index-6.html"><span>Home V10 – Parallax</span></a></li>
                                <li><a href="index-12.html"><span>Home V11 – Video Feature</span></a></li>
                                <li><a href="index-9.html"><span>Home V12 – 02 Feature</span></a></li>
                                <li><a href="index-13.html"><span>Home V13 – 03 Feature</span></a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">Shop</a>
                            <ul class="sub-menu">
                                <li class="has-children">
                                    <a href="#"><span>Shop Pages</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="shop-3-column.html"><span>Shop 3 Columns</span></a></li>
                                        <li><a href="shop-4-column.html"><span>Shop 4 Columns</span></a></li>
                                        <li><a href="shop-5-column.html"><span>Shop 5 Columns</span></a></li>
                                        <li><a href="shop-6-column.html"><span>Shop 6 Columns</span></a></li>
                                        <li><a href="shop-categories.html"><span>Shop Categories</span></a></li>
                                        <li><a href="shop-carousel.html"><span>Shop Carousel</span></a></li>
                                        <li><a href="shop-with-boder.html"><span>Shop With Border</span></a></li>
                                        <li><a href="shop-left-sidebar.html"><span>Shop Left Sidebar</span></a></li>
                                        <li><a href="shop-right-sidebar.html"><span>Shop Right Sidebar</span></a></li>
                                        <li><a href="shop-without-gutter.html"><span>Shop Without Gutter</span></a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#"><span>Product Pages</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="product-details.html"><span>Default</span></a></li>
                                        <li><a href="product-simple.html"><span>Simple</span></a></li>
                                        <li><a href="product-variable.html"><span>Variable</span></a></li>
                                        <li><a href="product-groupped.html"><span>Groupped</span></a></li>
                                        <li><a href="product-on-sale.html"><span>On Sale</span></a></li>
                                        <li><a href="product-out-of-stock.html"><span>Out Of Stock</span></a></li>
                                        <li><a href="product-affiliate.html"><span>Affiliate</span></a></li>
                                        <li><a href="product-image-swatches.html"><span>Image Swatches</span></a></li>
                                        <li><a href="product-countdown-timer.html"><span>With Countdown Timer</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#"><span>Other Pages</span></a>
                                    <ul class="sub-menu">
                                        <li><a href="cart.html"><span>Cart</span></a></li>
                                        <li><a href="checkout.html"><span>Checkout</span></a></li>
                                        <li><a href="my-account.html"><span>My Account</span></a></li>
                                        <li><a href="wishlist.html"><span>Wishlist</span></a></li>
                                        <li><a href="order-tracking.html"><span>Order Tracking</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about-us.html"><span>About Us</span></a></li>
                                <li><a href="contact-us.html"><span>Contact</span></a></li>
                                <li><a href="faq.html"><span>FAQ Pages</span></a></li>
                                <li><a href="coming-soon.html"><span>Coming Soon</span></a></li>
                                <li><a href="404-page.html"><span>404 Page</span></a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="javascript:void(0)">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog-grid.html"><span>Blog Grid</span></a></li>
                                <li><a href="blog-listing.html"><span>Blog List</span></a></li>
                                <li><a href="blog-masonry.html"><span>Blog Masonry</span></a></li>
                                <li><a href="blog-left-sidebar.html"><span>Blog Sidebar</span></a></li>
                                <li><a href="single-blog-post.html"><span>Single Post V1</span></a></li>
                                <li><a href="single-blog-post-2.html"><span>Single Post V2</span></a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>

                <div class="mobile-menu-contact-info section-space--mt_60">
                    <h6>Contact Us</h6>
                    <p>69 Halsey St, Ny 10002, New York, United States <br>support.center@unero.co <br>(0091) 8547
                        632521</p>
                </div>

                <div class="mobile-menu-social-share section-space--mt_60">
                    <h6>Follow US On Socials</h6>
                    <ul class="social-share">
                        <li><a href="#"><i class="social social_facebook"></i></a></li>
                        <li><a href="#"><i class="social social_twitter"></i></a></li>
                        <li><a href="#"><i class="social social_googleplus"></i></a></li>
                        <li><a href="#"><i class="social social_linkedin"></i></a></li>
                        <li><a href="#"><i class="social social_pinterest"></i></a></li>
                    </ul>
                </div>


            </div>


        </div>


    </div>
    <!--====================  End of mobile menu overlay  ====================-->



    <!--  offcanvas Minicart Start -->
    <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-menu-inner">
            <div class="close-btn-box">
                <a href="#" class="btn-close"><i class="icon-cross2"></i></a>
            </div>
            <div class="minicart-content">
                <ul class="minicart-list">
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i class="icon-cross2"></i></a>
                        <a class="product-item_img">
                            <img class="img-fluid" src="user/images/product/small/cart-01.webp" alt="Product Image">
                        </a>
                        <div class="product-item_content">
                            <a class="product-item_title" href="product-details.html">Plant pots</a>
                            <label>Qty : <span>1</span></label>
                            <label class="product-item_quantity">Price: <span> $20.00</span></label>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i class="icon-cross2"></i></a>
                        <a class="product-item_img">
                            <img class="img-fluid" src="user/images/product/small/cart-02.webp" alt="Product Image">
                        </a>
                        <div class="product-item_content">
                            <a class="product-item_title" href="product-details.html">Teapot with black tea</a>
                            <label>Qty : <span>1</span></label>
                            <label class="product-item_quantity">Price: <span> $20.00</span></label>
                        </div>
                    </li>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="javascript:void(0)"><i class="icon-cross2"></i></a>
                        <a class="product-item_img">
                            <img class="img-fluid" src="user/images/product/small/cart-03.webp" alt="Product Image">
                        </a>
                        <div class="product-item_content">
                            <a class="product-item_title" href="product-details.html">Simple Chair</a>
                            <label>Qty : <span>1</span></label>
                            <label class="product-item_quantity">Price: <span> $20.00</span></label>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="minicart-item_total">
                <span class="font-weight--reguler">Subtotal:</span>
                <span class="ammount font-weight--reguler">$60.00</span>
            </div>
            <div class="minicart-btn_area">
                <a href="cart.html" class="btn btn--full btn--border_1">View cart</a>
            </div>
            <div class="minicart-btn_area">
                <a href="checkout.html" class="btn btn--full btn--black">Checkout</a>
            </div>
        </div>

        <div class="global-overlay"></div>
    </div>
    <!--  offcanvas Minicart End -->


    <!--====================  search overlay ====================-->
    <div class="search-overlay" id="search-overlay">

        <div class="search-overlay__header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-8">
                        <div class="search-title">
                            <h4 class="font-weight--normal">Search</h4>
                        </div>
                    </div>
                    <div class="col-md-6 ms-auto col-4">
                        <!-- search content -->
                        <div class="search-content text-end">
                            <span class="mobile-navigation-close-icon" id="search-close-trigger"><i
                                    class="icon-cross"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-overlay__inner">
            <div class="search-overlay__body">
                <div class="search-overlay__form">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 m-auto">
                                <form action="#">
                                    <div class="product-cats section-space--mb_60 text-center">
                                        <label> <input type="radio" name="product_cat" value="" checked="checked"> <span
                                                class="line-hover">All</span> </label>
                                        <label> <input type="radio" name="product_cat" value="decoration"> <span
                                                class="line-hover">Decoration</span> </label>
                                        <label> <input type="radio" name="product_cat" value="furniture"> <span
                                                class="line-hover">Furniture</span> </label>
                                        <label> <input type="radio" name="product_cat" value="table"> <span
                                                class="line-hover">Table</span> </label> <label> <input type="radio"
                                                name="product_cat" value="chair"> <span class="line-hover">Chair</span>
                                        </label>
                                    </div>
                                    <div class="search-fields">
                                        <input type="text" placeholder="Search">
                                        <button class="submit-button"><i class="icon-magnifier"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--====================  End of search overlay  ====================-->


    <!--====================  scroll top ====================-->
    <a href="#" class="scroll-top" id="scroll-top">
        <i class="arrow-top icon-arrow-up"></i>
        <i class="arrow-bottom icon-arrow-up"></i>
    </a>
    <!--====================  End of scroll top  ====================-->



    <!-- JS
    ============================================ -->
    <!-- Modernizer JS -->
    <script src="user/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- jQuery JS -->
    <script src="user/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="user/js/vendor/jquery-migrate-3.3.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="user/js/vendor/bootstrap.min.js"></script>

    <!-- Plugins JS (Please remove the comment from below plugins.min.js for better website load performance and remove plugin js files from avobe) -->

    <script src="user/js/plugins/plugins.js"></script>


    <!-- Main JS -->
    <script src="user/js/main.js"></script>


</body>


<!-- Mirrored from htmldemo.net/helendo/helendo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 May 2024 14:14:04 GMT -->

</html>