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
          <h1 class="h3 mb-4 text-gray-800"><?= $ibadah['namaIbadah'] ?></h1>

          <!-- DataTales Example -->
          <?= $this->session->flashdata('message'); ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Jemaat Terdaftar</h6>
            </div>
            <div class="card-body" id="daftarHadir">
              <div class="table-responsive">
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
                        <td><img src="<?php echo base_url('Ibadah/renderQRCode/' . $data['id']) ?>" alt="" class="" width="100"></td>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jenisKelamin'] ?></td>
                        <td><?= $data['lingkungan'] ?></td>
                        <td><a class="btn btn-danger" href="<?= base_url('Admin/hapusJemaatTerdaftarOnsite/') . $data['id'] . "/" . $ibadah['kodeIbadah']?>" onclick="return confirm('Yakin ingin menghapus <?= $data['nama']?> dari jemaat terdaftar?')">HAPUS</a></td>
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
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->