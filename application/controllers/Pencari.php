<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pencari extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Pencari');
		if($this->session->userdata('logged_in') !== true)
		{
			redirect(site_url('Login'));
		}
	}

	public function index()
	{
		$data['pencari'] = $this->Model_Pencari->ambil_data();
		$this->load->view('Pencari/Data_Pencari', $data);
	}

	public function tambah_pencari() {
		$nama_pencari = $this->input->post('nama_pencari');
		$kontak_pencari = $this->input->post('kontak_pencari');
		$email_pencari = $this->input->post('email_pencari');
		$password_pencari = $this->input->post('password_pencari');
		$new_pencari = array(
			'nama_pencari' => $nama_pencari,
			'kontak_pencari' => $kontak_pencari,
			'email_pencari' => $email_pencari,
			'password_pencari' => md5($password_pencari)
		);
		$this->Model_Pencari->tambah_data($new_pencari);
		redirect(site_url('Pencari'));
	}

	public function edit_pencari($id_pencari){
		$nama_pencari = $this->input->post('nama_pencari');
		$kontak_pencari = $this->input->post('kontak_pencari');
		$email_pencari = $this->input->post('email_pencari');
		$password_pencari = $this->input->post('password_pencari');
		$data = array(
			'nama_pencari' => $nama_pencari,
			'kontak_pencari' => $kontak_pencari,
			'email_pencari' => $email_pencari
		);
		if ($password_pencari !== "") {
			$data['password_pencari'] = md5($password_pencari);
		}
		$this->Model_Pencari->edit_data($id_pencari,$data);
		redirect(site_url('Pencari'));
	}

	public function hapus_pencari($id_pencari){
		$this->Model_Pencari->hapus_data($id_pencari);
		redirect(site_url('Pencari'));
	}
}
