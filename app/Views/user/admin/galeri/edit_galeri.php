<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/galeriadmin/index_galeri" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Galeri</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">EDIT GAMBAR</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/galeriadmin/update/<?= $galeri['0']['id']; ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="">
                            <label for="oldImage"></label>
                            <input type="hidden" class="form-control" name="oldImage" value="<?= $galeri['0']['gambar']; ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 card-img mb-5">
                                <img src="<?= base_url('img/galeri/' . $galeri['0']['gambar']); ?>" alt="" class="galeridetail">
                            </div>

                            <div class="col">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="gambar">Gambar</label>
                                    <div class="col-sm-7">
                                        <label class="" for="gambar">
                                            <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" multiple="true" name="gambar" id="gambar" value="<?= $galeri['0']['gambar']; ?>">
                                        </label>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('gambar'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="ket">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="ket" id="ket" placeholder="Keterangan gambar" value="<?= $galeri['0']['ket']; ?>">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col text-right mr-3">
                                        <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan Gambar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>