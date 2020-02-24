
        <form action="<?php echo $action; ?>" method="post">
            <?php 
            if ($nim == null or $kode_mk == null) {
                $nim = $this->uri->segment(3);
                $kode_mk = $this->uri->segment(4);
            }
             ?>
	    <div class="form-group">
            <label for="varchar">Nim <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim" value="<?php echo $nim; ?>" readonly/>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo get_data('student_mahasiswa','nim',$nim,'nama'); ?>" />
        </div>
	    <div class="form-group">
            <label for="detail_tugas">Detail Tugas <?php echo form_error('detail_tugas') ?></label>
            <textarea class="form-control textarea_editor" rows="3" name="detail_tugas" id="detail_tugas" placeholder="Detail Tugas"><?php echo $detail_tugas; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Link Upload <?php echo form_error('link_upload') ?></label>
            <input type="file" class="form-control" name="link_upload" id="link_upload" placeholder="Link Upload" value="<?php echo $link_upload; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Mk <?php echo form_error('kode_mk') ?></label>
            <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Kode Mk" value="<?php echo $kode_mk; ?>" readonly/>
        </div>
	    <input type="hidden" name="id_tugas" value="<?php echo $id_tugas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('tugas') ?>" class="btn btn-default">Cancel</a>
	</form>
   