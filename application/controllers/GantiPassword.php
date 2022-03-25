<?php
class GantiPassword extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Ganti Password";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('formGantiPassword', $data);
        $this->load->view('templates_admin/footer');
    }

    public function gantiPasswordAksi()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules(
            'passBaru',
            'Password Baru',
            'required|matches[ulangPass]',
            array(
                'required' => 'Harus Diisi, Tidak Boleh Kosong',
                'matches' => 'Password tidak sama'
            )
        );
        $this->form_validation->set_rules(
            'ulangPass',
            'ulangi Password Baru',
            'required',
            array(
                'required' => 'Harus Diisi, Tidak Boleh Kosong'
            )
        );

        if ($this->form_validation->run() != FALSE) {
            $data = array('password' => md5($passBaru));
            $id = array('id_pegawai' => $this->session->userdata('id_pegawai'));
            $this->penggajianModel->update_data($id, $data, 'data_pegawai');

            $this->session->set_flashdata('pesan', '<div class="alert   alert-success alert-dismissible fade show" role="alert">
                <strong>Password Berhasil diganti</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('welcome');
        } else {
            $data['title'] = "Ganti Password";
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('formGantiPassword', $data);
            $this->load->view('templates_admin/footer');
        }
    }
}
