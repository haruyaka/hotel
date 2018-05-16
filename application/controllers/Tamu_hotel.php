<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tamu_hotel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tamu_hotel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tamu_hotel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tamu_hotel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tamu_hotel/index.html';
            $config['first_url'] = base_url() . 'tamu_hotel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tamu_hotel_model->total_rows($q);
        $tamu_hotel = $this->Tamu_hotel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tamu_hotel_data' => $tamu_hotel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('tamu_hotel/tamu_hotel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tamu_hotel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_penghuni' => $row->id_penghuni,
		'nama_penghuni' => $row->nama_penghuni,
	    );
            $this->load->view('tamu_hotel/tamu_hotel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu_hotel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tamu_hotel/create_action'),
	    'id_penghuni' => set_value('id_penghuni'),
	    'nama_penghuni' => set_value('nama_penghuni'),
	);
        $this->load->view('tamu_hotel/tamu_hotel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_penghuni' => $this->input->post('nama_penghuni',TRUE),
	    );

            $this->Tamu_hotel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tamu_hotel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tamu_hotel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tamu_hotel/update_action'),
		'id_penghuni' => set_value('id_penghuni', $row->id_penghuni),
		'nama_penghuni' => set_value('nama_penghuni', $row->nama_penghuni),
	    );
            $this->load->view('tamu_hotel/tamu_hotel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu_hotel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_penghuni', TRUE));
        } else {
            $data = array(
		'nama_penghuni' => $this->input->post('nama_penghuni',TRUE),
	    );

            $this->Tamu_hotel_model->update($this->input->post('id_penghuni', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tamu_hotel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tamu_hotel_model->get_by_id($id);

        if ($row) {
            $this->Tamu_hotel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tamu_hotel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu_hotel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_penghuni', 'nama penghuni', 'trim|required');

	$this->form_validation->set_rules('id_penghuni', 'id_penghuni', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}