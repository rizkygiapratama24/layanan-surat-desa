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
                        <span class="subheading"><?= $subtitle ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container mb-5">
		<div class="title text-center mb-5">
			<h2>Daftar Surat</h2>
		</div>
        <div class="row">
            <?php
            foreach ($daftar_surat as $surat) {
            ?>
                <?php if ($surat->sedia_mandiri == 'Ya') : ?>
                    <div class="col-md-5">
                        <div class="post-preview">
                            <h4 class="post-title"><?= $surat->nama_surat ?></h4>
                            <p class="post-meta">
                                <a href="<?= site_url('layanan_surat/persyaratan/' . $surat->id_surat) ?>">
                                    Lihat Persyaratan
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </p>
                            <a href="<?= base_url('layanan_surat/download/' . $surat->id_surat) ?>" class="btn btn-sm btn-secondary text-white <?php if ($surat->status_surat == 'Nonaktif') echo "disabled"; ?> ">
                                <i class="fas fa-file-download fa-lg"></i>
                                Download Surat
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Footer-->
    <?php $this->load->view('layout/frontend/footer.php') ?>
</body>

</html>
