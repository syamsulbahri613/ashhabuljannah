<?php
    class Logout extends CI_Controller{

        public function index()
        {
            $this->session->sess_destroy();
            redirect(base_url('logout/redir'));
        }
        
        public function redir()
        {
            $this->session->set_flashdata('success','Berhasil logout');
            redirect(base_url());
        }
    }
?>