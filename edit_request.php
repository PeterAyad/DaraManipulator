<?php
$dbhost = 'localhost';
$dbname = 'table';
$dbusername = 'root';
$dbpassword = '';

// 2. Create db object mysqli

$mysqli   = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_errno($mysqli))
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

if (isset($_POST['get'])) {
    $id = $_POST['id'];
    $result = $mysqli->query("SELECT `name` FROM `employees` WHERE `id` = $id");
    $data = $result->fetch_assoc();
    echo $data['name'];
}

if (isset($_POST['set'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $mysqli->query("UPDATE `employees` SET `name`= '$name' WHERE `id` = $id");
    echo $name;
}
