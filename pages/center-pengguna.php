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
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_masterpengguna = mysqli_query($link, "select * from pengguna order by id_pengguna asc");
                        if (mysqli_num_rows($query_masterpengguna) > 0) {
                            while ($data_masterpengguna = mysqli_fetch_array($query_masterpengguna)) {
                                $id_masterpengguna = $data_masterpengguna['id_pengguna'];
                                $nama_masterpengguna = $data_masterpengguna['nama_pengguna'];
                                $masterusername = $data_masterpengguna['user'];
                        ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $nama_masterpengguna; ?></td>
                                    <td><?= $masterusername; ?></td>
                                    <td><a href="#" title="Ubah" data-toggle="modal" data-target="#ubah<?php echo $id_masterpengguna; ?>"><button type="button" class="btn btn-warning "><i class="fa fa-fw fa-edit"></i> Ubah</button></a>&nbsp;&nbsp;
                                        <?php if (mysqli_num_rows($query_masterpengguna) > 1) { ?>
                                            <a href="proses/proses-pengguna.php?s=<?php echo $id_masterpengguna; ?>" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nama_masterpengguna; ?>?')"><button type="button" class="btn btn-danger "><i class="fa fa-fw fa-trash"></i> Hapus </button></a>
                                    </td>
                                <?php } ?>
                                </tr>
                                <!-- FORM UBAH -->
                                <div class="modal fade" id="ubah<?php echo $id_masterpengguna; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Ubah</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="proses/proses-pengguna.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="s" value="<?php echo $id_masterpengguna; ?>" required>
                                                    <div class="form-group">
                                                        <label>Nama Pengguna : </label>
                                                        <input type="text" class="form-control" name="nama_pengguna" value="<?php echo $nama_masterpengguna; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username : </label>
                                                        <input type="text" class="form-control" name="user" value="<?php echo $masterusername; ?>" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password : </label>
                                                        <input type="password" class="form-control" name="pass" value="" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ingin mengubah data <?php echo $nama_pengguna; ?>?')"><i class="fa fa-fw fa-save"></i> Simpan</button>
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
            <form action="proses/proses-pengguna.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="t" value="1" required>
                    <div class="form-group">
                        <label>Nama Pengguna : </label>
                        <input type="text" class="form-control" name="nama_pengguna" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Username : </label>
                        <input type="text" class="form-control" name="user" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Password : </label>
                        <input type="password" class="form-control" name="pass" value="" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ingin menambah data pengguna?')"><i class="fa fa-fw fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Form Tambah -->