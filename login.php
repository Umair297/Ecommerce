<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
body {
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #f0f0f0;
}

.account-form-box {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    box-sizing: border-box;
}

.account-form-box h6 {
    margin-bottom: 20px;
    font-size: 18px;
    text-align: center;
}

.single-input {
    margin-bottom: 15px;
}

.single-input input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.checkbox-wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.checkbox-wrap label {
    display: flex;
    align-items: center;
}

.checkbox-wrap .input-checkbox {
    margin-right: 5px;
}

.checkbox-wrap a {
    color: #007bff;
    text-decoration: none;
}

.checkbox-wrap a:hover {
    text-decoration: underline;
}

.button-box {
    text-align: center;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn--full {
    width: 100%;
}

.btn--black {
    background-color: #000;
    color: #fff;
}

.btn--black:hover {
    background-color: #333;
}

.mt-10 {
    margin-top: 10px;
}

.mt-15 {
    margin-top: 15px;
}

.mt-25 {
    margin-top: 25px;
}

    </style>
</head>

<?php
   include_once   ("admin/functions.php");
  $objStudent = new Student();

  if (isset($_POST['submit'])) {
      $objStudent->login();
  }
     ?>
<body>
    <form action="#" class="account-form-box" method="POST">
        <h6>Login to your account</h6>
        <div class="single-input">
            <input type="text" name="email" placeholder="Email" required>
        </div>
        <div class="single-input">
            <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="checkbox-wrap mt-10">
            <label class="label-for-checkbox inline mt-15">
                <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> 
                <span>Remember me</span>
            </label>
            <a href="#" class="mt-10">Lost your password?</a>
        </div>
        <div class="button-box mt-25">
            <button type="submit" name="submit" class="btn btn--full btn--black">Log in</button>
        </div>
    </form>
</body>
</html>
