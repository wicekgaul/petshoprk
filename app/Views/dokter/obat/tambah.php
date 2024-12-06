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
                            <li class="breadcrumb-item"><a href="<?= $href ?>">Dashboard</a></li>
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
                        <form class="form" action="/Obat/save" method="post">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="first-name-horizontal">Kode Obat</label>
                                </div>
                                <div class="col-md-9 form-group">
                                    <textarea type="text" id="first-name-horizontal" class="form-control" name="Kode"
                                        placeholder="Kode"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label for="first-name-horizontal">Nama Obat</label>
                                </div>
                                <div class="col-md-9 form-group">
                                    <textarea type="text" id="first-name-horizontal" class="form-control" name="Nama"
                                        placeholder="Nama"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label for="first-name-horizontal">Satuan</label>
                                </div>
                                <div class="col-md-9 form-group">
                                    <textarea type="text" id="first-name-horizontal" class="form-control" name="Satuan"
                                        placeholder="Satuan"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label for="first-name-horizontal">Keterangan</label>
                                </div>
                                <div class="col-md-9 form-group">
                                    <textarea type="text" id="first-name-horizontal" class="form-control" name="Keterangan"
                                        placeholder="Keterangan"></textarea>
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