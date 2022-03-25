<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 60%;">
        <div class="card-body">
            <?php foreach ($jabatan as $j) : ?>
                <form action="<?= base_url('admin/dataJabatan/updateDataAksi'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id_jabatan" class="form-control" value="<?= $j->id_jabatan ?>">
                        <input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" value="<?= $j->nama_jabatan ?>">
                        <?= form_error('nama_jabatan', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="number" name="gaji_pokok" class="form-control" placeholder="Gaji Pokok" value="<?= $j->gaji_pokok ?>">
                        <?= form_error('gaji_pokok', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="number" name="tj_transport" class="form-control" placeholder="Tunjangan Transport" value="<?= $j->tj_transport ?>">
                        <?= form_error('tj_transport', '<div class="text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group">
                        <input type="number" name="uang_makan" class="form-control" placeholder="Uang Makan" value="<?= $j->uang_makan ?>">
                        <?= form_error('uang_makan', '<div class="text-small text-danger"></div>') ?>
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