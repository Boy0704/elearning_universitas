<div class="row">
	<div class="col-md-12">
		

		<div class="alert alert-success">
			
		<marquee>
				<h2>Selamat Datang Di Aplikasi reminder customer</h2>
		</marquee>
		</div>




	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-info">
	      <div class="panel-heading"><i class="fa fa-info"></i> INFORMASI</div>
	      <div class="panel-body">
	      	<div class="callout callout-info">
	      		<?php 
	      		$sql = $this->db->get_where('info', array('publish'=>'1'));
	      		if ($sql->num_rows() > 0) {
	      			echo $sql->row()->info;
	      		} else {
	      			echo "Tidak Ada informasi yang ditampilkan";
	      		}

	      		 ?>
	      	</div>
	      </div>
	    </div>
	    <!-- <div class="callout callout-info">
	    	
	    </div> -->
	</div>
	<div class="col-md-6">
		<div class="panel panel-warning">
	      <div class="panel-heading"><i class="fa fa-info"></i> Customer Jatuh Tempo Bulan ini.</div>
	      <div class="panel-body">
	      	<table class="table table-bordered">
	      		<tr>
	      			<th>No.</th>
	      			<th>Customer</th>
	      			<th>Amount</th>
	      			<th>Inv Due Date</th>
	      		</tr>
	      	
	      	<?php
	      	$no = 1; 
	      	$date_current = date('Y-m');
	      	if ($this->session->userdata('level') == 'psr') {
	      		$this->db->where('user', $this->session->userdata('id_user'));
	      	}
	      	if ($this->session->userdata('level') == 'supervisor') {
	      		$this->db->where('id_cabang', $this->session->userdata('id_cabang'));
	      	}
	      	$this->db->like('invoice_due_date', $date_current, 'after');
	      	$sql = $this->db->get('reminder');
	      	//$sql = $this->db->query("
	      		// SELECT * FROM reminder WHERE invoice_due_date LIKE '$date_current%';
	      		// ");
	      	if ($sql->num_rows() > 0) {
	      		foreach ($sql->result() as $rw) {
	      		?>
	      		<tr>
	      			<td><?php echo $no; ?></td>
	      			<td><?php echo get_data('customer', 'customer_code', $rw->customer_code, 'nama'); ?></td>
	      			<td><?php echo number_format($rw->amount_total) ?></td>
	      			<td><?php echo $rw->invoice_due_date ?></td>
	      		</tr>

	      		<?php 
	      		$no++; }
	      	} else {
	      		?>
	      	 	<tr>
	      	 		<td class="4"> Data Tidak Ditemukan.</td>
	      	 	</tr>
	      	 	<?php
	      	}
	      	?>
	      	</table>
	      </div>
	    </div>
	</div>
</div>