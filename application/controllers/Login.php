<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Login');
	}

	public function verify() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($username === "admin" && $password === "mykost2020") {
			$this->session->set_userdata('logged_in', true);
			redirect(site_url('Home'));
		} else {
			$data['notifikasi'] = "username atau password salah";
			$this->load->view('Login', $data);
		}
	}

	public function logout() {
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect(site_url('Login'));
	}
}
