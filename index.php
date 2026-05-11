<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            display: flex;
            background: #f4f7fc;
            min-height: 100vh;
        }

        /* Sidebar */

        .sidebar {
            width: 260px;
            background: #1e3c72;
            color: #fff;
            padding: 25px 20px;
            position: fixed;
            height: 100vh;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 26px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin: 15px 0;
        }

        .menu a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 14px 16px;
            border-radius: 10px;
            transition: 0.3s;
            font-size: 16px;
        }

        .menu a:hover {
            background: rgba(255, 255, 255, 0.15);
            padding-left: 20px;
        }

        /* Main Content */

        .main-content {
            margin-left: 260px;
            width: 100%;
            padding: 30px;
        }

        /* Top Navbar */

        .topbar {
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        .topbar h1 {
            color: #1e3c72;
        }

        .profile {
            background: #2a5298;
            color: #fff;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 14px;
        }

        /* Cards */

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #555;
            margin-bottom: 15px;
        }

        .card p {
            font-size: 32px;
            font-weight: bold;
            color: #1e3c72;
        }

        /* Table */

        .table-section {
            margin-top: 35px;
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .table-section h2 {
            margin-bottom: 20px;
            color: #1e3c72;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background: #1e3c72;
            color: #fff;
        }

        table tr:hover {
            background: #f1f1f1;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->

    <div class="sidebar">
        <h2>Student CMS</h2>

        <ul class="menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Students</a></li>
            <li><a href="#">Teachers</a></li>
            <li><a href="#">Courses</a></li>
            <li><a href="#">Attendance</a></li>
            <li><a href="#">Results</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->

    <div class="main-content">

        <!-- Topbar -->

        <div class="topbar">
            <h1>Dashboard</h1>

            <div class="profile">
                Admin Panel
            </div>
        </div>

        <!-- Cards -->

        <div class="cards">

            <div class="card">
                <h3>Total Students</h3>
                <p>1,250</p>
            </div>

            <div class="card">
                <h3>Total Teachers</h3>
                <p>85</p>
            </div>

            <div class="card">
                <h3>Courses</h3>
                <p>32</p>
            </div>

            <div class="card">
                <h3>Pending Fees</h3>
                <p>₹45K</p>
            </div>

        </div>

        <!-- Student Table -->

        <div class="table-section">

            <h2>Recent Students</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>101</td>
                    <td>Rahul Sharma</td>
                    <td>BCA</td>
                    <td>Active</td>
                </tr>

                <tr>
                    <td>102</td>
                    <td>Priya Singh</td>
                    <td>MCA</td>
                    <td>Active</td>
                </tr>

                <tr>
                    <td>103</td>
                    <td>Amit Verma</td>
                    <td>B.Tech</td>
                    <td>Pending</td>
                </tr>

                <tr>
                    <td>104</td>
                    <td>Sneha Kapoor</td>
                    <td>BBA</td>
                    <td>Active</td>
                </tr>

            </table>

        </div>

    </div>

</body>

</html>