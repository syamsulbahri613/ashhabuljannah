<?php
    class Registrasi_model extends CI_model{
        public function tambahDataRegistrasi()
        {
            $data = [
                "nama_lengkap" => $this->input->post('nama_lengkap', true),
                "username" => $this->input->post('username', true),
                "password" => md5($this->input->post('password', true)),
                "notelpon" => $this->input->post('notelpon', true),
                "email" => $this->input->post('email', true),
                "alamat" => $this->input->post('alamat', true),
            ];
            $this->db->insert('user', $data);
        }
    }
?>