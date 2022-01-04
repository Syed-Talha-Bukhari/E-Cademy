<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}
$delete = 1;
$code = $_POST['number'];


$query = "DELETE FROM organization WHERE id = '$code';";
$result = mysqli_query($conn,$query);
if (!mysqli_query($conn,$query)) {
    echo("Error description: " . mysqli_error($conn));
  }

if (!mysqli_query($conn,$query)) {
    $delete = 0;
    $_SESSION['delete'] = $delete;
  }



header('Location:admin_organization.php');
?>