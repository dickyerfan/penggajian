<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('pesan') ?>
    <?= $this->session->unset_userdata('pesan'); ?>
    <a class="mb-2 btn btn-sm btn-success" href="<?= base_url('admin/dataPegawai/tambahData'); ?>"><i class="fas fa-plus"></i> Tambah Pegawai</a>
    <div class="row">
        <div class="col">


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class="text-center">NIK</th>
                                    <th class="text-center">Nama Pegawai</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Tanggal masuk</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Hak Akses</th>
                                    <th class="text-center" style="width:12%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pegawai as $p) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $p->nik ?></td>
                                        <td><?= $p->nama_pegawai ?></td>
                                        <td><?= $p->usernames ?></td>
                                        <td><?= $p->jenis_kelamin ?></td>
                                        <td><?= $p->jabatan ?></td>
                                        <td class="text-center"><?= $p->tanggal_masuk ?></td>
                                        <td><?= $p->status ?></td>
                                        <td class="text-center">
                                            <img src="<?= base_url() . 'assets/photo/' . $p->photo ?>" width="35px">
                                        </td>
                                        <?php if ($p->hak_akses == '1') { ?>
                                            <td class="text-center">Admin</td>
                                        <?php } else { ?>
                                            <td class="text-center">Pegawai</td>
                                        <?php } ?>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataPegawai/updateData/' . $p->id_pegawai) ?>" data-toggle="tooltip" data-placement="bottom" title="Update data"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Yakin Hapus?');" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataPegawai/deleteData/' . $p->id_pegawai) ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>