<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:instructor_login.php');
}

include_once 'connect.php';
$name = $_POST['name'];
$field = $_POST['field'];
$lang = $_POST['lang'];
$pic = $_POST['pic'];
$time = $_POST['time'];
$price = $_POST['price'];
$level = $_POST['level'];
$prereq = $_POST['prereq'];



$username = 0;
if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
}

$instruct = "SELECT id FROM instructor_info NATURAL JOIN instructor_login WHERE username = '$username';";
$result = mysqli_query($conn, $instruct);
$row = mysqli_fetch_array($result);
$instructid = $row['id'];

$institute = "SELECT institution_id FROM instructor_info NATURAL JOIN instructor_login NATURAL JOIN instructor_details WHERE username = '$username';";
$result = mysqli_query($conn, $institute);
$row = mysqli_fetch_array($result);
$instituteid = $row['institution_id'];



$insert = "INSERT INTO course(degree_id,institution_id,instructor_id) VALUES (NULL,'$instituteid','$instructid');";
$result1 = mysqli_query($conn , $insert);

  
   
$query = "SELECT id FROM course ORDER BY id DESC LIMIT 1;";
$result2 = mysqli_query($conn , $query);
$row = mysqli_fetch_array($result2);
$newid = $row['id'];

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
header('Location:instructor_course.php');?>

