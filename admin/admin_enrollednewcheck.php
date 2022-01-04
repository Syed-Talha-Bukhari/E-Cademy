<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

$stdid = $_POST['std'];
$courseid = $_POST['course'];
$status = $_POST['status'];
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

$signup = 1;

$query1 = "INSERT INTO enrolled VALUES ('$courseid','$stdid','$status');";
$result1 = mysqli_query($conn , $query1);

if ( $result1 == 1 ) { 
    header('Location:admin_enrolled.php');
}
else{
    $signup = 0;
    $_SESSION['signStatus'] = $signup;
    header('Location:admin_enrollednew.php');
}
       ?>

