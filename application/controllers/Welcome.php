<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Form Login';
			$this->load->view('templates_admin/header', $data);
			$this->load->view('formLogin');
		} else {
			$usernames = $this->input->post('usernames');
			$password = $this->input->post('password');

			$cek = $this->penggajianModel->cek_login($usernames, $password);
			if ($cek == false) {
				$this->session->set_flashdata('pesan', '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password Salah</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
				redirect('welcome');
			} else {
				$this->session->set_userdata('hak_akses', $cek->hak_akses);
				$this->session->set_userdata('id_pegawai', $cek->id_pegawai);
				$this->session->set_userdata('nama_pegawai', $cek->nama_pegawai);
				$this->session->set_userdata('nik', $cek->nik);
				$this->session->set_userdata('Jenis_kelamin', $cek->Jenis_kelamin);
				$this->session->set_userdata('Jabatan', $cek->Jabatan);
				$this->session->set_userdata('tanggal_masuk', $cek->tanggal_masuk);
				$this->session->set_userdata('status', $cek->status);
				$this->session->set_userdata('photo', $cek->photo);
				switch ($cek->hak_akses) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('pegawai/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules(
			'usernames',
			'Username',
			'required',
			array('required' => 'Harus diisi, Tidak Boleh Kosong')
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Harus diisi, Tidak Boleh Kosong')
		);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
