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
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pemilik</h4>
                            <hr>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Nama</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->NamaPemilik ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Alamat</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Alamat ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Telepon</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Telepon ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Email ?>" placeholder="Keluhan">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Peliharaan</h4>
                            <hr>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Nama</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->NamaPeliharaan ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Jenis</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Jenis ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Ras</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Ras ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Email</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Email ?>" placeholder="Keluhan">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between align-items-center">
                                <?= $title ?>
                                <!-- <a href="/Rekammedik/tambah" class="btn icon icon-left btn-success">
                                    Tambah Data
                                </a> -->
                                <div>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#Tambah-data-rekam">
                                        <i class="fas fa-plus"></i> Tambah Data Rekam
                                    </button>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#Catatan">
                                        <i class="fas fa-plus"></i> Tambah Catatan
                                    </button>
                                </div>
                            </h5>
                            <hr>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Riwayat</th>
                                        <th>Keluhan</th>
                                        <th>Penanganan</th>
                                        <th>Resep</th>
                                        <th align="center"><i class="fas fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rekam as $key => $value): ?>
                                    <tr class="clickable-row" data-key="<?= $key ?>">
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value->Tanggal ?></td>
                                        <td><?= $value->Keluhan ?></td>
                                        <td><?= $value->Penanganan ?></td>
                                        <td><?= $value->Resep ?></td>
                                        <td align="center">
                                            <a href="/Rekammedik/detail/<?= $value->Peliharaan_id ?>"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-file"></i>
                                            </a>
                                            <a href="/Rekammedik/deletedetail/<?= $value->RekamMediks_id ?>"
                                                class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="detail-row" id="detail-<?= $key ?>" style="display: none;">
                                        <td colspan="6">
                                            <!-- Tambahkan detail yang ingin ditampilkan di sini -->
                                            <p><strong>Detail:</strong></p>
                                            <p>Tanggal: <?= $value->Tanggal ?></p>
                                            <p>Keluhan: <?= $value->Keluhan ?></p>
                                            <p>Penanganan: <?= $value->Penanganan ?></p>
                                            <p>Resep: <?= $value->Resep ?></p>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

</div>

<!--Default size Modal -->
<div class="modal fade text-left" id="Tambah-data-rekam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">Tambah Data Rekam Medik <?= $item->NamaPeliharaan ?></h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="/Rekammedik/rekam" method="post">
                <?php csrf_hash() ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="first-name-horizontal" class="form-control" name="Peliharaan_id"
                            value="<?= $item->Peliharaan_id ?>">
                        <input type="hidden" id="first-name-horizontal" class="form-control" name="Dokter_id"
                            value="<?= $item->Dokter_id ?>">
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Keluhan</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <textarea type="text" id="first-name-horizontal" class="form-control" name="Keluhan"
                                placeholder="Keluhan"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Penanganan</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <textarea type="text" id="first-name-horizontal" class="form-control" name="Penanganan"
                                placeholder="Penanganan"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Resep</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <textarea type="text" id="first-name-horizontal" class="form-control" name="Resep"
                                placeholder="Resep"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Tanggal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="date" class="form-control flatpickr-input" placeholder="Select date.."
                                name="Tanggal">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection() ?>