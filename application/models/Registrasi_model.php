<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registrasi_model extends CI_Model
{

    public $table = 'registrasi';
    public $id = 'no_registrasi';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function total_rows($q = NULL) {
        $this->db->like('no_registrasi', $q);
	$this->db->or_like('tanggal_daftar', $q);
	$this->db->or_like('lama_menginap', $q);
	$this->db->or_like('tarif', $q);
	$this->db->or_like('total_tarif', $q);
	$this->db->or_like('kode_kamar', $q);
	$this->db->or_like('id_penghuni', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('no_registrasi', $q);
	$this->db->or_like('tanggal_daftar', $q);
	$this->db->or_like('lama_menginap', $q);
	$this->db->or_like('tarif', $q);
	$this->db->or_like('total_tarif', $q);
	$this->db->or_like('kode_kamar', $q);
	$this->db->or_like('id_penghuni', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}
