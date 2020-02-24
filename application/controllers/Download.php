<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Download_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'download/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'download/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'download/index.html';
            $config['first_url'] = base_url() . 'download/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Download_model->total_rows($q);
        $download = $this->Download_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'download_data' => $download,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'download/elearning_download_list',
            'konten' => 'download/elearning_download_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Download_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_download' => $row->id_download,
		'judul' => $row->judul,
		'link' => $row->link,
		'kode_mk' => $row->kode_mk,
	    );
            $this->load->view('download/elearning_download_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'download/elearning_download_form',
            'konten' => 'download/elearning_download_form',
            'button' => 'Create',
            'action' => site_url('download/create_action'),
	    'id_download' => set_value('id_download'),
	    'judul' => set_value('judul'),
	    'link' => set_value('link'),
	    'kode_mk' => set_value('kode_mk'),
	);
        $this->load->view('v_index', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'link' => $this->input->post('link',TRUE),
		'kode_mk' => $this->input->post('kode_mk',TRUE),
	    );

            $this->Download_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('download'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Download_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'download/elearning_download_form',
                'konten' => 'download/elearning_download_form',
                'button' => 'Update',
                'action' => site_url('download/update_action'),
		'id_download' => set_value('id_download', $row->id_download),
		'judul' => set_value('judul', $row->judul),
		'link' => set_value('link', $row->link),
		'kode_mk' => set_value('kode_mk', $row->kode_mk),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_download', TRUE));
        } else {
            $data = array(
		'judul' => $this->input->post('judul',TRUE),
		'link' => $this->input->post('link',TRUE),
		'kode_mk' => $this->input->post('kode_mk',TRUE),
	    );

            $this->Download_model->update($this->input->post('id_download', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('download'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Download_model->get_by_id($id);

        if ($row) {
            $this->Download_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('download'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('download'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('link', 'link', 'trim|required');
	$this->form_validation->set_rules('kode_mk', 'kode mk', 'trim|required');

	$this->form_validation->set_rules('id_download', 'id_download', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Download.php */
/* Location: ./application/controllers/Download.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-02-24 02:32:19 */
/* https://jualkoding.com */