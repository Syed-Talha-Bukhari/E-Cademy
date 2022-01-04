<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

include_once '../connect.php';
$name = $_POST['name'];
$logo = $_POST['logo'];
$ranking = $_POST['ranking'];
$site = $_POST['site'];

$username = $_POST['username'];
$password = $_POST['password'];


$signup = 1;

$query1 = "INSERT INTO institution (name) VALUES ('$name');";
$result1 = mysqli_query($conn , $query1);

$query2 = "SELECT id FROM institution ORDER BY id DESC LIMIT 1;";
    $result = mysqli_query($conn , $query2);
    $row = mysqli_fetch_array($result);
    $newid = $row['id'];

$query1 = "INSERT INTO institutions_details  VALUES ('$newid','$logo','$ranking','$site');";
$result2 = mysqli_query($conn , $query1);

$query1 = "INSERT INTO institution_info  VALUES ('$newid','$username');";
$result3 = mysqli_query($conn , $query1);

$query1 = "INSERT INTO institution_login VALUES ('$username','$password');";
$result4 = mysqli_query($conn , $query1);


if ( $result1 == 1 && $result2 == 1 && $result3 == 1 && $result4 == 1) { 
    header('Location:admin_institutions.php');
}
else{
    $signup = 0;
    $_SESSION['signStatus'] = $signup;
    header('Location:admin_institutionnew.php');
}
