<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 4 Modal Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php include ('adminlayout.php'); ?>

<style>
  body {
    font-family: Arial, sans-serif;
  }

  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
    margin-left: 8rem;
  }

  th,
  td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  th {
    background-color: #f2f2f2;
  }

  img {
    width: 50px;
    height: 50px;
    object-fit: cover;
  }

  button {
    margin-right: 5px;
    padding: 5px 10px;
    border: none;
    cursor: pointer;
  }

  .edit {
    background-color: #4CAF50;
    color: white;
  }

  .delete {
    background-color: #f44336;
    color: white;
  }
</style>

<?php
include("functions.php");
$objStudent = new Student();

$obj = new Student();

if (isset($_POST['submit'])) {
    $objStudent->Add();
}
if (isset($_POST['updat'])) {
    $obj->UpdateData();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($objStudent->deleteData($id)) {
        echo '<script language="javascript">';
        echo 'if(confirm("Record deleted successfully!")){ window.location = "http://localhost/helendo/admin/category.php"; }';
        echo '</script>';
    } else {
        echo "Error deleting record";
    }
}
$std = $objStudent->displayData();

$data = $obj->editData();
?>

<body>
  <div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modelFormModal" style="margin-top:5rem;">
      Open Model
    </button>

    <div class="modal fade" id="modelFormModal" tabindex="-1" role="dialog" aria-labelledby="modelFormModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modelFormModalLabel">Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
  
            <form method="POST" action="category.php" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="id" value="<?php echo $id ?>">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" value="" placeholder="Enter username" name="name" required>
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
  <label for="image" class="form-label">Image</label>
    <input type="file" name="fileToUpload" id="fileToUpload" id="image" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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

    <table>
  <thead>
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Description</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($std as $categories): ?>
    <tr>
      <td><img style="width:70px; height:50px; border-radius: 15px;" src="<?php echo $categories["image"] ?>" alt=""></td>
      <td><?php echo $categories["name"] ?></td>
      <td><?php echo $categories["description"] ?></td>
      <td>
        <!-- Edit button with data attributes -->
        <a href="#" class="edit-btn" 
           data-id="<?php echo $categories["id"] ?>" 
           data-name="<?php echo $categories["name"] ?>" 
           data-description="<?php echo $categories["description"] ?>" 
           data-image="<?php echo $categories["image"] ?>" 
           data-toggle="modal" 
           data-target="#myModal">
          <i class="fa fa-edit" style="font-size:30px"></i>
        </a>
        <a href="category.php/?id=<?php echo $categories["id"] ?>"><i class="fa fa-trash" style="font-size:30px"></i></a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Category</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
 
        <form method="POST" action="category.php" class="needs-validation" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="id" value="">
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" value="" placeholder="Enter username" name="name" required>
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
  <label for="image" class="form-label">Image</label>
    <input type="file" name="fileToUpload" id="fileToUpload" id="image" required>
    <div class="valid-feedback">Valid.</div>
    <div class="invalid-feedback">Please fill out this field.</div>
  </div>
  <button type="submit" name="updat" class="btn btn-primary">Update</button>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    
  $(document).ready(function() {
    $('.edit-btn').on('click', function() {
      // Get the data from the clicked button
      var id = $(this).data('id');
      var name = $(this).data('name');
      var description = $(this).data('description');
      var image = $(this).data('image');

      // Populate the modal fields
      $('#myModal input[name="id"]').val(id);
      $('#myModal input[name="name"]').val(name);
      $('#myModal textarea[name="description"]').val(description);
      // You can also handle the image here if needed
      // Example: $('#modalImage').attr('src', image);
    });
  });
</script>


  </div>
</body>

</html>
