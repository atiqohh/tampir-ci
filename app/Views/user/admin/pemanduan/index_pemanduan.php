<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Detail Data Pemandu: <?= $pemandu['0']['nama_pemandu']; ?></h5>
        </div>
        <br>

        <?php if (isset($pemandu['0']['id'])) : ?>
            <div class="button ml-4">
                <a href="<?= base_url(); ?>/user/admin/pemanduanadmin/new_pemanduan/<?= isset($pemandu['0']['id']); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data Baru</a>
            </div>
        <?php endif; ?>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr>
                            <th class="nomer">No</th>
                            <th class="tbl">Tanggal</th>
                            <th class="tbl">Waktu</th>
                            <th class="tbl">Jumlah</th>
                            <th class="tabel-atur">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pemandu as $p) : ?>
                            <tr>
                                <td class="nomer"><?= $i++; ?></td>
                                <td class="tbl"><?= $p['tanggal']; ?></td>
                                <td class="tbl"><?= $p['waktu']; ?></td>
                                <td class="tbl"><?= $p['jumlah']; ?></td>
                                <td class="tabel-atur">
                                    <a href="<?= base_url(); ?>/user/admin/pemanduanadmin/edit_pemanduan/<?= $p['id_pemanduan']; ?>" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url(); ?>/user/admin/pemanduanadmin/delete/<?= $p['id_pemanduan']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
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