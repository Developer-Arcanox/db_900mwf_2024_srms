<?php

include "../config/config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$course = $_POST["course"];

$imgName = $_FILES["img"]["name"];
$imgTmpName = $_FILES["img"]["tmp_name"];
$imgDir = "../assets/images/" . $imgName;

if (move_uploaded_file($imgTmpName, $imgDir)) {
    $sql = "INSERT INTO students (name, email, course, image) VALUES (:name, :email, :course, :image)";

    $query = $connection->prepare($sql);

    $query->execute([
        ":name" => $name,
        ":email" => $email,
        ":course" => $course,
        ":image" => $imgName
    ]);
}

header("Location: index.php");
exit();
