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

    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4" id="cardProfile">
        <div class="card-body">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" href="<?= base_url('Admin/scanQRCodeIbadah/') . $ibadah['kodeIbadah'] ?>">Daftar Kehadiran</a>
                <a class="nav-item nav-link" href="<?= base_url('Admin/jemaatTerdaftar/') . $ibadah['kodeIbadah'] ?>">Jemaat Terdaftar</a>
                <a class="nav-item nav-link active font-weight-bold" href="#">Tambah Kehadiran</a>
            </div>
            <form action="<?= base_url('Admin/submitTambahKehadiran/' . $ibadah['kodeIbadah']) ?>" method="POST">
                <ul class="list-group mt-4">
                    <li class="list-group-item">
                        <label for="Nama" class="font-weight-bold">Nama</label>
                        <input type="text" class="form-control d-block" id="nama" name="nama" required>
                    </li>
                    <li class="list-group-item">
                        <label for="Jenis Kelamin" class="font-weight-bold">Jenis Kelamin</label>
                        <select class="custom-select" name="jenisKelamin">
                            <option value="Laki-laki" class="d-block">Laki-laki</option>
                            <option value="Perempuan" class="d-block">Perempuan</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        <label for="Tanggal Lahir" class="font-weight-bold">Tanggal Lahir</label>
                        <input type="date" class="form-control d-block" id="tanggalLahir" name="tanggalLahir" required>
                    </li>
                    <li class="list-group-item">
                        <label for="Lingkungan" class="font-weight-bold">Lingkungan</label>
                        <select class="custom-select" name="lingkungan" required>
                            <option value="A" class="d-block">A</option>
                            <option value="B" class="d-block">B</option>
                            <option value="C" class="d-block">C</option>
                            <option value="D" class="d-block">D</option>
                            <option value="E" class="d-block">E</option>
                            <option value="Simpatisan" class="d-block">Simpatisan</option>
                        </select>
                    </li>
                    <li class="list-group-item">
                        <label for="Status Vaksin Covid-19" class="font-weight-bold">Status Vaksin Covid-19</label>
                        <select class="custom-select" name="vaksin" required>
                            <option value="Belum vaksin" class="d-block">Belum vaksin</option>
                            <option value="Sudah 1x" class="d-block">Sudah 1x</option>
                            <option value="Sudah 2x" class="d-block">Sudah 2x</option>
                        </select>
                    </li>
                </ul>
                <hr>
                <div class="d-inline float-right align-items-center">
                    <button type="submit" class="btn btn-success btn-sm" id="tambah">TAMBAH</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->