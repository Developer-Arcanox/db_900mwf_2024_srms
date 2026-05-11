<?php

include "./config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";

    $query = $connection->prepare($sql);

    $query->execute([
        ":username" => $username,
        ":password" => $hash_password,
        ":email" => $email
    ]);

    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Signup</title>

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

        .signup-container {
            width: 400px;
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .signup-container h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #1e3c72;
        }

        .signup-container p {
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
            font-weight: bold;
            color: #333;
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

        .signup-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #2a5298;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .signup-btn:hover {
            background: #1e3c72;
        }

        .footer-text {
            margin-top: 20px;
            text-align: center;
            color: #555;
            font-size: 14px;
        }

        .footer-text a {
            color: #2a5298;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="signup-container">
        <h1>Create Account</h1>
        <p>Signup for Student Management System</p>

        <form action="signup.php" method="post">

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username" required>
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required>
            </div>

            <button type="submit" class="signup-btn">
                Create Account
            </button>

        </form>

        <div class="footer-text">
            Already have an account?
            <a href="login.php">Login</a>
        </div>
    </div>

</body>

</html>