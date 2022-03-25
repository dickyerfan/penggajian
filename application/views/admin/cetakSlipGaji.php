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

        td,
        th {
            color: black;
        }

        @media print {
            .kembali {
                display: none;
            }
        }
    </style>
</head>

<body>
    <a href="<?= base_url('admin/slipGaji') ?>" class="btn kembali btn-primary btn-sm">Kembali</a>
    <h1 class="text-center">PT. DIE Art'S Production</h1>
    <h2 class="text-center">Slip Gaji Pegawai</h2>
    <hr style="width: 50%; border-width:3px" class="bg-dark">

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
    <?php foreach ($pot_alpa as $row) {
        $alpa = $row->jml_potongan;
    } ?>
    <?php foreach ($pot_sakit as $row) {
        $sakit = $row->jml_potongan;
    } ?>
    <?php foreach ($pot_ijin as $row) {
        $ijin = $row->jml_potongan;
    } ?>
    <?php
    foreach ($print_slip as $row) : ?>
        <?php
        $potongan_gaji = $row->alpa * $alpa + $row->sakit * $sakit + $row->ijin * $ijin;
        $total_gaji = $row->gaji_pokok + $row->tj_transport + $row->uang_makan - $potongan_gaji;
        ?>
        <table style="width: 100%;">
            <tr>
                <td width="10%">Nama Pegawai</td>
                <td width="2%">:</td>
                <td><?= $row->nama_pegawai; ?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?= $row->nik; ?></td>
            </tr>
            <tr>
                <td>Nama Jabatan</td>
                <td>:</td>
                <td><?= $row->nama_jabatan; ?></td>
            </tr>
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
        <table class="table table-bordered table-hover table-striped mt-3">
            <tr class="bg-dark text-light">
                <th class="text-center" width="10%">No</th>
                <th class="text-center">Uraian</th>
                <th class="text-center">Jumlah</th>
            </tr>
            <tr class="table-secondary">
                <td class="text-center">1</td>
                <td>Gaji Pokok</td>
                <td class="text-center">Rp. <?= number_format($row->gaji_pokok, 0, ',', '.'); ?></td>
            </tr>
            <tr class="table-secondary">
                <td class="text-center">2</td>
                <td>Tunjangan Transportasi</td>
                <td class="text-center">Rp. <?= number_format($row->tj_transport, 0, ',', '.'); ?></td>
            </tr>
            <tr class="table-secondary">
                <td class="text-center">3</td>
                <td>Uang makan</td>
                <td class="text-center">Rp. <?= number_format($row->uang_makan, 0, ',', '.'); ?></td>
            </tr>
            <tr class="table-secondary">
                <td class="text-center">4</td>
                <td>Potongan</td>
                <td class="text-center">Rp. <?= number_format($potongan_gaji, 0, ',', '.'); ?></td>
            </tr>
            <tr class="table-secondary">

                <th colspan="2" style="text-align: right;">Gaji Diterima</th>
                <th class="text-center">Rp. <?= number_format($total_gaji, 0, ',', '.'); ?></th>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <td>
                    <p></p>
                    <p class="font-weight-bold text-center">Pegawai</p>
                    <br>
                    <br>
                    <p class="font-weight-bold text-center"><?= $row->nama_pegawai; ?></p>
                </td>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p class="font-weight-bold text-center">Bondowoso, <?= date('d-m-Y'); ?></p>
                <p class="font-weight-bold text-center">Bendahara</p>
                <br>
                <br>
                <p class="font-weight-bold text-center">______________</p>
            </div>
        </div>
    <?php endforeach; ?>
</body>
<script>
    window.print();
</script>

</html>