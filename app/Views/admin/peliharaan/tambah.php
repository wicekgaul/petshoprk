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
                        <form class="form" action="/Peliharaan/save" method="post">
                            <div class="row">
                                <!-- Left Column -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="last-name-column">Nama Pemilik</label>
                                        <select class="choices form-select" style="width: 100%;" name="Pemilik_id">
                                            <option>Pilih Nama Pemilik</option>
                                            <?php foreach ($pemilik as $key => $value): ?>
                                            <option value="<?= $value->Pemilik_id ?>"><?= $value->Nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="last-name-column">Nama Hewan</label>
                                        <input type="text" id="last-name-column" class="form-control form-control-lg"
                                            placeholder="Nama Hewan" name="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="city-column">Jenis</label>
                                        <input type="text" id="city-column" class="form-control form-control-lg" placeholder="Jenis"
                                            name="Jenis">
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="country-floating">Ras</label>
                                        <input type="text" id="country-floating" class="form-control form-control-lg"
                                            name="Ras" placeholder="Ras">
                                    </div>
                                    <div class="form-group">
                                        <label for="company-column">Usia</label>
                                        <input type="text" id="company-column" class="form-control form-control-lg"
                                            name="Usia" placeholder="Usia">
                                    </div>
                                    <div class="form-group">
                                        <label for="company-column">Berat Badan</label>
                                        <input type="text" id="company-column" class="form-control form-control-lg"
                                            name="BeratBadan" placeholder="Berat Badan">
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