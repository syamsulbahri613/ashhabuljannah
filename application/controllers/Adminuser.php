<?php
class Adminuser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->model('Login_model');
        $this->load->model('Daftarpengguna_model');
        $this->load->model('Feedback_model');
        $this->load->model('Donasi_model');
        $this->load->library('pdf');

        if ($this->session->userdata === null) {
            redirect(base_url('loginadmin'));
        }
        if (!$this->Login_model->isAdmin()) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data['judul'] = 'Halaman Dashboard Admin';
        $data['program'] = $this->Program_model->getProgram();
        $data['grafik'] = $this->Donasi_model->getGrafik();
        $data['pengeluaran'] = $this->Donasi_model->getAllPengeluaran();
        $data['jumlah'] = $this->Daftarpengguna_model->getDatajumlah();
        $data['donasiconfirm'] = $this->Donasi_model->getTransaksiVerifikasi();
        $data['Tfeedback'] = $this->Feedback_model->getTfeedback();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/dashboard');
        $this->load->view('templates/footer');
    }

    public function daftarpengguna()
    {
        $data['judul'] = 'Halaman Daftar Pengguna';
        $data['program'] = $this->Program_model->getProgram();
        $data['user'] = $this->Daftarpengguna_model->getAlluser();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/daftarpengguna');
        $this->load->view('templates/footer');
    }

    public function kelolaprogram()
    {
        $data['judul'] = 'Halaman Kelola program';
        $data['program'] = $this->Program_model->getProgram();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/kelolaprogram');
        $this->load->view('templates/footer');
    }

    public function tambahProgram()
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5000000;
        $config['max_width'] = 5000000;
        $config['max_height'] = 5000000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('error', 'Gagal menambahkan gambar !');
            redirect('adminuser/kelolaprogram');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->Program_model->tambahProgram($data);
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Program !');
            redirect('adminuser/kelolaprogram');
        }
    }

    public function updateProgram($kd_program)
    {
        $this->Program_model->prosesUpdate($kd_program);
        $this->session->set_flashdata('success', 'Berhasil Update Program');
        redirect('adminuser/kelolaprogram');
    }

    public function deleteProgram($kd_program)
    {
        $this->Program_model->hapusProgram($kd_program);
        $this->session->set_flashdata('success', 'Delete Successfully');
        redirect('adminuser/kelolaprogram');
    }

    public function feedback()
    {
        $data['judul'] = 'Halaman Feedback';
        $data['program'] = $this->Program_model->getProgram();
        $data['feedback'] = $this->Feedback_model->getAllfeedback();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/feedback');
        $this->load->view('templates/footer');
    }

    public function noreplyFeedback()
    {
        $data['judul'] = 'Halaman Reply Feedback';
        $data['program'] = $this->Program_model->getProgram();
        $data['feedback'] = $this->Feedback_model->getFeedbackOff();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/feedbacknoreply');
        $this->load->view('templates/footer');
    }

    public function replyFB($kd_fb)
    {
        $this->form_validation->set_rules('komentar', 'Komentar', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Kolom komentar tidak boleh kosong !');
            redirect('adminuser/noreplyFeedback');
        } else {
            $this->Feedback_model->getReply($kd_fb);
            $this->session->set_flashdata('success', 'Berhasil mengirim balasan komentar');
            redirect('adminuser/noreplyFeedback');
        }


        redirect('adminuser/noreplyFeedback');
    }



    public function transaksiTertunda()
    {
        $data['judul'] = 'Halaman Verifikasi';
        $data['program'] = $this->Program_model->getProgram();
        $data['tertunda'] = $this->Donasi_model->getTertunda();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/transaksiTertunda');
        $this->load->view('templates/footer');
    }

    public function shortAll($startdate, $enddate)
    {
        $post = $this->input->post();
        if ($post) {
            redirect(base_url('Adminuser/shortAll/' . $post["startdate"] . '/' . $post["enddate"]));
        }

        $data['start'] = $startdate;
        $data['end'] = $enddate;
        $data['judul'] = 'Laporan Keseluruhan Per-Tanggal';
        $data['program'] = $this->Program_model->getProgram();
        $data['totaldonasi'] = $this->Donasi_model->getShortAll($startdate, $enddate);
        $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaranBydate($startdate, $enddate);
        $data['grafik'] = $this->Donasi_model->getGrafikByDate($startdate, $enddate);
        $data['keluar'] = $this->Donasi_model->getPengeluaranByDate($startdate, $enddate);
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/laporantotal');
        $this->load->view('templates/footer');
    }

    public function Laporan()
    {
        $post = $this->input->post();
        if ($post) {
            redirect(base_url('Adminuser/shortAll/' . $post["startdate"] . '/' . $post["enddate"]));
        }

        $data['start'] = "";
        $data['end'] = "";

        $data['judul'] = 'Laporan Keseluruhan';
        $data['program'] = $this->Program_model->getProgram();
        $data['totaldonasi'] = $this->Donasi_model->getDatatotal();
        $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaran();
        $data['grafik'] = $this->Donasi_model->getGrafik();
        $data['keluar'] = $this->Donasi_model->getAllPengeluaran();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/laporantotal');
        $this->load->view('templates/footer');
    }


    public function LaporanById($kd_program)
    {
        $post = $this->input->post();
        if ($post) {
            redirect(base_url('Adminuser/shortAllById/' . $post["kd"] . '/' . $post["startdate"] . '/' . $post["enddate"]));
        }

        $data['start'] = "";
        $data['end'] = "";

        $data['programbyid'] = $this->Program_model->byId($kd_program);
        $data['judul'] = 'Laporan Per-Program';
        $data['program'] = $this->Program_model->getProgram();
        $data['totaldonasi'] = $this->Donasi_model->getDatatotalById($kd_program);
        $data['grafik'] = $this->Donasi_model->getGrafikById($kd_program);
        $data['keluar'] = $this->Donasi_model->getAllPengeluaranById($kd_program);
        $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaranById($kd_program);
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function shortAllById($kd, $startdate, $enddate)
    {
        $post = $this->input->post();
        if ($post) {
            redirect(base_url('Adminuser/shortAllById/' . $post["kd"] . '/' . $post["startdate"] . '/' . $post["enddate"]));
        }

        $data['start'] = $startdate;
        $data['end'] = $enddate;
        $data['judul'] = 'Laporan Program Per-Tanggal';
        $data['pdfkd'] = $kd;
        $data['programbyid'] = $this->Program_model->byId($kd);
        $data['program'] = $this->Program_model->getProgram();
        $data['totaldonasi'] = $this->Donasi_model->getShortAllById($kd, $startdate, $enddate);
        $data['grafik'] = $this->Donasi_model->getGrafikByDateById($kd, $startdate, $enddate);
        $data['keluar'] = $this->Donasi_model->getPengeluaranByDateById($kd, $startdate, $enddate);
        $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaranByIdBydate($kd, $startdate, $enddate);
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/laporan');
        $this->load->view('templates/footer');
    }


    public function TransaksiUnkonfirm()
    {
        $data['judul'] = 'Halaman Donasi belum dikonfirmasi';
        $data['program'] = $this->Program_model->getProgram();
        $data['tertunda'] = $this->Donasi_model->getUnkonfirm();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('Admin/transaksiunkonfirm');
        $this->load->view('templates/footer');
    }

    public function Transaksisuccess()
    {
        $data['judul'] = 'Halaman Donasi Success';
        $data['program'] = $this->Program_model->getProgram();
        $data['tertunda'] = $this->Donasi_model->getSuccess();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('Admin/transaksisuccess');
        $this->load->view('templates/footer');
    }

    public function Prosesvalid($kd_donasi)
    {
        $this->Donasi_model->Prosesvalid($kd_donasi);
        $this->session->set_flashdata('success', 'Donasi Berhasil Diterima !');
        redirect('adminuser/transaksitertunda');
    }

    public function ProsesUnvalid($kd_donasi)
    {
        $this->Donasi_model->ProsesUnvalid($kd_donasi);
        $this->session->set_flashdata('success', 'Donasi Berhasi Ditolak !');
        redirect('adminuser/transaksitertunda');
    }

    public function berita()
    {
        $data['judul'] = 'Halaman Kelola Berita';
        $data['program'] = $this->Program_model->getProgram();
        $data['berita'] = $this->Program_model->getBerita();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/berita');
        $this->load->view('templates/footer');
    }

    public function inputBerita()
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5000000;
        $config['max_width'] = 5000000;
        $config['max_height'] = 5000000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('error', 'Gagal menambahkan gambar !');
            $this->load->view('adminuser/berita');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->Program_model->tambahBerita($data);
            $this->session->set_flashdata('success', 'Berhasil Menambahkan Berita !');
            redirect('adminuser/berita');
        }
    }

    public function updateBerita($kd_berita)
    {
        $this->Program_model->prosesUpdateBerita($kd_berita);
        $this->session->set_flashdata('success', 'Berhasil Update Berita');
        redirect('adminuser/berita');
    }

    public function deleteBerita($kd_berita)
    {
        $this->Program_model->hapusBerita($kd_berita);
        $this->session->set_flashdata('success', 'Delete Successfully');
        redirect('adminuser/berita');
    }

    public function pengeluaran()
    {
        $data['judul'] = 'Halaman Kelola Pengeluaran';
        $data['program'] = $this->Program_model->getProgram();
        $data['pengeluaran'] = $this->Donasi_model->getDataPengeluaran();
        $this->load->view('templates/adminheader', $data);
        $this->load->view('admin/pengeluaran');
        $this->load->view('templates/footer');
    }

    public function inputPengeluaran()
    {
        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 5000000;
        $config['max_width'] = 5000000;
        $config['max_height'] = 5000000;

        $this->load->library('upload', $config);

            if(!empty($_FILES['file1']['name'])){
                $this->upload->do_upload('file1');
                $data1 = $this->upload->data();
                $file1 = $data1['file_name'];
            }

            if(!empty($_FILES['file2']['name'])){
                $this->upload->do_upload('file2');
                $data2 = $this->upload->data();
                $file2 = $data2['file_name'];
            }

            if(!empty($_FILES['file3']['name'])){
                $this->upload->do_upload('file3');
                $data3 = $this->upload->data();
                $file3 = $data3['file_name'];
            }

            if(!empty($_FILES['file4']['name'])){
                $this->upload->do_upload('file4');
                $data4 = $this->upload->data();
                $file4 = $data4['file_name'];
            }

            if (!$this->upload->do_upload('file1', 'file2', 'file3', 'file4')) {
                $this->session->set_flashdata('error', 'Gagal menambahkan gambar !');
                redirect('adminuser/pengeluaran');
            } else {
                $this->Donasi_model->prosesInputPengeluaran($file1, $file2, $file3, $file4);
                $this->session->set_flashdata('success', 'Berhasil menambahkan data pengeluaran');
                redirect('adminuser/pengeluaran');
            }


    }

    public function updatePengeluaran($kd_keluar)
    {
        $this->Donasi_model->prosesUpdatePengeluaran($kd_keluar);
        $this->session->set_flashdata('success', 'Berhasil Update Data Pengeluaran');
        redirect('adminuser/pengeluaran');
    }

    public function deletePengeluaran($kd_keluar)
    {
        $this->Donasi_model->hapusPengeluaran($kd_keluar);
        $this->session->set_flashdata('success', 'Delete Successfully !');
        redirect('adminuser/pengeluaran');
    }

    public function pdf()
    {
        $pdf = new FPDF('L', 'mm', 'A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Image('images/logoaj.png', 13, 7, 30, 26);
        $pdf->Cell(280, 7, 'LAPORAN KESELURUHAN ASH-HABUL JANNAH', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(280, 7, '(Sahabat surga)', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(280, 9, 'Jl.Haji som Rt.6/1 No.48 kel.pondok pucung kec.pondok aren Tangerang Selatan', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetLineWidth(1);
        $pdf->Line(10, 36, 280, 36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10, 37, 280, 37);

        // // Memberikan space kebawah agar tidak terlalu rapat

        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(50, 6, '*Data donasi yang masuk*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Nama Donatur', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Tanggal Donasi', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $data1 = $this->Donasi_model->getDatatotal();
        $data2 = $this->Donasi_model->getDataPengeluaran();
        $totalkeluar = 0;
        foreach ($data2 as $row2) {
            $totalkeluar = $totalkeluar + $row2['jumlah'];
        }


        $total = 0;
        $num = 1;
        foreach ($data1 as $row) {
            $total = $total + $row['jumlah'];
            $sisatotal = $total - $totalkeluar;
            $pdf->Cell(10, 6, $num++, 1, 0, 'C');
            $pdf->Cell(60, 6, $row['nama_lengkap'], 1, 0, 'C');
            $pdf->Cell(80, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(70, 6, 'Rp. ' . number_format($row['jumlah']), 1, 0, 'C');
            $pdf->Cell(50, 6, date('d - M - Y', strtotime($row['tanggal_donasi'])), 1, 1, 'C');
        }
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(35, 6, '*Data pengeluaran*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Tanggal Pengeluaran', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Jumlah Pengeluaran', 1, 1, 'C');

        $data3 = $this->Donasi_model->getDataPengeluaran();
        $pdf->SetFont('Arial', '', 10);

        $numPeng = 1;
        foreach ($data3 as $row) {
            $pdf->Cell(10, 6, $numPeng++, 1, 0, 'C');
            $pdf->Cell(80, 6, date('d - M - Y', strtotime($row['tgl_keluar'])), 1, 0, 'C');
            $pdf->Cell(90, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(90, 6, 'Rp. ' . number_format($row['jumlah']), 1, 1, 'C');
        }

        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->cell(240, 8, 'Total Dana Pemasukan :  Rp.', 'L,B,T', 0, 'R');
        $pdf->cell(30, 8, number_format($total), 'R,B,T', 1, 'L');
        $pdf->cell(240, 8, 'Total Dana Pengeluaran :  Rp.', 'L,B', 0, 'R');
        $pdf->cell(30, 8, number_format($totalkeluar), 'R,B', 1, 'L');
        $pdf->cell(240, 8, 'Sisa Dana Yayasan :  Rp.', 'L,B', 0, 'R');
        $pdf->cell(30, 8, number_format($sisatotal), 'B,R', 1, 'L');
        $pdf->Output();
    }

    public function pdfById($kd_program)
    {
        $pdf = new FPDF('L', 'mm', 'A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Image('images/logoaj.png', 13, 7, 30, 26);
        $pdf->Cell(280, 7, 'LAPORAN DATA KESELURUHAN ASH-HABUL JANNAH', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(280, 7, '(Sahabat surga)', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(280, 9, 'Jl.Haji som Rt.6/1 No.48 kel.pondok pucung kec.pondok aren Tangerang Selatan', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetLineWidth(1);
        $pdf->Line(10, 36, 280, 36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10, 37, 280, 37);
        $dataNP = $this->Program_model->byId($kd_program);
        foreach ($dataNP as $NP) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(280, 7, $NP['nama_program'], 0, 1, 'C');
        }
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(50, 6, '*Data donasi yang masuk*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Nama Donatur', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Jumlah Donasi', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Tanggal Donasi', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $data1 = $this->Donasi_model->getDatatotalById($kd_program);
        $data2 = $this->Donasi_model->getAllPengeluaranById($kd_program);
        $totalkeluar = 0;
        foreach ($data2 as $row2) {
            $totalkeluar = $totalkeluar + $row2['jumlah'];
        }


        $total = 0;
        $num = 1;
        foreach ($data1 as $row) {
            $total = $total + $row['jumlah'];
            $sisatotal = $total - $totalkeluar;
            $pdf->Cell(10, 6, $num++, 1, 0, 'C');
            $pdf->Cell(60, 6, $row['nama_lengkap'], 1, 0, 'C');
            $pdf->Cell(80, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(70, 6, 'Rp. ' . number_format($row['jumlah']), 1, 0, 'C');
            $pdf->Cell(50, 6, date('d - M - Y', strtotime($row['tanggal_donasi'])), 1, 1, 'C');
        }
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(35, 6, '*Data pengeluaran*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Tanggal Pengeluaran', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Jumlah Pengeluaran', 1, 1, 'C');
        $data3 = $this->Donasi_model->getDataPengeluaranById($kd_program);
        $pdf->SetFont('Arial', '', 10);

        $numPeng = 1;
        foreach ($data3 as $row) {
            $pdf->Cell(10, 6, $numPeng++, 1, 0, 'C');
            $pdf->Cell(80, 6, date('d - M - Y', strtotime($row['tgl_keluar'])), 1, 0, 'C');
            $pdf->Cell(90, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(90, 6, 'Rp. ' . number_format($row['jumlah']), 1, 1, 'C');
        }

        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->cell(240, 8, 'Total Dana Pemasukan :  Rp.', 'L,B,T', 0, 'R');
        $pdf->cell(30, 8, number_format($total), 'R,B,T', 1, 'L');
        $pdf->cell(240, 8, 'Total Dana Pengeluaran :  Rp.', 'L,B', 0, 'R');
        $pdf->cell(30, 8, number_format($totalkeluar), 'R,B', 1, 'L');
        $pdf->cell(240, 8, 'Sisa Dana Yayasan :  Rp.', 'L,B', 0, 'R');
        $pdf->cell(30, 8, number_format($sisatotal), 'B,R', 1, 'L');
        $pdf->Output();
    }

    public function pdfByDate($startdate, $enddate)
    {
        $pdf = new FPDF('L', 'mm', 'A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Image('images/logoaj.png', 13, 7, 30, 26);
        $pdf->Cell(280, 7, 'LAPORAN KESELURUHAN ASH-HABUL JANNAH', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(280, 7, '(Sahabat surga)', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(280, 9, 'Jl.Haji som Rt.6/1 No.48 kel.pondok pucung kec.pondok aren Tangerang Selatan', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetLineWidth(1);
        $pdf->Line(10, 36, 280, 36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10, 37, 280, 37);

        $pdf->SetFont('Arial', 'B', 'U', 12);
        $pdf->Cell(110, 7, 'Periode :', 0, 0, 'R');
        $pdf->Cell(23, 7, date('d - M - Y', strtotime($startdate)), 0, 0, 'L');
        $pdf->Cell(12, 7, '-', 0, 0, 'R');
        $pdf->Cell(33, 7, date('d - M - Y', strtotime($enddate)), 0, 0, 'R');

        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(50, 6, '*Data donasi yang masuk*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Nama Donatur', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Tanggal Donasi', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $data1 = $this->Donasi_model->getShortAll($startdate, $enddate);
        $data2 = $this->Donasi_model->getPengeluaranByDate($startdate, $enddate);
        $totalkeluar = 0;
        foreach ($data2 as $row2) {
            $totalkeluar = $totalkeluar + $row2['jumlah'];
        }


        $total = 0;
        $num = 1;
        foreach ($data1 as $row) {
            $total = $total + $row['jumlah'];
            $sisatotal = $total - $totalkeluar;
            $pdf->Cell(10, 6, $num++, 1, 0, 'C');
            $pdf->Cell(60, 6, $row['nama_lengkap'], 1, 0, 'C');
            $pdf->Cell(80, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(70, 6, 'Rp. ' . number_format($row['jumlah']), 1, 0, 'C');
            $pdf->Cell(50, 6, date('d - M - Y', strtotime($row['tanggal_donasi'])), 1, 1, 'C');
        }

        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(35, 6, '*Data pengeluaran*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Tanggal Pengeluaran', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Jumlah Pengeluaran', 1, 1, 'C');

        $data3 = $this->Donasi_model->getDataPengeluaranByDate($startdate, $enddate);
        $pdf->SetFont('Arial', '', 10);

        $numPeng = 1;
        foreach ($data3 as $row) {
            $pdf->Cell(10, 6, $numPeng++, 1, 0, 'C');
            $pdf->Cell(80, 6, date('d - M - Y', strtotime($row['tgl_keluar'])), 1, 0, 'C');
            $pdf->Cell(90, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(90, 6, 'Rp. ' . number_format($row['jumlah']), 1, 1, 'C');
        }

        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->cell(240, 8, 'Total Dana Pemasukan :  Rp.', 'L,B,T', 0, 'R');
        $pdf->cell(30, 8, number_format($total), 'R,B,T', 1, 'L');
        $pdf->cell(240, 8, 'Total Dana Pengeluaran :  Rp.', 'L,B', 0, 'R');
        $pdf->cell(30, 8, number_format($totalkeluar), 'R,B', 1, 'L');
        $pdf->cell(240, 8, 'Sisa Dana Yayasan :  Rp.', 'L,B', 0, 'R');
        $pdf->cell(30, 8, number_format($sisatotal), 'B,R', 1, 'L');
        $pdf->Output();
    }

    public function pdfByDateById($kd, $startdate, $enddate)
    {
        $pdf = new FPDF('L', 'mm', 'A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string
        $pdf->Image('images/logoaj.png', 13, 7, 30, 26);
        $pdf->Cell(280, 7, 'LAPORAN YAYASAN ASH-HABUL JANNAH', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(280, 7, '(Sahabat surga)', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(280, 9, 'Jl.Haji som Rt.6/1 No.48 kel.pondok pucung kec.pondok aren Tangerang Selatan', 0, 1, 'C');
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetLineWidth(1);
        $pdf->Line(10, 36, 280, 36);
        $pdf->SetLineWidth(0);
        $pdf->Line(10, 37, 280, 37);

        $dataNP = $this->Program_model->byId($kd);
        foreach ($dataNP as $NP) {
            $pdf->SetFont('Arial', 'B', 13);
            $pdf->Cell(280, 7, $NP['nama_program'], 0, 1, 'C');
        }
        $pdf->Cell(1, 1, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(137, 7, '( ' . date('d - M - Y', strtotime($startdate)), 0, 0, 'R');
        $pdf->Cell(5, 7, '-', 0, 0, 'C');
        $pdf->Cell(23, 7, date('d - M - Y', strtotime($enddate)) . ' )', 0, 0, 'L');

        $pdf->Cell(15, 15, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(50, 6, '*Data donasi yang masuk*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(60, 6, 'Nama Donatur', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Jumlah', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Tanggal Donasi', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $data1 = $this->Donasi_model->getShortAllById($kd, $startdate, $enddate);
        $data2 = $this->Donasi_model->getPengeluaranByDateById($kd, $startdate, $enddate);
        $totalkeluar = 0;
        foreach ($data2 as $row2) {
            $totalkeluar = $totalkeluar + $row2['jumlah'];
        }

        $num = 1;
        $total = 0;
        foreach ($data1 as $row) {
            $total = $total + $row['jumlah'];
            $sisatotal = $total - $totalkeluar;
            $pdf->Cell(10, 6, $num++, 1, 0, 'C');
            $pdf->Cell(60, 6, $row['nama_lengkap'], 1, 0, 'C');
            $pdf->Cell(80, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(70, 6, 'Rp. ' . number_format($row['jumlah']), 1, 0, 'C');
            $pdf->Cell(50, 6, date('d - M - Y', strtotime($row['tanggal_donasi'])), 1, 1, 'C');
        }
        $pdf->Cell(10, 10, '', 0, 1);
        $pdf->SetFont('Arial', 'I', 12);
        $pdf->Cell(35, 6, '*Data pengeluaran*', 0, 1, 'C');
        $pdf->Cell(5, 5, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, 'No', 1, 0, 'C');
        $pdf->Cell(80, 6, 'Tanggal Pengeluaran', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Program', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Jumlah Pengeluaran', 1, 1, 'C');
        $data3 = $this->Donasi_model->getDataPengeluaranByIdByDate($kd, $startdate, $enddate);
        $pdf->SetFont('Arial', '', 10);

        $numPeng = 1;
        foreach ($data3 as $row) {
            $pdf->Cell(10, 6, $numPeng++, 1, 0, 'C');
            $pdf->Cell(80, 6, date('d - M - Y', strtotime($row['tgl_keluar'])), 1, 0, 'C');
            $pdf->Cell(90, 6, $row['nama_program'], 1, 0, 'C');
            $pdf->Cell(90, 6, 'Rp. ' . number_format($row['jumlah']), 1, 1, 'C');
        }

        $pdf->Cell(15, 15, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->cell(240, 8, 'Total Dana Pemasukan :  Rp.', 0, 0, 'R');
        $pdf->cell(30, 8, number_format($total), 0, 1, 'L');
        $pdf->cell(240, 8, 'Total Dana Pengeluaran :  Rp.', 0, 0, 'R');
        $pdf->cell(30, 8, number_format($totalkeluar), 0, 1, 'L');
        $pdf->cell(240, 8, 'Sisa Dana Yayasan :  Rp.', 0, 0, 'R');
        $pdf->cell(30, 8, number_format($sisatotal), 0, 1, 'L');
        $pdf->Output();
    }
}
