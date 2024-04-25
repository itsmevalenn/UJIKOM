<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleb.css" media="screen" title="no title">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>register page</title>
</head>

<body>
    <div class="input">
        <h1>Register</h1>
        <form action="proses_register.php" method="POST">
            <div class="box-input">
                <i class="fas fa-address-book"></i>
                <input type="text" name="Username" placeholder="Username">
            </div>
            <div class="box-input">
                <i class="fas fa-lock"></i>
                <input type="password" name="Password" placeholder="Password">
            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="email" name="Email" placeholder="Email">
            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="NamaLengkap" placeholder="NamaLengkap">
            </div>
            <div class="box-input">
                <i class="fas fa-envelope-open-text"></i>
                <input type="text" name="Alamat" placeholder="Alamat">
            </div>
            <a href="home.php">
                <button type="submit" name="register" class="btn-input">Register</button>
            </a>
            <div class="bottom">
                <p>Sudah punya akun?
                    <a href="login.php">login disini</a>
                </p>
            </div>
        </form>
    </div>

</body>

</html>