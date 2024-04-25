<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password_hash = md5($password);

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password_hash'";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time();
        header("location: index.php");
    } else {
        echo "<script>alert('Login failed. Invalid username or password.'); window.location='login.php';</script>";
    }
}
?>