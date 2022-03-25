<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        body {
            font-family: Arial;
            color: black;
        }

        @media print {
            .kembali {
                display: none;
            }
        }

        tr {
            color: black;
        }
    </style>
</head>

<body>
    <a href="<?= base_url('admin/laporanGaji') ?>" class="btn kembali btn-primary btn-sm">Kembali</a>
    <h1 class="text-center">PT. DIE Art'S Indonesia</h1>
    <h2 class="text-center">Data Gaji Pegawai</h2>

    <?php
    if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan . $tahun;
        switch ($bulan) {
            case '1':
                $bulan = "Januari";
                break;
            case '2':
                $bulan = "Februari";
                break;
            case '3':
                $bulan = "Maret";
                break;
            case '4':
                $bulan = "April";
                break;
            case '5':
                $bulan = "Mei";
                break;
            case '6':
                $bulan = "Juni";
                break;
            case '7':
                $bulan = "Juli";
                break;
            case '8':
                $bulan = "Agustus";
                break;
            case '9':
                $bulan = "September";
                break;
            case '10':
                $bulan = "Oktober";
                break;
            case '11':
                $bulan = "Nofember";
                break;
            case '12':
                $bulan = "Desember";
                break;
        }
    } else {
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan . $tahun;
        switch ($bulan) {
            case '1':
                $bulan = "Januari";
                break;
            case '2':
                $bulan = "Februari";
                break;
            case '3':
                $bulan = "Maret";
                break;
            case '4':
                $bulan = "April";
                break;
            case '5':
                $bulan = "Mei";
                break;
            case '6':
                $bulan = "Juni";
                break;
            case '7':
                $bulan = "Juli";
                break;
            case '8':
                $bulan = "Agustus";
                break;
            case '9':
                $bulan = "September";
                break;
            case '10':
                $bulan = "Oktober";
                break;
            case '11':
                $bulan = "Nofember";
                break;
            case '12':
                $bulan = "Desember";
                break;
        }
    }
    ?>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td><?= $bulan; ?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?= $tahun; ?></td>
        </tr>
    </table>

    <table class="table table-bordered table-hover table-secondary">
        <tr class="bg-dark">
            <th class="text-center">No</th>
            <th class="text-center">NIK</th>
            <th class="text-center">Nama Pegawai</th>
            <th class="text-center">J. Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tj. Trasnport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Potongan</th>
            <th class="text-center">Total Gaji</th>
        </tr>
        <?php foreach ($pot_alpa as $row) {
            $alpa = $row->jml_potongan;
        } ?>
        <?php foreach ($pot_sakit as $row) {
            $sakit = $row->jml_potongan;
        } ?>
        <?php foreach ($pot_ijin as $row) {
            $ijin = $row->jml_potongan;
        } ?>
        <?php $no = 1;
        foreach ($cetakGaji as $row) : ?>
            <?php
            $pot_alpa = $row->alpa * $alpa;
            $pot_sakit = $row->sakit * $sakit;
            $pot_ijin = $row->ijin * $ijin;
            $potongan = $pot_alpa + $pot_sakit + $pot_ijin;
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nik; ?></td>
                <td><?= $row->nama_pegawai; ?></td>
                <td><?= $row->jenis_kelamin; ?></td>
                <td><?= $row->nama_jabatan; ?></td>
                <td>Rp.<?= number_format($row->gaji_pokok, 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($row->tj_transport, 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($row->uang_makan, 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($potongan, 0, ',', '.'); ?></td>
                <td>Rp.<?= number_format($row->gaji_pokok + $row->tj_transport + $row->uang_makan - $potongan, 0, ',', '.'); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table width="95%">
        <tr>
            <td></td>
            <td width="200px">
                <p class="text-center">Bondowoso, <?= date('d M Y'); ?><br> Bag. Keuangan</p>
                <br>
                <br>
                <br>
                <p class="text-center">______________________</p>
            </td>
        </tr>
    </table>

</body>

</html>

<script>
    window.print();
</script>