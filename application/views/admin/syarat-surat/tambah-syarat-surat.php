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
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= site_url('syarat_surat') ?>" class="btn btn-sm btn-info">
                                <i class="fa fa-arrow-left"></i>
                                Kembali Ke Daftar Persyaratan Surat
                            </a>
                        </div>
                        <form action="<?= site_url('syarat_surat/tambah') ?>" method="post">
                            <div class="card-body">
                                <div class="form-group mb-0">
                                    <label for="nama_syarat_surat" class="form-label <?php echo form_error('nama_syarat_surat') ? 'text-danger' : ''; ?>">Nama Dokumen Persyaratan</label>
                                    <input type="text" name="nama_syarat_surat" class="form-control <?php echo form_error('nama_syarat_surat') ? 'is-invalid' : ''; ?>" value="<?php echo set_value('nama_syarat_surat'); ?>" placeholder="Nama Dokumen Persyaratan" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_syarat_surat'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <button type="reset" name="reset" class="btn btn-sm btn-danger">
                                    <i class="fa fa-times"></i>
                                    Batal
                                </button>
                                <button type="submit" name="save" class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
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