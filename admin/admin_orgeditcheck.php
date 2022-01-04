<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$name = $_POST['orgname'];
$key = $_POST['orgkey'];


$newid = $_SESSION['id'];

$query1 = "UPDATE organization SET name = '$name' WHERE id = '$newid';";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }

  $query1 = "UPDATE organizations_login SET o_key = '$key' WHERE id = '$newid';";
  $result1 = mysqli_query($conn , $query1);
  if (!mysqli_query($conn,$query1)) {
      echo("Error description: " . mysqli_error($conn));
    }
  
    header('Location:admin_organization.php');

  

       ?>

