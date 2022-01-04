<?php
session_start();
include_once 'connect.php';
if (!isset($_SESSION['email'])) {
    header('Location:login.php');
}

$enroll = 1;
$code = $_POST['number'];
$email = $_SESSION['email'];

$query = "SELECT id FROM course WHERE id = '$code';";
$result = mysqli_query($conn,$query);
$check = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
if ($check == 0) {
    $enroll = 0;
    $_SESSION['enroll'] = $enroll;
     header('Location:Courses.php');
  }

$query = "SELECT id FROM student_login NATURAL JOIN student_info WHERE email = '$email';";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$stdid = $row['id'];

$query = "CALL enrolling_student('$stdid','$code');";
$result = mysqli_query($conn,$query);




header('Location:Courses.php');
