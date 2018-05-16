<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Registrasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'registrasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'registrasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'registrasi/index.html';
            $config['first_url'] = base_url() . 'registrasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Registrasi_model->total_rows($q);
        $registrasi = $this->Registrasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'registrasi_data' => $registrasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('registrasi/registrasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Registrasi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_registrasi' => $row->no_registrasi,
		'tanggal_daftar' => $row->tanggal_daftar,
		'lama_menginap' => $row->lama_menginap,
		'tarif' => $row->tarif,
		'total_tarif' => $row->total_tarif,
		'kode_kamar' => $row->kode_kamar,
		'id_penghuni' => $row->id_penghuni,
	    );
            $this->load->view('registrasi/registrasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('registrasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('registrasi/create_action'),
	    'no_registrasi' => set_value('no_registrasi'),
	    'tanggal_daftar' => set_value('tanggal_daftar'),
	    'lama_menginap' => set_value('lama_menginap'),
	    'tarif' => set_value('tarif'),
	    'total_tarif' => set_value('total_tarif'),
	    'kode_kamar' => set_value('kode_kamar'),
	    'id_penghuni' => set_value('id_penghuni'),
	);
        $this->load->view('registrasi/registrasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
		'lama_menginap' => $this->input->post('lama_menginap',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
		'total_tarif' => $this->input->post('total_tarif',TRUE),
		'kode_kamar' => $this->input->post('kode_kamar',TRUE),
		'id_penghuni' => $this->input->post('id_penghuni',TRUE),
	    );

            $this->Registrasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('registrasi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Registrasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('registrasi/update_action'),
		'no_registrasi' => set_value('no_registrasi', $row->no_registrasi),
		'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
		'lama_menginap' => set_value('lama_menginap', $row->lama_menginap),
		'tarif' => set_value('tarif', $row->tarif),
		'total_tarif' => set_value('total_tarif', $row->total_tarif),
		'kode_kamar' => set_value('kode_kamar', $row->kode_kamar),
		'id_penghuni' => set_value('id_penghuni', $row->id_penghuni),
	    );
            $this->load->view('registrasi/registrasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('registrasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_registrasi', TRUE));
        } else {
            $data = array(
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
		'lama_menginap' => $this->input->post('lama_menginap',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
		'total_tarif' => $this->input->post('total_tarif',TRUE),
		'kode_kamar' => $this->input->post('kode_kamar',TRUE),
		'id_penghuni' => $this->input->post('id_penghuni',TRUE),
	    );

            $this->Registrasi_model->update($this->input->post('no_registrasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('registrasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Registrasi_model->get_by_id($id);

        if ($row) {
            $this->Registrasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('registrasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('registrasi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim|required');
	$this->form_validation->set_rules('lama_menginap', 'lama menginap', 'trim|required');
	$this->form_validation->set_rules('tarif', 'tarif', 'trim|required|numeric');
	$this->form_validation->set_rules('total_tarif', 'total tarif', 'trim|required|numeric');
	$this->form_validation->set_rules('kode_kamar', 'kode kamar', 'trim|required');
	$this->form_validation->set_rules('id_penghuni', 'id penghuni', 'trim|required');

	$this->form_validation->set_rules('no_registrasi', 'no_registrasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
