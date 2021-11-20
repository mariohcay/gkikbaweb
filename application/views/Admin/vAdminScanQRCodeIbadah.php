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
           <div class="card-body" id="daftarHadir">
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active font-weight-bold" href="#">Daftar Kehadiran</a>
                <a class="nav-item nav-link" href="<?= base_url('Admin/jemaatTerdaftar/') . $ibadah['kodeIbadah'] ?>">Jemaat Terdaftar</a>
                <a class="nav-item nav-link" href="<?= base_url('Admin/tambahKehadiranOnsite/') . $ibadah['kodeIbadah'] ?>">Tambah Kehadiran</a>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show active">
                  <form action="<?= base_url('Admin/tambahKehadiran/') . $ibadah['kodeIbadah'] . "/none" ?>" method="POST">
                    <div class="input-group mt-4 mb-4">
                      <input type="text" class="form-control" placeholder="Masukkan QR Code disini" aria-label="Scan QR Code disini" aria-describedby="button-addon2" name="qrcode" autofocus required autocomplete="off">
                      <button class="btn btn-dark btn-sm" type="submit" id="button-addon2">CEK KEHADIRAN</button>
                    </div>
                  </form>
                  <hr>
                  <div class="table-responsive mt-4">
                    <?php
                    $this->load->model('m_kehadiran');
                    $kodeIbadah = $ibadah['kodeIbadah'];
                    $kehadiran = $this->m_kehadiran->jemaatHadir($kodeIbadah);
                    ?>
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Lingkungan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($jemaat as $data) : ?>
                          <tr>
                            <td><?= $i ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['lingkungan'] ?></td>
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