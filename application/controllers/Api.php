<?php
use chriskacerguis\RestServer\RestController;
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends RestController {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Pemilik');
		$this->load->model('Model_Pencari');
	}

	public function users_get()
	{
        // Users from a data store e.g. database
		$users = [
			['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
			['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
		];

		$id = $this->get( 'id' );

		if ( $id === null )
		{
            // Check if the users data store contains users
			if ( $users )
			{
                // Set the response and exit
				$this->response( $users, 200 );
			}
			else
			{
                // Set the response and exit
				$this->response( [
					'status' => false,
					'message' => 'No users were found'
				], 404 );
			}
		}
		else
		{
			if ( array_key_exists( $id, $users ) )
			{
				$this->response( $users[$id], 200 );
			}
			else
			{
				$this->response( [
					'status' => false,
					'message' => 'No such user found'
				], 404 );
			}
		}
	}

	public function pencari_get() {
		$data = $this->Model_Pemilik->ambil_data();
		$this->response( [
			'data' => $data
		], 200 );
	}

	public function pencari_post() {
		$id_pemilik = $this->post('id');
		$data = $this->Model_Pencari->ambil_data();
		$this->response( [
			'data' => $id_pemilik
		], 200 );
	}

	public function login_post() {
		$login_type = $this->post('login_type');
		$nomor_handphone = $this->post('nomor_handphone');
		$email = $this->post('email');
		$password = md5($this->post('password'));

		if ($login_type === 'pemilik') {
			$data = $this->Model_Pemilik->verify_login($nomor_handphone, $email, $password);
		} else if ($login_type === 'pencari') {
			$data = $this->Model_Pencari->verify_login($nomor_handphone, $email, $password);
		}

		if (count($data) > 0) {
			$this->response( [
				'data' => $data,
				'message' => 'login berhasil'
			], 200 );
		} else {
			$this->response( [
				'message' => 'pengguna tidak ditemukan'
			], 200 );
		}
	}

	public function register_post() {
		$register_type = $this->post('register_type');
		$nama = $this->post('nama');
		$nomor_handphone = $this->post('nomor_handphone');
		$email = $this->post('email');
		$password = md5($this->post('password'));

		if ($register_type === 'pemilik') {
			$data = $this->Model_Pemilik->cek_duplikat($nomor_handphone, $email);
			$new_user = array(
				'nama_pemilik' => $nama,
				'kontak_pemilik' => $nomor_handphone,
				'email_pemilik' => $email,
				'password_pemilik' => $password
			);
			$model = $this->Model_Pemilik;
		} else if ($register_type === 'pencari') {
			$data = $this->Model_Pencari->cek_duplikat($nomor_handphone, $email);
			$new_user = array(
				'nama_pencari' => $nama,
				'kontak_pencari' => $nomor_handphone,
				'email_pencari' => $email,
				'password_pencari' => $password
			);
			$model = $this->Model_Pencari;
		}

		if (count($data) < 1) {
			$model->tambah_data($new_user);
			$this->response( [
				'message' => 'registrasi berhasil'
			], 200 );
		} else {
			$this->response( [
				'message' => 'pengguna dengan nohp atau email tersebut sudah terdaftar'
			], 200 );
		}
	}
}
