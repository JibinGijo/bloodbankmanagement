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
    <title>Donor Registration</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style type="text/css">
        td {
            width: 200px;
            height: 40px;
        }

        .column {
    float: left;
    width: 45%;
    margin: 0 auto; /* Center the columns horizontally */
    margin-bottom: 20px; /* Add some space at the bottom */
}

table {
    background-color: white; /* Set background color to white */
    border: 2px solid red; /* Add red border */
    border-radius: 10px; /* Add rounded edges */
    padding: 10px; /* Add padding for better spacing */
}

td {
    width: 200px;
    height: 40px;
    text-align: center; /* Center align text within cells */
}






    </style>
</head>

<body>
    <div id="full">
        <div id="inner_full">
            <div id="header">
                <h2><a href="admin-home.php" style="text-decoration: none;color: white;">Blood Bank Management System</a></h2>
            </div>
            <div id="body">
                <br>
                <h1>Stock Blood List</h1>
                <div class="column">
                    <table>
                        <tr>
                            <td colspan="2">
                            
                            </td>
                        </tr>
                        
                        <tr>
                            <td><center><b><font color="blue">Blood Group</font></b></center></td>
                            <td><center><b><font color="blue">Qty</font></b></center></td>
                        </tr>
                        <tr>
                            <td><center>O+</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='O+'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                        <tr>
                            <td><center>O-</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='O-'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                        <tr>
                            <td><center>A+</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='A+'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                        <tr>
                            <td><center>A-</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='A-'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                    </table>
                </div>
                <div class="column">
                    <table>
                        <tr>
                            <td colspan="2">
                                
                            </td>
                        </tr>
                        <tr>
                            <td><center><b><font color="blue">Blood Group</font></b></center></td>
                            <td><center><b><font color="blue">Qty</font></b></center></td>
                        </tr>
                        <tr>
                            <td><center>B+</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='B+'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                        <tr>
                            <td><center>B-</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='B-'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                        <tr>
                            <td><center>AB+</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='AB+'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                        <tr>
                            <td><center>AB-</center></td>
                            <td><center>
                                    <?php
                                    $q = $db->query("SELECT * FROM donor_registration WHERE bgroup='AB-'");
                                    echo $row = $q->rowcount();
                                    ?>
                                </center></td>
                        </tr>
                    </table>
                </div>
                <div style="clear:both;"></div>
            </div> <!-- Close #body -->
            <div id="footer">
                <h4 align="center">Copyright@myprojecthd</h4>
                <p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
            </div>
        </div> <!-- Close #inner_full -->
    </div> <!-- Close #full -->
</body>

</html>
