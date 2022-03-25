<?php
class dataPegawai extends CI_Controller
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
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = 'Tambah Data Pegawai';
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->tambahData();
        } else {
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $usernames = $this->input->post('usernames');
            $password = md5($this->input->post('password'));
            $photo = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path'] = './assets/photo';
                $config['max_size'] = '512';
                $config['allowed_types'] = 'jpg|jpeg|png|tiff';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    echo "Photo Gagal diUpload!";
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }
            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
                'jenis_kelamin' => $jenis_kelamin,
                'jabatan' => $jabatan,
                'tanggal_masuk' => $tanggal_masuk,
                'status' => $status,
                'hak_akses' => $hak_akses,
                'usernames' => $usernames,
                'password' => $password,
                'photo' => $photo
            );
            $this->penggajianModel->insert_data($data, 'data_pegawai');
            $this->session->set_flashdata('pesan', '<div class="alert   alert-success alert-dismissible fade show" role="alert">
                <strong>Pegawai Berhasil Ditambahkan</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('admin/dataPegawai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|is_unique[data_pegawai.nik]', [
            'required' => 'Harus di isi, Tidak boleh kosong',
            'is_unique' => 'Gunakan NIK yang lain'
        ]);
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', [
            'required' => 'Harus di isi, Tidak boleh kosong'
        ]);
        // $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
        //     'required' => 'Harus di isi, Tidak boleh kosong'
        // ]);
        // $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', [
        //     'required' => 'Harus di isi, Tidak boleh kosong'
        // ]);
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required', [
            'required' => 'Harus di isi, Tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Harus di isi, Tidak boleh kosong'
        ]);
        // $this->form_validation->set_rules('photo', 'Photo', 'required', [
        //     'required' => 'Harus di isi, Tidak boleh kosong'
        // ]);
    }

    public function updateData($id)
    {
        $where = array('id_pegawai' => $id);
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->penggajianModel->edit_data($where, 'data_pegawai')->result();
        $data['title'] = "Update Data Karyawan";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataPegawai', $data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $id = $this->input->post('id_pegawai');
        $nik = $this->input->post('nik');
        $nama_pegawai = $this->input->post('nama_pegawai');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $jabatan = $this->input->post('jabatan');
        $tanggal_masuk = $this->input->post('tanggal_masuk');
        $status = $this->input->post('status');
        $hak_akses = $this->input->post('hak_akses');
        $usernames = $this->input->post('usernames');
        $password = md5($this->input->post('password'));
        $photo = $_FILES['photo']['name'];
        if ($photo = '') {
        } else {
            $config['upload_path'] = './assets/photo';
            $config['max_size'] = '512';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('photo')) {
                $photo = $this->upload->data('file_name');
                $this->db->set('photo', $photo);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $data = array(
            'nik' => $nik,
            'nama_pegawai' => $nama_pegawai,
            'jenis_kelamin' => $jenis_kelamin,
            'jabatan' => $jabatan,
            'tanggal_masuk' => $tanggal_masuk,
            'status' => $status,
            'hak_akses' => $hak_akses,
            'usernames' => $usernames,
            'password' => $password
        );

        $where = array(
            'id_pegawai' => $id
        );
        $this->penggajianModel->update_data($where, $data, 'data_pegawai');

        $this->session->set_flashdata('pesan', '<div class="alert   alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil di Update</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/dataPegawai');
    }

    public function deleteData($id)
    {
        $where = array('id_pegawai' => $id);
        $this->penggajianModel->delete_data($where, 'data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert   alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Berhasil di Hapus</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/dataPegawai');
    }
}
