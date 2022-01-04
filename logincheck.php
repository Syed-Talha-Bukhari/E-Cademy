<?php
if (!isset($_SESSION['email'])) {
    header('Location:login.php');
}
include_once 'connect.php';


$login = 1;

$useremail = $_POST['email'];
$userpassword = $_POST['password'];

$query = "SELECT * FROM student_login
WHERE email = '$useremail' AND password = '$userpassword';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row != 0) {
    session_start();
    $_SESSION['email'] = $useremail;
    header('Location:Courses.php');
} else {
    session_start();
    $login = 0;
    $_SESSION['logStatus'] = $login;
    header('Location:login.php');
}
?>
