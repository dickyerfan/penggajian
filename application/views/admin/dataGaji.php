<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-light">
            Filter Data Gaji Pegawai
        </div>
        <div class="card-body">
            <form class="form-inline">
                <div class="form-group mb-2">
                    <label for="staticEmail2">Bulan : </label>
                    <select name="bulan" class="form-control ml-2">
                        <option value="">Pilih Bulan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group mb-2 ml-5">
                    <label for="staticEmail2">Tahun : </label>

                    <select name="tahun" class="form-control ml-2">
                        <option value="">Pilih Tahun</option>
                        <?php $tahun = date('Y');
                        for ($i = 2022; $i < $tahun + 5; $i++) {
                        ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php
                if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $bulantahun = $bulan . $tahun;
                } else {
                    $bulan = date('m');
                    $tahun = date('Y');
                    $bulantahun = $bulan . $tahun;
                }
                ?>
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                <?php if (count($gaji) > 0) { ?>
                    <a href="<?= base_url('admin/dataPenggajian/cetakGaji?bulan=' . $bulan), '&tahun=' . $tahun ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-print"></i> Cetak Daftar gaji</a>
                <?php } else { ?>
                    <button type="button" class="btn btn-success mb-2 ml-2" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-print"></i> Cetak Daftar gaji
                    </button>
                <?php } ?>

            </form>
        </div>
    </div>
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
    <div class="alert alert-info">
        Menampilkan Data Gaji Pegawai : <span class="font-weight-bold"><?= $bulan ?></span> Tahun : <span class="font-weight-bold"><?= $tahun ?></span>
    </div>

    <?php
    $jml_data = count($gaji);
    if ($jml_data > 0) {
    ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
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
                foreach ($gaji as $row) : ?>
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
            </table><br><br><br><br><br><br>
        </div>
    <?php } else { ?>
        <span class="badge badge-danger p-2"><i class="fas fa-info-circle"></i> Data Absensi Masih Kosong, Silakan input data kehadiran pada bulan dan tahun yang anda pilih</span>
    <?php } ?>


</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Data Gaji Masih Kosong, Silakan Input Absensi terlebih dahulu pada bulan dan tahun yang ada pilih.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>