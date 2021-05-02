<?php
    class Loginadmin extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Login_model');
            if($this->session->userdata !== null) {
                if($this->Login_model->isAdmin()) {
                    redirect(base_url('Adminuser'));
                }  else if($this->Login_model->isUser()) {
                    redirect(base_url('Homeuser'));
                }
             } 
        }
        
        public function index()
        {
            $data['judul'] = 'Halaman Login Admin';
            $this->load->view('templates/header', $data);
            $this->load->view('admin/index');
            $this->load->view('templates/footer');
        }

        public function login()
        {
            $data['judul'] = 'Halaman login admin';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'username' => $username,
                'password' => md5($password)
            );
            $cek = $this->Login_model->ambilDataLoginAdmin("admin",$where);

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error','Login Gagal !');
                $this->load->view('templates/header', $data);
                $this->load->view('admin/index');
                $this->load->view('templates/footer');
            }else if(count($cek) > 0){
                    $data_session = array(
                        'nama' => $username,
                        'kd_admin' => $cek[0]['kd_admin'],
                        'role' => 'admin'
                    );
                    $this->session->set_userdata($data_session);
                    $this->session->set_flashdata('success','Berhasil Login !');
                    redirect('adminuser');
                }else{
                    $this->session->set_flashdata('error','Login Gagal !');
                    $this->session->set_flashdata('flashadmin','Username atau password ');
                    redirect('Loginadmin');
                }
        }
    }
?>