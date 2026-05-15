<?php

include "../config/config.php";

$sql = "SELECT * FROM students";

$query = $connection->prepare($sql);

$query->execute();

$data = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Students Section</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f7fc;
            padding: 30px;
        }

        .container {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #1e3c72;
        }

        .btn {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: #fff;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            transition: 0.3s;
        }

        .add-btn {
            background: #2a5298;
        }

        .edit-btn {
            background: #28a745;
        }

        .delete-btn {
            background: #dc3545;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background: #1e3c72;
            color: #fff;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        .student-image {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        /* Modal */

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: #fff;
            width: 420px;
            padding: 25px;
            border-radius: 15px;
            position: relative;
        }

        .modal-content h2 {
            margin-bottom: 20px;
            color: #1e3c72;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 24px;
            text-decoration: none;
            color: #333;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .preview-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-top: 10px;
            border: 2px solid #ddd;
        }

        .save-btn {
            background: #2a5298;
            width: 100%;
        }

        .delete-confirm-btn {
            background: #dc3545;
            width: 100%;
        }

        /* Open Modal */

        #addModal:target,
        #editModal:target,
        #deleteModal:target {
            display: flex;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <h1>Students</h1>

            <a href="#addModal"
                class="btn add-btn">
                Add Student
            </a>

        </div>

        <table>

            <thead>

                <tr>
                    <th>Image</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>
                <?php
                foreach ($data as $record) {
                ?>
                    <tr>

                        <td>
                            <img src="<?php echo "../assets/images/" . $record["image"] ?>"
                                class="student-image">
                        </td>

                        <td><?php echo $record["id"] ?></td>

                        <td><?php echo $record["name"] ?></td>

                        <td><?php echo $record["email"] ?></td>

                        <td><?php echo $record["course"] ?></td>

                        <td>

                            <a href="#editModal"
                                class="btn edit-btn">
                                Edit
                            </a>

                            <a href="#deleteModal"
                                class="btn delete-btn">
                                Delete
                            </a>

                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>

    </div>

    <!-- Add Modal -->

    <div class="modal" id="addModal">

        <div class="modal-content">
            <form action="addStudent.php" method="post" enctype="multipart/form-data">

                <a href="#" class="close">&times;</a>

                <h2>Add Student</h2>

                <div class="input-group">
                    <label>Name</label>
                    <input type="text" name="name"
                        placeholder="Enter student name">
                </div>

                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email"
                        placeholder="Enter email">
                </div>

                <div class="input-group">
                    <label>Course</label>
                    <input type="text" name="course"
                        placeholder="Enter course">
                </div>

                <div class="input-group">
                    <label>Student Image</label>
                    <input type="file" name="img">
                </div>

                <input type="submit">
            </form>
        </div>

    </div>

    <!-- Edit Modal -->

    <div class="modal" id="editModal">

        <div class="modal-content">

            <a href="#" class="close">&times;</a>

            <h2>Edit Student</h2>

            <div class="input-group">
                <label>Name</label>
                <input type="text"
                    value="Rahul Sharma">
            </div>

            <div class="input-group">
                <label>Email</label>
                <input type="email"
                    value="rahul@gmail.com">
            </div>

            <div class="input-group">
                <label>Course</label>
                <input type="text"
                    value="BCA">
            </div>

            <div class="input-group">
                <label>Student Image</label>
                <input type="file">

                <img src="https://i.pravatar.cc/100?img=1"
                    class="preview-image">
            </div>

            <button class="btn save-btn">
                Update Student
            </button>

        </div>

    </div>

    <!-- Delete Modal -->

    <div class="modal" id="deleteModal">

        <div class="modal-content">

            <a href="#" class="close">&times;</a>

            <h2>Delete Student</h2>

            <p style="margin-bottom:20px;">
                Are you sure you want to delete this student?
            </p>

            <button class="btn delete-confirm-btn">
                Delete Student
            </button>

        </div>

    </div>

</body>

</html>