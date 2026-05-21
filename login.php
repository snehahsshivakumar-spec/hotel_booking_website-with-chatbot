<?php
session_start();
require('inc/db_config.php');

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $q = "SELECT * FROM user_cred WHERE email='$email' AND password='$pass'";

    $result = mysqli_query($con,$q);

    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['user_logged_in'] = true;

        header("Location:index.php");
    }
    else
    {
        echo "<script>alert('Invalid Login Details');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <style>

        body{
            font-family: Arial;
            background:#f2f2f2;
        }

        .login-box{
            width:350px;
            background:white;
            padding:30px;
            margin:100px auto;
            border-radius:10px;
            box-shadow:0px 0px 10px rgba(0,0,0,0.2);
        }

        input{
            width:100%;
            padding:10px;
            margin-top:10px;
            margin-bottom:20px;
        }

        button{
            width:100%;
            padding:10px;
            background:green;
            color:white;
            border:none;
            cursor:pointer;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2>User Login</h2>

    <form method="POST">

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="pass" placeholder="Enter Password" required>

        <button type="submit" name="login">Login</button>

    </form>

</div>

</body>
</html>