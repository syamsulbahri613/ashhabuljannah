<?php
    class Home extends CI_Controller{
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Registrasi_model');
            $this->load->model('Login_model');
            $this->load->model('Program_model');
            $this->load->model('Donasi_model');
            
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
            $data['judul'] = 'Halaman Home';
            $data['program'] = $this->Program_model->getProgram();
            $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaran();
            $this->load->view('templates/header', $data);
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer');
        }

        public function login()
        {
            
                $data['judul'] = 'Halaman login';
                $this->load->view('templates/header', $data);
                $this->load->view('home/login');
                $this->load->view('templates/footer');
        }

        public function validasilogin()
        {
            $data['judul'] = 'Halaman login';
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'username' => $username,
                'password' => md5($password),
            );
            $cek = $this->Login_model->ambilDataLogin("user",$where);

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error','Login Gagal !');
                $data['program'] = $this->Program_model->getProgram();
                $this->load->view('templates/header', $data);
                $this->load->view('home/index', $data);
                $this->load->view('templates/footer');
            }else if(count($cek) > 0){
                    $data_session = array(
                        'nama' => $username,
                        'kd_user'=> $cek[0]['kd_user'],
                        'email' => $cek[0]['email'],
                        'namalengkap' => $cek[0]['nama_lengkap'],
                        'role' => 'user'
                    );
                    $this->session->set_userdata($data_session);
                    $this->session->set_flashdata('success','Berhasil Login');
                    redirect('homeuser');
                }else{
                    $this->session->set_flashdata('error','Login Gagal !');
                    $this->session->set_flashdata('flash2','Username atau password');
                    redirect('home');
                }
                
            
        }

        public function dokumentasi()
        {
            $data['judul'] = 'Halaman dokumentasi';
            $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaran();
            $this->load->view('templates/header', $data);
            $this->load->view('home/dokumentasi');
            $this->load->view('templates/footer');
        }

        public function about()
        {
            $data['judul'] = 'Halaman about';
            $this->load->view('templates/header', $data);
            $this->load->view('home/about');
            $this->load->view('templates/footer');
        }

        public function daftar()
        {
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('notelpon', 'Notelpon', 'required|numeric');

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error','Silahkan Lengkapi Form Daftar!');
                $data['program'] = $this->Program_model->getProgram();
                $this->load->view('templates/header',$data);
                $this->load->view('home/index');
                $this->load->view('templates/footer');
            }else{
                $this->Registrasi_model->tambahDataRegistrasi();
                $this->session->set_flashdata('success','Berhasil Registrasi, Silahkan Login untuk Masuk !');
                redirect('home/index');
            }
            
        }

        public function detailProgram ($kd_program)
        {
            $data['judul'] = 'Detail Program';
            $data['program'] = $this->Program_model->byId($kd_program);
            $this->load->view('templates/header', $data);
            $this->load->view('home/programDetail');
            $this->load->view('templates/footer');
        }
       
    }

?>