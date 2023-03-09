<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/frontend/head.php'); ?>
</head>

<body>
    <!-- Navigation-->
    <?php $this->load->view('layout/frontend/nav.php') ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('<?= base_url('assets/frontend/img/home-bg.jpg') ?>')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1><?= $title ?></h1>
                        <span class="subheading"><?= $syarat_surat->nama_surat ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container mb-5">
        <div class="title mb-5">
            <h5>Dokumen <?= $title; ?> <?php echo $syarat_surat->nama_surat; ?></h5>
        </div>
        <div class="">
            <ul>
                <?php foreach ($surat_layanan as $layanan) : ?>
                    <li><?php echo $layanan->nama_syarat_surat; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <!-- Footer-->
    <?php $this->load->view('layout/frontend/footer.php') ?>
</body>

</html>