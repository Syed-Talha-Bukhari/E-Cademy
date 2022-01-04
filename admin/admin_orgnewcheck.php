<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$name = $_POST['orgname'];
$org = $_POST['orgkey'];





$signup = 1;

$query1 = "INSERT INTO organization (name) VALUES ('$name');";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }

$query = "SELECT id FROM organization ORDER BY id DESC LIMIT 1;";
$result2 = mysqli_query($conn , $query);
$row = mysqli_fetch_array($result2);
$newid = $row['id'];
if (!mysqli_query($conn,$query)) {
    echo("Error description: " . mysqli_error($conn));
  }



$query1 = "INSERT INTO organizations_login VALUES ('$newid','$org');";
$result2 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }
if ( $result1 == 1 && $result2 == 1) { 
    header('Location:admin_organization.php');
}
else{
    $signup = 0;
    $_SESSION['signStatus'] = $signup;
    header('Location:admin_orgnew.php');
}
       ?>

