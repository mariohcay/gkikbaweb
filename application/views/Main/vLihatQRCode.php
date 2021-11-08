        <!-- Begin Page Content -->
        <div class="container-fluid">

            <h1 class="h3 mb-4 text-gray-800"><?= $ibadah['namaIbadah']?></h1>
            <div class="card shadow mb-4">
              <div class="card-body mr-4 px-4">
                    <h5>Scan QRCode di bawah ini pada saat hadir di gereja sebagai syarat mengikuti ibadah onsite. <br>
                      Agar memudahkan, harap datang 15 menit sebelum ibadah dimulai. Tuhan Yesus memberkati :)</h5>
                    <hr>
                    <div class="d-flex">
                      <img src="<?php echo base_url('Ibadah/renderQRCode')?>" alt="" class="img-fluid">
                    </div>
                    <hr>
                      <h5 class="text-dark"><?= $ibadah['namaIbadah']?><br>"<?= $ibadah['temaIbadah']?>"</h5>
                      <h6 style="font-size:13pt;"><?= tgl_indo($ibadah['tanggalIbadah'], true)." - ".$ibadah['jamIbadah']." WIB"?></h6>
                      <pre><span style="font-family:nunito; font-size:13pt" class="text-gray-600"><?= $ibadah['deskripsi']?></span></pre>
              </div>
            </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->