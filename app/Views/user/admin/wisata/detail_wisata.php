<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800"><b>DETAIL TEMPAT WISATA</b></h1>
    </div>

    <div class="row">

        <!-- Basic Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary text-center judul"><?= $wisata['0']['nama_wisata']; ?></h5>
            </div>
            <div class="card-header py-3">
                <div class="row">
                    <div class="col">
                        <a href="<?= base_url(); ?>/user/admin/wisataadmin/index_wisata" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Wisata</a>
                    </div>
                    <div class="col text-right">
                        <a href="<?= base_url(); ?>/user/admin/wisataadmin/edit_wisata/<?= $wisata['0']['id_wisata']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <?= csrf_field(); ?>
                        <a href="<?= base_url(); ?>/user/admin/wisataadmin/delete/<?= $wisata['0']['id_wisata']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                            <i class="far fa-trash-alt"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($wisata['0']['gambar'] != NULL) : ?>
                <div class="card-img">
                    <div class="row mt-1">
                        <img src="<?= base_url(); ?>/img/wisata/<?= $wisata['0']['gambar']; ?>" class="gambar" alt="image" width="600px">
                    </div>
                </div>
            <?php endif; ?>
            <div class="card-body align-items-center">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Harga Tiket </b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $wisata['0']['harga_tiket']; ?>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Hari Operasi</b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $wisata['0']['hari_operasi']; ?>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Jam Operasi </b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $wisata['0']['jam_operasi']; ?>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Lokasi </b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $wisata['0']['lokasi']; ?>
                                </div>
                            </div>
                        </li>

                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-row" style="width: 26%">
                                    <b>Fasilitas</b>
                                </div>
                                <div class="col-row" style="width: 2%">
                                    <b>: </b>
                                </div>
                                <div class="col" style="width: 72%">
                                    <?= $wisata['0']['fasilitas']; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="row">
                        <p class="card-text text-justify"><?= $wisata['0']['deskripsi']; ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection(); ?>