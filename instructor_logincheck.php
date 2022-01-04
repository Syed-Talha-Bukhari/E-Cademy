<?php
if (!isset($_SESSION['username'])) {
    header('Location:instructor_login.php');
}
include_once 'connect.php';

$login = 1;

$username = $_POST['username'];
$userpassword = $_POST['password'];

$query = "SELECT * FROM instructor_login
WHERE username  = '$username' AND password = '$userpassword';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row != 0) {
    session_start();
    $_SESSION['username'] = $username;
    header('Location:instructor_course.php');
} else {
    session_start();
    $login = 0;
    $_SESSION['logStatus'] = $login;
    header('Location:instructor_login.php');
}
?>
