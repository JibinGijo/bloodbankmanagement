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
    <title>Donor Registration</title>
    <link rel="stylesheet" type="text/css" href="css/donor-registration-style.css">
</head>
<body>      
<div id="full">
<div id="inner_full">
<div id="header"> <h2><a href="admin-home.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
 <div id="body">
<br>
<h1>Donor Registration</h1>
 <center><div id="form">
    <form action="" method="post">

    
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
                <select name="bgroup">
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
            <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile Number"></td>
        </tr>  
        <tr>
            <td><input type="submit" name="sub" value="Save"></td>
        </tr>    
    </table><!-- Closing tag for the table -->
    </form>
    <?php
if(isset($_POST['sub']))
{
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    echo $address=$_POST['address'];
    $city=$_POST['city'];
    $age=$_POST['age'];
    echo $bgroup=$_POST['bgroup'];
    $email=$_POST['email'];
    $mno=$_POST['mno'];
    $q=$db->prepare("INSERT INTO donor_registration (name,fname,address,city,age,bgroup,email,mno) VALUES (:name,:fname,:address,:city,:age,:bgroup,:email,:mno)");
    $q->bindValue('name',$name);
    $q->bindValue('fname',$fname);
    $q->bindValue('address',$address);
    $q->bindValue('city',$city);
    $q->bindValue('age',$age);
    $q->bindValue('bgroup',$bgroup);
    $q->bindValue('email',$email);
    $q->bindValue('mno',$mno);
    if($q->execute())
    {
        echo"<script>alert('Donor Registration Successful')</script>";
    }
    else{
        echo"<script>alert('Donor Registration Failed')</script>";
    }
    
}


?>
</div></center>

</div>
<div id="footer">
    <h4 align="center">Copyright@myprojecthd</h4>
    <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
</div>

</div> </body>
</html>
