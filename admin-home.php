<?php
include('connection.php');
session_start();

$un = $_SESSION['un'];
if (!$un) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="css/admin-style.css"> <!-- Link to external CSS file -->
</head>
<body>      
    <div id="container">
        <div id="header">
            <h1>Blood Bank Management System</h1>
        </div>
        <div id="content">
            <h2>Welcome Admin</h2>
            <ul>
                <li><a href="donor-reg.php">Donor Registration</a></li>
                <li><a href="donor-list.php">Donor List</a></li>
                <li><a href="stock-blood-list.php">Stock Blood List</a></li>
                <li><a href="out-stock-blood-list.php">Out Of Stock Blood List</a></li>
                <li><a href="exchange-blood-list.php">Exchange Blood Registration</a></li>
                <li><a href="exchanged-blood-list.php">Exchanged Blood List</a></li>
