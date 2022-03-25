<?php
class penggajianModel extends CI_Model
{
    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_pot_alpa($table)
    {
        $this->db->where('potongan', 'Alpa');
        return $this->db->get_where($table);
    }

    public function get_pot_sakit($table)
    {
        $this->db->where('potongan', 'Sakit');
        return $this->db->get_where($table);
    }

    public function get_pot_ijin($table)
    {
        $this->db->where('potongan', 'Ijin');
        return $this->db->get_where($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table,)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insert_batch($table = null, $data = array())
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->insert_batch($table, $data);
        }
    }

    public function cek_login()
    {
        $usernames = set_value('usernames');
        $password = set_value('password');

        $result = $this->db->where('usernames', $usernames)
            ->where('password', md5($password))
            ->limit(1)
            ->get('data_pegawai');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return FALSE;
        }
    }
}
