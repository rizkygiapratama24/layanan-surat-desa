<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/master/head.php'); ?>
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('layout/master/sidebar.php'); ?>
        <!-- End Sidebar -->

        <div class="main">
            <!-- Header Navbar -->
            <?php $this->load->view('layout/master/nav.php'); ?>
            <!-- End Header Navbar -->
            <main class="content">
                <div class="container-fluid">
                    <div class="d-sm-block title-page mb-4">
                        <h3 class="mb-0"><?= $title ?></h3>
                    </div>
                    <div class="alert alert-primary" role="alert">
                        <strong>Selamat Datang <?= $userna->nama_user ?></strong>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <?php $this->load->view('layout/master/footer.php'); ?>
            <!-- End Footer -->
        </div>
    </div>

    <?php $this->load->view('layout/master/js.php'); ?>
</body>

</html>