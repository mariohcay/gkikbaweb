<body class="bg-dark">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru</h1>
              </div>
              <?= $this->session->flashdata('message');?>
              <form action="<?= base_url('Auth/register')?>" method="POST" class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="username" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" placeholder="Nama Lengkap" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="pass1" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="pass2" placeholder="Konfirmasi Password" required="required">
                </div>
                <hr>
                <input type="submit" href="login.html" class="btn btn-dark btn-user btn-block font-weight-bold" value="DAFTAR">
              </form>
              <div>
                <div class="text-center mt-4">
                  <p class=>Sudah punya akun? <a href="<?= base_url('Auth')?>" class="text-primary font-weight-bold">Login Sekarang</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>