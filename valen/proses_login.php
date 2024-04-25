<?php
session_start();
require 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    $password_hash = md5($password);

    $query_sql = "SELECT * FROM user 
            WHERE Username = '$Username' AND Password = '$Password'";

    $result = mysqli_query($conn, $query_sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['login_time'] = time();
        header("location: index.php");
    } else {
        echo "<script>alert('Login failed. Invalid username or password.'); window.location='login.php';</script>";
    }
}