<?php
include('connection.php');
session_start();

$un = $_SESSION['un'];
if(!$un) {
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
            <div id="header">
                <h1>Blood Bank Management System</h1>
            </div>
            <div id="body">
                <h2>Donor Registration</h2>
                <div id="form">
                    <table>
                        <tr>
                            <td><b><font color="blue">Name</font></b></td>
                            <td><b><font color="blue">Father's Name</font></b></td>
                            <td><b><font color="blue">Address</font></b></td>
                            <td><b><font color="blue">City</font></b></td>
                            <td><b><font color="blue">Age</font></b></td>
                            <td><b><font color="blue">Blood Group</font></b></td>
                            <td><b><font color="blue">E-Mail</font></b></td>
                            <td><b><font color="blue">Mobile Number</font></b></td>
                        </tr>
                        <?php
                        $q = $db->query("SELECT * FROM donor_registration");
                        while($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                        ?>
                        <tr>
                            <td><?=$r1->name;?></td>
                            <td><?=$r1->fname;?></td>
                            <td><?=$r1->address;?></td>
                            <td><?=$r1->city;?></td>
                            <td><?=$r1->age;?></td>
                            <td><?=$r1->bgroup;?></td>
                            <td><?=$r1->email;?></td>
                            <td><?=$r1->mno;?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div id="footer">
                <p><a href="logout.php"><font color="white">Logout</font></a></p>
            </div>
        </div>
    </div>
</body>
</html>
