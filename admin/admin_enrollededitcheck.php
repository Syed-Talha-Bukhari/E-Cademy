<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

$newid = $_SESSION['id'];
$stdid = $_POST['std'];
$courseid = $_POST['course'];

$status1 = $_POST['exampleRadios'];

if ($status1 == 'option1'){
    $status = 'active';
}
else if ($status1 == 'option2'){
    $status = 'wishlist';
}
else if ($status1 == 'option3'){
    $status = 'archived';
}

echo $status;

$query1 = "UPDATE enrolled SET student_id = '$stdid', course_id = '$courseid', status = '$status' WHERE course_id = '$newid';";
$result1 = mysqli_query($conn , $query1);
if (!mysqli_query($conn,$query1)) {
    echo("Error description: " . mysqli_error($conn));
  }


    header('Location:admin_enrolled.php');
