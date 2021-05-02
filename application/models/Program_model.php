<?php
    class Program_model extends CI_Model{

        public function tambahProgram($data)
        {
            $data = [
                "nama_program" => $this->input->post('nama_program', true),
                "deskripsi" => $this->input->post('deskripsi', true),
                "image_program" => $data['upload_data']['file_name'],
            ];
            $this->db->insert('program', $data);
        }

        public function hapusProgram($kd_program)
        {
            $this->db->where('kd_program', $kd_program);
            $this->db->delete('program');
        }

        public function getProgram()
        {
            return $query = $this->db->get('program')->result_array();
        }

        public function byId($kd_program)
        {
            $this->db->from('program');
            $this->db->where('kd_program', $kd_program);
            return $query = $this->db->get()->result_array();
        }

        public function prosesUpdate($kd_program)
        {
            $data = [
                "nama_program" => $this->input->post('nama_program', true),
                "deskripsi" => $this->input->post('deskripsi', true),
            ];

            $this->db->where('kd_program', $kd_program);
            $this->db->update('program', $data);
        }

        public function getBerita()
        {
            $this->db->from('berita t1');
            $this->db->join('admin t2', 't2.kd_admin = t1.kd_admin');
            return $this->db->get()->result_array();
        }

        public function getBeritaById($kd_berita)
        {
            $this->db->from('berita t1');
            $this->db->join('admin t2', 't2.kd_admin = t1.kd_admin');
            $this->db->where('kd_berita', $kd_berita);
            return $this->db->get()->result_array();
        }

        public function tambahBerita($data)
        {
            $data = [
                "judul" => $this->input->post('judul', true),
                "isi" => $this->input->post('isi', true),
                "tgl_terbit" => $this->input->post('tglterbit'),
                "image_Berita" => $data['upload_data']['file_name'],
                "kd_admin" => $this->session->userdata("kd_admin"),
            ];

            $this->db->insert('berita', $data);
        }

        public function hapusBerita($kd_berita)
        {
            $this->db->where('kd_berita', $kd_berita);
            $this->db->delete('berita');

        }

        public function prosesUpdateBerita($kd_berita)
        {
            $data = [
                "judul" => $this->input->post('judul', true),
                "isi" => $this->input->post('isi', true),
                "tgl_terbit" => $this->input->post('tglterbit', true),
            ];
            $this->db->where('kd_berita', $kd_berita);
            $this->db->update('berita', $data);
        }
    }
?>