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
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Obat</h4>
                            <hr>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Kode Obat</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Kode ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Nama Obat</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Namaobat ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Satuan</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Satuan ?>" placeholder="Keluhan">
                                    </div>
                                    <div class="col-md-3">
                                    <label for="first-name-horizontal">Stok</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <input disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $totalmasuk->jumlah_totalMasuk ?>" placeholder="<?= ($totalmasuk->jumlah_totalMasuk)== null? "0":"" ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="first-name-horizontal">Keterangan</label>
                                    </div>
                                    <div class="col-md-9 form-group">
                                        <textarea disabled type="text" id="first-name-horizontal" class="form-control"
                                            value="<?= $item->Keterangan ?>" placeholder="Keluhan"><?= $item->Keterangan ?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title d-flex justify-content-between align-items-center">
                                <?= $title ?>
                                <!-- <a href="/Rekammedik/tambah" class="btn icon icon-left btn-success">
                                    Tambah Data
                                </a> -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#Tambah-data-obat">
                                    <i class="fas fa-plus"></i> Tambah Data Rekam
                                </button>
                            </h5>
                            <hr>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Asal</th>
                                        <th>Jumlah</th>
                                        <th>Catatan</th>
                                        <th align="center"><i class="fas fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $TanggaldanAsal = [];
                                    $no=1;
                                    foreach ($itemObat as $key => $value): 
                                        $datatanggalasal = $value->Tanggal . '-' . $value->Asal;
                                        if(in_array($datatanggalasal, $TanggaldanAsal))
                                        continue;
                                    $TanggaldanAsal[] = $datatanggalasal;
                                        ?>
                                    <tr class="clickable-row" data-key="<key ?>">
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td><?= $value->Tanggal ?></td>
                                        <td><?= $value->Asal ?></td>
                                        <td><?= $value->Jumlah ?></td>
                                        <td><?= $value->Catatan ?></td>
                                        <!-- <td align="center">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#Detail-item-Obat">
                                                <i class="fa-solid fa-file"></i>
                                            </button>
                                            </a>
                                        </td> -->
                                        <td align="center">
                                            <button type="button" class="btn btn-primary btn-detail"
                                                data-bs-toggle="modal" data-bs-target="#Detail-item-Obat"
                                                data-tanggal="<?= $value->Tanggal ?>" data-asal="<?= $value->Asal ?>">
                                                <i class="fa-solid fa-file"></i>
                                            </button>
                                        </td>

                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">

                </div>

            </div>
        </section>
    </div>

</div>

<!--Modal tambah item obat -->
<div class="modal fade text-left" id="Tambah-data-obat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">Tambah Obat Masuk - <?= $item->Kode ?><?= $item->Namaobat ?>
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="/Obat/itemsave" method="post">
                <?php csrf_hash() ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="first-name-horizontal" class="form-control" name="Obat_id"
                            value="<?= $item->Obat_id ?>">
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Tanggal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="date" class="form-control flatpickr-input" placeholder="Select date.."
                                name="Tanggal">
                        </div>
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Asal</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="text" id="first-name-horizontal" class="form-control" name="Asal"
                                placeholder="Asal">
                        </div>
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Catatan</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <textarea type="text" id="first-name-horizontal" class="form-control" name="Catatan"
                                placeholder="Catatan"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="first-name-horizontal">Jumlah</label>
                        </div>
                        <div class="col-md-9 form-group">
                            <input type="number" id="first-name-horizontal" class="form-control" name="Jumlah"
                                placeholder="Jumlah">
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

<!--Modal Detail item obat-->
<div class="modal fade text-left" id="Detail-item-Obat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18">Detail Obat Masuk - <?= $item->Kode ?><?= $item->Namaobat ?>
                </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped" id="detailTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Asal</th>
                                    <th>Jumlah</th>
                                    <th>Catatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Isi detail di sini melalui JavaScript -->
                            </tbody>
                        </table>
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
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const detailButtons = document.querySelectorAll(".btn-detail");

    detailButtons.forEach((button) => {
        button.addEventListener("click", function() {
            const tanggal = this.getAttribute("data-tanggal");
            const asal = this.getAttribute("data-asal");
            const detailTableBody = document.querySelector("#detailTable tbody");

            detailTableBody.innerHTML = ""; // Bersihkan isi tabel sebelumnya

            <?php foreach ($itemObat as $key => $value): ?>
            if ('<?= $value->Tanggal ?>' === tanggal && '<?= $value->Asal ?>' === asal) {
                const row = `
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $value->Tanggal ?></td>
                        <td><?= $value->Asal ?></td>
                        <td><?= $value->Jumlah ?></td>
                        <td><?= $value->Catatan ?></td>
                        <td>
                            <button 
                                class="btn btn-danger btn-delete" 
                                data-id="<?= $value->ObatMasukItem_id ?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>`;
                detailTableBody.innerHTML += row;
            }
            <?php endforeach; ?>
        });
    });

    // Tambahkan event listener untuk tombol delete
    document.addEventListener("click", function(e) {
        if (e.target.classList.contains("btn-delete")) {
            const itemId = e.target.getAttribute("data-id");
            const obatId = "<?= $item->Obat_id ?>"; // Obat_id dari konteks detail

            if (confirm(`Apakah Anda yakin ingin menghapus data ini?`)) {
                fetch(`/Obat/detail/${obatId}/delete`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "<?= csrf_hash() ?>"
                        },
                        body: JSON.stringify({
                            id: itemId
                        }) // Kirimkan ObatMasukItem_id
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            e.target.closest("tr").remove(); // Hapus baris dari tabel
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        alert("Terjadi kesalahan saat menghapus data.");
                    });
            }
        }
    });

});
</script>
<?= $this->endSection() ?>