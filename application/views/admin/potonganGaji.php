<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('pesan'); ?>
    <?= $this->session->unset_userdata('pesan'); ?>
    <a class="btn btn-success btn-sm mb-2" href="<?= base_url('admin/potonganGaji/tambahData'); ?>"><i class="fas fa-plus"></i> Tambah Data</a>

    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis Potongan</th>
            <th class="text-center">Jumlah Potongan</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no = 1;
        foreach ($pot_gaji as $row) : ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td><?= $row->potongan; ?></td>
                <td><?= $row->jml_potongan; ?></td>
                <td class="text-center">
                    <a class="btn btn-primary btn-sm" href="<?= base_url('admin/potonganGaji/updateData/' . $row->id); ?>"><i class="fas fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('admin/potonganGaji/deleteData/' . $row->id); ?>" onclick="return confirm('Yakin Mau dihapus.?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</div>