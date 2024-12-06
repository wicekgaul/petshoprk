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
                        <a href="/Peliharaan/tambah" class="btn icon icon-left btn-success">
                            Tambah Data
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <th>No</th>
                            <th>Nama Pemilik</th>
                            <th>Nama Hewan</th>
                            <th>Jenis Hewan</th>
                            <th>Ras</th>
                            <th>Usia</th>
                            <th>Berat Badan</th>
                            <th align="center"><i class="fas fa-cogs"></i></th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $key => $value): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value->pemilik_Nama ?></td>
                                <td><?= $value->Nama ?></td>
                                <td><?= $value->Jenis ?></td>
                                <td><?= $value->Ras ?></td>
                                <td><?= $value->Usia ?></td>
                                <td><?= $value->BeratBadan ?></td>
                                <td align="center">
                                    <a href="/Peliharaan/ubah/<?= $value->Peliharaan_id ?>"
                                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="/Peliharaan/delete/<?= $value->Peliharaan_id ?>"
                                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

</div>

<?= $this->endSection() ?>