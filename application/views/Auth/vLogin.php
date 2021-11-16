<div class="bg-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="height: 100vh">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row" style="height: 75vh; overflow-y: scroll">
                            <div class="col-lg-6 d-none d-lg-block px-0" style="background-color: black">
                                <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-caption d-none d-md-block">
                                        <!-- <h3>SIJEMAAT</h3> -->
                                        <p>GKI Kebonagung Web Services</p>
                                    </div>
                                    <div class="carousel-inner" style="opacity: 0.5;">
                                        <div class="carousel-item active">
                                            <img src="<?= base_url('assets/img/1.png') ?>" class="d-block w-100" style="object-fit: cover; height: 75vh;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= base_url('assets/img/2.png') ?>" class="d-block w-100" style="object-fit: cover; height: 75vh;">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="" class="d-block w-100" style="object-fit: cover; height: 75vh;">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 my-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-0 font-weight-bold mb-4">Selamat Datang di GKI Kebonagung Web Services!</h1>
                                        <p class="mb-4">Silahkan Login terlebih dahulu</p>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form action="<?= base_url('Auth') ?>" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" placeholder="Username atau No. Telepon" autocomplete="off" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required="required">
                                        </div>
                                        <hr>
                                        <input type="submit" href="index.html" class="btn btn-dark btn-user btn-block font-weight-bold" value="LOGIN">
                                    </form>
                                    <div class="text-center mt-4">
                                        <p>Belum punya akun? <a href="<?= base_url('Auth/register') ?>" class="text-primary text-decoration-none font-weight-bold">Daftar Sekarang</a></p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <p>Menuju ke <a href="<?= base_url('Fronts') ?>" class="text-danger text-decoration-none font-weight-bold">Halaman utama</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>