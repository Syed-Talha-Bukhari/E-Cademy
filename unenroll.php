<?php
session_start();
include_once 'connect.php';
if (!isset($_SESSION['email'])) {
    header('Location:login.php');
}
$delete = 1;
$code = $_POST['number'];


$query = "DELETE FROM enrolled WHERE course_id = '$code';";
$result = mysqli_query($conn,$query);

if (!mysqli_query($conn,$query)) {
    $delete = 0;
    $_SESSION['delete'] = $delete;
  }



header('Location:enrolledcourse.php');
