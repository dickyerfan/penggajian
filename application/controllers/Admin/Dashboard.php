<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        // $pegawai = $this->db->query("SELECT * FROM data_pegawai");
        $pegawai = $this->db->get('data_pegawai');
        // $admin = $this->db->query("SELECT * FROM data_pegawai WHERE jabatan = 'Admin'");
        $admin = $this->db->get_where('data_pegawai', array('jabatan', 'Admin'));
        $jabatan = $this->db->get("data_jabatan");
        $kehadiran = $this->db->get("data_kehadiran");

        $data['pegawai'] = $pegawai->num_rows();
        $data['admin'] = $admin->num_rows();
        $data['jabatan'] = $jabatan->num_rows();
        $data['kehadiran'] = $kehadiran->num_rows();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates_admin/footer');
    }
}