<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$name = $_POST['name'];
$type = $_POST['type'];
$field = $_POST['field'];


$newid = $_SESSION['id'];



$query1 = "UPDATE degree SET name = '$name', type = '$type', field = '$field' WHERE id = '$newid';";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }



    header('Location:admin_degree.php');



       ?>

