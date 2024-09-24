<?php 
    include ("functions.php");
    $objconn = new  Student();
    
    if (isset($_POST['submit'])) {
        echo '<script language="javascript">';
        echo 'if(confirm("Record Submit!")){ window.location = "http://localhost/helendo/admin/viewproduct.php"; }';  
        echo '</script>';
        $objconn-> Addproduct();
    
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Product Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"],
        .form-group textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .form-group textarea {
            resize: vertical;
            height: 100px;
        }

        .form-group input[type="file"] {
            padding: 5px;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #4cae4c;
        }
    </style>
    <?php
        include ('adminlayout.php');
        ?>


</head>

<body>
    <div class="form-container">
        <h2>Product Form</h2>
        <form method="POST" action="product.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" value="" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" value="" name="price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="category_id">Select Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example">

                
                <?php 
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $db = "helendo";

                        // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $db);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $fetch_cat = mysqli_query($conn, "SELECT * FROM categories");
                        if(mysqli_num_rows($fetch_cat) > 0){
                            while($row = mysqli_fetch_assoc($fetch_cat)){
                                echo '<option value="'.$row['id'].'">' . $row['name'] . '</option>';
                            }
                      
                        } else {
                            echo '<option value="">No categories available</option>';
                        }

                        mysqli_close($conn);
                    ?>
</select>

            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="fileToUpload" id="fileToUpload" id="image">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>

    
</body>
</html>
