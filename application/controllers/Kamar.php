<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kamar_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kamar/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kamar/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kamar/index.html';
            $config['first_url'] = base_url() . 'kamar/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kamar_model->total_rows($q);
        $kamar = $this->Kamar_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kamar_data' => $kamar,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('kamar/kamar_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kamar_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kode_kamar' => $row->kode_kamar,
		'jenis_kamar' => $row->jenis_kamar,
		'tarif' => $row->tarif,
	    );
            $this->load->view('kamar/kamar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kamar/create_action'),
	    'kode_kamar' => set_value('kode_kamar'),
	    'jenis_kamar' => set_value('jenis_kamar'),
	    'tarif' => set_value('tarif'),
	);
        $this->load->view('kamar/kamar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_kamar' => $this->input->post('jenis_kamar',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
	    );

            $this->Kamar_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kamar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kamar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kamar/update_action'),
		'kode_kamar' => set_value('kode_kamar', $row->kode_kamar),
		'jenis_kamar' => set_value('jenis_kamar', $row->jenis_kamar),
		'tarif' => set_value('tarif', $row->tarif),
	    );
            $this->load->view('kamar/kamar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode_kamar', TRUE));
        } else {
            $data = array(
		'jenis_kamar' => $this->input->post('jenis_kamar',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
	    );

            $this->Kamar_model->update($this->input->post('kode_kamar', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kamar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kamar_model->get_by_id($id);

        if ($row) {
            $this->Kamar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kamar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kamar'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_kamar', 'jenis kamar', 'trim|required');
	$this->form_validation->set_rules('tarif', 'tarif', 'trim|required|numeric');

	$this->form_validation->set_rules('kode_kamar', 'kode_kamar', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}