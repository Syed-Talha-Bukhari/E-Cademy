<?php
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}
$delete = 1;
$code = $_POST['number'];
$query = "SELECT * FROM admin WHERE username = '$code';";
$result = mysqli_query($conn, $query);
$check = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($code != $_SESSION['username']){
$query = "DELETE FROM admin WHERE username = '$code';";
$result = mysqli_query($conn,$query);

if (!mysqli_query($conn,$query)) {
    $delete = 0;
    $_SESSION['delete'] = $delete;
  }
  header('Location:admin_admin.php');
}

else{
  header('Location:admin_admin.php');
}
