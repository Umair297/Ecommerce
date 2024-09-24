<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Helendo &#8211; Minimalis Furniture eCommerce HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico">
    <!-- CSS
            ============================================ -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }
        .myaccount-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .myaccount-table {
            margin-top: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table thead {
            background-color: #f2f2f2;
        }
        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .table th {
            background-color: #f9f9f9;
            font-weight: bold;
            color: #555;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn {
            text-decoration: none;
            padding: 10px 15px;
            background-color: #333;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<?php
    include('functions.php');

    // Assuming you have a proper database connection in a variable named $db
    $objStudent = new Student();
    
    $orders = $objStudent->getOrders();
?>
<div class="tab-pane fade" id="orders" role="tabpanel">
    <div class="myaccount-content">
        <h3 class="title">Orders</h3>
        <div class="myaccount-table table-responsive text-center">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th style="display:none;">Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($orders)) : ?>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                            <td style="display:none;"><?php echo htmlspecialchars($order['user_id']); ?></td>
                                <td><?php echo htmlspecialchars($order['name']); ?></td>
                                <td><?php echo htmlspecialchars($order['email']); ?></td>
                                <td>$<?php echo htmlspecialchars($order['price']); ?></td>
                                <td><a href="../viewdetail.php?user_id=<?php echo $order['user_id']; ?>"  class="btn btn-dark btn-hover-primary btn-sm rounded-0">View</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No orders found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
