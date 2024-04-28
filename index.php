<?php
include('connection.php');
session_start();

// Initialize variables for username and password
$un = isset($_POST['un']) ? $_POST['un'] : ''; // Set the username to the submitted value if available
$ps = '';

// Check if the form is submitted
if(isset($_POST['sub'])) 
{
    $ps = $_POST['ps'];
    // Assuming $db is your PDO database connection object
    $q = $db->prepare("SELECT * FROM admin where uname='$un' && pass='$ps'");
    $q->execute();
    
    // Fetch the result
    $res = $q->fetchAll(PDO::FETCH_OBJ); // Use fetch() instead of fetchAll()

    if($res)
    {
        $_SESSION['un']=$un;
        header("Location:admin-home.php");
    }
    else
    {
        echo "<script>alert('Wrong User')</script>";
    }
    
    // Unset form data to clear the fields
    $un = ''; // Clear the username
    $ps = ''; // Clear the password
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
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
<td width="100px" height="70px"><input type="text" name="un" value="<?php echo $un; ?>" placeholder="Enter Username" style=" width: 180px;height: 30px;border-radius: 10px;"></td>
</tr>
<tr>
<td width="200px" height="70px"><b>Enter Password</b></td>
<td width="200px" height="70px"><input type="password" name="ps" value="<?php echo $ps; ?>" placeholder="Enter Password" style=" width: 180px;height: 30px;border-radius: 10px;"></td>
</tr>
<tr>
<td><input type="submit" name="sub" value="Login" style="width: 70px; height: 30px;border-radius: 5px;"></td>
</tr> </table>
</form>
</div>
<div id="footer"><h4 align="center">Copyright@myprojecthd</h4></div> </div>
</div> </body>
</html>
