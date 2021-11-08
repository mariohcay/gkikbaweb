<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="card shadow mb-4" id="cardProfile">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Jemaat</h6>
  </div>
  <div class="card-body">
    <?= $this->session->flashdata('message'); ?>
    <form action="<?= base_url('Admin/simpanTambahJemaat') ?>" method="POST">
    <ul class="list-group">
      <li class="list-group-item">
        <label for="Id Jemaat" class="font-weight-bold">Id Jemaat</label>
        <input type="text" class="form-control d-block" value="<?= $id; ?>" id="id" name="id" readonly>
      </li>
      <li class="list-group-item">
        <label for="Username" class="font-weight-bold">Username</label>
        <input type="text" class="form-control d-block" id="username" name="username" autocomplete="off" required>
        <div id="message" class="mt-2 text-danger">Username telah dipakai</div>
      </li>
      <li class="list-group-item">
        <label for="Password" class="font-weight-bold">Password</label>
        <input type="password" class="form-control d-block" id="password" name="password" autocomplete="off" required>
      </li>
      <li class="list-group-item">
        <label for="Konfirmasi Password" class="font-weight-bold">Konfirmasi Password</label>
        <input type="password" class="form-control d-block" id="password2" name="password2" autocomplete="off" required>
        <div id="message2" class="mt-2 text-danger">Password tidak cocok</div>
      </li>
      <li class="list-group-item">
        <label for="Email" class="font-weight-bold">Email</label>
        <input type="email" class="form-control d-block" id="email" name="email" autocomplete="off" required>  
      </li>
      <li class="list-group-item">
        <label for="Nama" class="font-weight-bold">Nama</label>
        <input type="text" class="form-control d-block" id="nama" name="nama" autocomplete="off" required>
      </li>
      <li class="list-group-item">
        <label for="Alamat" class="font-weight-bold">Alamat</label>
        <input type="text" class="form-control d-block" id="alamat" name="alamat" autocomplete="off" required>
      </li>
      <li class="list-group-item">
        <label for="Jenis Kelamin" class="font-weight-bold">Jenis Kelamin</label>
        <select class="custom-select" name="jenisKelamin">
          <option value="Laki-laki" class="d-block" selected>Laki-laki</option>
          <option value="Perempuan" class="d-block">Perempuan</option>
        </select>
      </li>
      <li class="list-group-item">
        <label for="Tempat Lahir" class="font-weight-bold">Tempat Lahir</label>
        <input type="text" class="form-control d-block" id="tempatLahir" name="tempatLahir" autocomplete="off" required>
      </li>
      <li class="list-group-item">
        <label for="Tanggal Lahir" class="font-weight-bold">Tanggal Lahir</label>
        <input type="date" class="form-control d-block" id="tanggalLahir" name="tanggalLahir" required>
      </li>
      <li class="list-group-item">
        <label for="Telepon" class="font-weight-bold">Telepon</label>
        <input type="number" class="form-control d-block" id="telepon" name="telepon" autocomplete="off" required>
      </li>
      <li class="list-group-item">
        <label for="Lingkungan" class="font-weight-bold">Lingkungan</label>
        <select class="custom-select" name="lingkungan">
          <option value="A" class="d-block" selected>A</option>
          <option value="B" class="d-block">B</option>
          <option value="C" class="d-block">C</option>
          <option value="D" class="d-block">D</option>
          <option value="E" class="d-block">E</option>
          <option value="Simpatisan" class="d-block">Simpatisan</option>
        </select>
      </li>
    </ul>
    <hr>
    <div class="d-inline float-right align-items-center">
      <a href="<?= base_url('Admin')?>" class="mr-4 text-secondary" id="batal"><small>BATAL</small></a>
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

<script>
$('#message').hide();
$('#message2').hide();

let check = 0;
let check2 = 0;

function checkk(){
  if(check > 0 || check2 > 0){
    $('#simpan').hide();
  } else $('#simpan').show();
}

$('#username').keyup(function(e){
  var username = $('#username').val();
  $.ajax({
    url: "<?= base_url('Auth/checkUsername')?>",
    data: {username: username},
    type: "POST",
    dataType: "json",
    success: function(result){
      if(result == "1"){
        $('#message').show();
        check +=1;
      } else {
        $('#message').hide();
        check = 0;
      }
    checkk(); 
    }
  });
});

$('#password2').focusout(function(e){
  var password = $('#password').val();
  var password2 = $('#password2').val();
  if (password !== password2){
    $('#message2').show();
    check2 +=1;
  } else {
    $('#message2').hide();
    check2 = 0
  }
  checkk();
});

</script>