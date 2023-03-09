<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/master/css/style.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: url('<?= base_url('assets/master/img/desa.jpg') ?>') rgba(31, 41, 55, 0.5) no-repeat center fixed;
            background-size: cover;
            background-blend-mode: multiply;
            height: 100%;
        }
    </style>
</head>

<body>
    <section class="login pt-5 pb-5 container">
        <div class="card login-siteman m-auto w-100-mobile" style="border-radius:20px;">
            <div class="card-body">
                <div class="logo-login mb-3 text-center">
                    <a href="../index.php">
                        <img src="<?= base_url('assets/master/img/icon-surat.png') ?>" alt="Logo" height="145">
                    </a>
                </div>
                <div class="desc-login-site-man text-center mb-3">
                    <h4>Layanan Surat</h4>
                </div>
                <form action="<?= base_url('siteman/proses') ?>" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control text-center custom-form-control-siteman" placeholder="Nama Pengguna" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control text-center custom-form-control-siteman" placeholder="Kata Sandi" id="myPassword" required>
                    </div>
                    <div class="form-check text-center mb-3">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                        <label class="form-check-label" for="exampleCheck1">Tampilkan Kata Sandi</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-login-siteman text-uppercase">Masuk</button>
                    </div>
                    <div class="form-group text-center mb-0">
                        <p class="mb-0">OpenSID 22.06</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("myPassword");
            if (x.type == "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>