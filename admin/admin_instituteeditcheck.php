<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$name = $_POST['name'];
$logo = $_POST['logo'];
$ranking = $_POST['ranking'];
$site = $_POST['site'];

$username = $_POST['username'];
$password = $_POST['password'];


$newid = $_SESSION['id'];



$query1 = "UPDATE institution SET name = '$name' WHERE id = '$newid';";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }
  $query1 = "UPDATE institutions_details SET logo = '$logo', ranking = '$ranking' , site = '$site'  WHERE id = '$newid';";
  $result1 = mysqli_query($conn , $query1);
  if (!mysqli_query($conn,$query1)) {
      echo("Error description: " . mysqli_error($conn));
    }
    $query1 = "UPDATE institution_info SET username = '$username' WHERE id = '$newid';";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }
  $query1 = "UPDATE institution_login SET password = '$password' WHERE username = '$username';";
  $result1 = mysqli_query($conn , $query1);


    header('Location:admin_institutions.php');



       ?>

