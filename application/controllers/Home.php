<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Pemilik');
        $this->load->model('Model_Pencari');
		if($this->session->userdata('logged_in') !== true)
		{
			redirect(site_url('Login'));
		}
	}

	public function index()
	{
		$data['jumlah_pemilik'] = $this->Model_Pemilik->hitung_data();
		$data['jumlah_pencari'] = $this->Model_Pencari->hitung_data();
		$this->load->view('Home', $data);
	}
}
