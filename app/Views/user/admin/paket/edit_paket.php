<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">

    <div class="row mb-2 ml-2">
        <a href="<?= base_url(); ?>/user/admin/paketadmin/index_paket" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Daftar Paket</a>
    </div>
    <div class="card shadow mb-4">
        <div class="col">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-center">EDIT DATA PAKET WISATA</h6>
                    </div>
                </div>
                <br>
                <div class="ibox-body">
                    <form class="form-horizontal" id="form-sample-1" method="post" action="<?= base_url(); ?>/user/admin/paketadmin/update/<?= $paket['0']['id_paket']; ?>" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="nama_paket">Nama Paket</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('nama_paket')) ? 'is-invalid' : ''; ?>" name="nama_paket" id="nama_paket" placeholder="Nama paket wisata" value="<?= $paket['0']['nama_paket']; ?>" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_paket'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="harga_paket">Harga Paket</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('harga_paket')) ? 'is-invalid' : ''; ?>" name="harga_paket" id="harga_paket" placeholder="Harga paket wisata" value="<?= $paket['0']['harga_paket']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga_paket'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ml-3">
                            <label class="col-sm-2 col-form-label" for="fasilitas">Fasilitas</label>
                            <div class="col-sm-10">
                                <textarea name="fasilitas" id="fasilitas" class="<?= ($validation->hasError('fasilitas')) ? 'is-invalid' : ''; ?>"><?= $paket['0']['fasilitas']; ?></textarea>
                                <script>
                                    CKEDITOR.replace('fasilitas', {
                                        width: '100%',
                                        height: '150px',
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
                            <div class="col text-right mr-3">
                                <button type="submit" class="btn btn-primary swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"><i class="fas fa-save"></i> Simpan paket</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?= $this->endSection(); ?>