<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Pemilik');
		if($this->session->userdata('logged_in') !== true)
		{
			redirect(site_url('Login'));
		}
	}

	public function index()
	{
		$data['pemilik'] = $this->Model_Pemilik->ambil_data();
		$this->load->view('Pemilik/Data_Pemilik', $data);
	}

	public function tambah_pemilik() {
		$nama_pemilik = $this->input->post('nama_pemilik');
		$kontak_pemilik = $this->input->post('kontak_pemilik');
		$email_pemilik = $this->input->post('email_pemilik');
		$password_pemilik = $this->input->post('password_pemilik');
		$data = array(
			'nama_pemilik' => $nama_pemilik,
			'kontak_pemilik' => $kontak_pemilik,
			'email_pemilik' => $email_pemilik,
			'password_pemilik' => md5($password_pemilik)
		);
		$this->Model_Pemilik->tambah_data($data);
		redirect(site_url('Pemilik'));
	}

	public function edit_pemilik($id_pemilik){
		$nama_pemilik = $this->input->post('nama_pemilik');
		$kontak_pemilik = $this->input->post('kontak_pemilik');
		$email_pemilik = $this->input->post('email_pemilik');
		$password_pemilik = $this->input->post('password_pemilik');
		$data = array(
			'nama_pemilik' => $nama_pemilik,
			'kontak_pemilik' => $kontak_pemilik,
			'email_pemilik' => $email_pemilik
		);
		if ($password_pemilik !== "") {
			$data['password_pemilik'] = md5($password_pemilik);
		}
		$this->Model_Pemilik->edit_data($id_pemilik,$data);
		redirect(site_url('Pemilik'));
	}

	public function hapus_pemilik($id_pemilik){
		$this->Model_Pemilik->hapus_data($id_pemilik);
		redirect(site_url('Pemilik'));
	}
}
