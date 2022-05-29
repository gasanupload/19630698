<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $nama_aplikasi; ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <center>
                        <h4><?= $nama_profil; ?></h4>
                        <h4><?= 'NPM ' . $nomor_profil; ?></h4>
                    </center>
                </div>

                <?php
                $JumlahDosen = mysqli_num_rows(mysqli_query($link, "select * from dosen order by id_dosen asc"));
                $JumlahKelas = mysqli_num_rows(mysqli_query($link, "select * from kelas order by id_kelas asc"));
                $JumlahMatkul = mysqli_num_rows(mysqli_query($link, "select * from matkul order by id_matkul asc"));
                $JumlahPengguna = mysqli_num_rows(mysqli_query($link, "select * from pengguna order by id_pengguna asc"));

                ?>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <a href="dosen.php">Data Dosen</a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $JumlahDosen; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="kelas.php">Data Kelas</a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $JumlahKelas; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-home fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="matkul.php">Data Mata Kuliah</a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $JumlahMatkul; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-graduation-cap fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Annual) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        <a href="pengguna.php">Data Pengguna</a>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $JumlahPengguna; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-key fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->