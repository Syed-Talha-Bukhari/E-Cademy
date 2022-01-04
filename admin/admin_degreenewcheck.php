<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

$name = $_POST['name'];
$type = $_POST['type'];
$field = $_POST['field'];


$signup = 1;

$query1 = "INSERT INTO degree (name,type,field) VALUES ('$name','$type','$field');";
$result1 = mysqli_query($conn , $query1);



if ( $result1 == 1 ) { 
    header('Location:admin_degree.php');
}
else{
    $signup = 0;
    $_SESSION['signStatus'] = $signup;
    header('Location:admin_degreenew.php');
}
       ?>

