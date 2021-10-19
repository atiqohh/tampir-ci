<?= $this->extend('user/admin/templates/index'); ?>

<?= $this->section('page-content'); ?>


<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="content-wrapper">
                <div class="page-content fade-in-up">
                    <div class="row">

                        <!-- Reservasi Hari Ini -->
                        <div class="col-xl-6 col-md-6 h-100">
                            <div class="card border-left-primary shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-1">
                                                RESERVASI HARI INI
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $today; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Reservasi Hari Ini -->

                        <!-- Reservasi Bulan Ini -->
                        <div class="col-xl-6 col-md-6 h-100">
                            <div class="card border-left-primary shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-primary text-uppercase mb-1">
                                                RESERVASI BULAN INI
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $month; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Reservasi Bulan Ini -->
                    </div>

                    <br>

                    <div class="row">
                        <!-- Reservasi Paket Platinum -->
                        <div class="col-xl-4 col-md-6 h-100">
                            <div class="card border-left-platinum shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-platinum text-uppercase mb-1">
                                                RESERVASI PLATINUM<br>HARI INI
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $platinum; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Reservasi Paket Platinum -->

                        <!-- Reservasi Paket Gold -->
                        <div class="col-xl-4 col-md-6 h-100">
                            <div class="card border-left-gold shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-gold text-uppercase mb-1">
                                                RESERVASI GOLD <br>HARI INI
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $gold; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Reservasi Paket Gold -->

                        <!-- Reservasi Paket Silver -->
                        <div class="col-xl-4 col-md-6 h-100">
                            <div class="card border-left-silver shadow">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class=" font-weight-bold text-silver text-uppercase mb-1">
                                                RESERVASI SILVER <br>HARI INI
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="h3 mb-0 font-weight-bold text-gray-800"><?= $silver; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Reservasi Paket Silver -->
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary text-center">Reservasi Hari Ini (<?= date('d-m-Y'); ?>)</h5>
                                </div>
                                <div class="card-body ibox-body">
                                    <?php if ($today == '0') : ?>
                                        <h6 class="m-0 font-weight-bold text-center">Tidak Ada Reservasi Hari Ini</h6>
                                    <?php else : ?>
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>NO</th>
                                                        <th>Nama</th>
                                                        <th>Jumlah</th>
                                                        <th>Tanggal</th>
                                                        <th>Paket</th>
                                                        <th>No HP</th>
                                                        <th>Bayar</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $i = 1; ?>
                                                    <?php foreach ($reservasi as $r) : ?>
                                                        <tr>
                                                            <td><?= $i++; ?></td>
                                                            <td><?= $r['nama']; ?></td>
                                                            <td><?= $r['jumlah_orang']; ?></td>
                                                            <td><?= $r['tgl_reservasi']; ?></td>
                                                            <td><?= $r['nama_paket']; ?></td>
                                                            <td><?= $r['no_hp']; ?></td>
                                                            <td><?= $r['pembayaran']; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary text-center">Reservasi Tahun <?= date('Y'); ?></h5>
                                </div>
                                <div class="card-body ibox-body">
                                    <canvas id="reservasi" height="120"></canvas>
                                    <script>
                                        var month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                        var ctx = document.getElementById('reservasi').getContext('2d');
                                        var reservasi = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: month,
                                                datasets: [{
                                                    label: 'Jumlah Reservasi',
                                                    data: [
                                                        <?= $jan; ?>, <?= $feb; ?>, <?= $mar; ?>, <?= $apr; ?>,
                                                        <?= $mei; ?>, <?= $juni; ?>, <?= $juli; ?>, <?= $ags; ?>,
                                                        <?= $sep; ?>, <?= $okt; ?>, <?= $nov; ?>, <?= $des; ?>
                                                    ],
                                                    backgroundColor: 'rgb(144, 238, 144)',
                                                    borderColor: 'rgb(144, 238, 144)',
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <h5 class="m-0 font-weight-bold text-primary text-center">Reservasi Paket Per Bulan Tahun <?= date('Y'); ?></h5>
                                </div>
                                <div class="card-body ibox-body">
                                    <canvas id="revPaket" height="120"></canvas>
                                    <script>
                                        var ctx = document.getElementById('revPaket').getContext('2d');
                                        var revPaket = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                                                datasets: [{
                                                        label: 'Paket Platinum',
                                                        data: [
                                                            <?= $platjan; ?>, <?= $platfeb; ?>, <?= $platmar; ?>, <?= $platapr; ?>,
                                                            <?= $platmei; ?>, <?= $platjuni; ?>, <?= $platjuli; ?>, <?= $platags; ?>,
                                                            <?= $platsep; ?>, <?= $platokt; ?>, <?= $platnov; ?>, <?= $platdes; ?>
                                                        ],
                                                        backgroundColor: 'rgb(132, 231, 255)',
                                                        borderColor: 'rgb(132, 231, 255)',
                                                        borderWidth: 1
                                                    },
                                                    {
                                                        label: 'Paket Gold',
                                                        data: [
                                                            <?= $goldjan; ?>, <?= $goldfeb; ?>, <?= $goldmar; ?>, <?= $goldapr; ?>,
                                                            <?= $goldmei; ?>, <?= $goldjuni; ?>, <?= $goldjuli; ?>, <?= $goldags; ?>,
                                                            <?= $goldsep; ?>, <?= $goldokt; ?>, <?= $goldnov; ?>, <?= $golddes; ?>
                                                        ],
                                                        backgroundColor: 'rgb(255,215,0)',
                                                        borderColor: 'rgb(255,215,0)',
                                                        borderWidth: 1
                                                    },
                                                    {
                                                        label: 'Paket Silver',
                                                        data: [
                                                            <?= $siljan; ?>, <?= $silfeb; ?>, <?= $silmar; ?>, <?= $silapr; ?>,
                                                            <?= $silmei; ?>, <?= $siljuni; ?>, <?= $siljuli; ?>, <?= $silags; ?>,
                                                            <?= $silsep; ?>, <?= $silokt; ?>, <?= $silnov; ?>, <?= $sildes; ?>
                                                        ],
                                                        backgroundColor: 'rgb(192, 192, 192)',
                                                        borderColor: 'rgb(192, 192, 192)',
                                                        borderWidth: 1
                                                    }
                                                ]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
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