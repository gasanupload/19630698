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
                            <th>Nama Mata Kuliah</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Nama Kelas</th>
                            <th>Nama Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Mata Kuliah</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Nama Kelas</th>
                            <th>Nama Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        $query_matkul = mysqli_query($link, "select * from matkul order by id_matkul asc");
                        if (mysqli_num_rows($query_matkul) > 0) {
                            while ($data_matkul = mysqli_fetch_array($query_matkul)) {
                                $id_matkul = $data_matkul['id_matkul'];
                                $hari = $data_matkul['hari'];
                                $jam = $data_matkul['jam'];
                                $nama_matkul = $data_matkul['nama_matkul'];
                                $id_dosen = $data_matkul['id_dosen'];
                                $query_dosen = mysqli_query($link, "select * from dosen where id_dosen='$id_dosen' order by id_dosen asc");
                                $data_dosen = mysqli_fetch_array($query_dosen);
                                $nama_dosen = $data_dosen['nama_dosen'];
                                $id_kelas = $data_matkul['id_kelas'];
                                $query_kelas = mysqli_query($link, "select * from kelas where id_kelas='$id_kelas' order by id_kelas asc");
                                $data_kelas = mysqli_fetch_array($query_kelas);
                                $nama_kelas = $data_kelas['nama_kelas'];

                        ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $nama_matkul; ?></td>
                                    <td><?= $hari; ?></td>
                                    <td><?= $jam; ?></td>
                                    <td><?= $nama_kelas; ?></td>
                                    <td><?= $nama_dosen; ?></td>
                                    <td><a href="#" title="Ubah" data-toggle="modal" data-target="#ubah<?php echo $id_matkul; ?>"><button type="button" class="btn btn-warning "><i class="fa fa-fw fa-edit"></i> Ubah</button></a>&nbsp;&nbsp;<a href="proses/proses-matkul.php?s=<?php echo $id_matkul; ?>" title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $nama_matkul; ?>?')"><button type="button" class="btn btn-danger "><i class="fa fa-fw fa-trash"></i> Hapus </button></a></td>
                                </tr>
                                <!-- FORM UBAH -->
                                <div class="modal fade" id="ubah<?php echo $id_matkul; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Form Ubah</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="proses/proses-matkul.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" name="s" value="<?php echo $id_matkul; ?>" required>
                                                    <div class="form-group">
                                                        <label>Nama Mata Kuliah : </label>
                                                        <input type="text" class="form-control" name="nama_matkul" value="<?php echo $nama_matkul; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Hari : </label>
                                                        <select class="form-control" name="hari" required>
                                                            <option value="<?= $hari; ?>"><?= $hari; ?></option>
                                                            <option value="Senin">Senin</option>
                                                            <option value="Selasa">Selasa</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jam : </label>
                                                        <input type="text" class="form-control time" name="jam" value="<?= $jam; ?>" placeholder="00:00 - 00:00" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelas : </label>
                                                        <select class="form-control" name="id_kelas" required>
                                                            <?php
                                                            $id_kelas = $data_matkul['id_kelas'];
                                                            $query_kelas = mysqli_query($link, "select * from kelas where id_kelas='$id_kelas'");
                                                            $data_kelas = mysqli_fetch_array($query_kelas);
                                                            $id_kelas = $data_kelas['id_kelas'];
                                                            $nama_kelas = $data_kelas['nama_kelas'];
                                                            ?>
                                                            <option value="<?= $id_kelas; ?>"><?= $nama_kelas; ?></option>
                                                            <?php
                                                            $query_kelas = mysqli_query($link, "select * from kelas order by id_kelas asc");
                                                            while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                                                                $id_kelas = $data_kelas['id_kelas'];
                                                                $nama_kelas = $data_kelas['nama_kelas'];
                                                            ?>
                                                                <option value="<?= $id_kelas; ?>"><?= $nama_kelas; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Dosen : </label>
                                                        <select class="form-control" name="id_dosen" required>
                                                            <?php
                                                            $id_dosen = $data_matkul['id_dosen'];
                                                            $query_dosen = mysqli_query($link, "select * from dosen where id_dosen='$id_dosen'");
                                                            $data_dosen = mysqli_fetch_array($query_dosen);
                                                            $id_dosen = $data_dosen['id_dosen'];
                                                            $nama_dosen = $data_dosen['nama_dosen'];
                                                            ?>
                                                            <option value="<?= $id_dosen; ?>"><?= $nama_dosen; ?></option>
                                                            <?php
                                                            $query_dosen = mysqli_query($link, "select * from dosen order by id_dosen asc");
                                                            while ($data_dosen = mysqli_fetch_array($query_dosen)) {
                                                                $id_dosen = $data_dosen['id_dosen'];
                                                                $nama_dosen = $data_dosen['nama_dosen'];
                                                            ?>
                                                                <option value="<?= $id_dosen; ?>"><?= $nama_dosen; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ingin mengubah data <?php echo $nama_matkul; ?>?')"><i class="fa fa-fw fa-save"></i> Simpan</button>
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
            <form action="proses/proses-matkul.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                <div class="modal-body">
                    <input type="hidden" class="form-control" name="t" value="1" required>
                    <div class="form-group">
                        <label>Nama Mata Kuliah : </label>
                        <input type="text" class="form-control" name="nama_matkul" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Hari : </label>
                        <select class="form-control" name="hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jam : </label>
                        <input type="text" class="form-control time" name="jam" value="00:00 - 00:00" placeholder="00:00 - 00:00" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas : </label>
                        <select class="form-control" name="id_kelas" required>
                            <?php
                            $query_kelas = mysqli_query($link, "select * from kelas order by id_kelas asc");
                            while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                                $id_kelas = $data_kelas['id_kelas'];
                                $nama_kelas = $data_kelas['nama_kelas'];
                            ?>
                                <option value="<?= $id_kelas; ?>"><?= $nama_kelas; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Dosen : </label>
                        <select class="form-control" name="id_dosen" required>
                            <?php
                            $query_dosen = mysqli_query($link, "select * from dosen order by id_dosen asc");
                            while ($data_dosen = mysqli_fetch_array($query_dosen)) {
                                $id_dosen = $data_dosen['id_dosen'];
                                $nama_dosen = $data_dosen['nama_dosen'];
                            ?>
                                <option value="<?= $id_dosen; ?>"><?= $nama_dosen; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ingin menambah data matkul?')"><i class="fa fa-fw fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Form Tambah -->