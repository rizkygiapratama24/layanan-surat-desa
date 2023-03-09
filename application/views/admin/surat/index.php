<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layout/master/head.php'); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">
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
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success" role="alert">
                            <h6>
                                <i class="fa fa-check-circle fs-5"></i>
                                Berhasil !
                            </h6>
                            <p class="mb-0"><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('surat/hapusAll') ?>" method="post" id="form-delete">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?= site_url('surat/tambah') ?>" class="btn btn-sm btn-info">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger hapus-terpilih aksi-terpilih disabled" onclick="return confirm('Yakin Ingin Dihapus ?')">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="table-data" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th> <input type="checkbox" name="chk_all" id="chk_all"> </th>
                                            <th>NO</th>
                                            <th>NAMA SURAT</th>
                                            <th>JENIS SURAT</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        <?php foreach ($data_surat as $surat) : ?>
                                            <tr>
                                                <td> <input type="checkbox" name="chk_id[]" value="<?php echo $surat->id_surat; ?>"> </td>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $surat->nama_surat; ?></td>
                                                <td><?php echo $surat->nama_jenis_surat; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('surat/edit/' . $surat->id_surat) ?>" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#hapusModal-<?php echo $surat->id_surat; ?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusModal-<?php echo $surat->id_surat; ?>" title="Hapus">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <?php if ($surat->status_surat == 'Aktif') : ?>
                                                        <a href="<?php echo base_url('surat/status_surat/' . $surat->id_surat . '/' . $surat->status_surat) ?>" class="btn btn-sm btn-info" title="Nonaktifkan Surat">
                                                            <i class="fa fa-unlock"></i>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="<?php echo base_url('surat/status_surat/' . $surat->id_surat . '/' . $surat->status_surat) ?>" class="btn btn-sm btn-info" title="Aktifkan Surat">
                                                            <i class="fa fa-lock"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo site_url('surat/syarat/' . $surat->id_surat) ?>" class="btn btn-sm btn-info" title="Tambah Dokumen Persyaratan">
                                                        <i class="fa fa-file"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusModal-<?php echo $surat->id_surat; ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header p-3">
                                                            <h5 class="modal-title">
                                                                <i class="fa fa-warning text-danger"></i>
                                                                Konfirmasi
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">Apakah Anda Yakin Ingin Menghapus Data Ini ?</p>
                                                        </div>
                                                        <div class="modal-footer p-3">
                                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">
                                                                <i class="fa fa-sign-out"></i>
                                                                Tutup
                                                            </button>
                                                            <a href="<?= site_url('surat/hapus/' . $surat->id_surat) ?>" class="btn btn-sm btn-info">
                                                                <i class="fa fa-trash"></i>
                                                                Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                </div>
            </main>

            <!-- Footer -->
            <?php $this->load->view('layout/master/footer.php'); ?>
            <!-- End Footer -->
        </div>
    </div>

    <?php $this->load->view('layout/master/js.php'); ?>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url('assets/master/js/script.js'); ?>"></script>
</body>

</html>