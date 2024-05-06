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
    <title>Blood Bank Management System</title>
    <link rel="stylesheet" type="text/css" href="css/s1.css">
    <style>
        /* Background image */
        body {
            background-image: url('your-image.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #login-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
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

        /* Login icon */
        .login-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            background-image: url('login-icon.png'); /* Replace with your icon */
            background-size: cover;
            cursor: pointer;
        }

        #mission-vision {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #mission-vision h2 {
            margin-top: 0;
        }

        #mission-vision p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="login-icon" onclick="toggleLoginPopup()"></div>

<div id="login-container">
    <h2>Login</h2>
    <form action="" method="post">
        <input type="text" name="un" placeholder="Enter Username"><br>
        <input type="password" name="ps" placeholder="Enter Password"><br>
        <input type="submit" name="sub" value="Login">
    </form>
    <?php
    if(isset($_POST['sub']) && !$res) {
        echo "<p class='error'>Wrong username or password</p>";
    }
    ?>
</div>

<div id="mission-vision">
    <h2>Mission</h2>
    <p>To save lives by bridging the gap between blood donors and recipients. Guided by our core values of compassion, accessibility, and efficiency, we are committed to promoting a culture of voluntary blood donation for the betterment of society.</p>
    <h2>Vision</h2>
    <p>Establishing a seamless platform for effective blood donation management. With the aim of connecting donors with recipients in need, our focus remains steadfast on ensuring a consistent and dependable supply of blood for critical medical interventions and emergencies.</p>
</div>

<script>
    function toggleLoginPopup() {
        var loginContainer = document.getElementById('login-container');
        if (loginContainer.style.display === 'none') {
            loginContainer.style.display = 'block';
        } else {
            loginContainer.style.display = 'none';
        }
    }
</script>

</body>
</html>
