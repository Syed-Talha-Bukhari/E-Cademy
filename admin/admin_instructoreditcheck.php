<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$name = $_POST['name'];
$linkedin = $_POST['linkedin'];
$bio = $_POST['bio'];
$designation = $_POST['designation'];
$institute = $_POST['institute'];
$username = $_POST['username'];
$password = $_POST['password'];



$newid = $_SESSION['id'];



$query1 = "UPDATE instructor SET name = '$name' WHERE id = '$newid';";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }
  $query1 = "UPDATE instructor_details SET linkedin = '$linkedin', bio = '$bio' , designation = '$designation' , institution_id = '$institute' WHERE id = '$newid';";
  $result1 = mysqli_query($conn , $query1);
  if (!mysqli_query($conn,$query1)) {
      echo("Error description: " . mysqli_error($conn));
    }
    $query1 = "UPDATE instructor_info SET username = '$username' WHERE id = '$newid';";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }
  $query1 = "UPDATE instructor_login SET password = '$password' WHERE username = '$username';";
  $result1 = mysqli_query($conn , $query1);


    header('Location:admin_instructors.php');



       ?>

