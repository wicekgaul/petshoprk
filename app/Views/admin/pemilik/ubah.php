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
                            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
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
                        <form class="form form-horizontal"
                            action="/Pemilik/update/" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="Pemilik_id" value="<?= $item['Pemilik_id']; ?>">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Nama</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="text" id="first-name-horizontal" class="form-control" name="Nama"
                                            value="<?= $item['Nama']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="contact-info-horizontal">Mobile</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="number" id="contact-info-horizontal" class="form-control"
                                            name="Telepon" placeholder="Mobile" value="<?= $item['Telepon']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email-horizontal">Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input type="email" id="email-horizontal" class="form-control" name="Email"
                                            placeholder="Email" value="<?= $item['Email']; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Alamat">Alamat</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <textarea type="text" id="Alamat" class="form-control" name="Alamat"
                                            placeholder="Alamat"><?= $item['Alamat']; ?></textarea>
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
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