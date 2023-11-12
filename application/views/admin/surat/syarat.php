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
                        <h3 class="mb-0"><?= $title ?> <?= $surat->nama_surat; ?></h3>
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
                    <div class="row">
                        <div class="col-md-8">
                            <form action="<?= site_url('surat/hapus_syarat_suratAll/' . $surat->id_surat) ?>" method="post" id="form-delete">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="<?= site_url('surat') ?>" class="btn btn-sm btn-info">
                                            <i class="fa fa-arrow-left"></i>
                                            Kembali Ke Daftar Surat
                                        </a>
                                        <button type="submit" class="btn btn-sm btn-danger hapus-terpilih aksi-terpilih disabled" onclick="return confirm('Yakin Ingin Dihapus ?')">
                                            <i class="fa fa-trash"></i>
                                            Hapus
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th class="col-md-1"> <input type="checkbox" name="chk_all[]" id="chk_all"> </th>
													<th class="col-md-1">NO</th>
													<th>SYARAT DOKUMEN</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; ?>
												<?php foreach($surat_layanan as $row): ?>
													<tr>
														<td> <input type="checkbox" name="chk_id[]" class="chk_id"> </td>
														<td><?= $no++ ?></td>
														<td><?= $row->nama_syarat_surat ?></td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Form Dokumen Persyaratan Surat</h5>
                                </div>
                                <form action="<?= site_url('surat/syarat/' . $surat->id_surat) ?>" method="post">
                                    <input type="hidden" name="id_surat" value="<?= $surat->id_surat ?>">
                                    <input type="hidden" name="id_surat_layanan" id="id_surat_layanan" value="">
                                    <div class="card-body">
                                        <div class="form-group mb-0">
                                            <label for="id_syarat_surat" class="form-label <?php echo form_error('id_syarat_surat') ? 'text-danger' : ''; ?>">Nama Dokumen</label>
                                            <select name="id_syarat_surat" id="id_syarat_surat" class="form-control <?php echo form_error('id_syarat_surat') ? 'is-invalid' : ''; ?>">
                                                <option value="">-- PILIH DOKUMEN PERSYARATAN --</option>
                                                <?php
                                                foreach ($syarat_surat as $syarat) {
                                                ?>
                                                    <option value="<?php echo $syarat->id_syarat_surat; ?>"><?php echo $syarat->nama_syarat_surat; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?php echo form_error('id_syarat_surat'); ?>
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
                    </div>
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
    <script>
        $(document).ready(function() {

            $('.selector').click(function() {
                var id = $(this).data("id");
                var syarat = $(this).data("syarat");

                $('#id_surat_layanan').val(id);
                $('#id_syarat_surat > option').each(function() {
                    if ($(this).val() == syarat) {
                        $(this).attr('selected', true);
                    } else {
                        $(this).attr('selected', false);
                    }
                });


            });
        })
    </script>
</body>

</html>
