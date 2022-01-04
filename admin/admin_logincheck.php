<?php

include_once '../connect.php';
if (!isset($_SESSION['username'])) {
    header('Location:admin_login.php');
}
$login = 1;

$username = $_POST['username'];
$userpassword = $_POST['password'];

$query = "SELECT * FROM admin
WHERE username = '$username' AND password = '$userpassword';";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row != 0) {
    session_start();
    $_SESSION['username'] = $username;
    header('Location:admin_menu.php');
} else {
    session_start();
    $login = 0;
    $_SESSION['logStatus'] = $login;
    header('Location:admin_login.php');
}
?>
