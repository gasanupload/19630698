<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <section class="content">
            <div class="container-fluid">
                <div class="content-wrapper">
                    <div class="card" style="width: 30rem;margin-top:10%;margin-left:20%;margin-right:20%">
                        <div class="card-header">
                            <?= $judul; ?>
                        </div>
                        <div class="card-body ">
                            <div class="mb-3">
                                <h5 class="card-title">
                                    <center>Masukkan Username dan Password</center>
                                </h5>
                            </div>
                            <form action="proses/proses-login.php" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" name="user" placeholder="">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="pass" placeholder="">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-facebook btn-block">Login</button>
                                </div>
                                <hr />
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>