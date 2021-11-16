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
          <h1 class="h3 mb-4 text-gray-800">Ibadah Umum GKI Kebonagung</h1>

          <?= $this->session->flashdata('welcome'); ?>
          <?= $this->session->flashdata('message'); ?>

          <div class="card shadow mb-4 <?php if (empty($ibadahMingguIni)) {
                                          echo "d-none";
                                        } ?>">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Ibadah Onsite Minggu Ini</h6>
            </div>
            <div class="card-body mr-4">
              <?php $this->load->model('m_kehadiran');
              foreach ($ibadahMingguIni as $data) : ?>
                <div class="row">
                  <div class="col-lg-4">
                    <img class="img-fluid mx-3 my-3 shadow" style="width: 25rem;" src="<?= base_url('assets/img/thumbnail/') . $data['image'] ?>" alt="">
                  </div>
                  <div class="col-lg mx-3 my-3">
                    <h5 class="text-dark"><?= $data['namaIbadah'] ?><br>"<?= $data['temaIbadah'] ?>"</h5>
                    <h6><?= tgl_indo($data['tanggalIbadah'], true) . " - " . time_indo($data['jamIbadah']) . " WIB" ?></h6>
                    <?php
                    $terisi = $this->m_kehadiran->cekKuota($data['kodeIbadah']);
                    ?>
                    <h6>Kuota: <?= $terisi . "/" . $data['kuota'] ?></h6>
                    <a href="<?= base_url('Admin/scanQRCodeIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-primary btn-sm p-2 my-1 mr-1">SCAN QR CODE</a>
                    <a href="<?= base_url('Admin/jemaatTerdaftar/') . $data['kodeIbadah'] ?>" class="btn btn-success btn-sm p-2 my-1 mr-1">JEMAAT TERDAFTAR</a>
                    <a href="<?= base_url('Admin/detailIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-info btn-sm p-2 my-1 mr-1">DETAIL</a>
                    <br>
                    <a href="<?= base_url('Admin/tutupDaftarOnsite/') . $data['kodeIbadah'] ?>" class="btn btn-danger btn-sm p-2 my-1 mr-1">TUTUP PENDAFTARAN</a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Arsip Ibadah</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Ibadah</th>
                      <th>Tanggal</th>
                      <th>Jemaat Hadir</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($ibadah as $data) :
                      $terisi = $this->m_kehadiran->cekKuota($data['kodeIbadah']);
                    ?>
                      <tr>
                        <td><img class="img-responsive shadow" style="width: 10rem;" src="<?= base_url('assets/img/thumbnail/') . $data['image'] ?>" alt=""></td>
                        <td><?= $data['namaIbadah'] ?><br>"<?= $data['temaIbadah'] ?>"</td>
                        <td><?= tgl_indo($data['tanggalIbadah']) ?></td>
                        <td><?= $terisi ?></td>
                        <td><a href="<?= base_url('Admin/detailIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-info btn-sm p-2">DETAIL</a></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->