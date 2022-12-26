<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Login</title>
</head>

<body>
    <!-- Login -->
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="cek-login.php" method="POST" class="sign-in-form">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username_pelanggan"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password_pelanggan"/>
                    </div>
                    <input type="submit" value="Login" class="btn solid" name="login" />
                </form>
                <!-- End Login -->

                <!-- Register -->
                <form action="cek-register.php" method="POST" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama" name="nama_pelanggan"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email_pelanggan"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user-check"></i>
                        <input type="text" placeholder="Username" name="username_pelanggan" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password_pelanggan" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="text" placeholder="No.Telepon" name="tlp_pelanggan" />
                    </div>
                    <input type="submit" class="btn" value="Register" />
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Belum Punya Akun</h3>
                    <p>
                        Silahkan Buat Akun Dengan Mengklik Tombol Di Bawah Lalu Isi Form Yang Tertera
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Register
                    </button>
                </div>
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Sudah Punya Akun ?</h3>
                    <p>
                        Jika Anda Sudah Memiliki Akun Silahkan Login Dengan Mengklik Tombol Di Bawah Ini
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register -->
    <script>

        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");

        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });

        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
    </script>
    <script src="app.js"></script>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>