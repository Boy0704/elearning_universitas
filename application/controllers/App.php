<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class app extends CI_Controller {

	
	public function index()
	{
		if ($this->session->userdata('level') == '') {
            redirect('app/login');
        }
		$data = array(
			'konten' => 'v_home',
            'judul_page' => 'Dashboard',
		);
		$this->load->view('v_index', $data);
	}

	public function tinymce_upload() {
        /***************************************************
		   * Only these origins are allowed to upload images *
		   ***************************************************/
		  $accepted_origins = array("http://localhost", "http://jualkoding.com");

		  /*********************************************
		   * Change this line to set the upload folder *
		   *********************************************/
		  $imageFolder = "image/all_image/";

		  reset ($_FILES);
		  $temp = current($_FILES);
		  if (is_uploaded_file($temp['tmp_name'])){
		    if (isset($_SERVER['HTTP_ORIGIN'])) {
		      // same-origin requests won't set an origin. If the origin is set, it must be valid.
		      if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
		        header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		      } else {
		        header("HTTP/1.1 403 Origin Denied");
		        return;
		      }
		    }

		    /*
		      If your script needs to receive cookies, set images_upload_credentials : true in
		      the configuration and enable the following two headers.
		    */
		    // header('Access-Control-Allow-Credentials: true');
		    // header('P3P: CP="There is no P3P policy."');

		    // Sanitize input
		    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
		        header("HTTP/1.1 400 Invalid file name.");
		        return;
		    }

		    // Verify extension
		    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png","jpeg"))) {
		        header("HTTP/1.1 400 Invalid extension.");
		        return;
		    }

		    // Accept upload if there was no origin, or if it is an accepted origin
		    $filetowrite = $imageFolder . $temp['name'];
		    move_uploaded_file($temp['tmp_name'], $filetowrite);

		    // Respond to the successful upload with JSON.
		    // Use a location key to specify the path to the saved image resource.
		    // { location : '/your/uploaded/image/file'}
		    echo json_encode(array('location' => $filetowrite));
		  } else {
		    // Notify editor that the upload failed
		    header("HTTP/1.1 500 Server Error");
		  }
    }

    public function detail_materi($id_materi)
    {
    	$data = array(
			'konten' => 'materi/detail_materi',
            'judul_page' => 'Detail Materi',
		);
		$this->load->view('v_index', $data);
    }

    public function list_mk()
    {
    	$data = array(
			'konten' => 'materi/list_materi',
            'judul_page' => 'List Matakuliah',
		);
		$this->load->view('v_index', $data);
    }

    public function Login()
    {
    	error_reporting(0);

    	if ($_POST) {
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');

    		$users = $this->db->get_where('app_users', array('username'=>$username));
    		if ($users->num_rows() == 1) {
    			$r = $users->row();
    			if (password_verify($password, $r->password))
	    		{
	    			$data = array('id_users'=>$r->id_users,
                                    'level'=>$r->level,
                                    'nama'=>$r->nama,
                                    'keterangan'=>$r->keterangan,
                                    'username'=>$username,
                                    'konsentrasi_id'=>$r->konsentrasi_id,
                                    'prodi_id'=>$r->prodi_id
                                );
                    $this->session->set_userdata($data);
                    redirect('app','refresh');

	    		} else {
	    			$this->session->set_flashdata('message', alert_biasa('Gagal Login / Password salah','danger'));
        			redirect('app/login','refresh');
	    		}
    		} else {
    			$this->session->set_flashdata('message', alert_biasa('Data tidak ditemukan','danger'));
    			redirect('app/login','refresh');
    		}
    	} else {
    		$this->load->view('v_login');
    	}
    }

    function logout()
    {
        $level = $this->session->userdata('level');
        $jam = date("H:i:s");
        $sql = "UPDATE app_users SET status='0', jam_out='$jam' where level='$level'";
        $this->db->query($sql);        
        $this->keluar();
        
    }
    
    function keluar()
    {
        header('Expires: Mon, 1 Jul 1998 01:00:00 GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');
        header( "Last-Modified: " . gmdate( "D, j M Y H:i:s" ) . " GMT" );
        // helper_log("logout","Telah Keluar");
        $this->session->sess_destroy();
        $this->session->unset_userdata(array('level', 'username', 'prodi_id', 'keterangan'));
        redirect(base_url());
    }



    

}
