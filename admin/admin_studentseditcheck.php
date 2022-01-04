<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
  header('Location:admin_login.php');
}

$newid = $_SESSION['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$dob = $_POST['date'];
$pass = $_POST['password1'];
$balance = $_POST['password2'];
$orgkey = $_POST['password3'];
$orgquery = "SELECT o_key FROM organizations_login
WHERE o_key = '$orgkey';";

$result = mysqli_query($conn, $orgquery);
if (!mysqli_query($conn,$orgquery)) {
  echo("Error description: " . mysqli_error($conn));
}
$row = mysqli_fetch_array($result);
$check = mysqli_num_rows($result);
$orgStatus = 1;
if ($orgkey != $row['o_key']){
    $orgkey = "NULL";
    $orgStatus = 0;
}



$insert = "UPDATE student SET name = '$name' WHERE id = '$newid';";
$result = mysqli_query($conn , $insert);

$insert = "UPDATE student_details SET organization_key = '$orgkey', Balance = '$balance', gender = '$gender', date_of_birth = '$dob' WHERE id = '$newid';";
$result = mysqli_query($conn , $insert);


$insert = "UPDATE student_info SET email = '$email' WHERE id = '$newid';";
$result = mysqli_query($conn , $insert);


$insert = "UPDATE student_login SET password = '$pass'  WHERE email = '$email';";
$result = mysqli_query($conn , $insert);


header('Location:admin_students.php');
?>