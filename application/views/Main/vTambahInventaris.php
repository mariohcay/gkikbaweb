<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Inventaris</h6>
    </div>
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('Inventaris/tambahUbah') ?>" method="POST">
        <ul class="list-group">
          <li class="list-group-item">
            <label for="kode" class="font-weight-bold">Kode</label>
            <input type="text" class="form-control d-block" id="kode" name="kode">
          </li>
          <li class="list-group-item">
            <label for="nama" class="font-weight-bold">Nama</label>
            <input type="text" class="form-control d-block" id="nama" name="nama" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="serialNum" class="font-weight-bold">Nomor Seri</label>
            <input type="text" class="form-control d-block" id="serialNum" name="serialNum" autocomplete="off">
          </li>
          <li class="list-group-item">
            <label for="tglBeli" class="font-weight-bold">Tanggal Beli</label>
            <input type="date" class="form-control d-block" id="tglBeli" name="tglBeli" required>
          </li>
          <li class="list-group-item">
            <label for="tglBaru" class="font-weight-bold">Tanggal Pembaharuan</label>
            <input type="date" class="form-control d-block" id="tglBaru" name="tglBaru" required>
          </li>
          <li class="list-group-item">
            <label for="jumlah" class="font-weight-bold">Jumlah</label>
            <input type="number" class="form-control d-block" id="jumlah" name="jumlah" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="kondisi" class="font-weight-bold">Kondisi</label>
            <select class="custom-select" name="kondisi">
              <option value="Bagus" class="d-block">Bagus</option>
              <option value="Kurang" class="d-block">Kurang</option>
              <option value="Rusak" class="d-block">Rusak</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="tempatSimpan" class="font-weight-bold">Tempat Penyimpanan</label>
            <select class="custom-select" name="tempatSimpan">
              <option value="Gereja" class="d-block">Gereja</option>
              <option value="Konsistori" class="d-block">Konsistori</option>
              <option value="Ruang Komisi" class="d-block">Ruang Komisi</option>
              <option value="Ruang Multimedia" class="d-block">Ruang Multimedia</option>
              <option value="Graha Eklesia" class="d-block">Graha Eklesia</option>
              <option value="Pastori" class="d-block">Pastori</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="harga" class="font-weight-bold">Harga</label>
            <input type="number" class="form-control d-block" id="harga" name="harga">
          </li>
          <li class="list-group-item">
            <label for="milik" class="font-weight-bold">Milik</label>
              <select class="custom-select" name="milik">
                <option value="Majelis Jemaat" class="d-block">Majelis Jemaat</option>
                <option value="Komisi Anak" class="d-block">Komisi Anak</option>
                <option value="Komisi Pemuda Remaja" class="d-block">Komisi Pemuda Remaja</option>
                <option value="Komisi Dewasa" class="d-block">Komisi Dewasa</option>
                <option value="Komisi Lansia" class="d-block">Komisi Lansia</option>
                <option value="Komisi Liturgi dan Musik Gerejawi" class="d-block">Komisi Liturgi dan Musik Gerejawi</option>
                <option value="Komisi Penolong Kedukaan" class="d-block">Komisi Penolong Kedukaan</option>
                <option value="Tim Multimedia" class="d-block">Tim Multimedia</option>
              </select>
          </li>
        </ul>
        <hr>
        <div class="d-inline float-right align-items-center">
          <a href="<?= base_url('Inventaris') ?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
          <button type="submit" class="btn btn-success btn-sm" id="simpan">TAMBAH
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->