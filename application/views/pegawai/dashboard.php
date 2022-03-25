<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="alert alert-success font-weight-bold mb-2" style="width: 60%;">
        Selamat Datang, Anda Login Sebagai Pegawai
    </div>

    <div class="card" style="margin-bottom: 120px; width:60%;">
        <div class="card-header font-weight-bold bg-primary text-light">
            Data Pegawai
        </div>

        <?php foreach ($pegawai as $row) : ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <img style="width:250px" src="<?= base_url('assets/photo/' . $row->photo) ?>" alt="">
                    </div>
                    <div class="col-md-7">
                        <table class="table">
                            <tr>
                                <td>Nama Pegawai</td>
                                <td>:</td>
                                <td><?= $row->nama_pegawai ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $row->jenis_kelamin ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td><?= $row->jabatan ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Masuk</td>
                                <td>:</td>
                                <td><?= $row->tanggal_masuk ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= $row->status ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
    </div>

</div>