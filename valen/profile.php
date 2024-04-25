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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        body {
            width: 100%;
            left: 0;
            right: 0;
        }

        .profile {
            padding-right: 80px;
            margin-top: -10px;

        }

        .account-content {
            width: 50%;
            margin-left: 490px;
        }

        .account-content li {
            margin-right: 200px;
            height: 100%;


        }

        .account2 {
            font-size: 20px;
            margin-top: -100px;
        }

        .account2 button {
            margin: 5px;
            border: none;
            padding: 0px 16px;
            color: black;
            background-color: whitesmoke;
            font-size: 14px;
            font-weight: 500;
            border-radius: 10px;
        }

        .account2 i {
            margin: 5px;
            border: none;
            font-size: 35px;

        }

        .account-content ul {
            margin-left: -100px;
            margin-top: -100px;
        }

        .account-content ul span {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="logo-name">
            <img width="145" src="img/logovalen.jpeg">
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
                                        <label for="image"><strong>Choose Image:</strong></label>
                                        <br><br>
                                        <input type="file" name="image" id="image" accept="image/*" required>
                                    </div>
                                    <div class="input-box">
                                        <label for="caption"><strong>Caption:</strong></label>
                                        <input type="text" name="caption" id="caption" required>

                                    </div>
                                    <button class="btn btn-primary" type="submit">Upload Image</button>
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
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>
                <li class="mode">


                    <div class="mode-toggle">
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="account-content mt-3 flex-col">
        <li class="flex-row">
            <div class="profile">
                <img width="150px" src="./img/6.png" alt="" srcset="">
            </div>

            <div class="account2 flex-row">
                <p class="flex-row">
                    <span>valen</span>
                </p>
                <a></a>
                <button style="font-size:14px; width:100px;" type="button" class="btn btn-secondary m-2 p-1"> Edit
                    Profile </button>
                <button style="font-size:14px; width:110px;" type="button" class="btn btn-secondary p-1"> view archive
                </button>
                <i class='bx bx-cog'></i>
            </div>


        </li>
    </div>

</body>

</html>