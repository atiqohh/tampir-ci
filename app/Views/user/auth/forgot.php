<?= $this->extend('user/auth/templates/index'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h2 class="h4 text-gray-900 mb-2"><?= lang('Auth.forgotPassword') ?></h2>
                                    <p class="mb-4">Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>
                                <hr>

                                <form action="<?= route_to('forgot') ?>" method="post" class="user">
                                    <?= csrf_field() ?>

                                    <div class="form-group">
                                        <label for="email"><?= lang('Auth.emailAddress') ?></label>
                                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.email') ?>
                                        </div>
                                    </div>

                                    <br>

                                    <button type="submit" class="btn btn-primary btn-block">Kirim Email</button>
                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="login.html">Sudah memiliki akun? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>