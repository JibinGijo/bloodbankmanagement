<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
<title>Admin Login</title>
<link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
<div id="inner_full">
<div id="header"> <h2>Blood Bank Management System</h2></div>
<div id="body">
<br>
<?php
$un=$_SESSION['un'];
if(!$un)
{
    header("Location:index.php");
}
?>    
<h1>Welcome Admin</h1>
</div>
<div id="footer">
    <h4 align="center">Copyright@myprojecthd</h4>
    <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
</div>

</div> </body>
</html>
