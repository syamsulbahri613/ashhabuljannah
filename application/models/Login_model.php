<?php
    class Login_model extends CI_Model{
        public function ambilDataLogin($table, $where)
        {
           $this->db->from($table);
           $this->db->where('username',$where['username']);
           $this->db->where('password',$where['password']);
           return $this->db->get()->result_array();
        }

        public function ambilDataLoginAdmin($table, $where)
        {
           $this->db->from($table);
           $this->db->where('username',$where['username']);
           $this->db->where('password',$where['password']);
           return $this->db->get()->result_array();
        }

        public function isAdmin()
        {
            return $this->session->userdata('role') === "admin";
        }

        public function isUser()
        {
            return $this->session->userdata('role') === "user";
        }
    }
?>