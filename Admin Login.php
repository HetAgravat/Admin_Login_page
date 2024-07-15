<?php
    require("test.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="mycss.css">
</head>
<body>
    <div class="login-container">
        <h2>Admin Login </h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="admin_name" placeholder="Username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="admin_pass" placeholder="Password" required>
            
            <button type="submit" name="sign_in">Login</button>
        </form>
    </div>
    <?php
    if(isset($_POST['sign_in']))
    {
        $query = "SELECT * FROM `admin_login` WHERE `admin_name` = '$_POST[admin_name]' AND `admin_pass` = '$_POST[admin_pass]' ";
        $result=mysqli_query($conn,$query);
    
        if(mysqli_num_rows($result)==1)
        {
            session_start();
            $_SESSION['AdminLoginId']=$_POST['admin_name'];
            header("location: Admin Panel.php");
        }
        else
        {
            echo"<script>alert('incorrect password');</script>";
        }
    }
    
    ?>
    
</body>
</html>
