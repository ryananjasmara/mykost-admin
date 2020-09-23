<?php
/**
 * 
 */
 class Model_Pemilik extends CI_Model
 {
 	public $nama_table = 'pemilik';
	public $id = 'id_pemilik';
 	public $order = 'ASC';

 	function __construct()
 	{
 		parent::__construct();
 	}

 	function ambil_data()
 	{
 		$this->db->order_by($this->id, $this->order);
 		return $this->db->get($this->nama_table)->result();
 	}
 	

 	function ambil_data_id($id)
 	{
 		$this->db->where($this->id,$id);
 		return $this->db->get($this->nama_table)->row();
 	}

 	function tambah_data($data)
 	{
 		return $this->db->insert($this->nama_table, $data);
 	}

 	function hapus_data($id)
 	{
 		$this->db->where($this->id, $id);
 		$this->db->delete($this->nama_table);
 	}

 	function edit_data($id,$data)
 	{
 		$this->db->where($this->id, $id);
 		$this->db->update($this->nama_table,$data);
 	}

 	function hitung_data() {
 		return $this->db->get($this->nama_table)->num_rows();
 	}

 	function verify_login($nomor_handphone, $email, $password) {
 		$this->db->where('kontak_pemilik', $nomor_handphone);
 		$this->db->where('email_pemilik', $email);
 		$this->db->where('password_pemilik', $password);
 		return $this->db->get($this->nama_table)->result();
 	}
 } 
 ?>