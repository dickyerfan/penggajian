<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="col-md-8">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card" style="margin-bottom:80px;">
            <div class="card-body">
                <form action="<?= base_url('admin/dataPegawai/tambahDataAksi') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input class="form-control" type="text" name="nik" placeholder="Masukkan NIK">
                        <?= form_error('nik', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="nama_pegawai" placeholder="Nama Pegawai">
                        <?= form_error('nama_pegawai', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="usernames" placeholder="Username">
                        <?= form_error('usernames', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password">
                        <?= form_error('password', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <?= form_error('jenis_kelamin', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="jabatan" class="form-control" required>
                            <option value="">-- Pilih Jabatan --</option>
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?= $j->nama_jabatan ?>"><?= $j->nama_jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('jabatan', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="date" name="tanggal_masuk" placeholder="Tanggal Masuk">
                        <?= form_error('tanggal_masuk', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Pegawai Tetap">Pegawai Tetap</option>
                            <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                        </select>
                        <?= form_error('status', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="file" name="photo" placeholder="Photo">
                        <?= form_error('photo', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <select name="hak_akses" class="form-control" required>
                            <option value="">-- Pilih Hak Akses --</option>
                            <option value="1">Admin</option>
                            <option value="2">Pegawai</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="<?= base_url('admin/dataPegawai') ?>" class="btn btn-success">Batal</a>

                </form>

            </div>
        </div>
    </div>

</div>