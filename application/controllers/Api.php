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

	public function tambah_iklan_post() {
		// basic info
		$nama_property = $this->post('nama_property');
		$tipe_property = $this->post('tipe_property');
		$id_pemilik = $this->post('id_pemilik');

		// location info
		$alamat_property = $this->post('alamat_property');
		$kota_property = $this->post('kota_property');
		$kecamatan_property = $this->post('kecamatan_property');
		$kodepos_property = $this->post('kodepos_property');
		$kontak_property = $this->post('kontak_property');

		// geolocation
		$latitude_property = $this->post('latitude_property');
		$longitude_property = $this->post('longitude_property');

		// detail info
		$gender_property = $this->post('gender_property');
		$harga_sewa_property = $this->post('harga_sewa_property');
		$luas_unit_property = $this->post('luas_unit_property');
		$fasilitas_property = $this->post('fasilitas_property');
		$deskripsi_property = $this->post('deskripsi_property');
		$jumlah_unit_property = $this->post('jumlah_unit_property');

		// image
		$image_property = $this->post('image_property');
	}
}
