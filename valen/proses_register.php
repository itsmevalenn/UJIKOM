<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];
    $Email = $_POST["Email"];
    $NamaLengkap = $_POST["NamaLengkap"];
    $Alamat = $_POST["Alamat"];

    // Hash password
    $password_hash = md5($password);

    $check_query = "SELECT * FROM user WHERE Username='$Username'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        echo '<script>alert("Username sudah digunakan!"); window.location.href = "register.php";</script>';
        exit;
    }

    $insert_query = "INSERT INTO user (Username, Password, Email, NamaLengkap, Alamat) 
VALUES ('$Username', '$Password', '$Email', '$NamaLengkap', '$Alamat')";
    if ($conn->query($insert_query)) {
        echo '<script>alert("Membuat akun berhasil!"); window.location.href = "login.php";</script>';
        exit;
    } else {
        echo "Registration failed. Please try again. Error: " . $conn->error;
    }
}