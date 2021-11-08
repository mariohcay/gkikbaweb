        <!-- Custom styles for this page -->
        <link href="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        
        <!-- Page level plugins -->
        <script src="<?= base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url()?>assets/js/demo/datatables-demo.js"></script>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $ibadah['namaIbadah'] ?></h1>

            <div class="card shadow mb-4">
              <div class="card-body">
                <form action="<?= base_url('Admin/tambahKehadiran/').$ibadah['kodeIbadah'] ?>" method="POST">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Masukkan QR Code disini" aria-label="Scan QR Code disini" aria-describedby="button-addon2" name="qrcode" autofocus required autocomplete="off">
                      <button class="btn btn-dark btn-sm" type="submit" id="button-addon2">CEK KEHADIRAN</button>
                  </div>
                </form>
              </div>
            </div>

            <!-- DataTales Example -->
            <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kehadiran Jemaat</h6>
              </div>
              <div class="card-body" id="daftarHadir">
                <div class="table-responsive">
                <?php
                    $this->load->model('m_kehadiran');
                    $kodeIbadah = $ibadah['kodeIbadah'];
                    $kehadiran = $this->m_kehadiran->ambilKehadiran($kodeIbadah);
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
                        $i=1;
                        foreach($kehadiran as $data):?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $data['nama']?></td>
                                <td><?= $data['lingkungan']?></td>
                            </tr>
                            <?php 
                            $i++;
                        endforeach;?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->