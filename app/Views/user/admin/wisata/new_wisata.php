<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/wisataadmin/index_wisata" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Wisata</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">EDIT DATA TEMPAT WISATA</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/wisataadmin/save" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="nama_wisata">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_wisata')) ? 'is-invalid' : ''; ?>" name="nama_wisata" id="nama_wisata" placeholder="Nama tempat wisata" value="<?= old('nama_wisata'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_wisata'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="gambar">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" multiple="true" name="gambar" id="gambar" value="<?= old('gambar'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="harga_tiket">Harga Tiket</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('harga_tiket')) ? 'is-invalid' : ''; ?>" name="harga_tiket" id="harga_tiket" placeholder="Harga tiket masuk tempat wisata" value="<?= old('harga_tiket'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga_tiket'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="hari_operasi">Hari Operasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('hari_operasi')) ? 'is-invalid' : ''; ?>" name="hari_operasi" id="hari_operasi" placeholder="Hari operasi tempat wisata" value="<?= old('hari_operasi'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('hari_operasi'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="jam_operasi">Jam Operasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('jam_operasi')) ? 'is-invalid' : ''; ?>" name="jam_operasi" id="jam_operasi" placeholder="Jam operasi tempat wisata" value="<?= old('jam_operasi'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jam_operasi'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="lokasi">Lokasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" name="lokasi" id="lokasi" placeholder="Lokasi tempat wisata" value="<?= old('lokasi'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lokasi'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="fasilitas">Fasilitas</label>
                            <div class="col-sm-10">
                                <textarea name="fasilitas" id="fasilitas" class="<?= ($validation->hasError('fasilitas')) ? 'is-invalid' : ''; ?>"><?= old('fasilitas'); ?></textarea>
                                <script>
                                    CKEDITOR.replace('fasilitas', {
                                        width: '100%',
                                        height: '150',
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
                                    <?= $validation->getError('fasilitas'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="deskripsi" id="deskripsi" class="<?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>"><?= old('deskripsi'); ?></textarea>
                                <script>
                                    CKEDITOR.replace('deskripsi', {
                                        width: '100%',
                                        height: '150',
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
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan wisata</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>