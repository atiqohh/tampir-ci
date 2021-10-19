<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">GALERI</h5>
        </div>
        <br>
        <div class="button ml-4">
            <a href="<?= base_url(); ?>/user/admin/galeriadmin/new_galeri" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Gambar Baru</a>
        </div>
        <div class="card-body">
            <section id="portfolio" class="portfolio">
                <div class="row portfolio-container " data-aos="fade-up">
                    <?php foreach ($galeri as $g) : ?>
                        <div class="col-lg-3 col-md-6 portfolio-item filter-app " data-aos="fade-up">
                            <a href="" name="galeri" id="galeri" data-toggle="modal" data-target="#modal_galeri">
                                <img src="<?= base_url('img/galeri/' . $g['gambar']); ?>" class="img-fluid imggaleri" alt="">
                            </a>
                            <div class="row">
                                <div class="portfolio-info">
                                    <h4><?= $g['ket']; ?></h4>
                                    <a href="<?= base_url(); ?>/user/admin/galeriadmin/delete/<?= $g['id']; ?>" class="swal details-link btn-hapus" data-swal="<?= session()->getFlashdata('pesan'); ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <a href="<?= base_url('/user/admin/galeriadmin/edit_galeri/' . $g['id']); ?>" class="preview-link"><i class="far fa-edit"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <nav class="blog-pagination justify-content-center d-flex">
                    <?= $pager->links('galeri', 'pagination') ?>
                </nav>
            </section>
        </div>
    </div>
</div>

<!-- Modal Galeri-->
<!-- <div class="modal fade" id="modal_galeri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-Galeri"><?= $g['ket']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="<?= base_url('img/galeri/' . $g['gambar']); ?>" class="img-fluid" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="<?= base_url(); ?>/user/admin/galeri/delete/<?= $g['id']; ?>" class="btn btn-danger btn-hapus swal details-link " data-swal="<?= session()->getFlashdata('pesan'); ?>">
                    <i class="far fa-trash-alt"></i>
                </a>
            </div>
        </div>
    </div>
</div> -->
<!-- End Modal Galeri-->

<?= $this->endSection(); ?>