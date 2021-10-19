<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">DATA TEMPAT WISATA TAMPIR KULON</h5>
        </div>
        <br>
        <div class="button ml-4">
            <a href="<?= base_url(); ?>/user/admin/wisataadmin/new_wisata" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Wisata Baru</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="nomer">NO</th>
                            <th class="">Nama</th>
                            <th class="text-center">Harga Tiket</th>
                            <th class="text-center">Hari Operasi</th>
                            <th class="text-center">Jam Operasi</th>
                            <th class="tabel-atur">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($wisata as $w) : ?>
                            <tr>
                                <td class="nomer"><?= $i++; ?></td>
                                <td><?= $w['nama_wisata']; ?></td>
                                <td class="text-center"><?= $w['harga_tiket']; ?></td>
                                <td class="text-center"><?= $w['hari_operasi']; ?></td>
                                <td class="text-center"><?= $w['jam_operasi']; ?></td>
                                <td class="tabel-atur">
                                    <a href="<?= base_url(); ?>/user/admin/wisataadmin/detail_wisata/<?= $w['id_wisata']; ?>" class="btn btn-primary"><i class="fas fa-window-restore"></i> Detail</a>
                                    <a href="<?= base_url(); ?>/user/admin/wisataadmin/edit_wisata/<?= $w['id_wisata']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>/user/admin/wisataadmin/delete/<?= $w['id_wisata']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                                        <i class="far fa-trash-alt"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('dataTable').DataTable();
    });
</script>

<?= $this->endSection(); ?>