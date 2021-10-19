<html>

<head>
    <style>
        .judul {
            text-align: center;
            text-decoration: bold;
        }

        .head {
            width: 130px;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
        }

        table {
            padding-left: 20px;
        }

        tr {
            line-height: 30px;
        }

        .cap {
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <h3 class="judul">BUKTI RESERVASI</h3>
    <hr>
    <table>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td class="head">Nama</td>
            <td class="cap">: <?= $nama; ?></td>
        </tr>
        <tr>
            <td class="head">Paket</td>
            <td>: <?= $paket; ?></td>
        </tr>
        <tr>
            <td class="head">Alamat</td>
            <td class="cap">: <?= $alamat; ?></td>
        </tr>
        <tr>
            <td class="head">Jumlah Orang</td>
            <td>: <?= $jumlah_orang; ?></td>
        </tr>
        <tr>
            <td class="head">Tanggal Reservasi</td>
            <td>: <?= $tgl_reservasi; ?></td>
        </tr>
        <tr>
            <td class="head">No HP</td>
            <td>: <?= $no_hp; ?></td>
        </tr>
        <tr>
            <td></td>
        </tr>
    </table>
    <hr>
    <h5>* Simpan bukti reservasi ini untuk konfimasi reservasi.</h5>
    <h5>* Konfirmasi reservasi dilakukan dengan mengirimkan bukti reservasi dan bukti pembayaran uang muka kepada narahubung. </h5>
</body>

</html>