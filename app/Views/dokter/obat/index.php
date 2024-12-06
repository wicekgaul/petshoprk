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
                    <h5 class="card-title d-flex justify-content-between align-items-center">
                        <?= $title ?>
                        <a href="/Obat/tambah" class="btn icon icon-left btn-success">
                            Tambah Data
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Obat</th>
                            <th>Satuan</th>
                            <th>Keterangan</th>
                            <th align="center"><i class="fas fa-cogs"></i></th>
                        </thead>
                        <tbody>
                            <?php $no=1;
                            foreach ($obat as $key => $value):?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->Kode ?></td>
                                <td><?= $value->Nama ?></td>
                                <td><?= $value->Satuan ?></td>
                                <td><?= $value->Keterangan ?></td>
                                <td align="center">
                                    <a href="/Obat/detail/<?= $value->Obat_id ?>"
                                        class="btn btn-primary btn-sm"><i class="fa-solid fa-file"></i></a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>

        </section>
    </div>

</div>

<?= $this->endSection() ?>