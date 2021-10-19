<?= $this->extend('user/auth/templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container ">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row mb-2">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6 login">
                            <div class="p-5">
                                <div class="text-center">
                                    <br>
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                </div>
                                <hr class="">
                                <br>
                                <?php if (!empty(session()->getFlashdata('gagal'))) : ?>

                                    <div class="alert alert-warning">
                                        <?= session()->getFlashdata('gagal'); ?>
                                    </div>

                                <?php endif; ?>

                                <form class="user" action="<?= base_url(); ?>/user/login/login">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Email.....">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password.....">
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div> -->
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>