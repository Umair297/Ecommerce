<?php
include("admin/functions.php");
session_start();
session_destroy();
header("Location: http://localhost/helendo/login.php");
exit();
?>
