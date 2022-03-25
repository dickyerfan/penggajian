<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom:80px;">
        <div class="card-body">
            <?php foreach ($pegawai as $p) : ?>
                <form action="<?= base_url('admin/dataPegawai/updateDataAksi'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_pegawai" class="form-control" value="<?= $p->id_pegawai ?>">
                        <input type="number" name="nik" class="form-control" placeholder="N I K" value="<?= $p->nik ?>">
                        <?= form_error('nik', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama_pegawai" class="form-control" placeholder="Nama Karyawan" value="<?= $p->nama_pegawai ?>">
                        <?= form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="usernames" value="<?= $p->usernames ?>" placeholder="Username">
                        <?= form_error('usernames', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" value="<?= $p->password ?>" placeholder="Password">
                        <?= form_error('password', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="<?= $p->jenis_kelamin ?>"><?= $p->jenis_kelamin ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="jabatan" class="form-control" required>
                            <option value="<?= $p->jabatan ?>"><?= $p->jabatan ?></option>
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?= $j->nama_jabatan ?>"><?= $j->nama_jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="date" name="tanggal_masuk" class="form-control" placeholder="Tanggal Masuk" value="<?= $p->tanggal_masuk ?>">
                        <?= form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control" required>
                            <option value="<?= $p->status ?>"><?= $p->status ?></option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                        </select>
                        <?= form_error('status', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo" class="form-control" placeholder="Photo" value="<?= $p->photo ?>">
                        <?= form_error('photo', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="hak_akses" class="form-control" required>
                            <option value="<?= $p->hak_akses; ?>">
                                <?php if ($p->hak_akses == '1') { ?>
                                    Admin
                                <?php } else { ?>
                                    Pegawai
                                <?php } ?>
                            </option>
                            <option value="1">Admin</option>
                            <option value="2">Pegawai</option>
                        </select>
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">
                        Submit
                    </button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>