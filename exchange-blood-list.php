<?php
include('connection.php');
session_start();

$un = $_SESSION['un'];
if (!$un) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Exchange Blood Registration</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
        #form1 {
            width: 80%;
            height: 320px;
            background-color: red;
            color: white;
            border-radius: 10px;
        }
    </style>

</head>

<body>      
<div id="full">
<div id="inner_full">
<div id="header"> <h2><a href="admin-home.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2></div>
 <div id="body">

<h3>Exchange Blood Donor Registration</h3>
 <center><div id="form1">
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
            <td width="200px" height="50px">Enter E-mail</td>
            <td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail"></td>
        </tr> 
        <td width="200px" height="50px">Enter Mobile Number</td>
            <td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile Number"></td>
        </tr>  
        <tr>
           
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
            <td width="200px" height="50px">Exchange Blood Group</td>
            <td width="200px" height="50px">
                <select name="exbgroup">
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
            <td><input type="submit" name="sub" value="Save"></td>
        </tr>    
    </table><!-- Closing tag for the table -->
    </form>
    <?php

if (isset($_POST['sub'])) {
    // Assuming $_POST values are properly sanitized or validated
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $mno = $_POST['mno'];
    $bgroup = $_POST['bgroup'];
    $exbgroup = $_POST['exbgroup'];

    // Prepared statement for selecting the donor
    $q = "SELECT * FROM donor_registration WHERE bgroup = :bgroup OR bgroup = :exbgroup LIMIT 1";
    $stmt = $db->prepare($q);
    $stmt->bindParam(':bgroup', $bgroup);
    $stmt->bindParam(':exbgroup', $exbgroup);
    $stmt->execute();

    $num_row = $stmt->fetch();

    if ($num_row) {
        $donor_id = $num_row['id'];
        $donor_name = $num_row['name'];
        $donor_bgroup = $num_row['bgroup'];
        $donor_mno = $num_row['mno'];

        // Prepared statement for inserting into out_stock_b
        $q1 = "INSERT INTO out_stock_b (bname, name, mno) VALUES (:b1, :name, :mno)";
        $stmt1 = $db->prepare($q1);
        $stmt1->bindParam(':b1', $donor_bgroup);
        $stmt1->bindParam(':name', $donor_name);
        $stmt1->bindParam(':mno', $donor_mno);
        $stmt1->execute();

        // Prepared statement for deleting from donor_registration
        $q2 = "DELETE FROM donor_registration WHERE id = :id";
        $stmt2 = $db->prepare($q2);
        $stmt2->bindParam(':id', $donor_id);
        $stmt2->execute();
    } else {
        echo "<script>alert('No donor found with the selected blood group')</script>";
    }

    // Prepared statement for inserting into exchange_b regardless of donor availability
    $q = "INSERT INTO exchange_b (name, fname, address, city, age, email, mno, bgroup, exbgroup) VALUES (:exchange_name, :fname, :address, :city, :age, :email, :mno, :bgroup, :exbgroup)";
    $stmt = $db->prepare($q);
    $stmt->bindParam(':exchange_name', $name);
    $stmt->bindParam(':fname', $fname);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mno', $mno);
    $stmt->bindParam(':bgroup', $bgroup);
    $stmt->bindParam(':exbgroup', $exbgroup);

    if ($stmt->execute()) {
        echo "<script>alert('Registration Successful')</script>";
    } else {
        echo "<script>alert('Exchange Registration Failed: " . implode(" ", $stmt->errorInfo()) . "')</script>";
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
