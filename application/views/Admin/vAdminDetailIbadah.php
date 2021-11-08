        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800"><?= $ibadah['namaIbadah']?></h1>
            <div class="card shadow mb-4">
              <div class="card-body mr-4 px-4">
                    <div class="d-flex">
                      <iframe width="560" height="315" src="<?= $ibadah['link']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <hr>
                    <div>
                      <h5 class="text-dark"><?= $ibadah['namaIbadah']?><br>"<?= $ibadah['temaIbadah']?>"</h5>
                      <h6><?= tgl_indo($ibadah['tanggalIbadah'], true)." - ".time_indo($ibadah['jamIbadah'])." WIB"?></h6>
                      <pre><span style="font-family:nunito; font-size:13pt" class="text-gray-600"><?= $ibadah['deskripsi']?></span></pre>
                      <hr>
                        <div class="d-inline float-right align-items-center">
                        <a href="<?= base_url('Admin/ubahIbadah/').$ibadah['kodeIbadah']?>" class="btn btn-primary btn-sm" id="simpan">UBAH</a>
                        </div>
                    </div>
              </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->