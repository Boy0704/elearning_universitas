
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php 
                echo $retVal = ($this->session->userdata('level') == '3') ? anchor(site_url('materi/create/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5)),'Create', 'class="btn btn-primary"') : '' ;  ?>
                <?php if ($this->session->userdata('level') == '1'): ?>
                    <a href="app/export_materi" class="btn btn-primary" target="_blank">Export</a>
                <?php endif ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px" id="example1">
            <thead>
            <tr>
                <th>No</th>
		<th>Judul Materi</th>
		<th>Kode Mk</th>
        <th>Nama MK</th>
		<th>Nidn Dosen</th>
        <th>Nama Dosen</th>
        <th>Date At</th>
		<th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $materi_data = $this->db->get('elearning_materi');
            if ($this->session->userdata('level') == '3' or $this->session->userdata('level') == '4') {
                $materi_data = $this->db->get_where('elearning_materi', array('nidn_dosen'=>$this->uri->segment(3),'kode_mk'=>$this->uri->segment(4)));
            } 
            foreach ($materi_data->result() as $materi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $materi->judul_materi ?></td>
            <td><?php echo $materi->kode_mk ?></td>
			<td><?php echo get_data('makul_matakuliah','kode_makul',$materi->kode_mk,'nama_makul') ?></td>
            <td><?php echo $materi->nidn_dosen ?></td>
			<td><?php echo get_data('app_dosen','nidn',$materi->nidn_dosen,'nama_lengkap' )?></td>
            <td><?php echo $materi->date_at ?></td>
			<td style="text-align:center" width="200px">
				<?php 

                if ( $this->session->userdata('level') == '1') {
                   echo anchor(site_url('materi/update/'.$materi->id_materi.'/n/'.$this->uri->segment(5)),'<span class="label label-info">Ubah</span>'); 
                    echo ' | '; 
                    echo anchor(site_url('materi/delete/'.$materi->id_materi),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    echo ' | '; 
                     echo anchor(site_url('app/detail_materi/'.$materi->id_materi),'<span class="label label-success">Lihat</span>'); 
                } elseif ($this->session->userdata('level') == '3') {
                    echo anchor(site_url('materi/update/'.$materi->id_materi),'<span class="label label-info">Ubah</span>'); 
                    echo ' | '; 
                    echo anchor(site_url('app/detail_materi/'.$materi->id_materi),'<span class="label label-success">Lihat</span>'); 
                } else {
                    echo anchor(site_url('app/detail_materi/'.$materi->id_materi),'<span class="label label-success">Lihat</span>'); 
                }

				
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        
    