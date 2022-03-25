<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <table class="table table-secondary table-bordered">
        <tr class="text-center">
            <th>Bulan/Tahun</th>
            <th>Gaji Pokok</th>
            <th>Tj. Transport</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Cetak Slip Gaji</th>
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
        <?php foreach ($gaji as $row) : ?>
            <?php
            $pot_alpa = $row->alpa * $alpa;
            $pot_sakit = $row->sakit * $sakit;
            $pot_ijin = $row->ijin * $ijin;
            $potongan = $pot_alpa + $pot_sakit + $pot_ijin;
            ?>
            <tr class="text-center">
                <td class="text-center"><?= $row->bulan ?></td>
                <td>Rp. <?= number_format($row->gaji_pokok, 0, ',', '.')  ?></td>
                <td>Rp. <?= number_format($row->tj_transport, 0, ',', '.')  ?></td>
                <td>Rp. <?= number_format($row->uang_makan, 0, ',', '.')  ?></td>
                <td>Rp. <?= number_format($potongan, 0, ',', '.')  ?></td>
                <td>Rp. <?= number_format($row->gaji_pokok + $row->tj_transport + $row->uang_makan - $potongan, 0, ',', '.')  ?></td>
                <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('pegawai/dataGaji/cetakSlip/' . $row->id_kehadiran) ?>"><i class="fas fa-print"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>