<?php
    class Homeuser extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Login_model');
            $this->load->Model('Donasi_model');
            $this->load->Model('Feedback_model');
            $this->load->Model('Program_model');
            $this->load->Model('Daftarpengguna_model');
            
            if($this->session->userdata === null) {
                redirect(base_url());
             } 
             if(!$this->Login_model->isUser()) {
                redirect(base_url());
             } 
        }

        public function index()
        {
            $data['judul'] = 'Halaman User';
            
            $data['program'] = $this->Program_model->getProgram();
            $data['berita'] = $this->Program_model->getBerita();
            $data['user'] = $this->Daftarpengguna_model->detailpengguna();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/index');
            $this->load->view('templates/footer');
        }

        public function detailprofile()
        {
            $data['judul'] = 'Halaman Detail Profie';
            $data['program'] = $this->Program_model->getProgram();
            $data['user'] = $this->Daftarpengguna_model->detailpengguna();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/detailprofile');
            $this->load->view('templates/footer');
        }

        public function editprofile()
        {
            $data['judul'] = 'Halaman Edit Profile';
            $data['program'] = $this->Program_model->getProgram();
            $data['user'] = $this->Daftarpengguna_model->detailpengguna();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/editprofile');
            $this->load->view('templates/footer');
        }

        public function profileupdate()
        {
            $this->Daftarpengguna_model->prosesupdate();
            $this->session->set_flashdata('success', 'Profile Berhasi di Perbarui Silahkan Logout dan login kembali terimakasih !');
            redirect('homeuser/index');
        }

        public function donasi()
        {
            $data['judul'] = 'Halaman Donasi';
            $data['program'] = $this->Program_model->getProgram();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/donasi');
            $this->load->view('templates/footer');
        }

        public function prosesdonasi()
        {
            $data['judul'] = 'Halaman donasi';
            $data['program'] = $this->Program_model->getProgram();
            
            $this->form_validation->set_rules('program', 'Program', 'required');
            $this->form_validation->set_rules('tanggaldonasi', 'Tanggal Donasi', 'required');
            $this->form_validation->set_rules('nominal', 'Nominal', 'required|numeric');
            

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error','Donasi Gagal !'); 
                $this->load->view('templates/userheader', $data);
                $this->load->view('homeuser/donasi');
                $this->load->view('templates/footer');
            }else{
                $this->Donasi_model->tambahDataDonasi();
                $this->session->set_flashdata('success','Donasi berhasil, Silahkan Konfirmasi Donasi Anda Terimakasih !');
                redirect('homeuser/unconfirm');
            }
        }

        public function feedback()
        {
            $data['judul'] = 'Halaman Feedback';
            $data['program'] = $this->Program_model->getProgram();
            $data['feedback'] = $this->Feedback_model->getAllfeedback();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/feedback');
            $this->load->view('templates/footer');
        }

        public function Re($kd_fb)
        {
            $data['judul'] = 'Halaman Feedback';
            $data['program'] = $this->Program_model->getProgram();
            $data['refeedback'] = $this->Feedback_model->getByreply($kd_fb);
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/feedbackre');
            $this->load->view('templates/footer');
        }

        public function prosesfeedback()
        {
            $data['judul'] = 'Halaman Feedback';
            $data['program'] = $this->Program_model->getProgram();
         
            $this->form_validation->set_rules('komentar', 'Komentar', 'required');

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('error','Kolom komentar tidak boleh kosong !');
                redirect('homeuser/feedback');
            }else{
                $this->Feedback_model->inputFeedback();
                $this->session->set_flashdata('success','Berhasil memberikan Feedback !');
                redirect('homeuser/feedback');
            }
        }

        public function riwayatDonasi()
        {
            $data['judul'] = 'Halaman Riwayat Donasi';
            $data['program'] = $this->Program_model->getProgram();
            $data['donasi'] = $this->Donasi_model->getRiwayat();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/riwayatdonasi');
            $this->load->view('templates/footer');
        }

        public function unconfirm()
        {
            $data['judul'] = 'Halaman Konfirmasi';
            $data['program'] = $this->Program_model->getProgram();
            $data['donasi'] = $this->Donasi_model->getUnconfirmById();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/transaksitertunda');
            $this->load->view('templates/footer');
        }

        public function tutorial()
        {
            $data['judul'] = 'Halaman Tutorial donasi';
            $data['program'] = $this->Program_model->getProgram();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/tutordonasi');
            $this->load->view('templates/footer');
        }

        public function shortAll($startdate, $enddate)
        {
            $post = $this->input->post();
            if ($post) {
                redirect(base_url('Homeuser/shortAll/' . $post["startdate"] . '/' . $post["enddate"]));
            }
            $data['judul'] = 'Laporan Keseluruhan Per-Tanggal';
            $data['start'] = $startdate;
            $data['end'] = $enddate;
            $data['program'] = $this->Program_model->getProgram();
            $data['totaldonasi'] = $this->Donasi_model->getShortAll($startdate, $enddate);
            $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaranBydate($startdate, $enddate);
            $data['grafik'] = $this->Donasi_model->getGrafikByDate($startdate, $enddate);
            $data['keluar'] = $this->Donasi_model->getPengeluaranByDate($startdate, $enddate);
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/laporan');
            $this->load->view('templates/footer');
        }

        public function Laporanyayasan()
        {
            $post = $this->input->post();
            if ($post) {
                redirect(base_url('Homeuser/shortAll/' . $post["startdate"] . '/' . $post["enddate"]));
            }

            $data['judul'] = 'Laporan Keseluruhan';
            $data['program'] = $this->Program_model->getProgram();
            $data['totaldonasi'] = $this->Donasi_model->getDatatotal();
            $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaran();
            $data['grafik'] = $this->Donasi_model->getGrafik();
            $data['keluar'] = $this->Donasi_model->getAllPengeluaran();
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/laporan');
            $this->load->view('templates/footer');
        }

        public function shortAllById($kd, $startdate, $enddate)
        {
            $post = $this->input->post();
            if ($post) {
                redirect(base_url('Homeuser/shortAllById/' . $post["kd"] . '/' . $post["startdate"] . '/' . $post["enddate"]));
            }
    
            $data['judul'] = 'Laporan Per-Program Per-Tanggal';
            $data['start'] = $startdate;
            $data['end'] = $enddate;
            $data['pdfkd'] = $kd;
            $data['programbyid'] = $this->Program_model->byId($kd);
            $data['program'] = $this->Program_model->getProgram();
            $data['totaldonasi'] = $this->Donasi_model->getShortAllById($kd, $startdate, $enddate);
            $data['grafik'] = $this->Donasi_model->getGrafikByDateById($kd, $startdate, $enddate);
            $data['keluar'] = $this->Donasi_model->getPengeluaranByDateById($kd, $startdate, $enddate);
            $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaranByIdBydate($kd, $startdate, $enddate);
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/laporanbyid');
            $this->load->view('templates/footer');
        }

        public function LaporanyayasanById($kd_program)
        {
            $post = $this->input->post();
            if ($post) {
                redirect(base_url('Homeuser/shortAllById/' . $post["kd"] . '/' . $post["startdate"] . '/' . $post["enddate"]));
            }

            $data['judul'] = 'Laporan Per-Program';
            $data['programbyid'] = $this->Program_model->byId($kd_program);
            $data['program'] = $this->Program_model->getProgram();
            $data['totaldonasi'] = $this->Donasi_model->getDatatotalById($kd_program);
            $data['grafik'] = $this->Donasi_model->getGrafikById($kd_program);
            $data['keluar'] = $this->Donasi_model->getAllPengeluaranById($kd_program);
            $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaranById($kd_program);
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/laporanbyid',$data);
            $this->load->view('templates/footer');
        }

        public function konfirmasidonasi($kd_donasi)
        {
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 5000000;
            $config['max_width'] = 5000000;
            $config['max_height'] = 5000000;

            $this->load->library('upload', $config);
            if(! $this->upload->do_upload('gambar')){
                $this->session->set_flashdata('error', 'Donasi gagal di konfirmasi, Gambar gagal di tambahkan !');
                redirect('Homeuser/unconfirm');
            }else{
                $data = array('upload_data' => $this->upload->data());
                $this->Donasi_model->tambahKonfirmasi($kd_donasi, $data);
                $this->session->set_flashdata('success','Donasi berhasil di konfirmasi, Donasi Anda akan Segera Di Proses Terimakasih !');
                redirect('Homeuser/unconfirm');
            }

            
        }

        public function detailBerita($kd_berita)
        {
            $data['judul'] = 'Halaman Detail Berita';
            $data['program'] = $this->Program_model->getProgram();
            $data['berita'] = $this->Program_model->getBeritaById($kd_berita);
            $this->load->view('templates/userheader', $data);
            $this->load->view('homeuser/detailBeritaUser');
            $this->load->view('templates/footer');
        }
    }
?>