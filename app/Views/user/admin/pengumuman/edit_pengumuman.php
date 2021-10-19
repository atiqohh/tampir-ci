<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/pengumumanadmin/index_pengumuman" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Pengumuman</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">EDIT DATA PENGUMUMAN</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/pengumumanadmin/update/<?= $pengumuman['0']['id_pengumuman']; ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group row ml-3">
                            <label for="oldFile"></label>
                            <input type="hidden" class="form-control" name="oldFile" value="<?= $pengumuman['0']['lampiran']; ?>">
                        </div>
                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="judul_pengumuman">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('judul_pengumuman')) ? 'is-invalid' : ''; ?>" name="judul_pengumuman" id="judul_pengumuman" placeholder="Judul pengumuman" value="<?= $pengumuman['0']['judul_pengumuman']; ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('judul_pengumuman'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="lampiran">Lampiran</label>
                            <div class="col-sm-4">
                                <label class="" for="lampiran">
                                    <?= $pengumuman['0']['lampiran']; ?>
                                    <input type="file" class="form-control <?= ($validation->hasError('lampiran')) ? 'is-invalid' : ''; ?>" multiple="true" name="lampiran" id="lampiran">
                                </label>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lampiran'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="isi_pengumuman">Isi</label>
                            <div class="col-sm-10">
                                <textarea name="isi_pengumuman" id="isi_pengumuman" class="<?= ($validation->hasError('isi_pengumuman')) ? 'is-invalid' : ''; ?>"><?= $pengumuman['0']['isi_pengumuman']; ?></textarea>
                                <script>
                                    CKEDITOR.replace('isi_pengumuman', {
                                        width: '100%',
                                        height: '200px',
                                        // Pressing Enter will create a new <div> element.
                                        enterMode: CKEDITOR.ENTER_BR,
                                        // Pressing Shift+Enter will create a new <p> element.
                                        shiftEnterMode: CKEDITOR.ENTER_P
                                    });

                                    CKEDITOR.on('dialogDefinition', function(e) {
                                        dialogName = e.data.name;
                                        dialogDefinition = e.data.definition;
                                        console.log(dialogDefinition);
                                        if (dialogName == 'File') {
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
                                    <?= $validation->getError('isi_pengumuman'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <div class="col text-right mr-3">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan pengumuman</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>