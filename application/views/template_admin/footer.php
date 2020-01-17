
      
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy;<a href="https://jombangkab.bps.go.id/" target="_blank" class="text-decoration-none"> Badan Pusat Statistik Kabupaten Jombang</a> 2019 - <?= date("Y"); ?></span>
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

  <!-- Logout Modal-->
  <div class="modal fade" style="margin-top:150px;" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah anda ingin mengakhiri session anda dengan logout ??</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </div>
    </div>
  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/admin/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/admin/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Sweetalert2 -->
<script src="<?= base_url('assets/admin/vendor/sweetalert2/') ?>sweetalert2.all.min.js"></script>
<!-- My javascript -->
<script src="<?= base_url('assets/admin/') ?>js/my.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/admin/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/admin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/admin/') ?>js/demo/datatables-demo.js"></script>




<!-- Latest compiled and minified JavaScript | Bootstrap Select -->
<script src="<?= base_url('assets/admin/vendor/bootstrap-select') ?>/dist/js/bootstrap-select.min.js"></script>

</body>

</html>
