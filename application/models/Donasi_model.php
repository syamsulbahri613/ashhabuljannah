<?php
class Donasi_model extends CI_Model
{

    public function tambahDataDonasi()
    {

        $data = [
            "kd_program" => $this->input->post('program'),
            "kd_user" => $this->session->userdata('kd_user'),
            "tanggal_donasi" => $this->input->post('tanggaldonasi'),
            "jumlah" => $this->input->post('nominal'),
            "status" => "Menunggu",
            "keterangan" => $this->input->post('keterangan'),
            "notif" => $this->input->post('note'),
        ];
        $this->db->insert('donasi', $data);
    }

    public function getDatatotal()
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getShortAll($date1 = null, $date2 = null)
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->where_in('status', $status);
        $this->db->where('tanggal_donasi >=', $date1);
        $this->db->where('tanggal_donasi <=', $date2);
        return $this->db->get()->result_array();
    }

    public function getGrafik()
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->select_sum('jumlah');
        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getGrafikByDate($date1 = null, $date2 = null)
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->select_sum('jumlah');
        $this->db->where_in('status', $status);
        $this->db->where('tanggal_donasi >=', $date1);
        $this->db->where('tanggal_donasi <=', $date2);
        return $this->db->get()->result_array();
    }


    public function getGrafikById($kd_program)
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->select_sum('jumlah');
        $this->db->where('t2.kd_program', $kd_program);
        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getGrafikByDateById($kd = null, $date1 = null, $date2 = null)
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->select_sum('jumlah');
        $this->db->where('t2.kd_program', $kd);
        $this->db->where_in('status', $status);
        $this->db->where('tanggal_donasi >=', $date1);
        $this->db->where('tanggal_donasi <=', $date2);
        return $this->db->get()->result_array();
    }

    public function getDatatotalById($kd_program)
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->where('t2.kd_program', $kd_program);
        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getShortAllById($kd = null, $date1 = null, $date2 = null)
    {
        $status = array('Success');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->where('t2.kd_program', $kd);
        $this->db->where_in('status', $status);
        $this->db->where('tanggal_donasi >=', $date1);
        $this->db->where('tanggal_donasi <=', $date2);
        return $this->db->get()->result_array();
    }

    public function getRiwayat()
    {
        $status = array('Proses', 'success', 'gagal');
        $this->db->from('konfirmasi t1');
        $this->db->join('donasi t2', 't2.kd_donasi = t1.kd_donasi');
        $this->db->join('program t3', 't3.kd_program = t2.kd_program');
        $this->db->join('admin t4', 't4.kd_admin = t2.kd_admin', 'left');
        $this->db->where('kd_user', $this->session->userdata('kd_user'));
        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getUnconfirmById()
    {
        $status = array('menunggu');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->where('kd_user', $this->session->userdata('kd_user'));
        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getTertunda()
    {
        $status = array('Proses');
        $this->db->from('konfirmasi t4');
        $this->db->join('donasi t1', 't1.kd_donasi = t4.kd_donasi');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');


        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getUnkonfirm()
    {
        $status = array('Menunggu');
        $this->db->from('donasi t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function getSuccess()
    {
        $status = array('Success');
        $this->db->from('konfirmasi t4');
        $this->db->join('donasi t1', 't1.kd_donasi = t4.kd_donasi');
        $this->db->join('user t3', 't3.kd_user = t1.kd_user');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');


        $this->db->where_in('status', $status);
        return $this->db->get()->result_array();
    }

    public function tambahKonfirmasi($kd_donasi, $data)
    {
        $data = [
            "tgl_transfer" => $this->input->post('tanggal_transfer', true),
            "namarek" => $this->input->post('namarek', true),
            "kd_donasi" => $this->input->post('dns'),
            "image" => $data['upload_data']['file_name'],
        ];
        $data1 = [

            "status" => $this->input->post('status', true),
        ];
        $this->db->where('kd_donasi');
        $this->db->insert('konfirmasi', $data);
        $this->db->where('kd_donasi', $kd_donasi);
        $this->db->update('donasi', $data1);
    }

    public function Prosesvalid($kd_donasi)
    {
        $data = [
            "status" => "Success",
            "notif" => "Transaksi Anda Berhasil Diproses, Trimakasih sudah bergabung dalam program kami ! ",
            "kd_admin" => $this->session->userdata("kd_admin"),
        ];
        $this->db->where('kd_donasi', $kd_donasi);
        $this->db->update('donasi', $data);
    }

    public function ProsesUnvalid($kd_donasi)
    {
        $data = [
            "status" => "Gagal",
            "notif" => "Transaksi Anda Gagal Diproses. Harap priksa kembali data donasi dan bukti transaksi anda dan lakukan transaksi kembali trimakasih !",
            "kd_admin" => $this->session->userdata("kd_admin"),
        ];
        $this->db->where('kd_donasi', $kd_donasi);
        $this->db->update('donasi', $data);
    }


    public function prosesInputPengeluaran($file1, $file2, $file3, $file4)
    {
        $data = [
            "kd_program" => $this->input->post('program', true),
            "jumlah" => $this->input->post('jml', true),
            "tgl_keluar" => $this->input->post('tglkeluar', true),
            "judul_keluar" => $this->input->post('jp', true),
            "keterangan" => $this->input->post('ket', true),
            "kd_admin" => $this->input->post('adm', true),
            "foto1" => $file1,
            "ket1" => $this->input->post('ket1', true),
            "foto2" => $file2,
            "ket2" => $this->input->post('ket2', true),
            "foto3" => $file3,
            "ket3" => $this->input->post('ket3', true),
            "foto4" => $file4,
            "ket4" => $this->input->post('ket4', true),
        ];

        $this->db->insert('pengeluaran', $data);
    }

    public function prosesUpdatePengeluaran($kd_keluar)
    {
        $data = [
            "kd_program" => $this->input->post('program', true),
            "jumlah" => $this->input->post('jml', true),
            "tgl_keluar" => $this->input->post('tglkeluar', true),
            "judul_keluar" => $this->input->post('jp', true),
            "keterangan" => $this->input->post('ket', true),
        ];
        $this->db->where('kd_keluar', $kd_keluar);
        $this->db->update('pengeluaran', $data);
    }

    public function hapusPengeluaran($kd_keluar)
    {
        $this->db->where('kd_keluar', $kd_keluar);
        $this->db->delete('pengeluaran');
    }

    public function getDataPengeluaran()
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('admin t3', 't3.kd_admin = t1.kd_admin');

        return $this->db->get()->result_array();
    }

    public function getAllPengeluaran()
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->select_sum('jumlah');

        return $this->db->get()->result_array();
    }

    public function getAllPengeluaranById($kd_program)
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->select_sum('jumlah');
        $this->db->where('t2.kd_program', $kd_program);

        return $this->db->get()->result_array();
    }

    public function getDataPengeluaranById($kd_program)
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('admin t3', 't3.kd_admin = t1.kd_admin');

        $this->db->where('t2.kd_program', $kd_program);
        return $this->db->get()->result_array();
    }

    public function getDataPengeluaranByDate($startdate, $enddate)
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('admin t3', 't3.kd_admin = t1.kd_admin');
        $this->db->where('tgl_keluar >=', $startdate);
        $this->db->where('tgl_keluar <=', $enddate);
        return $this->db->get()->result_array();
    }


    public function getDataPengeluaranByIdByDate($kd, $startdate, $enddate)
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->join('admin t3', 't3.kd_admin = t1.kd_admin');
        $this->db->where('t2.kd_program', $kd);
        $this->db->where('tgl_keluar >=', $startdate);
        $this->db->where('tgl_keluar <=', $enddate);
        return $this->db->get()->result_array();
    }

    public function getPengeluaranByDate($startdate, $enddate)
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->select_sum('jumlah');
        $this->db->where('tgl_keluar >=', $startdate);
        $this->db->where('tgl_keluar <=', $enddate);
        return $this->db->get()->result_array();
    }

    public function getPengeluaranByDateById($kd, $startdate, $enddate)
    {
        $this->db->from('pengeluaran t1');
        $this->db->join('program t2', 't2.kd_program = t1.kd_program');
        $this->db->select_sum('jumlah');
        $this->db->where('t2.kd_program', $kd);
        $this->db->where('tgl_keluar >=', $startdate);
        $this->db->where('tgl_keluar <=', $enddate);
        return $this->db->get()->result_array();
    }

    public function getTransaksiVerifikasi()
    {
        $status = array('Proses');
        $this->db->from('donasi');
        $this->db->where_in('status', $status);
        return $this->db->count_all_results();

    }
}
