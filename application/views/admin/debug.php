<form action="<?= base_url('Admin/debug');?>" class="excel-upl" 
id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="row padall">  
        <div class="col-lg-12">
            <div class="float-right">  
                <input type="radio" checked="checked" name="export_type" value="xlsx"> .xlsx
                <input type="radio" name="export_type" value="xls"> .xls
                <input type="radio" name="export_type" value="csv"> .csv
                <button type="submit" name="import" class="btn btn-primary">Export</button>
          </div> 
        </div>
    </div>
</form>