<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<div id="main-content">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?= $title ?></h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?= $title ?>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <hr>
        <section class="section">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/Dokter/save" method="post">
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Nama Dokter</label>
                                        <input type="text" id="last-name-column" class="form-control form-control-lg"
                                            placeholder="Nama Dokter" name="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name-column">Email</label>
                                        <input type="text" id="last-name-column" class="form-control form-control-lg"
                                            placeholder="Email" name="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name-column">Username</label>
                                        <input type="text" id="last-name-column" class="form-control form-control-lg"
                                            placeholder="Username" name="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="city-column">Password</label>
                                        <input type="Password" id="city-column" class="form-control form-control-lg" placeholder="Password"
                                            name="Password">
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Jenis Kelamin</label>
                                        <input type="text" id="country-floating" class="form-control form-control-lg"
                                            name="JenisKelamin" placeholder="JenisKelamin">
                                    </div>
                                    <div class="form-group">
                                        <label for="company-column">Telepon</label>
                                        <input type="text" id="company-column" class="form-control form-control-lg"
                                            name="Telepon" placeholder="Telepon">
                                    </div>
                                    <div class="form-group">
                                        <label for="company-column">Alamat</label>
                                        <textarea type="text" id="company-column" class="form-control form-control-lg"
                                            name="Alamat" placeholder="Alamat"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
    </div>

    </section>
</div>

</div>

<?= $this->endSection() ?>