<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}
$username = $_POST['username'];
$gen = $_POST['exampleRadios'];
$pass = $_POST['password'];


if ($gen == 'option1'){
    $status = TRUE;}
else{
    $status = 0;
}

$signup = 1;


    $query3 = "INSERT INTO admin  VALUES ('$username','$pass','$status');";
    $result3 = mysqli_query($conn , $query3);
    if (!mysqli_query($conn,$query3)) {
        echo("Error description: " . mysqli_error($conn));
      }
    


if ($result3 == 1){
    $signup = 0;
    $_SESSION['signStatus'] = $signup;
    
    header('Location:admin_adminnew.php');
}
header('Location:admin_admin.php');
       ?>

