<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">DATA RESERVASI</h5>
        </div>

        <div class="card shadow mb-4">
            <div class="button ml-4 mt-2">
                <a href="<?= base_url(); ?>/user/admin/reservasiadmin/new_reservasi" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Reservasi Baru</a>
                <button type="button" name="cetak" id="cetak" data-toggle="modal" data-target="#modal_cetak_excel" class="btn btn-success"><i class="fas fa-print"></i> Cetak Laporan Excel</button>
                <button type="button" name="cetak" id="cetak" data-toggle="modal" data-target="#modal_cetak_pdf" class="btn btn-secondary"><i class="fas fa-print"></i> Cetak Laporan PDF</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Paket</th>
                                <th>No HP</th>
                                <th>Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($reservasi as $r) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $r['nama']; ?></td>
                                    <td><?= $r['alamat']; ?></td>
                                    <td><?= $r['jumlah_orang']; ?></td>
                                    <td><?= $r['tgl_reservasi']; ?></td>
                                    <td><?= $r['nama_paket']; ?></td>
                                    <td><?= $r['no_hp']; ?></td>
                                    <td><?= $r['pembayaran']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>/user/admin/reservasiadmin/edit_reservasi/<?= $r['id_reservasi']; ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?= base_url(); ?>/user/admin/reservasiadmin/delete/<?= $r['id_reservasi']; ?>" class="btn btn-danger btn-hapus swal" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                                            <i class="far fa-trash-alt"></i>
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
</div>

<script>
    $(document).ready(function() {
        $('dataTable').DataTable();
    });
</script>

<script>
    $(document).ready(function() {});
</script>

<!-- Modal Cetak Excel-->
<form action="<?= base_url(); ?>/user/admin/reservasiadmin/cetak_laporan_excel" method="post" target="_blank">
    <div class="modal fade" id="modal_cetak_excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-cetak">Cetak Laporan Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" name="startdate" id="startdate">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" name="enddate" id="enddate">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Excel</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Cetak Excel-->

<!-- Modal Cetak PDF-->
<form action="<?= base_url(); ?>/user/admin/reservasiadmin/cetak_laporan_pdf" method="post" target="_blank">
    <div class="modal fade" id="modal_cetak_pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-cetak">Cetak Laporan PDF</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" name="startdate" id="startdate">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" name="enddate" id="enddate">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary pdf"><i class="fas fa-print"></i> Cetak PDF</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Cetak PDF-->

<?= $this->endSection(); ?>

<!-- Export MPDF -->
<script>
    $('.pdf').on("click", function() {
        window.location = "<?= base_url(); ?>/user/admin/reservasiadmin/cetak_laporan_pdf";
    });
</script>
<!-- Export MPDF -->