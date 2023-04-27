<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Inventaris</h6>
    </div>
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('Inventaris/simpanTambah') ?>" method="POST">
        <ul class="list-group">
          <li class="list-group-item">
            <label for="Id" class="font-weight-bold">Kode</label>
            <input type="text" class="form-control d-block" value="<?= $inventaris['kode']; ?>" id="kode" name="kode" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Nama" class="font-weight-bold">Nama</label>
            <input type="text" class="form-control d-block" value="<?= $inventaris['nama']; ?>" id="nama" name="nama" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Tanggal Beli" class="font-weight-bold">Tanggal Beli</label>
            <input type="date" class="form-control d-block" value="<?= $inventaris['tglBeli']; ?>" id="tglBeli" name="tglBeli" required>
          </li>
          <li class="list-group-item">
            <label for="Tanggal Pembaharuan" class="font-weight-bold">Tanggal Pembaharuan</label>
            <input type="date" class="form-control d-block" value="<?= $inventaris['tglBaru']; ?>" id="tglBaru" name="tglBaru" required>
          </li>
          <li class="list-group-item">
            <label for="Jumlah" class="font-weight-bold">Jumlah</label>
            <input type="number" class="form-control d-block" value="<?= $inventaris['jumlah']; ?>" id="jumlah" name="jumlah" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="Kondisi" class="font-weight-bold">Kondisi</label>
            <select class="custom-select" name="kondisi">
              <option value="Bagus" class="d-block" <?php if ($inventaris['kondisi'] === "Bagus") {
                                                  echo "selected";
                                                }; ?>>Bagus</option>
              <option value="Kurang" class="d-block" <?php if ($inventaris['kondisi'] === "Kurang") {
                                                  echo "selected";
                                                }; ?>>Kurang</option>
              <option value="Rusak" class="d-block" <?php if ($inventaris['kondisi'] === "Rusak") {
                                                  echo "selected";
                                                }; ?>>Rusak</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="Jenis" class="font-weight-bold">Jenis</label>
            <select class="custom-select" name="jenis">
              <option value="Aset" class="d-block" <?php if ($inventaris['jenis'] === "Aset") {
                                                  echo "selected";
                                                }; ?>>Aset</option>
              <option value="Habis Pakai" class="d-block" <?php if ($inventaris['jenis'] === "Habis Pakai") {
                                                  echo "selected";
                                                }; ?>>Habis Pakai</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="Milik" class="font-weight-bold">Milik</label>
            <input type="text" class="form-control d-block" value="<?= $inventaris['milik']; ?>" id="milik" name="milik" autocomplete="off" required>
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