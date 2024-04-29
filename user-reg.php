<?php
include('connection.php');

$un = isset($_POST['un']) ? $_POST['un'] : '';
$ps = isset($_POST['ps']) ? $_POST['ps'] : '';

if(isset($_POST['sub'])) {
    // Check if the username is already taken
    $check_user = $db->prepare("SELECT * FROM user WHERE uname=:un");
    $check_user->execute(array(':un' => $un));
    $existing_user = $check_user->fetch(PDO::FETCH_ASSOC);

    if($existing_user) {
        echo "<script>alert('Username already exists')</script>";
    } else {
        // Insert the new user into the database
        $q = $db->prepare("INSERT INTO user (uname, pass) VALUES (:un, :ps)");
        $q->execute(array(':un' => $un, ':ps' => $ps));
        echo "<script>alert('User created successfully')</script>";
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
<div id="inner_full">
<div id="header"> <h2>Blood Bank Management System</h2></div>
<div id="body">
<br><br><br><br><br>
<form action="" method="post">
<table align="center">
<tr>
<td width="200px" height="70px"><b>Enter Username</b></td>
<td width="100px" height="70px"><input type="text" name="un" placeholder="Enter Username" style=" width: 180px;height: 30px;border-radius: 10px;"></td>
</tr>
<tr>
<td width="200px" height="70px"><b>Enter Password</b></td>
<td width="200px" height="70px"><input type="password" name="ps" placeholder="Enter Password" style=" width: 180px;height: 30px;border-radius: 10px;"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="sub" value="Register" style="width: 70px; height: 30px;border-radius: 5px;"></td>
</tr> </table>
</form>
</div>
<div id="footer"><h4 align="center">Copyright@myprojecthd</h4></div> </div>
</div> </body>
</html>
  