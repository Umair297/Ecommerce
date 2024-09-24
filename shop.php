<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Helendo &#8211; Minimalis Furniture eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="user/images/favicon.ico">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="user/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="user/css/style.min.css">

    <style>
        .container {
            text-align: center;
            margin-top: 2rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            margin-bottom: 20px;
        }
        .navbar-brand{
            padding-left: 10px;
            font-size: 35px;
            font-weight: bold;
        }
        .para{
            padding-bottom: 15px;
            padding-top: 15px;
        }
    </style>
   
    <?php
    include("admin/functions.php");
    $objStudent = new Student();
    $objStudent->checkSession();
    $std = $objStudent->ProductdisplayData();
    ?>
 
</head>
<body>
    <header class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Helendo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn my-2 my-sm-0" style="background-color: green; color: white; border-radius: 5px; margin-right: 10px;" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Shop Page</h1>
        <p class="para">A Shop page showcases products or services offered by a business, facilitating online transactions. It typically features product images, descriptions, prices, and a shopping cart. Design and layout are crucial for intuitive navigation and a seamless purchasing experience, enhancing customer satisfaction and driving sales descriptions, prices, and a shopping cart.</p>

        <div class="row flex-row flex-wrap">
            <?php foreach ($std as $product): ?>
                <div class="col-md-3">
                    <div class="card">  
                        <a href="detailpage.php?id=<?php echo $product['id']; ?>">
                            <img src="<?php echo 'admin/'.$product["image"] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product["title"] ?></h5>
                                <p class="card-text"><?php echo $product["description"] ?></p>
                                <p class="card-text">$<?php echo $product["price"] ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php include ('footer.php'); ?>
</html>










