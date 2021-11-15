<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ulamatakrij extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('ulamatakrij_m');
    }

    public function index()
    {
        $data['ulamatakrij'] = $this->ulamatakrij_m->get_ulamatakrij()->result_array();
        $data['title']= 'Data Ulama Takrij';
        $this->template->load('template', 'datas/ulama_takrij', $data);

        $this->form_validation->set_rules('ulama_takrij', 'ulama_takrij', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        
        if ($this->form_validation->run() == FALSE) {
            // code ...
        } else {
            $data = [
            'ulama_takrij' => $this->input->post('ulama_takrij'),
            'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('tb_ulamatakrij', $data);
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            redirect('ulamatakrij');
        }
    }

    public function get_ubah_ulamatakrij()
    {
        echo json_encode($this->ulamatakrij_m->get_ulamatakrij_byId($_POST['id_ulamatakrij']));
    }

    public function ubah_ulamatakrij()
    {
        if ($this->ulamatakrij_m->get_ubah_ulamatakrij($_POST) > 0) {
            $this->session->set_flashdata('fail', 'Data Gagal Diubah');
        redirect('ulamatakrij');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil Diubah');
        redirect('ulamatakrij');
        }
    }

    public function delete($id_ulamatakrij)
    {
        $this->ulamatakrij_m->delete($id_ulamatakrij);
        $error = $this->db->error();
        if($error['code'] != 0) {
            $this->session->set_flashdata('fail', 'Data Tidak Bisa dihapus');
        } else {
            $this->session->set_flashdata('success', 'Data Berhasil dihapus');
        }
        redirect('ulamatakrij');        
    }
}