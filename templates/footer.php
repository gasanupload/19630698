  <!-- Footer -->
  <footer class="sticky-footer bg-white">
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; <?= $nama_profil . ' - ' . $nomor_profil; ?></span>
          </div>
      </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>
  <!-- Ubah Password Modal-->
  <div class="modal fade" id="PassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="proses/proses-ubahpassword.php" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                      <div class="modal-body">
                          <input type="hidden" class="form-control" name="t" value="1" required>
                          <div class="form-group">
                              <label>Password Lama : </label>
                              <input type="password" class="form-control" name="password_lama" value="" required>
                          </div>
                          <div class="form-group">
                              <label>Password Baru : </label>
                              <input type="password" class="form-control" name="password_baru1" value="" required>
                          </div>
                          <div class="form-group">
                              <label>Konfirmasi Password Baru : </label>
                              <input type="password" class="form-control" name="password_baru2" value="" required>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah anda yakin ingin mengubah password?')"><i class="fa fa-fw fa-save"></i> Simpan</button>
                          <button class="btn btn-secondary btn-block" type="button" data-dismiss="modal">Batal</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin logout?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Pilih tombol "Logout" jika anda ingin keluar dari aplikasi.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                  <a class="btn btn-primary" href="proses/proses-logout.php">Logout</a>
              </div>
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/datatables-demo.js"></script>

  </body>

  </html>