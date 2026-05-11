<?php

include "./config/config.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = :email";

    $query = $connection->prepare($sql);

    $query->execute([
        ":email" => $email
    ]);

    $data = $query->fetchAll();

    if (count($data) == 0) {
        $message = "User doesn't exist";
    } else {

        if (password_verify($password, $data[0]["password"])) {
            session_start();

            $_SESSION["username"] = $data[0]["username"];

            header("Location: index.php");
            exit();
        } else {
            $message = "Incorrect password";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Login</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .login-container {
            width: 380px;
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #1e3c72;
        }

        .login-container p {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #2a5298;
            outline: none;
            box-shadow: 0 0 5px rgba(42, 82, 152, 0.5);
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .options a {
            text-decoration: none;
            color: #2a5298;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background: #2a5298;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: #1e3c72;
        }

        .footer-text {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #555;
        }

        .footer-text a {
            color: #2a5298;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h1>Student CMS</h1>
        <p>Login to Student Management System</p>
        <p>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>

        <form action="login.php" method="post">
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="options">
                <label>
                    <input type="checkbox"> Remember Me
                </label>

                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="footer-text">
            Don't have an account?
            <a href="signup.php">Register</a>
        </div>
    </div>

</body>

</html>