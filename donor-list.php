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
    <title>Donor List</title>
    <link rel="stylesheet" type="text/css" href="css/donor-list-style.css">
</head>
<body>
    <div id="full">
        <div id="inner_full">
            <div id="header">
                <h2><a href="admin-home.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2>
            </div>
            <div id="body">
                <br>
                <h1>Donor List</h1>
                <center>
                    <div id="form">
                        <table>
                            <tr>
                                <td><center><b><font color="blue">Name</font></center></td>
                                <td><center><b><font color="blue">Father's Name</font></center></td>
                                <td><center><b><font color="blue">Address</font></center></td>
                                <td><center><b><font color="blue">City</font></center></td>
                                <td><center><b><font color="blue">Age</font></center></td>
                                <td><center><b><font color="blue">Blood Group</font></center></td>
                                <td><center><b><font color="blue">E-Mail</font></center></td>
                                <td><center><b><font color="blue">Mobile Number</font></center></td>
                            </tr>
                            <?php
                            $q = $db->query("SELECT * FROM donor_registration");
                            while ($r1 = $q->fetch(PDO::FETCH_OBJ)) {
                            ?>
                                <tr>
                                    <td><center><?= $r1->name; ?></center></td>
                                    <td><center><?= $r1->fname; ?></center></td>
                                    <td><center><?= $r1->address; ?></center></td>
                                    <td><center><?= $r1->city; ?></center></td>
                                    <td><center><?= $r1->age; ?></center></td>
                                    <td><center><?= $r1->bgroup; ?></center></td>
                                    <td><center><?= $r1->email; ?></center></td>
                                    <td><center><?= $r1->mno; ?></center></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </center>
            </div> <!-- Close #body -->
            <div id="footer">
                <h4 align="center">Copyright@myprojecthd</h4>
                <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
            </div>
        </div> <!-- Close #inner_full -->
    </div> <!-- Close #full -->
</body>
</html>
