<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">DATA UMKM TAMPIR KULON</h5>
        </div>
        <br>
        <div class="button ml-4">
            <a href="<?= base_url(); ?>/user/admin/umkmadmin/new_umkm" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah UMKM Baru</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="nomer">NO</th>
                            <th>Nama UMKM</th>
                            <th>Pemilik</th>
                            <th>Kontak</th>
                            <th class="tabel-atur">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($umkm as $um) : ?>
                            <tr>
                                <td class="nomer"><?= $i++; ?></td>
                                <td><?= $um['nama_umkm']; ?></td>
                                <td><?= $um['pemilik']; ?></td>
                                <td><?= $um['kontak']; ?></td>
                                <td class="tabel-atur">
                                    <a href="<?= base_url(); ?>/user/admin/umkmadmin/detail_umkm/<?= $um['id_umkm']; ?>" class="btn btn-primary"><i class="fas fa-window-restore"></i> Detail</a>
                                    <a href="<?= base_url(); ?>/user/admin/umkmadmin/edit_umkm/<?= $um['id_umkm']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>/user/admin/umkmadmin/delete/<?= $um['id_umkm']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
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