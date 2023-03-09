<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/master/head.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <?php if ($this->session->flashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <h6>
                                <i class="fa fa-times-circle fs-5"></i>
                                Error
                            </h6>
                            <p class="mb-0"><?php echo $this->session->flashdata('error'); ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= site_url('surat') ?>" class="btn btn-sm btn-info">
                                <i class="fa fa-arrow-left"></i>
                                Kembali Ke Daftar Surat
                            </a>
                        </div>
                        <form action="<?= site_url('surat/edit/' . $surat->id_surat) ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_syarat_surat" class="form-label <?php echo form_error('id_syarat_surat') ? 'text-danger' : ''; ?>">Dokumen Persyaratan Surat</label>
                                            <select name="id_syarat_surat" class="form-control js-example-basic-single <?php echo form_error('id_syarat_surat') ? 'is-invalid' : ''; ?>">
                                                <option value="">-- PILIH DOKUMEN PERSYARATAN --</option>
                                                <?php
                                                foreach ($syarat_surat as $syarat) {
                                                ?>
                                                    <option value="<?php echo $syarat->id_syarat_surat; ?>" <?php if ($syarat->id_syarat_surat == $surat->id_syarat_surat) echo "selected"; ?>><?php echo $syarat->nama_syarat_surat; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_syarat_surat'); ?>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id_jenis_surat" class="form-label <?php echo form_error('id_jenis_surat') ? 'text-danger' : ''; ?>">Jenis Surat</label>
                                            <select name="id_jenis_surat" class="form-control js-example-basic-single <?php echo form_error('id_jenis_surat') ? 'is-invalid' : ''; ?>">
                                                <option value="">-- PILIH JENIS SURAT --</option>
                                                <?php
                                                foreach ($jenis_surat as $jenis) {
                                                ?>
                                                    <option value="<?php echo $jenis->id_jenis_surat ?>" <?php if ($surat->id_jenis_surat == $jenis->id_jenis_surat) echo "selected"; ?>><?php echo $jenis->nama_jenis_surat ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_jenis_surat'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-0">
                                            <label for="nama_surat" class="form-label <?php echo form_error('nama_surat') ? 'text-danger' : ''; ?>">Nama Surat</label>
                                            <input type="text" name="nama_surat" class="form-control <?php echo form_error('nama_surat') ? 'is-invalid' : ''; ?>" value="<?php echo $surat->nama_surat; ?>" placeholder="Nama Surat" autocomplete="off">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nama_surat'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group mb-0">
                                            <label for="file_surat" class="form-label">File Surat</label>
                                            <code>(Jika File Belum Ada, Boleh Dikosongkan)</code>
                                            <input type="file" name="file_surat" class="form-control">
                                            <a href="#">
                                                <?php echo $surat->file_surat; ?>
                                            </a>
                                            <input type="hidden" name="file_surat_old" value="<?php echo $surat->file_surat; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sedia_mandiri" class="control-label">Sediakan di layanan mandiri</label> <br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-info pl-4 pr-4 <?php if ($surat->sedia_mandiri == 'Ya') echo "active"; ?>">
                                                    <input type="radio" name="sedia_mandiri" id="Ya" value="Ya" autocomplete="off" <?php if ($surat->sedia_mandiri == 'Ya') echo "checked=''"; ?>> Ya
                                                </label>
                                                <label class="btn btn-info pl-4 pr-4 <?php if ($surat->sedia_mandiri == 'Tidak') echo "active"; ?>">
                                                    <input type="radio" name="sedia_mandiri" id="Tidak" value="Tidak" autocomplete="off" <?php if ($surat->sedia_mandiri == 'Tidak') echo "checked=''"; ?>> Tidak
                                                </label>
                                            </div>
                                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        })
    </script>
</body>

</html>