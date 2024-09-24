<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body{
   
            padding-top: 2rem;
        }
        .table-container {
            width: 70%;
            margin: 50px auto 0 auto; /* Add margin-top of 50px */
        }
        .table-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
        .action-btns {
            display: flex;
            gap: 10px;
        }
        .action-btns .btn {
            padding: 0.5rem;
        }
    </style>
</head>
<body>

<?php
include("functions.php");
$objStudent = new Student(); 

$obj = new Student(); 

if (isset($_POST['submit'])) {
    $obj->ProductUpdateData();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($objStudent->ProductdeleteData($id)) {
        echo '<script language="javascript">';
        echo 'if(confirm("Record deleted successfully!")){ window.location = "http://localhost/helendo/admin/viewproduct.php"; }';  
        echo '</script>';
    } else {
        echo "Error deleting record";
    }
}

$std = $objStudent->ProductdisplayData();

$data = $obj->ProducteditData();
if (!empty($data)) {
    $row = $data[0];
    $title = $row['title'];
    $description = $row['description'];
    $price = $row['price'];
    $image = $row['image'];
    $id = $row['id'];
} else {
    $title = '';
    $description = '';
    $price = '';
    $image = '';
    $id = '';
}
include('adminlayout.php');
?>

<div class="container mt-5">
    <div class="table-container">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($std as $product): ?>
                <tr>
                    <td><img style="width:70px; height:50px; border-radius: 15px;" src="<?php echo $product["image"] ?>" alt=""></td>
                    <td><?php echo $product["title"] ?></td>
                    <td><?php echo $product["description"] ?></td>
                    <td><?php echo $product["price"] ?></td>
                    <td><?php echo $product["category_id"] ?></td>
                    <td>
                
    <a href="#" class="editBtn" 
       data-id="<?php echo $product["id"]; ?>" 
       data-title="<?php echo $product["title"]; ?>" 
       data-description="<?php echo $product["description"]; ?>" 
       data-price="<?php echo $product["price"]; ?>" 
       data-image="<?php echo $product["image"]; ?>" 
       data-category="<?php echo $product["category_id"]; ?>" 
       data-toggle="modal" 
       data-target="#myModal">
       <i class="fa fa-edit" style="font-size:30px"></i>
    </a>

                        <a href="viewproduct.php/?id=<?php echo $product["id"] ?>"><i class="fa fa-trash" style="font-size:30px"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- <form action="viewproduct.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" type="text" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" value="">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Select Category</label>
                        <select class="form-control" name="category_id" aria-label="Default select example">
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
                            if (mysqli_num_rows($fetch_cat) > 0) {
                                while ($row = mysqli_fetch_assoc($fetch_cat)) {
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
                        <label for="image">Image:</label>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <img style="width:70px; height:70px; border-radius: 15px;" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form> -->
                <form method="POST" action="viewproduct.php" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="id" value="">
  <div class="mb-3 mt-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" value="" placeholder="Enter title" name="title" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
   <textarea name="description" type="text" class="form-control" id="description" rows="3" value="" placeholder="Enter description" required></textarea>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="text" class="form-control" id="price" value="" placeholder="Enter prive" name="price" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="mb-3">
    <label for="category_id" class="form-label">Category Select</label>
    <select class="form-control" name="category_id" aria-label="Default select example">
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
                            if (mysqli_num_rows($fetch_cat) > 0) {
                                while ($row = mysqli_fetch_assoc($fetch_cat)) {
                                    echo '<option value="'.$row['id'].'">' . $row['name'] . '</option>';
                                }
                            } else {
                                echo '<option value="">No categories available</option>';
                            }

                            mysqli_close($conn);
                            ?>
                            </select>
  </div>
  <div class="mb-3">
  <label for="image" class="form-label">Image</label>
    <input type="file" name="fileToUpload" id="fileToUpload" id="image" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Update</button>
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</form>


<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('.editBtn').on('click', function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var description = $(this).data('description');
            var price = $(this).data('price');
            var image = $(this).data('image');
            var category = $(this).data('category');

            $('#myModal #title').val(title);
            $('#myModal #description').val(description);
            $('#myModal #price').val(price);
            $('#myModal img').attr('src', image);
            $('#myModal input[name="id"]').val(id);
            $('#myModal select[name="category_id"]').val(category);
        });
    });
</script>

</body>
</html>
