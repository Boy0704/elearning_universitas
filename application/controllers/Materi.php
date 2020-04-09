<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Materi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Materi_model');
        $this->load->library('form_validation');
    }

    public function index($a=null, $b=null)
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'materi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'materi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'materi/index.html';
            $config['first_url'] = base_url() . 'materi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Materi_model->total_rows($q);
        $materi = $this->Materi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'materi_data' => $materi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'materi/elearning_materi_list',
            'konten' => 'materi/elearning_materi_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Materi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_materi' => $row->id_materi,
		'judul_materi' => $row->judul_materi,
		'isi_materi' => $row->isi_materi,
		'kode_mk' => $row->kode_mk,
		'nidn_dosen' => $row->nidn_dosen,
	    );
            $this->load->view('materi/elearning_materi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('materi'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'materi/elearning_materi_form',
            'konten' => 'materi/elearning_materi_form',
            'button' => 'Create',
            'action' => site_url('materi/create_action'),
	    'id_materi' => set_value('id_materi'),
	    'judul_materi' => set_value('judul_materi'),
	    'isi_materi' => set_value('isi_materi'),
	    'kode_mk' => set_value('kode_mk'),
	    'nidn_dosen' => set_value('nidn_dosen'),
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
		'judul_materi' => $this->input->post('judul_materi',TRUE),
		'isi_materi' => $this->input->post('isi_materi',TRUE),
		'kode_mk' => $this->input->post('kode_mk',TRUE),
		'nidn_dosen' => $this->input->post('nidn_dosen',TRUE),
	    );

            $this->Materi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('app/list_mk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Materi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'materi/elearning_materi_form',
                'konten' => 'materi/elearning_materi_form',
                'button' => 'Update',
                'action' => site_url('materi/update_action'),
		'id_materi' => set_value('id_materi', $row->id_materi),
		'judul_materi' => set_value('judul_materi', $row->judul_materi),
		'isi_materi' => set_value('isi_materi', $row->isi_materi),
		'kode_mk' => set_value('kode_mk', $row->kode_mk),
		'nidn_dosen' => set_value('nidn_dosen', $row->nidn_dosen),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('materi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_materi', TRUE));
        } else {
            $data = array(
		'judul_materi' => $this->input->post('judul_materi',TRUE),
		'isi_materi' => $this->input->post('isi_materi',TRUE),
		'kode_mk' => $this->input->post('kode_mk',TRUE),
		'nidn_dosen' => $this->input->post('nidn_dosen',TRUE),
	    );

            $this->Materi_model->update($this->input->post('id_materi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('app/list_mk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Materi_model->get_by_id($id);

        if ($row) {
            $this->Materi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('materi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('materi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('judul_materi', 'judul materi', 'trim|required');
	$this->form_validation->set_rules('isi_materi', 'isi materi', 'trim|required');
	$this->form_validation->set_rules('kode_mk', 'kode mk', 'trim|required');
	$this->form_validation->set_rules('nidn_dosen', 'nidn dosen', 'trim|required');

	$this->form_validation->set_rules('id_materi', 'id_materi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Materi.php */
/* Location: ./application/controllers/Materi.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-02-24 02:32:06 */
/* https://jualkoding.com */