<?php
include('connection.php');
session_start();

$un=$_SESSION['un'];
if(!$un)
{
    header("Location:index.php");
}
?>    
<!DOCTYPE html>
<html>
<head>
    <title>Admin Home</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>      
<div id="full">
<div id="inner_full">
<div id="header"> <h2><a href="admin-home.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
 <div id="body">
<br>
<h1>Donor Registration</h1><br><br>
 <center><div id="form">
    <table>
        <tr>
            <td width="200px" height="50px">Enter Name</td>
            <td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name"></td>
            <td width="200px" height="50px">Enter Father's Name</td>
            <td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father's Name"></td>
        </tr>
        <tr>
            <td width="200px" height="50px">Enter Address</td>
            <td width="200px" height="50px"><textarea name="address"></textarea></td>
            <td width="200px" height="50px">Enter City</td>
            <td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City"></td>
        </tr>   
        <tr>
            <td width="200px" height="50px">Enter Age</td>
            <td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age"></td>
            <td width="200px" height="50px">Select Blood Group</td>
            <td width="200px" height="50px">
                <select>
                    <option>O+</option>
                    <option>O-</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                </select>
            </td>    
        </tr> 
        <tr>
            <td width="200px" height="50px">Enter E-mail</td>
            <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail"></td>
            <td width="200px" height="50px">Enter Mobile Number</td>
            <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter MObile Number"></td>
        </tr>  
        <tr>
            <td><input type="submit" name="sub" value="Save"></td>
        </tr>    
    </table> <!-- Closing tag for the table -->
 </div></center>
</div>
<div id="footer">
    <h4 align="center">Copyright@myprojecthd</h4>
    <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
</div>

</div> </body>
</html>
