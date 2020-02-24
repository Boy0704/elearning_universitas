
        <form action="<?php echo $action; ?>" method="post">
            <?php 
            if ($kode_mk == null or $nidn_dosen == null) {
                $kode_mk = $this->uri->segment(4);
                $nidn_dosen = $this->uri->segment(3);
            }
             ?>
            <div class="form-group">
                <label for="varchar">Kode Mk <?php echo form_error('kode_mk') ?></label>
                <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Kode Mk" value="<?php echo $kode_mk; ?>" readonly/>
            </div>
            <div class="form-group">
                <label for="varchar">Nama MK</label>
                <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Nama Mk" value="<?php echo get_data('makul_matakuliah','kode_makul',$kode_mk,'nama_makul'); ?>" readonly/>
            </div>
            <div class="form-group">
                <label for="varchar">Nidn Dosen <?php echo form_error('nidn_dosen') ?></label>
                <input type="text" class="form-control" name="nidn_dosen" id="nidn_dosen" placeholder="Nidn Dosen" value="<?php echo $nidn_dosen; ?>" readonly/>
            </div>
    	    <div class="form-group">
                <label for="varchar">Judul Materi <?php echo form_error('judul_materi') ?></label>
                <input type="text" class="form-control" name="judul_materi" id="judul_materi" placeholder="Judul Materi" value="<?php echo $judul_materi; ?>" />
            </div>
    	    <div class="form-group">
                <label for="isi_materi">Isi Materi <?php echo form_error('isi_materi') ?></label>
                <textarea class="form-control textarea_editor" rows="6" name="isi_materi" id="isi_materi" placeholder="Isi Materi"><?php echo $isi_materi; ?></textarea>
            </div>
	    
	    <input type="hidden" name="id_materi" value="<?php echo $id_materi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('materi/'.$nidn_dosen.'/'.$kode_mk) ?>" class="btn btn-default">Cancel</a>
	</form>
   