<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $judul_form; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-12">
                <button type="button" class="btn btn-primary" title="Tambah" data-toggle="modal" data-target="#tambah"><i class="fa fa-fw fa-plus"></i> Tambah</button>
                <hr />
            </div>
            <div class=" table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Dosen</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_dosen = mysqli_query($link, "select * from dosen order by id_dosen asc");
                        if (mysqli_num_rows($query_dosen) > 0) {
                            while ($data_dosen = mysqli_fetch_array($query_dosen)) {
                                $id_dosen = $data_dosen['id_dosen'];
                                $nama_dosen = $data_dosen['nama_dosen'];
                                $nohp = $data_dosen['nohp'];
                                $email = $data_dosen['email'];
                        ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $nama_dosen; ?></td>
                                    <td><?= $nohp; ?></td>
                                    <td><?= $email; ?></td>
                                    <td><a href="#" title="Ubah" data-toggle="modal" data-target="#ubah<?php echo $id_dosen; ?>"><button type="button" class="btn btn-warning "><i class="fa fa-fw fa-edit"></i> Ubah</button></a>&nbsp;&nbsp;<a href="proses/proses-dosen.php?s=<?php echo $id_dosen; ?>" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nama_dosen; ?>?')"><button type="button" class="btn btn-danger "><i class="fa fa-fw fa-trash"></i> Hapus </button></a></td>
                                </tr>
                                <!-- FORM UBAH -->
                                <div class="modal fade" id="ubah<?php echo $id_dosen; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Ubah</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="proses/proses-dosen.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="s" value="<?php echo $id_dosen; ?>" required>
                                                    <div class="form-group">
                                                        <label>Nama Dosen : </label>
                                                        <input type="text" class="form-control" name="nama_dosen" value="<?php echo $nama_dosen; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>No HP : </label>
                                                        <input type="number" class="form-control" name="nohp" value="<?php echo $nohp; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email : </label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ingin mengubah data <?php echo $nama_dosen; ?>?')"><i class="fa fa-fw fa-save"></i> Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                <!-- END FORM UBAH -->
                        <?php $no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>


        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Form Tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Tambah</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="proses/proses-dosen.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="t" value="1" required>
                    <div class="form-group">
                        <label>Nama Dosen : </label>
                        <input type="text" class="form-control" name="nama_dosen" value="" required>
                    </div>
                    <div class="form-group">
                        <label>No HP : </label>
                        <input type="number" class="form-control" name="nohp" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Email : </label>
                        <input type="email" class="form-control" name="email" value="" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ingin menambah data dosen?')"><i class="fa fa-fw fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Form Tambah -->