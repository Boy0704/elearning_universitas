<?php 
$data = $this->db->get_where('elearning_materi', array('id_materi'=>$this->uri->segment(3)))->row();
 ?>
<div class="row">
	<div class="col-md-12">
		<a href="app/video_conference?room=<?php echo $data->kode_mk.'-'.$data->nidn_dosen ?>&nama=<?php echo $this->session->userdata('username'); ?>" class="btn btn-success"><i class="fa fa-video-camera"></i> VIDEO CONFERENCE SEKARANG</a><br><br>
	</div>
	<div class="col-md-12">
		<div class="panel panel-info">
	      <div class="panel-heading"><i class="fa fa-info"></i> DETAIL MATERI <?php echo $data->judul_materi; ?> </div>
	      <div class="panel-body">
	      	<?php echo $data->isi_materi; ?> 
	      </div>
	    </div>
	    <?php 
	    if ($this->session->userdata('level')== '4') {
	     ?>
	    <div class="callout callout-info">
	    	<a href="tugas/create/<?php echo $this->session->userdata('username').'/'.$data->kode_mk; ?>" class="btn btn-primary"> BUAT TUGAS</a>
	    </div>
		<?php } ?>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
	      <div class="panel-heading"><i class="fa fa-info"></i> DISKUSI <?php echo $data->judul_materi; ?> </div>
	      <div class="panel-body">
	      	<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://elearning-10.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
	      </div>
	    </div>
	    <!-- <div class="callout callout-info">
	    	
	    </div> -->
	</div>
</div>