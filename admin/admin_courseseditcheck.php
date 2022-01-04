<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$newid = $_SESSION['id'];
$name = $_POST['name'];
$field = $_POST['field'];
$lang = $_POST['lang'];
$pic = $_POST['pic'];
$time = $_POST['time'];
$price = $_POST['price'];
$level = $_POST['level'];
$prereq = $_POST['prereq'];
$degree = $_POST['degree'];
$instructor = $_POST['instructor'];
$institute= $_POST['institution'];

$insert = "UPDATE course SET degree_id = '$degree', institution_id = '$institute', instructor_id = '$instructor' WHERE id = '$newid';";
$result = mysqli_query($conn , $insert);
if (!mysqli_query($conn,$insert)) {
    echo("Error description: " . mysqli_error($conn));
  }

$insert = "UPDATE course_details SET est_time = '$time', price = '$price', level = '$level', pre_reqs = '$prereq' WHERE id = '$newid';";
$result = mysqli_query($conn , $insert);
if (!mysqli_query($conn,$insert)) {
    echo("Error description: " . mysqli_error($conn));
  }
$insert = "UPDATE course_info SET name = '$name', field = '$field', lang = '$lang', pic = '$pic' WHERE id = '$newid';";
$result = mysqli_query($conn , $insert);
if (!mysqli_query($conn,$insert)) {
    echo("Error description: " . mysqli_error($conn));
  }
header('Location:admin_courses.php');
?>