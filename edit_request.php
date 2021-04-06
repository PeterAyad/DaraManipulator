<?php
$dbhost = 'localhost';
$dbname = 'table';
$dbusername = 'root';
$dbpassword = '';

// 2. Create db object mysqli

$mysqli   = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_errno())
    echo "Failed to connect to MySQL= " . mysqli_connect_error();

if (isset($_POST['get'])) {
    $id = $_POST['id'];
    $column = $_POST['column'];
    $result = $mysqli->query("SELECT $column FROM `employees` WHERE `id` = $id");
    $data = $result->fetch_assoc();
    echo $data[$column];
}

if (isset($_POST['set'])) {
    $column = $_POST['column'];
    $data = $_POST['data'];
    $id = $_POST['id'];
    $mysqli->query("UPDATE `employees` SET $column = '$data' WHERE `id` = $id");
    echo $data;
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $mysqli->query("DELETE FROM `employees` WHERE `id` = $id");
}

if (isset($_POST['add'])) {
    $Name = $_POST['Name'];
    $Position = $_POST['Position'];
    $Office = $_POST['Office'];
    $Age = $_POST['Age'];
    $Startdate = $_POST['Startdate'];
    $mysqli->query("INSERT INTO `employees` (`name`, `position`, `office`, `age`, `start_date`) VALUES ('$Name','$Position','$Office',$Age,'$Startdate')");
}
