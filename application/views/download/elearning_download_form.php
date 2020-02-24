
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Upload <?php echo form_error('link') ?></label>
            <input type="file" class="form-control" name="link" id="link" placeholder="Link" value="<?php echo $link; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="varchar">Kode Mk <?php echo form_error('kode_mk') ?></label>
            <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Kode Mk" value="<?php echo $kode_mk; ?>" />
        </div> -->
	    <input type="hidden" name="id_download" value="<?php echo $id_download; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('download') ?>" class="btn btn-default">Cancel</a>
	</form>
   