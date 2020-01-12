<!-- edit modal -->
  <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo validation_errors(); ?>
                <form action="<?= base_url('seksi') ?>" method="post">
                    <div class="form-group">
                        <label for="nama_seksi">Nama Seksi</label>
                        <input type="text" class="form-control" name="nama_seksi" id="nama_seksi" value="sad">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-md btn-primary" type="submit" name="submit"><i class="fas fas-send"></i>Edit Data</button>
                        <button class="btn btn-md btn-danger" data-dismiss="modal"><i class="fas fas-cancel"></i>Cancel</button>
                    </div>
                </form>
          </div>
          <!-- <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div> -->
        </div>
      </div>
    </div>