<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">DATA PEMANDU</h5>
        </div>
        <br>
        <div class="button ml-4">
            <a href="<?= base_url(); ?>/user/admin/pemanduadmin/new_pemandu" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pemandu Baru</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th class="nomer">No</th>
                            <th class="tabel-atur">Nama</th>
                            <th class="tabel-atur">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pemandu as $p) : ?>
                            <tr>
                                <td class="nomer"><?= $i++; ?></td>
                                <td class="tabel-atur-jdl"><?= $p['nama_pemandu']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url(); ?>/user/admin/pemanduanadmin/index_pemanduan/<?= $p['id']; ?>" class="btn btn-primary"><i class="fas fa-window-restore"></i> Detail</a>
                                    <a href="<?= base_url(); ?>/user/admin/pemanduadmin/edit_pemandu/<?= $p['id']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>/user/admin/pemanduadmin/delete/<?= $p['id']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                                        <i class="far fa-trash-alt"></i> Hapus
                                    </a>
                                    <a href="<?= base_url(); ?>/user/admin/pemanduanadmin/new_pemanduan/<?= $p['id']; ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
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