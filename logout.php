<?php
session_start();
$un = $_SESSION['un'];
session_destroy();
echo '<script>alert("You have been logged out.");</script>';
header('Location:index.php');
?>
