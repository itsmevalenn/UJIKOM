<?php
// index.php
require_once 'gallery.php';
$gallery = new gallery();
// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['Foto'])) {
    $uploadResult = $gallery->uploadFoto($_FILES['Foto'], $_POST['DeskripsiFoto']);
    if ($uploadResult === true) {
        header("Location: index.php");
        exit();
    } else {
        $error = $uploadResult;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['FotoID'])) {
    $deleteResult = $gallery->deleteFoto($_GET['FotoID']);
    if ($deleteResult === true) {
        header("Location: index.php");
        exit();
    } else {
        $error = $deleteResult;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $FotoID = $_POST['FotoID'];

    if ($action === 'delete') {
        // Handle delete action (existing code)
    } elseif ($action === 'edit') {
        // Redirect to edit.php with the Foto ID
        header("Location: edit.php?id=$FotoID");
        exit();
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $FotoID = $_POST['FotoID'];

    if ($action === 'delete') {
        // Handle delete action (existing code)
    } elseif ($action === 'edit') {
        // Redirect to edit.php with the Foto ID
        header("Location: edit.php?id=$FotoID");
        exit();
    } elseif ($action === 'hapus_DeskripsiFoto') {
        $hapusDeskripsiFotoResult = $gallery->hapusDeskripsiFoto($FotoID);
        if ($hapusDeskripsiFotoResult === true) {
            header("Location: index.php");
            exit();
        } else {
            $error = $hapusDeskripsiFotoResult;
        }
    }
}
$Foto = $gallery->getFoto();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web gallery</title>
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
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body class="container mt-3">

    <!-- sidebar -->
    <nav>
        <div class="logo-name ml-3 p-2">
            <img width="104" src="./img/logovalen.jpeg" alt="" srcset="">
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                        <i class='bx bx-home-alt'></i>
                        <span class="link-name">Home</span>
                    </a></li>
                <li><a href="index.php">
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
                                        <label for="Foto"><strong>Choose Foto:</strong></label>
                                        <br><br>
                                        <input type="file" name="Foto" id="Foto" accept="Foto/*" required>
                                    </div>
                                    <div class="input-box">
                                        <label for="DeskripsiFoto"><strong>DeskripsiFoto:</strong></label>
                                        <input type="text" name="DeskripsiFoto" id="DeskripsiFoto" required>

                                    </div>
                                    <button class="btn btn-primary" type="submit">Upload Foto</button>
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

                <li><a href="logout.php" onclick="sign_out()">
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

    <!-- story -->
    <div class="gnb flex-row">
        <div class="icons ">

            <img width="60" src="img/6.png">

            <img width="60" src="img/6.png">
            <img width="60" src="img/6.png">
            <img width="60" src="img/6.png">
            <img width="60" src="img/6.png">
            <img width="60" src="img/6.png">
            <img width="60" src="img/6.png">
            <img width="60" src="img/6.png">


        </div>
    </div>

    <!-- account -->
    <div class="flex-row">
        <div class="account flex-col">
            <div class="account-content">
                <li class="flex-row">
                    <div class="img-wrap">
                        <img width="50px" src="img/6.png">
                    </div>
                    <p class="flex-col">
                        <span>arielvalen</span>
                        <span>valen</span>
                    </p>


            </div>
            <div class="about">
                <a href="#">About</a>
                <a href="#">Help</a>
                <a href="#">Press</a>
                <a href="#">API</a>
                <a href="#">Jobs</a>
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Location</a>
                <a href="#">Language</a>
                <a href="#">English</a>
            </div>
            <div class="name">
                2024 VALEN FROM ANGKASA
            </div>
        </div>
    </div>

    <!-- gallery -->
    <div class=" gallery">
        <!-- error -->
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <!-- error -->

        <?php foreach ($Foto as $Foto): ?>
            <div class="feed flex-col">
                <!-- profile -->
                <div class="profile flex-row">
                    <div class="img-wrap">
                        <img width="32" src="img/logovalen.jpeg">
                    </div>
                    <p class="flex-col">
                        <span>valen</span>
                        <span>indonesia, bandung, angkasa</span>
                    </p>
                    <!-- modal -->
                    <!-- Button trigger modal -->
                    <button style="background: none; border:none;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <img width="20px" src="img/7.png">
                    </button>
                    <!-- Modal -->
                    <div style="margin-top: 200px; " class="modal fade " id="exampleModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body flex-col  m-3 p-1">
                                    <!-- <button style="border:none; background:none; font-size:18px;">Edit</button> -->

                                    <a style="text-decoration:none; background:none; font-size:18px; color:red;"
                                        href="index.php?action=delete&FotoID=<?php echo $Foto['FotoID']; ?>"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus Foto ini?')">Delete</a>
                                    <br>
                                    <a style="text-decoration:none; background:none; font-size:18px; color:black;"
                                        href="index.php">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->


                <img src="<?php echo $Foto['JudulFoto']; ?>" class="card-img-top"
                    alt="<?php echo $Foto['DeskripsiFoto']; ?>">
                <!-- icon -->
                <div class="feed-icons flex-row mb-3">
                    <img id="heart" onclick="like()" src="img/5.png" alt="">


                    <img data-toggle="modal" data-target="#modallarge" data-target="#modalBackdrop" src="img/9.png" alt="">
                    <!-- MODAL LARGE -->
                    <div class="modal fade" id="modallarge" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" width="100%">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Modal Large</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span
                                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    Ini Adalah isi dari modal large
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- LARGE -->

                    <img src="img/2.png" alt="">
                    <img src="img/10.png" alt="">
                </div>

                <div class="likes">
                    9,99 likes
                </div>
                <div class="comments">
                    <p class="card-text">
                        <?php echo $Foto['DeskripsiFoto']; ?>
                    </p>
                    <!-- hapus-DeskripsiFoto -->
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="hapus_DeskripsiFoto">
                        <input type="hidden" name="FotoID" value="<?php echo $Foto['FotoID']; ?>">
                        <button class="p-0"
                            style="background: none; color:red; border:none; text-align:left; font-size:14px;"
                            type="submit">Hapus DeskripsiFoto</button>
                    </form>
                    <!-- hapus-DeskripsiFoto -->
                    <span class="hashtag"></span>

                </div>
                <div class="count">
                    View all 169 comments

                </div>
                <div class="time">
                    20 HOURS AGO

                </div>
                <!-- Form for Foto actions -->
                <form action="index.php" method="post" class="mt-3 ">
                    <input type="hidden" name="action" value="edit">
                    <input type="hidden" name="FotoID" value="<?php echo $Foto['FotoID']; ?>">
                    <button class="btn btn-outline-secondary" type="submit">Edit</button>
                </form>
            </div>


        <?php endforeach; ?>

    </div>


    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="scripts.js?v=<?php echo time(); ?>"></script>

</body>

</html>