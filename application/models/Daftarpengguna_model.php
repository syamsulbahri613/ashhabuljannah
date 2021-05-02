<?php
    class Daftarpengguna_model extends CI_Model{
        public function getAlluser()
        {
            return $this->db->get('user')->result_array();
        }

        public function getDatajumlah()
        {
            return $this->db->count_all('user');
        }

        public function detailpengguna()
        {
            $data = $this->session->userdata('kd_user');
            $this->db->from('user');
            $this->db->where('kd_user', $data);
            return $this->db->get()->result_array();
        }

        public function prosesupdate()
        {
            $data = $this->session->userdata('kd_user');
            $dataupdate = [
                "nama_lengkap" => $this->input->post('nama', true),
                "email" => $this->input->post('email', true),
                "notelpon" => $this->input->post('notlp', true),
                "alamat" => $this->input->post('alamat', true),
            ];

            $this->db->where('kd_user', $data);
            $this->db->update('user', $dataupdate);
        }
    }
?>