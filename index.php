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
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style>
        /* Background image */
        body {
            background-image: url('https://imgs.search.brave.com/PICVWQ-QGS4GGU0UXyy2lmmAoiUC8aP4LFS3jXWc3Lc/rs:fit:860:0:0/g:ce/aHR0cHM6Ly93d3cu/ZnJlZWNvZGVjYW1w/Lm9yZy9uZXdzL2Nv/bnRlbnQvaW1hZ2Vz/L3NpemUvdzIwMDAv/MjAyMi8wOS9qb25h/dGFuLXBpZS0zbDNS/d1FkSFJIZy11bnNw/bGFzaC5qcGc');');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        #login-container form {
            text-align: center;
        }

        #login-container input[type="text"],
        #login-container input[type="password"] {
            width: 250px;
            height: 30px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 5px;
            box-sizing: border-box;
        }

        #login-container input[type="submit"] {
            width: 100px;
            height: 35px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #login-container p.error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div id="login-container">
    <h2>Blood Bank Management System</h2>
    <form action="" method="post">
        <input type="text" name="un" value="<?php echo $un; ?>" placeholder="Enter Username"><br>
        <input type="password" name="ps" value="<?php echo $ps; ?>" placeholder="Enter Password"><br>
        <input type="submit" name="sub" value="Login">
    </form>
    <?php
    if(isset($_POST['sub']) && !$res) {
        echo "<p class='error'>Wrong username or password</p>";
    }
    ?>
</div>

</body>
</html>
