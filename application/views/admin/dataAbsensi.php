<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <div class="card">
        <div class="card-header bg-primary text-light">
            Filter Data Absensi Karyawan
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
                <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
                <a href="<?= base_url('admin/dataAbsensi/inputAbsensi'); ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus"></i> Input Kehadiran</a>
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
        Menampilkan Data Kehadiran Karyawan Bulan : <span class="font-weight-bold"><?= $bulan ?></span> Tahun : <span class="font-weight-bold"><?= $tahun ?></span>
    </div>

    <?php
    $jml_data = count($absensi);
    if ($jml_data > 0) {
    ?>
        <?= $this->session->flashdata('pesan'); ?>
        <?= $this->session->unset_userdata('pesan'); ?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td class="text-center">NO</td>
                    <td class="text-center">NIK</td>
                    <td class="text-center">Nama Karyawan</td>
                    <td class="text-center">Jenis Kelamin</td>
                    <td class="text-center">Jabatan</td>
                    <td class="text-center">Hadir</td>
                    <td class="text-center">Sakit</td>
                    <td class="text-center">Alpa</td>
                    <td class="text-center">Ijin</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($absensi as $a) : ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td class="text-center"><?= $a->nik ?></td>
                        <td><?= $a->nama_pegawai ?></td>
                        <td><?= $a->jenis_kelamin ?></td>
                        <td><?= $a->jabatan ?></td>
                        <td class="text-center"><?= $a->hadir ?></td>
                        <td class="text-center"><?= $a->sakit ?></td>
                        <td class="text-center"><?= $a->alpa ?></td>
                        <td class="text-center"><?= $a->ijin ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table><br><br><br><br><br><br>

    <?php } else { ?>
        <span class="badge badge-danger p-2"><i class="fas fa-info-circle"></i> Data Masih Kosong, Silakan input data kehadiran pada bulan dan tahun yang anda pilih</span>
    <?php } ?>

</div>