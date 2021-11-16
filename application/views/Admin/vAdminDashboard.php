<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>

<!-- <script src="<?= base_url() ?>/assets/js/demo/chart-area-demo.js"></script> -->

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

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
            
            <?php if ($data['status'] === "BUKA") { ?>
              <a href="<?= base_url('Admin/scanQRCodeIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-primary btn-sm p-2 my-1 mr-1">SCAN QR CODE</a>
              <a href="<?= base_url('Admin/jemaatTerdaftar/') . $data['kodeIbadah'] ?>" class="btn btn-success btn-sm p-2 my-1 mr-1">JEMAAT TERDAFTAR</a>
              <a href="<?= base_url('Admin/detailIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-info btn-sm p-2 my-1 mr-1">DETAIL</a>
              <br>
              <a href="<?= base_url('Admin/tutupDaftarOnsite/') . $data['kodeIbadah'] ?>" class="btn btn-danger btn-sm p-2 my-1 mr-1">TUTUP PENDAFTARAN</a>
            <?php } else { ?>
              <a href="" class="btn btn-secondary disabled btn-sm p-2 my-1 mr-1">PENDAFTARAN TELAH DITUTUP</a>
              <a href="<?= base_url('Admin/detailIbadah/') . $data['kodeIbadah'] ?>" class="btn btn-info btn-sm p-2 my-1 mr-1">DETAIL</a>
            <?php } ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="row">
    <div class="col mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Jemaat</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($jemaat) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
            <a href="<?= base_url('Admin/daftarJemaat') ?>" class="stretched-link"></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="row">
    <div class="col mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Jemaat Laki-laki</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($lakiLaki) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-male fa-2x text-gray-300 mr-3"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Jumlah Jemaat Perempuan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= sizeof($perempuan) ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-female fa-2x text-gray-300 mr-3"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->


  <!-- <div class="row">

    <div class="col-md">
      <div class="card shadow mb-4">
        
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-info">Transaksi Iklan Baris</h6>
        </div>
        
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myChart" height="94%"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div> -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- <script>
var ctx = document.getElementById('myChart').getContext('2d');
var cData = JSON.parse(`<?php echo $iklanBulanan; ?>`);
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: cData.label,
        datasets: [{
            data: cData.data,
            borderColor: 'rgba(91,192,222)',
            pointBackgroundColor: 'rgba(91,192,222)',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
          display: false
        }
    }
});
</script> -->