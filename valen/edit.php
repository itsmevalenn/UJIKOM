<?php
require_once 'Gallery.php';

$gallery = new Gallery();

$error = '';

// Inisialisasi variabel $foto dan $image
$foto = null;
$image = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'edit') {
    // Ambil ID dari formulir
    $id = $_POST['id'];

    // Dapatkan informasi foto
    $image = $gallery->getFotoInfo($id);



    // Proses edit foto
    $editResult = $gallery->editFoto($id, $_FILES['foto'], $_POST['newCaption']); // Perbaikan $_FILES[''] menjadi $_FILES['foto']

    if ($editResult === true) {
        header("Location: index.php");
        exit();
    } else {
        $error = $editResult;
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['JudulFoto'])) {
    // Ambil ID dari URL
    $id = $_GET['JudulFoto'];

    // Dapatkan informasi foto
    $foto = $gallery->getFotoInfo($id);

    if (!$foto) {
        echo "Foto tidak ditemukan.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <!-- icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Edit Photo</title>
    <style>
        .content {
            width: 100%;

        }

        .content form {
            width: 40%;
        }
    </style>
</head>

<body>


    <nav>
        <div class="logo-name">
            <span class="logo_name">Valen</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                        <i class='bx bx-home-alt'></i>
                        <span class="link-name">Home</span>
                    </a></li>
                <li><a href="/adminm">
                        <i class='bx bx-search'></i>
                        <span class="link-name">Search</span>
                    </a></li>

                <li data-toggle="modal" data-target="#modalfade"><a href="#">
                        <i class='bx bx-plus-circle'></i>
                        <span class="link-name">Create</span>
                    </a></li>

                <div style="margin-top: 150px; " class="modal fade" id="modalfade" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true" width="90%">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->

                            <!-- Modal body -->
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <center>
                                    <h4>Create poto </h4>
                                </center>
                                <br>
                                <form action="index.php" method="post" enctype="multipart/form-data" class="form-modal">
                                    <div class="">
                                        <label for="foto"><strong>Choose foto:</strong></label>
                                        <br><br>
                                        <input type="file" name="foto" id="foto" accept="foto/*" required>
                                    </div>
                                    <div class="input-box">
                                        <label for="DeskripsiFoto"><strong>Caption:</strong></label>
                                        <input type="text" name="DeskripsiFoto" id="DeskripsiFoto" required>

                                    </div>
                                    <button class="btn btn-primary" type="submit">Upload foto</button>
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div> -->
                        </div>
                    </div>
                </div>


                <li><a href="profile.php">
                        <i class='bx bx-user'></i>
                        <span class="link-name">Profile</span>
                    </a></li>

            </ul>

            <ul class="logout-mode">

                <li><a href="#" onclick="sign_out()">
                        <i class='bx bx-log-out'></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                <li class="mode">


                    <div class="mode-toggle">
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content mt-4 flex-col">
        <h1>Edit Photo</h1>
        <?php if ($foto): ?>
            <img style="max-width: 600px;" src="<?php echo $foto['JudulFoto']; ?>" alt="<?php echo $foto['DeskripsiFoto']; ?>">
        <?php endif; ?>
        <form class="form-modal" action="edit.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" value="<?php echo ($foto ? $foto['z'] : ''); ?>">
            <br>
            <label for="foto"><strong>Choose foto:</strong></label>
            <input type="file" name="foto" id="newfoto" accept="foto/*">
            <br>
            <div class="input-box flex-row">
                <label for="newCaption"><strong>Edit Caption:</strong></label>
                <input type="text" name="newCaption" id="newCaption"
                    value="<?php echo ($image ? $image['DeskripsiFoto'] : ''); ?>" required>
            </div>

            <br>
            <div class="button flex-row">
                <button class="btn btn-danger p-2 m-3" type="submit">Edit Foto dan DeskripsiFoto</button>
                <a class="btn btn-secondary p-2 m-3" href="index.php">Cancel</a>
                <!-- Menggunakan anchor tag untuk kembali ke halaman index.php -->
            </div>
            <a></a>
        </form>
    </div>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>



</body>

</html>