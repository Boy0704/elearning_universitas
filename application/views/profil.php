<?php 
$d = $this->db->get_where('users', array('id_user'=>$this->session->userdata('id_user')))->row();
 ?>
<div class="row" style="margin-left: 10px;">
	<form action="app/ganti_profil/<?php echo $this->session->userdata('id_user') ?>" method="POST" enctype="multipart/form-data">
	<table class="table">
		<tr>
			<td>Foto</td>
			<td>:</td>
			<td><img src="image/user/<?php echo $d->foto_user ?>" style="width: 100px;height: 100px;"></td>
		</tr>
		<tr>
			<td></td>
			<td>:</td>
			<td><input type="file" name="foto_user" class="form-control"></td>
			<input type="hidden" name="old_foto" value="<?php echo $d->foto_user ?>">
		</tr>
		
		<tr>
			<td>Nama Lengkap</td>
			<td>:</td>
			<td><input type="text" name="nama_user" class="form-control" value="<?php echo $d->nama_user ?>"></td>
		</tr>
		<tr>
			<td>username</td>
			<td>:</td>
			<td><input type="text" name="username" class="form-control" value="<?php echo $d->username ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" class="form-control" value="<?php echo $d->password ?>"></td>
		</tr>
		<tr>
			<td>email</td>
			<td>:</td>
			<td><input type="text" name="email" class="form-control" value="<?php echo $d->email ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><button type="submit" class="btn btn-primary">Ubah</button></td>
		</tr>
	</table>
	</form>
</div>