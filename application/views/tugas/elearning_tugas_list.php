
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php //echo anchor(site_url('tugas/create'),'Create', 'class="btn btn-primary"'); ?>
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
		<th>Nim</th>
		<th>Nama</th>
		<th>Link Upload</th>
		<th>Kode Mk</th>
		<th>Action</th>
            </tr>
            </thead>
            <tbody><?php
            $tugas_data = $this->db->get_where('elearning_tugas', array('nim'=>$this->session->userdata('username')));
            if ($this->session->userdata('level') != '4') {
                $tugas_data = $this->db->get_where('elearning_tugas', array('kode_mk'=>$this->uri->segment(3)));
            }
            foreach ($tugas_data->result() as $tugas)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $tugas->nim ?></td>
			<td><?php echo $tugas->nama ?></td>
			<td><?php echo $tugas->link_upload ?></td>
			<td><?php echo $tugas->kode_mk ?></td>
			<td style="text-align:center" width="200px">
				<?php 

                if ($this->session->userdata('level') == '1') {
                     echo anchor(site_url('tugas/read/'.$tugas->id_tugas),'<span class="label label-primary">Lihat</span>'); 
                    echo ' | '; 
                    echo anchor(site_url('tugas/update/'.$tugas->id_tugas),'<span class="label label-info">Ubah</span>'); 
                    echo ' | '; 
                    echo anchor(site_url('tugas/delete/'.$tugas->id_tugas),'<span class="label label-danger">Hapus</span>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                } else {
                    echo anchor(site_url('tugas/read/'.$tugas->id_tugas),'<span class="label label-primary">Lihat</span>'); 
                    echo ' | '; 
                    echo anchor(site_url('tugas/update/'.$tugas->id_tugas),'<span class="label label-info">Ubah</span>'); 
                }

				
				?>
			</td>
		</tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    