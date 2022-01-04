<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

include_once 'connect.php';
$name = $_POST['name'];
$linkedin = $_POST['linkedin'];
$bio = $_POST['bio'];
$designation = $_POST['designation'];
$institute = $_POST['institute'];
$username = $_POST['username'];
$password = $_POST['password'];


$signup = 1;

$query1 = "INSERT INTO instructor (name) VALUES ('$name');";
$result1 = mysqli_query($conn , $query1);

$query2 = "SELECT id FROM instructor ORDER BY id DESC LIMIT 1;";
    $result = mysqli_query($conn , $query2);
    $row = mysqli_fetch_array($result);
    $newid = $row['id'];

$query1 = "INSERT INTO instructor_details  VALUES ('$newid','$linkedin','$bio','$designation','$institute');";
$result2 = mysqli_query($conn , $query1);

$query1 = "INSERT INTO instructor_info  VALUES ('$newid','$username');";
$result3 = mysqli_query($conn , $query1);

$query1 = "INSERT INTO instructor_login VALUES ('$username','$password');";
$result4 = mysqli_query($conn , $query1);


if ( $result1 == 1 && $result2 == 1 && $result3 == 1 && $result4 == 1) { 
    header('Location:admin_instructors.php');
}
else{
    $signup = 0;
    $_SESSION['signStatus'] = $signup;
    header('Location:admin_instructornew.php');
}?>

