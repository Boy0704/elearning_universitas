
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
	      <div class="panel-heading"><i class="fa fa-info"></i> LIST MATAKULIAH SEMESTER INI</div>
	      <div class="panel-body">

	      	<div class="callout">
	      		<?php 
	      		if ($this->session->userdata('level') == '3') {
	      			// $dosen = $this->session->userdata('keterangan');
	      			// $thn = tahun_akademik_aktif();
	      			// $query="SELECT mm.kode_makul,mm.nama_makul,jk.jadwal_id
          //           FROM akademik_jadwal_kuliah as jk,makul_matakuliah as mm
          //           WHERE mm.makul_id=jk.makul_id and jk.dosen_id=$dosen and jk.tahun_akademik_id=$thn";
	      			// $sql = $this->db->query($query);
	      			$sql = $this->db->get_where('v_krs', array('tahun_akademik_id'=>tahun_akademik_aktif(),'dosen_id'=>$this->session->userdata('keterangan')));
	      		} elseif ($this->session->userdata('level') == '4') {

	      			$sql = $this->db->get_where('v_krs', array('tahun_akademik_id'=>tahun_akademik_aktif(),'nim'=>$this->session->userdata('username')));
	      		}
	      		if ($sql->num_rows() > 0) {
	      			?>	
	      			<table class="table table-bordered">
	      				<thead style="background-color: green">
	      					<tr>
	      						<td>Kode MK</td>
	      						<td>Matakuliah</td>
	      						<td>Nama Dosen</td>
	      						<td>Pilihan</td>
	      					</tr>
	      				</thead>
	      				<tbody>
	      					<?php 
	      					foreach ($sql->result() as $rw) {
	      						$dosen_id = get_data('akademik_jadwal_kuliah','jadwal_id',$rw->jadwal_id,'dosen_id');
	      						$nidn = get_data('app_dosen','dosen_id',$dosen_id,'nidn');
	      					 ?>
	      					<tr>
	      						<td><?php echo $rw->kode_makul ?></td>
	      						<td><?php echo $rw->nama_makul ?></td>
	      						<td><?php echo $rw->nama_dosen ?></td>
	      						<td>
	      							<?php 
	      							if ($this->session->userdata('level') == '3') {
	      								?>
	      								<a href="materi/index/<?php echo $nidn.'/'.$rw->kode_makul ?>" class="label label-info"> Lihat Materi</a>
	      								<?php
	      							} else {
	      							 ?>
	      							 <a href="materi/index/<?php echo $nidn.'/'.$rw->kode_makul ?>" class="label label-info"> Lihat Materi</a>
	      							 <?php
	      							}
	      							?>
	      							
	      						</td>
	      					</tr>
	      					<?php } ?>
	      				</tbody>
	      			</table>
	      			<?php
	      		} else {
	      			echo "Tidak Ada Matakuliah yang ditampilkan";
	      		}

	      		 ?>
	      	</div>
	      </div>
	      </div>
	    </div>
	    <!-- <div class="callout callout-info">
	    	
	    </div> -->
	</div>
</div>