<?php
session_start();
include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}

$email = $_POST['email'];
$gen = $_POST['exampleRadios'];
$DOB = $_POST['date'];
$pass = $_POST['password1'];
$balance = $_POST['password2'];
$orgkey = $_POST['password3'];
$name = $_POST['name'];
if ($gen == 'option1'){
    $gender = 'M';}
else{
    $gender = 'F';
}

$signup = 1;

$orgquery = "SELECT o_key FROM organizations_login
WHERE o_key = '$orgkey';";
$result = mysqli_query($conn, $orgquery);
$row = mysqli_fetch_array($result);
$orgStatus = 1;
if ($row == 0){
    $orgkey = "NULL";
    $orgStatus = 0;
}
$_SESSION['orgstatus'] = $orgStatus;
$query = "SELECT * FROM student_info
WHERE email = '$email' ;";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row == 0  ) { 
    $query1 = "INSERT INTO student (name) VALUES ('$name');";
    $result1 = mysqli_query($conn , $query1);
   
    $query2 = "SELECT id FROM student ORDER BY id DESC LIMIT 1;";
    $result2 = mysqli_query($conn , $query2);
    $row = mysqli_fetch_array($result2);
    $newid = $row['id'];
    
    
    $query4 =  "INSERT INTO student_details VALUES ('$newid',$orgkey,'$balance','$gender','$DOB');";
    $query5 =  "INSERT INTO student_info VALUES ('$newid' , '$email');";
    $result5 = mysqli_query($conn , $query5);

    $result4 = mysqli_query($conn , $query4);

    $query3 = "INSERT INTO student_login (email,password) VALUES ('$email','$pass');";
    $result3 = mysqli_query($conn , $query3);
    header('Location:admin_students.php');

}
else{
    $signup = 0;
    $_SESSION['signStatus'] = $signup;
    header('Location:admin_studentsnew.php');
}
       ?>

