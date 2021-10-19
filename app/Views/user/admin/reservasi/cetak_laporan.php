<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td {
            border: 1px solid #000000;
            height: 20px;
            margin: 8px;
        }

        th {
            vertical-align: middle;
            text-align: center;
            border: 1px solid #000000;
            height: 20px;
            margin: 8px;
        }

        .no {
            width: 30pt;
            text-align: center;
        }

        .center {
            text-align: center;
        }

        .judul {
            text-align: center;
            text-decoration: bold;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <h3 class="judul">DATA RESERVASI</h3>
    <br>
    <h4>Periode : <?= $startdate; ?> - <?= $enddate; ?></h4>
    <br>
    <div class="table">
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                    <th>Paket Wisata</th>
                    <th>No HP</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($reservasi as $r) : ?>
                    <tr>
                        <td class="no"><?= $i++; ?></td>
                        <td><?= $r['nama']; ?></td>
                        <td><?= $r['alamat']; ?></td>
                        <td class="center"><?= $r['jumlah_orang']; ?></td>
                        <td><?= $r['tgl_reservasi']; ?></td>
                        <td><?= $r['nama_paket']; ?></td>
                        <td><?= $r['no_hp']; ?></td>
                        <td><?= $r['pembayaran']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>