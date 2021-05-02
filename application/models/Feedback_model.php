<?php
    class Feedback_model extends CI_Model{
        public function getAllfeedback()
        {
            $this->db->from('feedback t1');
            $this->db->join('user t2','t2.kd_user = t1.kd_user');
            return $this->db->get()->result_array();
        }

        public function getFeedbackOff()
        {
            $status= array('Off');
            $this->db->from('feedback t1');
            $this->db->join('user t2','t2.kd_user = t1.kd_user');
            $this->db->where_in('status_komentar', $status);
            return $this->db->get()->result_array();
        }

        public function getReply($kd_fb)
        {
            $data = [
                "reply" => $this->input->post('komentar', true),
                "status_komentar" => "On",
                "kd_admin" => $this->session->userdata("kd_admin"),
            ];
            $this->db->where('kd_fb', $kd_fb);
            $this->db->update('feedback', $data);
           
        }

        public function inputFeedback()
        {
            $data = [
                "kd_user" => $this->input->post('kd_user', true),
                "komentar" => $this->input->post('komentar', true),
                "status_komentar" => $this->input->post('statusk', true),
            ];

           
            $this->db->insert('feedback', $data);
        }

        public function getTfeedback()
        {
            $status = array('Off');
            $this->db->from('feedback');
            $this->db->where_in('status_komentar', $status);
            return $this->db->count_all_results();
        }
    }
?>