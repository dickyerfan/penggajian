<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <div class="card" style="width: 55%;">
        <div class="card-body">
            <?php foreach ($pot_gaji as $row) : ?>
                <form action="<?= base_url('admin/potonganGaji/updateDataAksi') ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" class="form-control" value="<?= $row->id ?>">
                        <label for="">Jenis Potongan</label>
                        <input type="text" name="potongan" class="form-control" value="<?= $row->potongan; ?>">
                        <?= form_error('potongan'); ?>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Potongan</label>
                        <input type="text" name="jml_potongan" class="form-control" value="<?= $row->jml_potongan; ?>">
                        <?= form_error('jml_potongan'); ?>
                    </div>
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>