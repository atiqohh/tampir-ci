<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/artikeladmin/index_artikel" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Artikel</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">TAMBAH DATA ARTIKEL</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/artikeladmin/save" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="judul_artikel">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('judul_artikel')) ? 'is-invalid' : ''; ?>" name="judul_artikel" id="judul_artikel" placeholder="Judul Artikel" value="<?= old('judul_artikel'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul_artikel'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" multiple="true" name="gambar" id="gambar" value="<?= old('gambar'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="isi_artikel">Isi</label>
                            <div class="col-sm-10">
                                <textarea name="isi_artikel" id="isi_artikel" class="<?= ($validation->hasError('isi_artikel')) ? 'is-invalid' : ''; ?>" value="<?= old('isi_artikel'); ?>"><?= old('isi_artikel'); ?></textarea>
                                <script>
                                    CKEDITOR.replace('isi_artikel', {
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
                                            // dialogDefinition.removeContents('Link');
                                            dialogDefinition.removeContents('advanced');
                                            var tabContent = dialogDefinition.getContents('info');
                                            tabContent.remove('txtHSpace');
                                            tabContent.remove('txtVSpace');
                                        }
                                    });

                                    CKFinder.setupCKEditor();
                                </script>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('isi_artikel'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <div class="col text-right mr-3">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan Artikel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>