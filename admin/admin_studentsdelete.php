<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$delete = 1;
$code = $_POST['number'];


$query = "DELETE FROM student WHERE id = '$code';";
$result = mysqli_query($conn,$query);

if (!mysqli_query($conn,$query)) {
    $delete = 0;
    $_SESSION['delete'] = $delete;
  }



header('Location:admin_students.php');
?>