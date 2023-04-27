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
          <!-- <h1 class="h3 mb-4 text-gray-800">Inventaris Tim Multimedia</h1> -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">

            <h3 class="h3 text-gray-800 mb-1">Inventaris Tim Multimedia</h3>
            <a href="#" class="btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white mr-1"></i> Tambah Inventaris</a>
            <!-- <a href="<?= base_url('Inventaris/tambahInventaris')?>" class="btn btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white mr-1"></i> Tambah Inventaris</a> -->
          </div>
          
          <!-- DataTales Example -->
          <?= $this->session->flashdata('message'); ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Inventaris</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Kondisi</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($inventaris as $data) : ?>
                      <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['kode'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['kondisi'] ?></td>
                        <td><a href="<?= base_url('Inventaris/detailInventaris/') . $data['kode'] ?>" class="btn btn-info btn-sm p-2">DETAIL</a></td>
                      </tr>
                    <?php $i++;
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