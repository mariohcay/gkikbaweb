        <!-- Custom styles for this page -->
        <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Page level plugins -->
        <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="row">
              <div class="col">
                <h3 class="h3 text-gray-800 mb-1"><?= $ibadah['namaIbadah'];
                                                  echo "\n"; ?>
                  <h5><?= tgl_indo($ibadah['tanggalIbadah'], true) ?></h5>
              </div>
            </div>
          </div>

          <!-- DataTales Example -->
          <?= $this->session->flashdata('message'); ?>
          <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jemaat Terdaftar</h6>
            </div> -->
            <div class="card-body" id="daftarHadir">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" href="<?= base_url('Admin/scanQRCodeIbadah/') . $ibadah['kodeIbadah'] ?>">Daftar Kehadiran</a>
                <a class="nav-item nav-link active font-weight-bold" href="#">Jemaat Terdaftar</a>
                <a class="nav-item nav-link" href="<?= base_url('Admin/tambahKehadiranOnsite/') . $ibadah['kodeIbadah'] ?>">Tambah Kehadiran</a>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show active">
                  <div class="table-responsive mt-4">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <td>QR Code</td>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Lingkungan</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($jemaat as $data) : ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><img src="<?php echo base_url('Ibadah/renderQRCode/' . $data['id']) ?>" alt="" class="" width="50%"></td>
                            <td><?= $data['id'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenisKelamin'] ?></td>
                            <td><?= $data['lingkungan'] ?></td>
                            <td>
                              <a class="btn btn-sm btn-danger mr-1" href="<?= base_url('Admin/hapusJemaatTerdaftarOnsite/') . $data['id'] . "/" . $ibadah['kodeIbadah'] ?>" onclick="return confirm('Yakin ingin menghapus <?= $data['nama'] ?> dari jemaat terdaftar?')">HAPUS</a>
                              <a class="btn btn-sm btn-success mr-1" href="<?= base_url('Admin/tambahKehadiran/') . $ibadah['kodeIbadah'] . "/" . $data['id'] ?>" onclick="return confirm('Masukkan <?= $data['nama'] ?> dalam daftar kehadiran jemaat?')">HADIR</a>
                            </td>
                          </tr>
                        <?php
                          $i++;
                        endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->