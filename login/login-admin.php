<!doctype html>
<html lang="en">
<!-- Awal Heading -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css">

    <!-- Loding font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="../assets/css/loginadmin.css">

    <title>Login</title>
</head>
<!-- Akhir Heading -->

<body style="font-family: poppins;">
        <div class="container-fluid px-1  px-lg-1 px-xl-5 py-3 mx-auto mt-5 col-md-8 ">
            <div class="card card0 border-0 mt-5 ">
                <div class="row d-flex ">
                    <div class="col-md-7">
                        <div class="card1 card border-0 ">
                            <div class="row">
                            </div>
                            <div class="row  justify-content-center  border-line ">
                                <img src="../assets/slider3.jpg" class="image" height="400px">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 ">
                        <div class="card2 card border-0 px-0 me-5 mt-5 ">
                            <div class="row px-3 ">
                                <div class="text fw-bold text-center fs-2 mb-3 text-dark">
                                    <span class="">Login Admin</span>
                                </div>
                                <div class="line"></div>
                            </div>
                            <form action="cek-login-admin.php" method="POST">
                                <!-- <form action="" method="POST"> -->
                                <div class="row px-3 mb-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Username</h6>
                                    </label>
                                    <input type="text" name="username_admin" placeholder="Masukan Username">
                                </div>
                                <div class="row px-3 mb-3">
                                    <label class="mb-1">
                                        <h6 class="mb-0 text-sm">Password</h6>
                                    </label>
                                    <input type="password" name="password_admin" placeholder="Masukan Password">
                                </div>
                                <div class="row mb-2 px-1 mt-2 mb-5 ">
                                    <a href="login/cek-login.php"><button type="submit" class="btn btn-blue text-center btn-radius-10" value="Login">Login</button></a>
                                    <!-- <input type="submit" name="submit" value="login"> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-blue py-3 align-items-center d-flex justify-content-center">
                    <div class=" px-3 align-items-center">
                        <small class=" mb-2">Copyright &copy; 2022. All rights reserved.</small>
                    </div>
                </div>
            </div>
        </div>

        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>


</body>

</html>