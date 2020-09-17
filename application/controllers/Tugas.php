<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tugas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tugas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tugas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tugas/index.html';
            $config['first_url'] = base_url() . 'tugas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tugas_model->total_rows($q);
        $tugas = $this->Tugas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tugas_data' => $tugas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'judul_page' => 'tugas/elearning_tugas_list',
            'konten' => 'tugas/elearning_tugas_list',
        );
        $this->load->view('v_index', $data);
    }

    public function read($id) 
    {
        $row = $this->Tugas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tugas' => $row->id_tugas,
		'nim' => $row->nim,
		'nama' => $row->nama,
		'detail_tugas' => $row->detail_tugas,
		'link_upload' => $row->link_upload,
		'kode_mk' => $row->kode_mk,
        'judul_page' => 'tugas/elearning_tugas_read',
            'konten' => 'tugas/elearning_tugas_read',
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tugas'));
        }
    }

    public function create() 
    {
        $data = array(
            'judul_page' => 'tugas/elearning_tugas_form',
            'konten' => 'tugas/elearning_tugas_form',
            'button' => 'Create',
            'action' => site_url('tugas/create_action'),
	    'id_tugas' => set_value('id_tugas'),
	    'nim' => set_value('nim'),
	    'nama' => set_value('nama'),
	    'detail_tugas' => set_value('detail_tugas'),
	    'link_upload' => set_value('link_upload'),
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
		'nim' => $this->input->post('nim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'detail_tugas' => $this->input->post('detail_tugas',TRUE),
		'link_upload' => $this->input->post('link_upload',TRUE),
		'kode_mk' => $this->input->post('kode_mk',TRUE),
	    );

            $this->Tugas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tugas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tugas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'judul_page' => 'tugas/elearning_tugas_form',
                'konten' => 'tugas/elearning_tugas_form',
                'button' => 'Update',
                'action' => site_url('tugas/update_action'),
		'id_tugas' => set_value('id_tugas', $row->id_tugas),
		'nim' => set_value('nim', $row->nim),
		'nama' => set_value('nama', $row->nama),
		'detail_tugas' => set_value('detail_tugas', $row->detail_tugas),
		'link_upload' => set_value('link_upload', $row->link_upload),
		'kode_mk' => set_value('kode_mk', $row->kode_mk),
	    );
            $this->load->view('v_index', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tugas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tugas', TRUE));
        } else {
            $data = array(
		'nim' => $this->input->post('nim',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'detail_tugas' => $this->input->post('detail_tugas',TRUE),
		'link_upload' => $this->input->post('link_upload',TRUE),
		'kode_mk' => $this->input->post('kode_mk',TRUE),
	    );

            $this->Tugas_model->update($this->input->post('id_tugas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tugas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tugas_model->get_by_id($id);

        if ($row) {
            $this->Tugas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tugas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tugas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nim', 'nim', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('detail_tugas', 'detail tugas', 'trim|required');
	$this->form_validation->set_rules('link_upload', 'link upload', 'trim|required');
	$this->form_validation->set_rules('kode_mk', 'kode mk', 'trim|required');

	$this->form_validation->set_rules('id_tugas', 'id_tugas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tugas.php */
/* Location: ./application/controllers/Tugas.php */
/* Please DO NOT modify this information : */
/* Generated by Boy Kurniawan 2020-02-24 02:32:47 */
/* https://jualkoding.com */