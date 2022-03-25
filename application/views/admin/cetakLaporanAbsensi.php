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
    <a href="<?= base_url('admin/laporanAbsensi') ?>" class="btn kembali btn-primary btn-sm">Kembali</a>
    <h1 class="text-center">PT. DIE Art'S Indonesia</h1>
    <h2 class="text-center">Laporan Kehadiran Pegawai</h2>

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
            <th class="text-center">Hadir</th>
            <th class="text-center">Sakit</th>
            <th class="text-center">Alpa</th>
            <th class="text-center">Ijin</th>
        </tr>
        <?php $no = 1;
        foreach ($lap_kehadiran as $row) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nik; ?></td>
                <td><?= $row->nama_pegawai; ?></td>
                <td><?= $row->jenis_kelamin; ?></td>
                <td><?= $row->nama_jabatan; ?></td>
                <td><?= $row->hadir; ?></td>
                <td><?= $row->sakit; ?></td>
                <td><?= $row->alpa; ?></td>
                <td><?= $row->ijin; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table width="95%">
        <tr>
            <td></td>
            <td width="200px">
                <p class="text-center">Bondowoso, <?= date('d M Y'); ?><br> Bag. Personalia</p>
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