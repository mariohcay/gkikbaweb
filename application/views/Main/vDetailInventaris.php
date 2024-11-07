<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="card shadow mb-4" id="cardProfile">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Detail Inventaris</h6>
    </div>
    <div class="card-body">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('Inventaris/simpanUbah') ?>" method="POST">
        <ul class="list-group">
          <li class="list-group-item">
            <label for="kode" class="font-weight-bold">Kode</label>
            <input type="text" class="form-control d-block" value="<?= $inventaris['kode']; ?>" id="kode" name="kode" readonly>
          </li>
          <li class="list-group-item">
            <label for="nama" class="font-weight-bold">Nama</label>
            <input type="text" class="form-control d-block" value="<?= $inventaris['nama']; ?>" id="nama" name="nama" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="serialNum" class="font-weight-bold">Nomor Seri</label>
            <input type="text" class="form-control d-block" value="<?= $inventaris['serialNum']; ?>" id="serialNum" name="serialNum" autocomplete="off">
          </li>
          <li class="list-group-item">
            <label for="tglBeli" class="font-weight-bold">Tanggal Beli</label>
            <input type="date" class="form-control d-block" value="<?= $inventaris['tglBeli']; ?>" id="tglBeli" name="tglBeli" required>
          </li>
          <li class="list-group-item">
            <label for="tglBaru" class="font-weight-bold">Tanggal Pembaharuan</label>
            <input type="date" class="form-control d-block" value="<?= $inventaris['tglBaru']; ?>" id="tglBaru" name="tglBaru" required>
          </li>
          <li class="list-group-item">
            <label for="jumlah" class="font-weight-bold">Jumlah</label>
            <input type="number" class="form-control d-block" value="<?= $inventaris['jumlah']; ?>" id="jumlah" name="jumlah" autocomplete="off" required>
          </li>
          <li class="list-group-item">
            <label for="kondisi" class="font-weight-bold">Kondisi</label>
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
            <label for="tempatSimpan" class="font-weight-bold">Tempat Penyimpanan</label>
            <select class="custom-select" name="tempatSimpan">
              <option value="Gereja" class="d-block" <?php if ($inventaris['tempatSimpan'] === "Gereja") {
                                                        echo "selected";
                                                      }; ?>>Gereja</option>
              <option value="Konsistori" class="d-block" <?php if ($inventaris['tempatSimpan'] === "Konsistori") {
                                                            echo "selected";
                                                          }; ?>>Konsistori</option>
              <option value="Ruang Komisi" class="d-block" <?php if ($inventaris['tempatSimpan'] === "Ruang Komisi") {
                                                              echo "selected";
                                                            }; ?>>Ruang Komisi</option>
              <option value="Ruang Multimedia" class="d-block" <?php if ($inventaris['tempatSimpan'] === "Ruang Multimedia") {
                                                                  echo "selected";
                                                                }; ?>>Ruang Multimedia</option>
              <option value="Graha Eklesia" class="d-block" <?php if ($inventaris['tempatSimpan'] === "Graha Eklesia") {
                                                              echo "selected";
                                                            }; ?>>Graha Eklesia</option>
              <option value="Pastori" class="d-block" <?php if ($inventaris['tempatSimpan'] === "Pastori") {
                                                              echo "selected";
                                                            }; ?>>Pastori</option>
            </select>
          </li>
          <li class="list-group-item">
            <label for="harga" class="font-weight-bold">Harga</label>
            <input type="number" class="form-control d-block" value="<?= $inventaris['harga']; ?>" id="harga" name="harga">
          </li>
          <li class="list-group-item">
            <label for="milik" class="font-weight-bold">Milik</label>
            <input type="text" class="form-control d-block" value="<?= $inventaris['milik']; ?>" id="milik" name="milik" readonly>
          </li>
        </ul>
        <hr>
        <div class="d-inline float-right align-items-center">
          <a href="<?= base_url('Inventaris') ?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
          <button type="submit" class="btn btn-success btn-sm" id="simpan">SIMPAN
          </button>
        </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->