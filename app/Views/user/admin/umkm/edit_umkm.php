<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/umkmadmin/index_umkm" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar UMKM</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">EDIT DATA UMKM</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/umkmadmin/update/<?= $umkm['0']['id_umkm']; ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row ml-3">
                            <label for="oldImage"></label>
                            <input type="hidden" class="form-control" name="oldImage" value="<?= $umkm['0']['gambar']; ?>">
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="nama_umkm">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_umkm')) ? 'is-invalid' : ''; ?>" name="nama_umkm" id="nama_umkm" placeholder="Nama UMKM" value="<?= $umkm['0']['nama_umkm']; ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_umkm'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                            <div class="col-sm-4">
                                <label class="" for="gambar">
                                    <?= $umkm['0']['gambar']; ?>
                                    <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" multiple="true" name="gambar" id="gambar" value="<?= $umkm['0']['gambar']; ?>">
                                </label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="pemilik">Pemilik</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('pemilik')) ? 'is-invalid' : ''; ?>" name="pemilik" id="pemilik" placeholder="pemilik" value="<?= $umkm['0']['pemilik']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('pemilik'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="kontak">Kontak</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('kontak')) ? 'is-invalid' : ''; ?>" name="kontak" id="kontak" placeholder="kontak" value="<?= $umkm['0']['kontak']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kontak'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Isi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" id="deskripsi" class="<?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>"><?= $umkm['0']['deskripsi']; ?></textarea>
                                <script>
                                    CKEDITOR.replace('deskripsi', {
                                        width: '100%',
                                        height: '250',
                                        // Pressing Enter will create a new <div> element.
                                        enterMode: CKEDITOR.ENTER_BR,
                                        // Pressing Shift+Enter will create a new <p> element.
                                        shiftEnterMode: CKEDITOR.ENTER_P
                                    });

                                    CKEDITOR.on('dialogDefinition', function(e) {
                                        dialogName = e.data.name;
                                        dialogDefinition = e.data.definition;
                                        console.log(dialogDefinition);
                                        if (dialogName == 'image') {
                                            dialogDefinition.removeContents('Link');
                                            dialogDefinition.removeContents('advanced');
                                            var tabContent = dialogDefinition.getContents('info');
                                            tabContent.remove('txtHSpace');
                                            tabContent.remove('txtVSpace');
                                        }
                                    });
                                    CKFinder.setupCKEditor();
                                </script>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('deskripsi'); ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row ml-3">
                            <div class="col text-right mr-3">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>